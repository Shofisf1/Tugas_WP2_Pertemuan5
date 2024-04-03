<?php

// Kelas Book
class Book {
    private $title;
    private $author;
    private $year;
    private $borrowed;

    // Constructor
    public function __construct($title, $author, $year) {
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
        $this->borrowed = false;
    }

    // Getter dan Setter
    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getYear() {
        return $this->year;
    }

    public function isBorrowed() {
        return $this->borrowed;
    }

    public function setBorrowed($borrowed) {
        $this->borrowed = $borrowed;
    }
}

// Kelas Library
class Library {
    private $books = [];

    // Fungsi menambahkan buku baru
    public function addBook($book) {
        array_push($this->books, $book);
    }

    // Fungsi untuk meminjam buku
    public function borrowBook($title) {
        foreach ($this->books as $book) {
            if ($book->getTitle() == $title && !$book->isBorrowed()) {
                $book->setBorrowed(true);
                echo str_repeat(' ', 50) . "\n"; // Menambahkan spasi sebelum pesan
                echo "Buku $title berhasil dipinjam.\n";
                echo str_repeat('-', 50) . "\n"; // Menambahkan garis-garis setelah buku berhasil dipinjam
                echo str_repeat(' ', 50) . "\n"; // Menambahkan double spasi
                return;
            }
        }
        echo "Buku $title tidak ditemukan atau sudah dipinjam.\n";
    }

    // Fungsi untuk mengembalikan buku
    public function returnBook($title) {
        foreach ($this->books as $book) {
            if ($book->getTitle() == $title && $book->isBorrowed()) {
                $book->setBorrowed(false);
                echo "Buku $title berhasil dikembalikan.\n";
                echo str_repeat('-', 50) . "\n"; // Menambahkan garis-garis setelah buku berhasil dikembalikan
                echo str_repeat(' ', 50) . "\n"; // double spasi
                return;
            }
        }
        echo "Buku $title tidak ditemukan atau belum dipinjam.\n";
    }

    // Fungsi mencetak daftar buku yang tersedia
    public function printAvailableBooks() {
        echo "Daftar Buku yang Tersedia:\n";
        echo str_repeat('-', 50) . "\n"; // garis-garis setelah daftar buku yang tersedia
        echo str_repeat(' ', 50) . "\n"; // double spasi
        foreach ($this->books as $book) {
            if (!$book->isBorrowed()) {
                echo $book->getTitle() . " - " . $book->getAuthor() . " (" . $book->getYear() . ")\n";
            }
        }
    }
}

// Contoh penggunaan
$library = new Library();

// Menambahkan buku baru
$library->addBook(new Book("Tentang Kamu", "TereLiye", 2016));
$library->addBook(new Book("Negeri Para Bedebah", "TereLiye", 2012));
$library->addBook(new Book("Daun Yang Jatuh Tak Pernah Membenci Angin", "TereLiye", 2013));
$library->addBook(new Book("Bintang", "TereLiye", 2017));
$library->addBook(new Book("Pulang - Pergi", "TereLiye", 2021));
$library->addBook(new Book("Negri Di Ujung Tanduk", "TereLiye", 2013));

// Mencetak daftar buku yang tersedia
$library->printAvailableBooks();

// Meminjam buku
$library->borrowBook("Tentang Kamu");
$library->borrowBook("Negeri Para Bedebah");

// Mengembalikan buku
$library->returnBook("Tentang Kamu");

// Mencetak daftar buku yang tersedia setelah pengembalian
$library->printAvailableBooks();
