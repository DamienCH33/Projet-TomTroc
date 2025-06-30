<?php

class BookExchangeManager
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getBookById(int $id): array|false
    {
        $sql = 'SELECT * FROM books WHERE id = ?';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
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
}
