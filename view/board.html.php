<?php
ob_start();
?>

<?php require_once 'modal.html.php'; ?>

<main id="main" class="main col bg-image">
    <section id="board_<?= $url[2] ?>" class="d-flex align-items-start h-100" style="position: relative">
        <div id="lists" class="d-flex align-items-start">

            <?php
            if ($lists != null)
                foreach ($lists as $list) : ?>
                <div id="<?= 'list_' . $list->getId(); ?>" class="card shadow-1-strong m-3 p-2 pb-0 list">
                    <div class="card-header d-flex justify-content-between pl-1 pr-0 mb-3 border-0">
                        <a id="<?= 'updateList_' . $list->getId(); ?>" class="mb-0"><?= $list->getName(); ?></a>
                    </div>

                    <div class="list-group list-group-flush">
                        <?php $tasks = $boardController->getTasks($list);
                        if ($tasks != null)
                            foreach ($tasks as $task) : ?>
                            <a id="task_<?= $task->getId(); ?>" href="#" class="list-group-item list-group-item-action card-body rounded bg-white shadow-2 mb-2 py-3">
                                <?= $task->getName(); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                    <div class="card-footer border-0 pt-0">
                        <button id="addCard" type="button" class="btn btn-link btn-block text-reset">
                            <i class="fas fa-plus mr-2"></i> Add another card
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="card shadow-1-strong m-3 p-2 list">
            <button id="addList" type="button" class="btn btn-link btn-block text-reset">
                <i class="fas fa-plus mr-2"></i> Add another list
            </button>
        </div>
    </section>
</main>

<?php
$content = ob_get_clean();
require_once 'base.html.php';
