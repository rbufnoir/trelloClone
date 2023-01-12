<?php
ob_start();
?>

<main>
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Create a new board</h5>
                                </div>

                                <form class="row g-3 needs-validation" method="POST" action='<?= URL ?>addBoard' novalidate>
                                    <div class="col-12">
                                        <label for="board" class="form-label">Board name</label>
                                        <input type="text" name="board" class="form-control" id="board" required>
                                        <div class="invalid-feedback">Please, enter a name</div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Create board</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </div>
</main><!-- End #main -->

<?php
$content = ob_get_clean();
require_once 'base.html.php';
