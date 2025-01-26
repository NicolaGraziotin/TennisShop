<?php
    use app\models\Admin;
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Clienti</h1>
</div>
<form method="get" action="/dashboard/customers/search">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Cerca per cognome" name="surname" aria-label="Cerca per cognome" aria-describedby="button-search">
        <button class="btn btn-outline-secondary" type="submit" id="button-search">Cerca</button>
    </div>
</form>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Ordini</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer): 
                if ($customer['idcustomer'] == 1) {
                    continue;
                }
                ?>
                <tr>
                    <td><?php echo $customer['idcustomer']; ?></td>
                    <td><?php echo $customer['email']; ?></td>
                    <td><?php echo $customer['name']; ?></td>
                    <td><?php echo $customer['surname']; ?></td>
                    <td><?php echo Admin::getTotalOrdersById($customer['idcustomer']); ?></td>
                    <td>
                        <form method="get" action="/dashboard/customers/delete">
                            <input type="hidden" name="idcustomer" value="<?php echo $customer['idcustomer']; ?>">
                            <button class="btn btn-danger" type="submit">Elimina</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>