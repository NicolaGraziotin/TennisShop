<div class="col mb-5">
    <div class="card h-100">
        <!-- Product image-->
        <img class="card-img-top" src="<?php echo $image?>" alt="...">
        <!-- Product details-->
        <div class="card-body p-4">
            <div class="text-center">
                <!-- Product name-->
                <h5 class="fw-bolder"><?php echo $name ?></h5>
                <!-- Product price-->
                <?php echo "€".$price?>
            </div>
        </div>
        <!-- Product actions-->
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center">
                 <form action="/product" method="get">
                    <input type="hidden" id="idproduct" name="idproduct" value="<?php echo $idproduct ?>">
                    <button type="submit" class="btn btn-outline-dark mt-auto">Apri</button>
                 </form>
            </div>
        </div>
    </div>
</div>