<?php
    use app\models\Product;
?>
<!-- Products Table -->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Products</h1>
</div>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $products = Product::getAllProducts();
                foreach ($products as $product) {
                    echo '<tr>';
                    echo '<td>' . $product['idproduct'] . '</td>';
                    echo '<td>' . $product['name'] . '</td>';
                    echo '<td>' . $product['idcategory'] . '</td>';
                    echo '<td>' . $product['description'] . '</td>';
                    echo '<td>$' . $product['price'] . '</td>';
                    echo '<td>' . $product['stock'] . '</td>';
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>
</div>