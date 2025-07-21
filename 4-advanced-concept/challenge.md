# IV. Advanced Concepts (Advanced)

## Challenge 8: Event Dispatcher

- **Goal**: Understand the Observer Pattern (or Publisher-Subscriber).

- **Task**:

  1. Create an `EventDispatcher` class:

     - Property: `$listeners` (an associative array where keys are event names and values are arrays of callable listeners).

     - Method: `addListener($eventName, callable $listener)`: Registers a listener for an event.

     - Method: `dispatch($eventName, $data = null)`: Notifies all listeners for a given event, passing any `$data`.

  2. Create a `User` class with a method `register()` that dispatches a user.registered event.

  3. Create separate functions or static methods that act as listeners (e.g., `sendWelcomeEmail($data)`, `logUserRegistration($data)`).

  4. Register these listeners with the `EventDispatcher` and test the `register()` method of the User class.

- **Extension** (Event Objects): Instead of just passing `$data`, create an `Event` class that encapsulates event data and is passed to listeners.

## Challenge 9: Data Validator

- **Goal**: Explore design patterns like **Strategy** or **Chain of Responsibility** (simplified).

- **Task**:

  1. Define an interface `ValidationRule` with a single method `isValid($value)`.

  2. Implement several concrete `ValidationRule` classes: `RequiredRule`, `MinLengthRule($length)`, `EmailRule`, `NumericRule`.

  3. Create a `Validator` class:

     - Property: `$rules` (an array of `ValidationRule` objects).

     - Method: `addRule(ValidationRule $rule)`.

     - Method: `validate($value)`: Iterates through all added rules. If any `rule` returns `false`, it returns `false` immediately. Otherwise, returns `true`.

  4. Use the `Validator` to validate various inputs.

- **Extension** (Error Messages): Modify `ValidationRule` to return an `error` message if validation fails, instead of just a `boolean`. The `Validator` should collect all `error` messages.
