<?php

class BookExchangeManager
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getBookById(int $id): ?Book
    {
        $sql = 'SELECT * FROM books WHERE id = ?';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return new Book($result);
        }
        return null;
    }
    public function getAllBooks(): array
    {
        $sql = 'SELECT * FROM books';
        $stmt = $this->db->query($sql);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $books = [];
        foreach ($results as $row) {
            $books[] = new Book($row);
        }
        return $books;
    }
    public function getBooksByUser(User $user): array
    {
        $sql = 'SELECT * FROM books WHERE id_user = :idUser';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':idUser', $user->getId(), PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $books = [];
        foreach ($results as $row) {
            $books[] = new Book($row);
        }
        return $books;
    }
    public function getBookBySearch(string $searchTerm = ''): array
    {
        $sql = " SELECT * FROM books ";
        if (!empty($searchTerm)) {
            $sql .= "WHERE title LIKE :search 
                OR author LIKE :search 
                OR sell_by LIKE :search";
        }
        $stmt = $this->db->prepare($sql);

        if (!empty($searchTerm)) {
            $stmt->bindValue(':search', '%' . $searchTerm . '%', PDO::PARAM_STR);
        }
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $books = [];
        foreach ($results as $row) {
            $books[] = new Book($row);
        }

        return $books;
    }

    public function updateBook(Book $book): void
    {
        $sql = "UPDATE books SET title = :title, author = :author, description = :description, available = :available WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'id' => $book->getId(),
            'title' => $book->getTitle(),
            'author' => $book->getAuthor(),
            'description' => $book->getDescription(),
            'available' => $book->getAvailable(),
        ]);
    }
}
