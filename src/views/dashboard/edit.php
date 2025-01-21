<?php
    use app\models\Product;
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit</h1>
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
                echo '<form method="post" action="/dashboard/products/edit">';
                echo '<tr>';
                echo '<td><input name="idproduct" value=' . $product["idproduct"] . '></td>';
                echo '<td><input name="name" value="' . $product['name'] . '"></td>';
                echo '<td><input name="idcategory" value="' . $product['idcategory'] . '"></td>';
                echo '<td><input name="description" value="' . $product['description'] . '"></td>';
                echo '<td><input name="price" value="' . $product['price'] . '"></td>';
                echo '<td><input name="stock" value="' . $product['stock'] . '"></td>';
                echo '<td><button type="submit">Edit</button></td>';
                echo '</tr>';
                echo '</form>';
            ?>
        </tbody>
    </table>
</div>