<?php

class User
{
    private int $id;
    private string $email;
    private string $pseudo;
    private string $password;
    private DateTime $createdAt;

    public function __construct(array $data = [])
    {
        if (!empty($data)) {
            $this->id = $data['id'];
            $this->email = $data['email'];
            $this->pseudo = $data['pseudo'];
            $this->password = $data['password'];
            $this->createdAt = new DateTime($data['created_at']);
        }
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function setPseudo(string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }
    public function getPseudo(): string
    {
        return $this->pseudo;
    }
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = new DateTime($createdAt);
    }
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }
    public function getAccountAge(): string
    {
        $now = new DateTime();
        $interval = $this->createdAt->diff($now);

        if ($interval->y > 0) {
            return $interval->y . ' an' . ($interval->y > 1 ? 's' : '');
        } elseif ($interval->m > 0) {
            return $interval->m . ' mois';
        } elseif ($interval->d > 0) {
            return $interval->d . ' jour' . ($interval->d > 1 ? 's' : '');
        } elseif ($interval->h > 0) {
            return $interval->h . ' heure' . ($interval->h > 1 ? 's' : '');
        } elseif ($interval->i > 0) {
            return $interval->i . ' minute' . ($interval->i > 1 ? 's' : '');
        } else {
            return "quelques secondes";
        }
    }
}
