<div class="container-fluid py-4 background-color:#F5F3EF;">
    <div class="row background-color:#F5F3EF;">
        <div class="col-md-3" style="height: 90vh; overflow-y: auto; background-color:#F5F3EF;">
            <h4 class="px-3 pt-3">Messagerie</h4>
            <ul class="list-group list-group-flush py-4">
                <?php foreach ($conversations as $conv): ?>
                    <a href="index.php?page=chat&with=<?= htmlspecialchars($conv['other_user_id']) ?>"
                        class="list-group-item list-group-item-action d-flex align-items-start gap-3">
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
        <div class="col-md-9 d-flex flex-column justify-content-between" style="height: 90vh; background-color:#F5F3EF;">
            <div class="d-flex align-items-center p-3 border-bottom">
                <?php if (!empty($conversations)): ?>
                    <img src="<?= htmlspecialchars($conversations[0]['picture'] ?? '/images/default.png') ?>" alt="Avatar" class="rounded-circle me-3" width="50" height="50">
                    <h5 class="mb-0"><?= htmlspecialchars($conversations[0]['pseudo']) ?></h5>
                <?php else: ?>
                    <h5 class="mb-0">Aucun utilisateur sélectionné</h5>
                <?php endif; ?>
            </div>

            <div class="flex-grow-1 overflow-auto p-3" style="background-color: #FFFFFF;">
                <?php foreach ($messages as $msg): ?>
                    <?php if ($msg['sender_id'] == $_SESSION['user']['id']): ?>
                        <div class="mb-3 text-end">
                            <div class="bg-primary text-white p-2 rounded w-75 ms-auto"><?= htmlspecialchars($msg['message']) ?></div>
                            <small class="text-muted"><?= date('H:i', strtotime($msg['sent_at'])) ?></small>
                        </div>
                    <?php else: ?>
                        <div class="mb-3 style="background-color: #EDF2F6;">
                            <div class="bg-light p-2 rounded w-75"><?= htmlspecialchars($msg['message']) ?></div>
                            <small class="text-muted"><?= date('H:i', strtotime($msg['sent_at'])) ?></small>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

            <form action="index.php?page=sendMessage" method="POST" class="border-top p-3 d-flex align-items-center">
                <input type="hidden" name="receiver_id" value="<?= htmlspecialchars($otherUserId) ?>">
                <input type="hidden" name="conversation_id" value="<?= htmlspecialchars($conversationId) ?>">
                <input type="text" name="message" class="form-control me-2" placeholder="Écrire un message..." required>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>
</div>