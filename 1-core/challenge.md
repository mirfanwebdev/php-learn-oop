## Challenge 1: The Simple Calculator

1. **Goal**: Practice classes, objects, properties, and methods.
2. **Task**: Create a `Calculator` class.

   - It should have properties to store two numbers (`$num1`, `$num2`).

   - Implement methods for `add()`, `subtract()`, `multiply()`, and `divide()`.

   - Each method should take the two numbers, perform the operation, and return the result.

   - Instantiate the `Calculator` class, set the numbers, and call each operation.

3. **Extension (Encapsulation)**: Make the number properties `private` and add `setter` and `getter` methods (e.g., `setNum1($value)`, `getNum1()`). Why is this beneficial?
4. **Extension (Error Handling)**: What happens if you try to divide by zero? Implement a check and return an appropriate message or throw an exception.

## Challenge 2: The Basic Car

1.  **Goal**: Understand constructors, basic properties, and methods.
2.  **Task**: Create a `Car` class.

    - **Properties**: `make`, `model`, `year`, `color`, `speed` (default to 0).

    - **Constructor**: Initialize `make`, `model`, `year`, and `color` when a new car is created.

    - **Methods**:

      - `accelerate($amount)`: Increases speed by $amount.

      - `brake($amount)`: Decreases speed by $amount, ensuring speed doesn't go below 0.

      - `getCurrentSpeed()`: Returns the current speed.

      - `displayInfo()`: Prints all car information (make, model, year, color, current speed).

3.  **Extension (Private Properties)**: Make all properties `private` and use methods to interact with them where appropriate.

## Challenge 3: The Book & Library System

1.  **Goal**: Introduce multiple classes and basic relationships (aggregation).
2.  **Task**:

    1. Create a `Book` class:

       - Properties: `title`, `author`, `isbn`, `isBorrowed` (boolean, default false).

       - Constructor to set `title`, `author`, `isbn`.

       - Methods: `borrowBook()`, `returnBook()`, `displayBookInfo()`.

    2. Create a `Library` class:

       - **Property**: `books` (an array to store `Book` objects).

       - **Methods**:

         - `addBook(Book $book)`: Adds a book to the library.

         - `findBook($isbn)`: Searches for a book by ISBN and returns the `Book` object or `null`.

         - `listAllBooks()`: Displays information for all books in the library.

         - `borrowBookByIsbn($isbn)`: Finds the book and attempts to borrow it.

         - `returnBookByIsbn($isbn)`: Finds the book and attempts to return it.

3.  **Extension (Counting)**: Add a static property to the `Book` class to keep track of the total number of books created.
