<?php
class ChatController
{
    public function showChat(): void
    {
        $db = new Database();
        $pdo = $db->getPDO();

        $currentUserId = $_SESSION['user']['id'] ?? null;
        if (!$currentUserId) {
            echo "Erreur : utilisateur non connecté.";
            return;
        }

        $chatManager = new ChatManager($pdo);
        $otherUserId = $_GET['with'] ?? null;

        $conversations = $chatManager->getConversationsByUser($currentUserId);

        if ($otherUserId) {
            $conversationId = $chatManager->getOrCreateConversation($currentUserId, (int)$otherUserId);
            $messages = $chatManager->getMessagesByConversation($conversationId);
        } else {
            $messages = [];
            $conversationId = null;
            if (!empty($conversations)) {
                $otherUserId = $conversations[0]['other_user_id'];
                $conversationId = $chatManager->getOrCreateConversation($currentUserId, (int)$otherUserId);
                $messages = $chatManager->getMessagesByConversation($conversationId);
            }
        }

        $view = new View('chat/chat');
        $view->render([
            'conversations' => $conversations,
            'messages' => $messages,
            'conversationId' => $conversationId,
            'otherUserId' => $otherUserId,
        ]);
    }

    public function sendMessage(): void
    {
        $db = new Database();
        $pdo = $db->getPDO();

        $currentUserId = $_SESSION['user']['id'] ?? null;
        $conversationId = $_POST['conversation_id'] ?? null;
        $receiverId = $_POST['receiver_id'] ?? null;
        $message = trim($_POST['message'] ?? '');

        if (!$currentUserId || !$conversationId || !$receiverId || empty($message)) {
            $_SESSION['message'] = "Erreur lors de l'envoi du message.";
            header("Location: index.php?page=chat");
            exit();
        }

        $chatManager = new ChatManager($pdo);
        $chatManager->sendMessage((int)$conversationId, $currentUserId, $message);

        header("Location: index.php?page=chat&with=$receiverId");
        exit();
    }
}
