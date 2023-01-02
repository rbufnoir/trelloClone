<?php
ob_start();
?>

<main>
    <div class="container">

        <section class="section min-vh-100 d-flex flex-column align-items-center justify-content-center">
            <h1 class="text-info bg-dark text-center">Vous êtes inscrit!</h1>
            <h2 class="text-info bg-dark text-center">Vous pouvez vous connectez en utilisant vos identifiants</h2>
            <a class="btn text-info bg-dark" href="<?= URL ?>">Back to home</a>
        </section>

    </div>
</main>

<?php

    $content = ob_get_clean();
    require_once 'base.html.php';