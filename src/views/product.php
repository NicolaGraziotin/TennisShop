<!-- Product section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="assets/<?php echo $image?>.webp" alt="..." /></div>
            <div class="col-md-6">
                <div class="small mb-1">COD: <?php echo $idproduct ?></div>
                <h1 class="display-5 fw-bolder"><?php echo $name ?></h1>
                <div class="fs-5 mb-5">
                    <span>€<?php echo $price ?></span>
                </div>
                <p class="lead"><?php echo $description ?></p>
                <p class="small">Diponibilità: <?php echo $stock?></p>
                <form action="" method="post">
                    <div class="d-flex">
                        <input type="number" name="idproduct" value="<?php echo $idproduct ?>" hidden>
                        <input type="text" name="name" value="<?php echo $name ?>" hidden>
                        <input type="number" name="price" value="<?php echo $price ?>" hidden>
                        <input type="text" name="description" value="<?php echo $description ?>" hidden>
                        <input type="text" name="image" value="<?php echo $image ?>" hidden>
                        <input type="number" name="stock" value="<?php echo $stock ?>" hidden>
                        <input class="col-md-6 form-control text-center number-w me-3" type="number" name="quantity" min="1" max="<?php echo $stock ?>" value="1"/>
                        <button class="col-md-6 btn btn-outline-dark flex-shrink-0" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Add to cart
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Related items section-->
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Related products</h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            {{components}}
        </div>
    </div>
</section>