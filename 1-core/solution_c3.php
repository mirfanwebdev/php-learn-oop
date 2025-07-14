<?php
// Challenge 3: The Book & Library System

class Book
{
    private static int $totalBookCreated = 0;

    private string $title;
    private string $author;
    private string $isbn;
    private bool $isBorrowed;

    public function __construct(
        string $title,
        string $author,
        string $isbn
    ) {
        $this->title = $title;
        $this->author = $author;
        $this->isbn = $isbn;
        $this->isBorrowed = false;
        self::$totalBookCreated++;
    }

    public function borrowBook(): bool
    {
        if (!$this->isBorrowed) {
            $this->isBorrowed = true;
            return true;
        }
        return false;
    }

    public function returnBook(): bool
    {
        if ($this->isBorrowed) {
            $this->isBorrowed = false;
            return true;
        }
        return false;
    }

    public function displayBookInfo(): void
    {
        echo "Title: " . $this->title . PHP_EOL;
        echo "Author: " . $this->author . PHP_EOL;
        echo "ISBN: " . $this->isbn . PHP_EOL;
        echo "Status: " . ($this->isBorrowed ? "Borrowed" : "Available") . PHP_EOL;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getIsbn(): string
    {
        return $this->isbn;
    }

    public static function getTotalBookCreated(): int
    {
        return self::$totalBookCreated;
    }
}

class Library
{
    private array $books;

    public function __construct()
    {
        $this->books = [];
    }

    public function addBook(Book $book): void
    {
        $bookTitle = $book->getTitle();
        $bookIsbn = $book->getIsbn();

        if ($this->findBook($bookIsbn) === null) {
            $this->books[$bookIsbn] = $book;
            echo "Added Book: " . $bookTitle . PHP_EOL;
        } else {
            echo "Book: " . $bookTitle . " already exists in library." . PHP_EOL;
        }
    }

    public function findBook(string $isbn): ?Book
    {
        return $this->books[$isbn] ?? null;
    }

    public function listAllBooks(): void
    {
        foreach ($this->books as $book) {
            $book->displayBookInfo();
            echo "-------" . PHP_EOL;
        }
    }

    public function borrowBookByIsbn(string $isbn): bool
    {
        $book = $this->findBook($isbn);

        if ($book) {
            $bookTitle = $book->getTitle();
            if ($book->borrowBook()) {
                echo "Book borrowed: " . $bookTitle . PHP_EOL;
                return true;
            } else {
                echo "Book: " . $bookTitle . " is already borrowed." . PHP_EOL;
            }
        } else {
            echo "Book with ISBN: " . $isbn . " not found in library." . PHP_EOL;
        }
        return false;
    }

    public function returnBookByIsbn(string $isbn): bool
    {
        $book = $this->findBook($isbn);

        if ($book) {
            $bookTitle = $book->getTitle();
            if ($book->returnBook()) {
                echo "Book returned: " . $bookTitle . PHP_EOL;
            } else {
                echo "Book: " . $bookTitle . " is not borrowed." . PHP_EOL;
            }
        } else {
            echo "Book with ISBN: " . $isbn . " not found in library." . PHP_EOL;
        }
        return false;
    }
}

echo "--- Book & Library System ---" . PHP_EOL;
$lib = new Library();
$book1 = new Book("The Great Gatsby", "F. Scott Fitzgerald", "978-3-16-148410-0");
$book2 = new Book("To Kill a Mockingbird", "Harper Lee", "978-3-16-148410-1");
$book3 = new Book("1984", "George Orwell", "978-3-16-148410-2");
echo PHP_EOL;
$lib->addBook($book1);
$lib->addBook($book2);
$lib->addBook($book3);

$lib->borrowBookByIsbn("978-3-16-148410-1");
$lib->borrowBookByIsbn("978-3-16-148410-2");

$lib->returnBookByIsbn("978-3-16-148410-2");
$lib->returnBookByIsbn("111-111");
echo PHP_EOL;
echo "Books in library: " . Book::getTotalBookCreated() . PHP_EOL;
$lib->listAllBooks();
