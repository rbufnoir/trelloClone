<?php
ob_start();
?>

<?php require_once 'modal.html.php'; ?>

<main id="main" class="main col bg-image">
    <section class="d-flex align-items-start h-100" style="position: relative">
        <div id="lists" class="d-flex align-items-start">

            <?php foreach ($lists as $list) : ?>
                <div id="<?= $list->getName() . '/' . $list->getId(); ?>" class="card shadow-1-strong m-3 p-2 pb-0 list">
                    <div class="card-header d-flex justify-content-between pl-1 pr-0 mb-3 border-0">
                        <p class="mb-0"><strong><?= $list->getName(); ?></strong></p>
                        <button type="button" class="btn btn-link text-reset m-0 py-0 px-2">
                            <i class="list-popover fas fa-ellipsis-h" data-bs-toggle="popover"></i>
                        </button>
                    </div>

                    <div class="list-group list-group-flush">
                        <?php $tasks = $boardController->getTasks($list);
                        if ($tasks != null)
                            foreach ($tasks as $task) : ?>
                            <a href="#" class="list-group-item list-group-item-action card-body rounded bg-white shadow-2 mb-2 py-3">
                                <?= $task->getName(); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                    <div class="card-footer border-0 pt-0">
                        <button type="button" class="btn btn-link btn-block text-reset" data-bs-whatever="list">
                            <i class="fas fa-plus mr-2"></i> Add another card
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="card shadow-1-strong m-3 p-2 list">
            <button id="button1" type="button" class="btn btn-link btn-block text-reset">
                <i class="fas fa-plus mr-2"></i> Add another list
            </button>
        </div>
    </section>
</main>

<?php
$content = ob_get_clean();
require_once 'base.html.php';
