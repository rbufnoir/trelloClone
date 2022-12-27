<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

        <!-- Google Font -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- Custom styles -->
        <link rel="stylesheet" href="assets/css/style.css" />

        <!-- Icon -->
        <link rel="icon" href="assets/img/icon.png">

        <title>Treffo</title>
    </head>
    <body>
        <header id="header" class="header fixed-top d-flex align-items-center">

            <div class="d-flex align-items-center justify-content-between">
              <a href="index.html" class="logo d-flex align-items-center">
                <img src="assets/img/icon.png" alt="">
                <span class="d-none d-lg-block">Treffo</span>
              </a>
              <i class="bi bi-list toggle-sidebar-btn"></i>
            </div><!-- End Logo -->
                
            <nav class="header-nav ms-auto">
              <ul class="d-flex align-items-center">
        
                <li class="nav-item d-block d-lg-none">
                  <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                  </a>
                </li><!-- End Search Icon-->
        
                <li class="nav-item dropdown pe-3">
        
                  <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
                  </a><!-- End Profile Iamge Icon -->
        
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                      <h6>Kevin Anderson</h6>
                      <span>Web Designer</span>
                    </li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
        
                    <li>
                      <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                        <i class="bi bi-person"></i>
                        <span>My Profile</span>
                      </a>
                    </li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
        
                    <li>
                      <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                        <i class="bi bi-gear"></i>
                        <span>Account Settings</span>
                      </a>
                    </li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
        
                    <li>
                      <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                        <i class="bi bi-question-circle"></i>
                        <span>Need Help?</span>
                      </a>
                    </li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
        
                    <li>
                      <a class="dropdown-item d-flex align-items-center" href="#">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Sign Out</span>
                      </a>
                    </li>
        
                  </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->
        
              </ul>
            </nav><!-- End Icons Navigation -->
        
          </header><!-- End Header -->
        
          <!-- ======= Sidebar ======= -->
        <aside id="sidebar" class="sidebar">
        
            <ul class="sidebar-nav" id="sidebar-nav">
        
              <li class="nav-item">
                <a class="nav-link " href="index.html">
                  <i class="bi bi-grid"></i>
                  <span>Dashboard</span>
                </a>
              </li><!-- End Dashboard Nav -->
        
              <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-menu-button-wide"></i><span>Boards</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                    <a href="#">
                      <i class="bi bi-circle"></i><span>Board 1</span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="bi bi-circle"></i><span>Board 2</span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="bi bi-circle"></i><span>Board 3</span>
                    </a>
                  </li>
                </ul>
              </li><!-- End Components Nav -->
        
              <li class="nav-heading">Pages</li>
        
              <li class="nav-item">
                <a class="nav-link collapsed" href="users-profile.html">
                  <i class="bi bi-person"></i>
                  <span>Profile</span>
                </a>
              </li><!-- End Profile Page Nav -->
        
              <li class="nav-item">
                <a class="nav-link collapsed" href="pages-faq.html">
                  <i class="bi bi-question-circle"></i>
                  <span>F.A.Q</span>
                </a>
              </li><!-- End F.A.Q Page Nav -->
        
              <li class="nav-item">
                <a class="nav-link collapsed" href="pages-contact.html">
                  <i class="bi bi-envelope"></i>
                  <span>Contact</span>
                </a>
              </li><!-- End Contact Page Nav -->
        
              <li class="nav-item">
                <a class="nav-link collapsed" href="pages-register.html">
                  <i class="bi bi-card-list"></i>
                  <span>Register</span>
                </a>
              </li><!-- End Register Page Nav -->
        
              <li class="nav-item">
                <a class="nav-link collapsed" href="pages-login.html">
                  <i class="bi bi-box-arrow-in-right"></i>
                  <span>Login</span>
                </a>
              </li><!-- End Login Page Nav -->
        
              <li class="nav-item">
                <a class="nav-link collapsed" href="pages-error-404.html">
                  <i class="bi bi-dash-circle"></i>
                  <span>Error 404</span>
                </a>
              </li><!-- End Error 404 Page Nav -->
        
              <li class="nav-item">
                <a class="nav-link collapsed" href="pages-blank.html">
                  <i class="bi bi-file-earmark"></i>
                  <span>Blank</span>
                </a>
              </li><!-- End Blank Page Nav -->
        
            </ul>
        
          </aside><!-- End Sidebar-->

        <div id="myModal" class="modal fade" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </div>
        </div>

        <main id="main" class="main col bg-image">
            <section class="d-flex align-items-start h-100" style="position: relative">
               <div id="lists" class="d-flex align-items-start"> 
                    <div id="Backlog" class="card shadow-1-strong m-3 p-2 pb-0">
                        <div class="card-header d-flex justify-content-between pl-1 pr-0 mb-3 border-0">
                            <p class="mb-0"><strong>Backlog</strong></p>
                            <button type="button" class="btn btn-link text-reset m-0 py-0 px-2">
                                <i id="example-popover" class="fas fa-ellipsis-h" data-bs-toggle="popover"></i>
                            </button>
                        </div>
    
                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action card-body rounded bg-white shadow-2 mb-2 py-3">
                                Item 1
                            </a>
                            <a class="list-group-item list-group-item-action card-body rounded bg-white shadow-2 mb-2 py-3">
                                Item 2
                            </a>
                            <a class="list-group-item list-group-item-action card-body rounded bg-white shadow-2 mb-2 py-3">
                                Item 3
                            </a>
    
                            <a class="list-group-item list-group-item-action card-body rounded bg-white shadow-2 mb-2 py-3">
                                Item 4
                            </a>
                            <a class="list-group-item list-group-item-action card-body rounded bg-white shadow-2 mb-2 py-3">
                                Item 5
                            </a>
                            <a class="list-group-item list-group-item-action card-body rounded bg-white shadow-2 mb-2 py-3">
                                Item 6
                            </a>
                        </div>
    
                        <div class="card-footer border-0 pt-0">
                            <button type="button" class="btn btn-link btn-block text-reset" data-bs-whatever="list">
                                <i class="fas fa-plus mr-2"></i> Add another card
                            </button>
                        </div>
                    </div>
                    
                    <div class="card shadow-1-strong m-3 p-2 pb-0">
                        <div class="card-header d-flex justify-content-between pl-1 pr-0 mb-3 border-0">
                            <p class="mb-0"><strong>To do</strong></p>
                            <button type="button" class="btn btn-link text-reset m-0 py-0 px-2">
                                <i id="example-popover" class="fas fa-ellipsis-h" data-bs-toggle="popover"></i>
                            </button>
                        </div>
    
                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action card-body rounded bg-white shadow-2 mb-2 py-3">
                                Item 11
                            </a>
                            <a class="list-group-item list-group-item-action card-body rounded bg-white shadow-2 mb-2 py-3">
                                Item 12
                            </a>
                            <a class="list-group-item list-group-item-action card-body rounded bg-white shadow-2 mb-2 py-3">
                                Item 13
                            </a>
    
                            <a class="list-group-item list-group-item-action card-body rounded bg-white shadow-2 mb-2 py-3">
                                Item 14
                            </a>
                            <a class="list-group-item list-group-item-action card-body rounded bg-white shadow-2 mb-2 py-3">
                                Item 15
                            </a>
                            <a class="list-group-item list-group-item-action card-body rounded bg-white shadow-2 mb-2 py-3">
                                Item 16
                            </a>
                        </div>
    
                        <div class="card-footer border-0 pt-0">
                            <button id="button1" type="button" class="btn btn-link btn-block text-reset" data-bs-whatever="list">
                                <i class="fas fa-plus mr-2"></i> Add another card
                            </button>
                        </div>
                    </div>
               </div>
    
                <div class="card shadow-1-strong m-3 p-2">
                    <button id="button1" type="button" class="btn btn-link btn-block text-reset">
                        <i class="fas fa-plus mr-2"></i> Add another list
                    </button>
                </div>
            </section>
        </main>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
    <script src="assets/js/main.js"></script>
    <script>

        $(document).ready(function(){
            $('#example-popover').popover({
                placement: 'right',
                html: true,
                content: '<a href="#">Change priority</a><a href="#">Delete</a>'
            })
        });

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
        
            
        
        let myModal = new bootstrap.Modal($('#myModal'));
                
        $('.btn-block').click((e) => {
            let modalTitle = document.getElementById('myModal').querySelector('.modal-title');
            modalTitle.textContent = 'Add a ' + ((e.target.getAttribute('data-bs-whatever') == "list") ? "task" : "list");
            myModal.toggle();
        })

    </script>
  </body>
</html>
