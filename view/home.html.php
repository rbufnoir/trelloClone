<?php
ob_start();
?>


<main id="main" class="main col bg-image">
    <section class="d-flex align-items-start h-100" style="position: relative">

        <?php
        if (!empty($_SESSION['user_id'])) :
        ?>

            <table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Nombre de listes</th>
                        <th>Nombre de tâches</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($boards as $board) : ?>
                        <tr>
                            <td><a href="<?= URL ?>board/<?= $board->getUserId() . '/' . $board->getId(); ?>" class="link-dark"><?= $board->getName(); ?></a></td>
                            <td><?= $boardController->countLists($_SESSION['user_id'], $board) ?></td>
                            <td><?= $boardController->countTasks($_SESSION['user_id'], $board); ?></td>
                            <td><a href="<?= URL ?>board/edit/<?= $board->getId(); ?>"><i class="fas fa-edit"></a></td>
                            <td><a href="<?= URL ?>board/delete/<?= $board->getId(); ?>"><i class="fas fa-trash"></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        <?php endif; ?>

    </section>
</main>

<?php
$content = ob_get_clean();
require_once 'base.html.php';
