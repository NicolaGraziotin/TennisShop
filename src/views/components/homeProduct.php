<div class="col mb-5">
    <a class="card h-100 text-decoration-none" href="/product?idproduct=<?php echo $idproduct ?>">
        <!-- Product image-->
        <img class="card-img-top" src="<?php echo $image?>" alt="...">
        <!-- Product details-->
        <div class="card-body p-4">
            <div class="text-center">
                <!-- Product name-->
                <p class="fw-bolder h5"><?php echo $name ?></p>
                <!-- Product price-->
                <?php echo "€".$price?>
            </div>
        </div>
        <!-- Product actions-->
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent d-flex justify-content-center">
            <form action="/product" method="post">
                <div class="d-flex">
                    <input type="hidden" name="idproduct" value="<?php echo $idproduct ?>">
                    <input type="hidden" name="quantity" value="1">
                    <button class="btn btn-outline-dark mt-auto" type="submit">
                        <em  class="bi-cart-fill me-1"></em>
                        Aggiungi al carrello
                    </button>
                </div>
            </form>
        </div>
    </a>
</div>