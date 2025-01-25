<?php
    use app\models\Product;

    $categories = Product::getAllCategories();
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Modifica</h1>
</div>
<div class="w-75">
    <form method="post" action="/dashboard/products/edit" enctype="multipart/form-data">
        <div class="form-group">
            <label for="idproduct">ID</label>
            <input type="text" id="idproduct" class="form-control" name="idproduct" value="<?php echo $idproduct; ?>" required readonly>
        </div>
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" required>
        </div>
        <div class="form-group">
            <label for="idcategory">Categoria</label>
            <select class="form-control" id="idcategory" name="idcategory" required>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category['idcategory']; ?>" <?php echo $category['idcategory'] == $idcategory ? 'selected' : ''; ?>>
                        <?php echo $category['name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="description">Descrizione</label>
            <input type="text" class="form-control" id="description" name="description" value="<?php echo $description; ?>" required>
        </div>
        <div class="form-group">
            <label for="price">Prezzo</label>
            <input type="number" class="form-control" id="price" name="price" value="<?php echo $price; ?>" required>
        </div>
        <div class="form-group">
            <label for="stock">Disponibilità</label>
            <input type="number" class="form-control" id="stock" name="stock" value="<?php echo $stock; ?>" required>
        </div>
        <div class="form-group">
            <label for="image">Immagine</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3 mb-3">Modifica</button>
    </form>
    <a class="btn btn-primary mt-3 mb-3" href="/dashboard/products">Indietro</a>
</div>