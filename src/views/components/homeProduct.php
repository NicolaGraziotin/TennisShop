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
                    <input type="text" name="idproduct" value="<?php echo $idproduct ?>" hidden>
                    <input type="text" name="name" value="<?php echo $name ?>" hidden>
                    <input type="text" name="description" value="<?php echo $description ?>" hidden>
                    <input type="text" name="price" value="<?php echo $price ?>" hidden>
                    <input type="text" name="idcategory" value="<?php echo $idcategory ?>" hidden>
                    <input type="text" name="image" value="<?php echo $image ?>" hidden>
                    <input type="text" name="stock" value="<?php echo $stock ?>" hidden>
                    <button type="submit" class="btn btn-outline-dark mt-auto">Apri</button>
                 </form>
            </div>
        </div>
    </div>
</div>