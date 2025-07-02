<?php
class Book
{
    private int $id;
    private string $title;
    private string $author;
    private string $sellBy;
    private string $available;
    private string $images;
    private string $description;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->title = $data['title'];
        $this->author = $data['author'];
        $this->sellBy = $data['sell_by'];
        $this->available = $data['available'];
        $this->images = $data['images'];
        $this->description = $data['description'];
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function getTitle(): string
    {
        return $this->title;
    }
    public function getAuthor(): string
    {
        return $this->author;
    }
    public function getSellBy(): string
    {
        return $this->sellBy;
    }
    public function getAvailable(): string
    {
        return $this->available;
    }
    public function getImages(): string
    {
        return $this->images;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
}
