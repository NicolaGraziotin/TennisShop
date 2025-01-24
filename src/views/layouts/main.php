<?php
    use app\core\Application;
    use app\core\Session;
    use app\models\Cart;
    use app\models\Product;

    $categories = Product::getAllCategories();
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
                            data-bs-toggle="dropdown" aria-expanded="false">Categorie</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/">Tutti i prodotti</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <?php foreach ($categories as $category): ?>
                                <li><a class="dropdown-item" href="/category?idcategory=<?php echo $category['idcategory']; ?>"><?php echo $category['name']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                </ul>
                <div class="mb-2 mb-lg-0 w-50 me-auto">
                    <form class="d-flex" action="/search" method="get">
                        <div class="input-group w-100">
                            <input type="search" class="form-control rounded" name="search" placeholder="Cerca" aria-label="Search" aria-describedby="search-addon" />
                            <button type="submit" class="input-group-text border-0" id="search-addon">
                                <i class="bi bi-search"></i>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="d-flex">
                    <div class="dropdown">
                        <div class="notify-btn" id="notify-btn">
                            <button class="btn btn-outline-dark me-1">
                                <span><i class="bi bi-bell-fill"></i></span>
                                <span class="show_notif" id="show-notif">
                                    <div class="spinner-border spinner-border-sm"></div>
                                </span>
                            </button>
                        </div>
                        <ul class="dropdown-menu notify" id="notify-menu"></ul>
                    </div>

                    {{profile}}

                    <a class="btn btn-outline-dark" href="/cart">
                        <i class="bi-cart-fill me-2"></i>
                        Carrello
                        <span class="badge bg-dark text-white ms-1 rounded-pill"><?php echo Cart::getTotalElements(Session::getUserId()) ?></span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Main -->
    <main class="min-vh-100">
    {{view}}
    </main>
    <div id="cookieBanner" class="fixed-bottom bg-dark text-white text-center p-4 d-none">
        <p class="fs-5 mb-3">
            Utilizziamo cookie e altre tecnologie di tracciamento per migliorare la tua esperienza di navigazione sul nostro sito.
        </p>
        <div class="d-flex flex-column flex-md-row justify-content-center gap-2">
            <button id="acceptCookies" class="btn btn-teal text-white fw-semibold px-4 py-2">
                Accetto
            </button>
        </div>
    </div>
    <?php include Application::$ROOT_DIR.'/views/footer.php' ?>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/script.js"></script>
</body>
</html>