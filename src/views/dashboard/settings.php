<?php
    use app\models\Cart;
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Settings</h1>
</div>
<div class="d-flex mt-5 mb-5">
    <h3>Scegli il corriere</h3>
    <div class="dropdown mx-3">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            Menu
        </button>
        <form action="" method="post">
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <?php
                    $shippings = Cart::getShippings();
                    foreach ($shippings as $shipping) {
                        echo '<li><button type="submit" name="idshipping" value="'.$shipping['idshipping'].'" class="dropdown-item">'.$shipping['name'].'</button></li>';
                    }
                ?>
            </ul>
        </form>
    </div>
</div>
<a class="btn btn-primary" href="/logout">Logout</a>