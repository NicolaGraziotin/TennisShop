<!-- Product section-->
<section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="..." /></div>
                    <div class="col-md-6">
                        <div class="small mb-1">COD: <?php echo $idproduct ?></div>
                        <h1 class="display-5 fw-bolder"><?php echo $name ?></h1>
                        <div class="fs-5 mb-5">
                            <span>€<?php echo $price ?></span>
                        </div>
                        <p class="lead"><?php echo $description ?></p>
                        <div class="d-flex">
                            <form action="/cart" method="post">
                                <input type="hidden" name="idproduct" value="<?php echo $idproduct ?>">
                                <input class="form-control text-center me-3" name="quantity" value="1" style="max-width: 3rem" />
                                <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                                    <i class="bi-cart-fill me-1"></i>
                                    Add to cart
                                </button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
</section>
<!-- Related items section-->
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Related products</h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            {{content}}
        </div>
    </div>
</section>