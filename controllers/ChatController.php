<?php
class ChatController
{
    private UserManager $userManager;
    private BookExchangeManager $bookManager;
    private ChatManager $chatManager;

    public function __construct(ChatManager $chatManager, UserManager $userManager, BookExchangeManager $bookManager)
    {
        $this->chatManager = $chatManager;
        $this->userManager = $userManager;
        $this->bookManager = $bookManager;
    }

    public function showChat(): void
    {
        $currentUserId = $_SESSION['user']['id'] ?? null;
        if (!$currentUserId) {
            echo "Erreur : utilisateur non connecté.";
            return;
        }

        $otherUserId = $_GET['with'] ?? null;

        $conversations = $this->chatManager->getConversationsByUser($currentUserId);

        if ($otherUserId) {
            $conversationId = $this->chatManager->getOrCreateConversation($currentUserId, (int)$otherUserId);
            $messages = $this->chatManager->getMessagesByConversation($conversationId);
        } else {
            $messages = [];
            $conversationId = null;
            if (!empty($conversations)) {
                $otherUserId = $conversations[0]['other_user_id'];
                $conversationId = $this->chatManager->getOrCreateConversation($currentUserId, (int)$otherUserId);
                $messages = $this->chatManager->getMessagesByConversation($conversationId);
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
        $currentUserId = $_SESSION['user']['id'] ?? null;
        $conversationId = $_POST['conversation_id'] ?? null;
        $receiverId = $_POST['receiver_id'] ?? null;
        $message = trim($_POST['message'] ?? '');

        if (!$currentUserId || !$conversationId || !$receiverId || empty($message)) {
            $_SESSION['message'] = "Erreur lors de l'envoi du message.";
            header("Location: index.php?page=chat");
            exit();
        }

        $this->chatManager->sendMessage((int)$conversationId, $currentUserId, $message);

        header("Location: index.php?page=chat&with=$receiverId");
        exit();
    }
}
