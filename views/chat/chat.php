<div class="container-fluid py-3 custom-chat">
    <div class="row">
        <?php
        $selectedUserId = isset($_GET['with']) ? (int)$_GET['with'] : null;
        ?>

        <div class="col-md-3 px-3 custom-col-chat" style="height: 90vh;">
            <h4 class="pt-3 px-3">Messagerie</h4>
            <ul class="list-group list-group-flush py-4">
                <?php foreach ($conversations as $conv): ?>
                    <?php
                    $isActive = ($conv['other_user_id'] == $selectedUserId);
                    $activeClass = $isActive ? 'active-conversation' : 'inactive-conversation';
                    ?>
                    <a href="index.php?page=chat&with=<?= htmlspecialchars($conv['other_user_id']) ?>"
                        class="list-group-item list-group-item-action d-flex align-items-start gap-3 <?= $activeClass ?>">
                        <img src="<?= htmlspecialchars($conv['picture']) ?>" alt="Avatar" class="rounded-circle" width="50" height="50">
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between">
                                <strong class="text-dark"><?= htmlspecialchars($conv['pseudo']) ?></strong>
                                <small class="text-muted">
                                    <?= !empty($conv['last_message_time']) ? date('H:i', strtotime($conv['last_message_time'])) : '' ?>
                                </small>
                            </div>
                            <div class="text-muted text-truncate" style="max-width: 200px;">
                                <?= isset($conv['last_message']) ? htmlspecialchars($conv['last_message']) : 'Nouvelle conversation' ?>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- Conversation et envoi message à droite -->
        <div class="col-md-9 d-flex flex-column justify-content-between" style="height: 90vh;">
            <div class="d-flex align-items-center p-3">
                <?php if (!empty($conversations)): ?>
                    <img src="<?= htmlspecialchars($conversations[0]['picture'] ?? '/images/default.png') ?>" alt="Avatar" class="rounded-circle me-3" width="50" height="50">
                    <h5 class="mb-0"><strong><?= htmlspecialchars($conversations[0]['pseudo']) ?></strong></h5>
                <?php else: ?>
                    <h5 class="mb-0">Aucun utilisateur sélectionné</h5>
                <?php endif; ?>
            </div>

            <div class="flex-grow-1 overflow-auto p-3 hide-scrollbar"
                <?php foreach ($messages as $msg): ?>
                    <?php
                    $timestamp = strtotime($msg['sent_at']);
                    $dateFormatted = date('d.m', $timestamp);
                    $timeFormatted = date('H:i', $timestamp);
                    ?>
                    <?php if ($msg['sender_id'] == $_SESSION['user']['id']): ?>
                        <!-- Message envoyé -->
                        <div class="mb-3 text-end">
                            <small class="text-muted d-block" style="font-size: 0.8rem; text-align: right; margin-bottom: 4px;">
                                <?= $dateFormatted ?> <?= $timeFormatted ?>
                            </small>
                            <div class="p-2 rounded d-inline-block" style="background-color: #EDF2F6;">
                                <?= htmlspecialchars($msg['message']) ?>
                            </div>
                        </div>
                    <?php else: ?>
                        <!-- Message reçu -->
                        <div class="mb-3 text-start">
                            <small class="text-muted d-block" style="font-size: 0.8rem; text-align: left; margin-bottom: 4px;">
                                <?= $dateFormatted ?> <?= $timeFormatted ?>
                            </small>
                            <div class="p-2 rounded d-inline-block" style="background-color: #FFFFFF;">
                                <?= htmlspecialchars($msg['message']) ?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

            <form action="index.php?page=sendMessage" method="POST" class="p-3 d-flex align-items-center">
                <input type="hidden" name="receiver_id" value="<?= htmlspecialchars($otherUserId) ?>">
                <input type="hidden" name="conversation_id" value="<?= htmlspecialchars($conversationId) ?>">
                <input type="text" name="message" class="form-control me-2 custom-input" placeholder="Tapez votre message ici" required style="height: 49px; width: 628px;">
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>
</div>