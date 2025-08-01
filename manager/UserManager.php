<?php

class UserManager extends AbstractManager
{
    //insertion en db new user
    public function saveUser(string $pseudo, string $email, string $password): bool|string
    {
        try {
            $sql = "INSERT INTO user (pseudo, email, password) VALUES (?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$pseudo, $email, $password]);
            return true;
        } catch (PDOException $e) {
            // Erreur de type "Duplicate entry"
            if ($e->errorInfo[1] === 1062) {
                return 'duplicate';
            }
            return false;
        }
    }
    public function emailExists(string $email): bool
    {
        $sql = "SELECT id FROM user WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);

        return $stmt->rowCount() > 0;
    }
    // recherche du user par email
    public function getUserByEmail(string $email)
    {
        $sql = " SELECT * FROM user WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($userData) {
            return new User($userData);
        }

        return null;
    }
    // recherche du user par pseudo
    public function getUserByPseudo(string $pseudo)
    {
        $sql = "SELECT * FROM user WHERE pseudo = :pseudo LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':pseudo' => $pseudo]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // recherche du user par id
    public function getUserById(int $id)
    {
        $sql = "SELECT * FROM user WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($userData) {
            return new User($userData);
        }

        return null;
    }

    public function updateUser(int $id, string $pseudo, string $email, ?string $password)
    {
        if ($password) {
            $sql = "UPDATE user SET email = :email, password = :password, pseudo = :pseudo WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([
                'id' => $id,
                'email' => $email,
                'password' => $password,
                'pseudo' => $pseudo
            ]);
        } else {
            $sql = "UPDATE user SET email = :email, pseudo = :pseudo WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([
                'id' => $id,
                'email' => $email,
                'pseudo' => $pseudo
            ]);
        }
    }

    public function updatePictureProfile(int $id, string $picture)
    {
        $sql = "UPDATE user SET picture = :picture WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'picture' => $picture,
            'id' => $id
        ]);
    }
}
