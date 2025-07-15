# Interfaces & Abstract Classes (Intermediate/Advanced)

## Challenge 6: Payment Gateway System

- **Goal**: Understand interfaces for defining contracts.

- **Task**:

  1. Define an interface `PaymentGateway` with methods: `processPayment($amount)`, `refundPayment($transactionId, $amount)`, `checkStatus($transactionId)`.

  2. Create concrete classes that implement `PaymentGateway`: `PayPalGateway`, `StripeGateway`.

     - Each should implement the methods with dummy logic (e.g., `echo "Processing PayPal payment..."`).

  3. Create a `Checkout` class that takes a `PaymentGateway` object in its constructor.

  4. The `Checkout` class should have a `finalizeOrder($amount)` method that uses the injected `PaymentGateway` to process the payment.

- **Extension** **(Dependency Injection)**: This challenge already subtly introduces dependency injection. Discuss its benefits in this context.

## Challenge 7: Logger System

- **Goal**: Practice interfaces and different implementations.

- **Task**:

  1. Define an interface `Logger` with methods: `logInfo($message)`, `logWarning($message)`, `logError($message)`.

  2. Create concrete logger implementations:

     - `FileLogger`: Logs messages to a text file.

     - `DatabaseLogger`: Logs messages to a database table (you can just simulate this with echoes).

     - `ConsoleLogger`: Logs messages to the console.

  3. Create a `Reporter` class that takes a `Logger` object in its constructor.

  4. The `Reporter` class should have methods like `generateReport()` that use the injected `Logger` to log various events during report generation.

- **Extension** **(Singleton Pattern)**: Could any of these loggers benefit from the Singleton pattern? Why or why not?
