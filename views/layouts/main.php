<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <title><?php echo $this->title ?></title>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Tennis Shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#menu" aria-controls="menu"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="menu"
                aria-labelledby="menuLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="menuLabel">Carrello</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Prodotto 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/">Prodotto 2</a>
                        </li>
                    </ul>
                </div>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
                aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Tennis Shop</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contact">Contattaci</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Acquista prodotti
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="#">Racchette</a></li>
                                <li><a class="dropdown-item" href="#">Accessori</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Borsoni</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex mt-3" role="search">
                        <input class="form-control me-2" type="search" placeholder="Cerca" aria-label="Search">
                        <button class="btn btn-success" type="submit">Cerca</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <main>
        {{content}}
    </main>
    <footer class="bg-body-tertiary text-center">
    <!-- Grid container -->
    <div class="container p-4">
        <a href="/contact">Contattaci</a>
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2024 Copyright:
        <a class="text-body" href="https://github.com/NicolaGraziotin">TENNIS SHOP</a>
    </div>
    <!-- Copyright -->
    </footer>
</body>

</html>