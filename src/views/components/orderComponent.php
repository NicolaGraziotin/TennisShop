<?php
    use app\models\User;
?>

<div class="mt-4">
    <div class="border-top">
        <div class="d-flex flex-wrap align-items-center py-4 border-bottom">
        <dl class="mb-0 w-50 w-md-25">
            <dt class="text-secondary">ID ordine:</dt>
            <dd class="fw-semibold text-dark mb-0">
                #<?php echo $idorder ?>
            </dd>
        </dl>

        <dl class="mb-0 w-50 w-md-25">
            <dt class="text-secondary">Data:</dt>
            <dd class="fw-semibold text-dark mb-0"><?php echo $date?></dd>
        </dl>

        <dl class="mb-0 w-50 w-md-25">
            <dt class="text-secondary">Prezzo:</dt>
            <dd class="fw-semibold text-dark mb-0">€ <?php echo $totalprice?></dd>
        </dl>

        <dl class="mb-0 w-50 w-md-25">
            <dt class="text-secondary">Stato:</dt>
            <dd class="badge bg-success text-white mb-0"><?php echo User::getStatusOrder($idorder)['name']?></dd>
        </dl>

        <div class="d-flex flex-wrap gap-2 mt-3 mt-md-0 ms-md-auto">
            <form action="/cancelOrder" method="post">
                <input type="hidden" id="cancOrder" name="idorder" value="<?php echo $idorder?>">
                <button type="submit" class="btn btn-outline-danger btn-sm">Cancella ordine</button>
            </form>
            <form action="/orderDetails" method="get">
                <input type="hidden" id="detOrder" name="idorder" value="<?php echo $idorder?>">
                <button type="submit" class="btn btn-outline-secondary btn-sm">Vedi dettagli</button>
            </form>
        </div>
        </div>
    </div>
</div>