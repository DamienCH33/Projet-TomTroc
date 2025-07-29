<?php
class HomeController
{
    private BookExchangeManager $bookManager;
    private ChatManager $chatManager;

    public function __construct(BookExchangeManager $bookManager, ChatManager $chatManager)
    {
        $this->bookManager = $bookManager;
        $this->chatManager = $chatManager;
    }

    public function showHome(): void
    {
        $books = $this->bookManager->getAllBooks();

        $newMessagesCount = 0;
        if (isset($_SESSION['user']['id'])) {
            $userId = $_SESSION['user']['id'];
            $newMessagesCount = $this->chatManager->countUnreadMessagesByUserId($userId);
        }

        $view = new View('home');
        $view->render([
            'books' => $books,
            'newMessagesCount' => $newMessagesCount,
        ]);
    }
}
