<div class="col mb-5">
    <div class="card h-100 text-decoration-none">
        <!-- Product image-->
        <a href="/product?idproduct=<?php echo $idproduct ?>">
            <img class="card-img-top" src="<?php echo $image?>" alt="...">
        </a>
        <!-- Product details-->
        <a class="card-body p-4" href="/product?idproduct=<?php echo $idproduct ?>" style="text-decoration: none;">
            <div class="text-center">
                <!-- Product name-->
                <p class="fw-bolder h5"><?php echo $name ?></p>
                <!-- Product price-->
                <?php echo "€".$price?>
            </div>
        </a>
        <!-- Product actions-->
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent d-flex justify-content-center">
            <form action="/product" method="post">
                <div class="d-flex">
                    <input type="hidden" name="idproduct" value="<?php echo $idproduct ?>">
                    <input type="hidden" name="quantity" value="1">
                    <button class="btn btn-outline-dark mt-auto" type="submit">
                        <em class="bi-cart-fill me-1"></em>
                        Aggiungi al carrello
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>