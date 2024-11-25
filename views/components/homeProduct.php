<div class="col mb-5">
    <div class="card h-100">
        <!-- Product image-->
        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
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
                    <input type="hidden" name="idproduct" value="<?php echo $idproduct ?>">
                    <input type="hidden" name="name" value="<?php echo $name ?>">
                    <input type="hidden" name="description" value="<?php echo $description ?>">
                    <input type="hidden" name="price" value="<?php echo $price ?>">
                    <input type="hidden" name="idcategory" value="<?php echo $idcategory ?>">
                    <button type="submit" class="btn btn-outline-dark mt-auto">Apri</button>
                 </form>
            </div>
        </div>
    </div>
</div>