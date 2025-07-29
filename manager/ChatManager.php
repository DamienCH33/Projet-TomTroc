<?php
class ChatManager extends AbstractManager
{
    public function getConversationsByUser(int $userId): array
    {
        $sql = "
        SELECT c.id AS conversation_id,
               CASE WHEN c.user1_id = ? THEN c.user2_id ELSE c.user1_id END AS other_user_id,
               u.pseudo,
               u.picture,
               (SELECT message FROM messages m WHERE m.conversation_id = c.id ORDER BY sent_at DESC LIMIT 1) AS last_message,
               (SELECT sent_at FROM messages m WHERE m.conversation_id = c.id ORDER BY sent_at DESC LIMIT 1) AS last_message_time
        FROM conversations c
        JOIN user u ON u.id = CASE WHEN c.user1_id = ? THEN c.user2_id ELSE c.user1_id END
        WHERE c.user1_id = ? OR c.user2_id = ?
        ORDER BY last_message_time DESC
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId, $userId, $userId, $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOrCreateConversation(int $user1, int $user2): int
    {
        $ids = [$user1, $user2];
        sort($ids);
        [$user1, $user2] = $ids;

        $stmt = $this->db->prepare("SELECT id FROM conversations WHERE user1_id = ? AND user2_id = ?");
        $stmt->execute([$user1, $user2]);
        $conversation = $stmt->fetch();

        if ($conversation) {
            return (int)$conversation['id'];
        }

        $stmt = $this->db->prepare("INSERT INTO conversations (user1_id, user2_id) VALUES (?, ?)");
        $stmt->execute([$user1, $user2]);
        return (int)$this->db->lastInsertId();
    }

    public function getMessagesByConversation(int $conversationId): array
    {
        $sql = "
        SELECT m.*, u.pseudo
        FROM messages m
        JOIN user u ON u.id = m.sender_id
        WHERE m.conversation_id = ?
        ORDER BY m.sent_at ASC
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$conversationId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function sendMessage(int $conversationId, int $senderId, int $receiverId, string $message): bool
    {
        $sql = "INSERT INTO messages (conversation_id, sender_id, receiver_id, message, is_read) VALUES (?, ?, ?, ?, 0)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$conversationId, $senderId, $receiverId, $message]);
    }
      public function countUnreadMessagesByUserId(int $userId): int
    {
        $sql = $this->db->prepare("
            SELECT COUNT(*) FROM messages
            WHERE receiver_id = ? AND is_read = 0
        ");
        $sql->execute([$userId]);
        return (int) $sql->fetchColumn();
    }
}
