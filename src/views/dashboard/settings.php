<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Impostazioni</h1>
</div>
<div class="d-flex mt-5 mb-5">
    <label class="h3" for="idshipping">Seleziona il corriere</label>
    <form class="d-flex mx-3" action="/dashboard/settings" method="post">
        <select class="form-select" id="idshipping" name="idshipping" onchange="this.form.submit()">
            <?php foreach ($shippings as $shipping):?>
                <option value="<?php echo $shipping['idshipping']; ?>" <?php echo $shipping['active'] == True ? 'selected' : ''; ?>>
                    <?php echo $shipping['name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>
</div>
<a class="btn btn-primary" href="/logout">Logout</a>