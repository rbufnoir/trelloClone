<?php
ob_start();
?>

<main>
    <div class="container">

        <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
            <h1>404</h1>
            <h2 class="text-info bg-dark">The page you are looking for doesn't exist.</h2>
            <a class="btn" href="<?= URL ?>">Back to home</a>
        </section>

    </div>
</main>

<?php

    $content = ob_get_clean();
    require_once 'base.html.php';