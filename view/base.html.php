<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

    <!-- Google Font -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom styles -->
    <link rel="stylesheet" href="<?=URL ?>assets/css/style.css" />

    <!-- Icon -->
    <link rel="icon" href="<?=URL ?>assets/img/icon.png">

    <title>Treffo</title>
</head>

<body class="toggle-sidebar">

    <!-- ======= Header ======= -->
    <?php require_once 'header.html.php'; ?>

    <!-- ======= Sidebar ======= -->
    <?php require_once 'sidebar.html.php'; ?>

    <!-- ======= Content ======= -->
    <?= $content ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <script src="<?=URL ?>assets/js/main.js"></script>
    <script src="<?=URL ?>assets/js/modal.js"></script>
    <script>

        $('.list-group').sortable({
            forcePlaceholderSize: true,
            connectWith: '.list-group',
            revert: "true"
        });

        $('#lists').sortable({
            forcePlaceholderSize: true,
            tolerance: "pointer"
        });

        $('.list-group').on("sortreceive", function(event, ui) {
            $(this.children).each(() => {
                console.log(this.innerText);
            });
        });

        $('.list-group').on("sortstop", function(event, ui) {
            if (ui.sender === null)
                $(this.children).each(() => {
                    console.log(this.innerText);
                });
        });

        $('#lists').on('sortstop', function(event, ui) {
            $(this).children().each((e) => {
                console.log(this[e]);
            });
        });

    </script>
</body>

</html>