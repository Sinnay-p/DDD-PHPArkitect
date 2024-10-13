<?php

declare(strict_types=1);

use Arkitect\ClassSet;
use Arkitect\CLI\Config;
use Arkitect\Expression\ForClasses\HaveNameMatching;
use Arkitect\Expression\ForClasses\ResideInOneOfTheseNamespaces;
use Arkitect\RuleBuilders\Architecture\Architecture;
use Arkitect\Rules\Rule;

return static function (Config $config): void {
    $classSet = ClassSet::fromDir(__DIR__.'/src');

    $layeredArchitectureRules = Architecture::withComponents()
    ->component('SharedKernel')->definedBy('App\SharedKernel')
    ->component('Order')->definedBy('App\Order\*')
    ->component('User')->definedBy('App\User\*')
    ->where('SharedKernel')->mayDependOnComponents('SharedKernel')
    ->where('Order')->mayDependOnComponents('SharedKernel', 'Order')
    ->where('User')->mayDependOnComponents('SharedKernel', 'User')
    ->rules();

    $rules = [];

    $rules[] = Rule::allClasses()
    ->except('src\SharedKernel\*', 'src\Order\*', 'src\User\*')
    ->that(new ResideInOneOfTheseNamespaces('App\Ui\Http\Actions'))
    ->should(new HaveNameMatching('*Action'))
    ->because('we want uniform naming');

    $config->add($classSet, ...$layeredArchitectureRules, ...$rules);
};
