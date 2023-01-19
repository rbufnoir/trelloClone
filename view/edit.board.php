<?php
ob_start();
?>

<main id="main" class="main col bg-image">
    <section class="d-flex align-items-start h-100" style="position: relative">
        <form method="POST" action="<?= URL ?>board/editValid">
            <div class="form-group">
                <label class="text-white" for="title">Nom du board</label>
                <input type="text" class="form-control" name="name" id="name" value="<?= $board->getName()?>">
            </div>
            <input type="hidden" name="board-id" value="<?= $board->getId() ?>">
            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
    </section>
</main>

<?php
$content = ob_get_clean();
require_once 'base.html.php';
?>