<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit</h1>
</div>

<form method="post" action="/dashboard/products/edit" class="w-100" enctype="multipart/form-data">
    <div class="form-group">
        <label for="idproduct">ID</label>
        <input type="text" class="form-control" name="idproduct" value="<?php echo $idproduct; ?>" required readonly>
    </div>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" required>
    </div>
    <div class="form-group">
        <label for="idcategory">Category</label>
        <input type="number" class="form-control" name="idcategory" value="<?php echo $idcategory; ?>" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" name="description" value="<?php echo $description; ?>" required>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" name="price" value="<?php echo $price; ?>" required>
    </div>
    <div class="form-group">
        <label for="stock">Stock</label>
        <input type="number" class="form-control" name="stock" value="<?php echo $stock; ?>" required>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control" name="image" accept="image/*" required>
    </div>
    <button type="submit" class="btn btn-primary mt-3 mb-3">Edit</button>
</form>