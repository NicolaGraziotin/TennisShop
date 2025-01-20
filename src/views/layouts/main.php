<?php
use app\core\Application;
use app\core\Session;
use app\models\Cart;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title><?php echo Application::$app->title; ?></title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid px-4 px-lg-5">
            <a class="navbar-brand" href="/">Tennis Shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Category</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/">All Products</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="/category?idcategory=1">Rackets</a></li>
                            <li><a class="dropdown-item" href="/category?idcategory=2">Balls</a></li>
                            <li><a class="dropdown-item" href="/category?idcategory=3">Apparel</a></li>
                            <li><a class="dropdown-item" href="/category?idcategory=4">Shoes</a></li>
                            <li><a class="dropdown-item" href="/category?idcategory=5">Accessories</a></li>
                            <li><a class="dropdown-item" href="/category?idcategory=6">Bags</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="d-flex">
                    <div class="dropdown">
                        <a class="btn btn-outline-dark msg-box me-1" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                            <i class="bi bi-envelope"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableInside">
                            <!-- notification title -->
                            <li class="dropdown-item d-flex justify-content-between align-items-center disabled">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="fw-bold mb-0">Notifications</p>
                                    </div>
                                </div>
                            </li>   
                            <li class="dropdown-item d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="fst-italic mb-0">John Doe</p>
                                        <p class="text-muted mb-0 fs-sm">john.dose@gmail.com</p>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown-item d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="fst-italic mb-0">Alex Ray</p>
                                        <p class="text-muted mb-0 fs-sm">alex.ray@gmail.com</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    {{profile}}
                    
                    <a class="btn btn-outline-dark" href="/cart">
                        <i class="bi-cart-fill me-2"></i>
                        Cart
                        <span class="badge bg-dark text-white ms-1 rounded-pill"><?php echo Cart::getTotalElements(Session::getUserId()) ?></span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Main -->
    {{view}}
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Tennis Shop 2025</p>
        </div>
        <div class="container text-center">
            <a class="m-0 text-white" href="/contact">Contact</a>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/script.js"></script>
</body>

</html>