
<?php

class BookExchangeController{

public function showBookExchange(): void
    {
        $view = new View('bookExchange');
        $view->render();
    }
}
