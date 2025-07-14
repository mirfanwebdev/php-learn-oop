# Inheritance & Polymorphism (Intermediate)

## Challenge 4: Animal Kingdom

- **Goal**: Understand **inheritance**, **method overriding**, and **polymorphism**.
- **Task**:

  1. Create an `Animal` class (base class):

     - Property: `name`.

     - Constructor.

     - Abstract method: `makeSound()`.

     - Method: `eat()`.

  2. Create concrete classes that extend `Animal`: `Dog`, `Cat`, `Cow`.

     - Each should implement `makeSound()` differently (e.g., "Woof!", "Meow!", "Moo!").

     - Add a unique property or method to at least one subclass (e.g., `Dog` has breed).

  3. Create an array of `Animal` objects (a mix of `Dog`, `Cat`, `Cow`).

  4. Loop through the array and call `makeSound()` and `eat()` on each animal. Observe **polymorphism** in action.

- **Extension** (**Abstract Class** vs. **Interface**): Discuss why `Animal` is a good candidate for an abstract class here. When would an interface be more appropriate?

## Challenge 5: Employee Management System

- **Goal**: Deepen understanding of **inheritance**, **method overriding**, and potentially **abstract classes/interfaces**.

- **Task**:

  1. Create an `Employee` class:

     - Properties: `name`, `id`, `salary`.

     - Constructor.

     - Method: `calculatePay()` (returns base salary).

     - Method: `displayInfo()`.

  2. Create subclasses: `Manager`, `Developer`.

     - `Manager`: Additional property bonus. Override `calculatePay()` to include bonus.

     - `Developer`: Additional property `programmingLanguage`. Override `calculatePay()`(perhaps with a fixed hourly rate \* 160 hours for simplicity).

  3. Create an array of `Employee` objects (mixed types).

  4. Loop through and call `calculatePay()` and `displayInfo()` on each.

- **Extension** (Interface for Pay Calculation): Define an **IPayable** interface with a `calculatePay()` method. Have `Employee` (or its subclasses directly) implement this interface.
