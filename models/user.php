<?php

class User
{
    private string $pseudo;
    private string $login;
    private string $password;
    private DateTime $createdAt;
    public function __construct(array $data = [])
    {
        if (!empty($data)) {
            $this->pseudo = $data['pseudo'];
            $this->login = $data['login'];
            $this->password = $data['password'];
            $this->createdAt = $data['createdAt'];
        }
    }
    public function setPseudo(string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }
    public function getPseudo(): string
    {
        return $this->pseudo;
    }
    public function setLogin(string $login): void
    {
        $this->login = $login;
    }
    public function getLogin(): string
    {
        return $this->login;
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
        $this->password = $createdAt;
    }
    public function getreatedAt(): DateTime
    {
        return $this->createdAt;
    }
}
