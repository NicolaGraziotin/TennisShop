<?php
    use app\models\Product;
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Prodotti</h1>
    <a class="btn btn-primary" href="/dashboard/products/edit">Aggiungi prodotto</a>
</div>
<div class="mb-3">
    <form method="get" action="/dashboard/products/search">
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Cerca prodotti" aria-label="Cerca prodotti">
            <button class="btn btn-outline-secondary" type="submit">Cerca</button>
        </div>
    </form>
</div>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Descrizione</th>
                <th>Prezzo</th>
                <th>Disponibilità</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo $product['idproduct']; ?></td>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo Product::getCategoryById($product['idcategory'])['name']; ?></td>
                    <td><?php echo $product['description']; ?></td>
                    <td>€ <?php echo $product['price']; ?></td>
                    <td><?php echo $product['stock']; ?></td>
                    <td>
                        <form method="get" action="/dashboard/products/edit">
                            <input type="hidden" name="idproduct" value="<?php echo $product['idproduct']; ?>">
                            <button class="btn btn-primary" type="submit">Modifica</button>
                        </form>
                    </td>
                    <td>
                        <form method="get" action="/dashboard/products/delete">
                            <input type="hidden" name="idproduct" value="<?php echo $product['idproduct']; ?>">
                            <button class="btn btn-danger" type="submit">Elimina</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>