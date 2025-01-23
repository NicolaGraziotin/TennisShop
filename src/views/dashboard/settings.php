<?php
    use app\models\Cart;

    $shippings = Cart::getAllShippings();
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Settings</h1>
</div>
<div class="d-flex mt-5 mb-5">
    <h3>Scegli il corriere</h3>
    <form class="d-flex mx-3" action="" method="post">
        <select class="form-select" name="idshipping" onchange="this.form.submit()">
        <?php foreach ($shippings as $shipping):?>
            <option value="<?php echo $shipping['idshipping']; ?>" <?php echo $shipping['active'] == True ? 'selected' : ''; ?>>
                <?php echo $shipping['name']; ?>
            </option>
        <?php endforeach; ?>
        </select>
    </form>
</div>
<a class="btn btn-primary" href="/logout">Logout</a>