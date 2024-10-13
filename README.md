# DDD-PHPArkitect
Demonstration of PHPArkitect in a Domain Driven Design

## Project Structure
```sh
├── src
│   ├── Application
│   ├── Domain
│   ├── Infrastructure
│   ├── Order
│   │   ├── Models
│   │   └── Services
│   ├── SharedKernel
│   │   └── Models
│   ├── Ui
│   │   └── Http
│   │       └── Actions
│   │           ├── Order
│   │           └── User
│   └── User
│       ├── Models
│       └── Services
├── tests
│   ├── Order
│   └── User
├── arkitect.php
```
## Features

- **Bounded Contexts**: The project is organized into multiple bounded contexts: `User`, `Order`, and a shared kernel for shared models.
- **HTTP Actions**: Actions related to user and order management are placed in the `Http` directory, following the DDD principles.
- **Architecture Rules**: Using PhpArkitect, rules are defined to ensure that the architecture's integrity is maintained, preventing inappropriate dependencies between contexts.

## How Run

```sh
composer arkitect
```

## Example Output
![image](https://github.com/user-attachments/assets/44c9d346-2e6a-4b77-ab84-3b45d909f5b1)
