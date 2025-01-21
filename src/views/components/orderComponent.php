<?php
    use app\models\User;
?>

<div class="mt-4">
    <div class="border-top">
        <div class="d-flex flex-wrap align-items-center py-4 border-bottom">
        <dl class="mb-0 w-50 w-md-25">
            <dt class="text-secondary">Order ID:</dt>
            <dd class="fw-semibold text-dark mb-0">
            <a href="#" class="text-decoration-none">#<?php echo $idorder ?></a>
            </dd>
        </dl>

        <dl class="mb-0 w-50 w-md-25">
            <dt class="text-secondary">Date:</dt>
            <dd class="fw-semibold text-dark mb-0"><?php echo $date?></dd>
        </dl>

        <dl class="mb-0 w-50 w-md-25">
            <dt class="text-secondary">Price:</dt>
            <dd class="fw-semibold text-dark mb-0">€ <?php echo $totalprice?></dd>
        </dl>

        <dl class="mb-0 w-50 w-md-25">
            <dt class="text-secondary">Status:</dt>
            <dd class="badge bg-success text-white mb-0"><?php echo User::getStatusOrder($idorder)['name']?></dd>
        </dl>

        <div class="d-flex flex-wrap gap-2 mt-3 mt-md-0 ms-md-auto">
            <form action="/cancelOrder" method="post">
                <input type="text" name="idorder" value="<?php echo $idorder?>" hidden>
                <button type="submit" class="btn btn-outline-danger btn-sm">Cancel order</button>
            </form>
            <a href="/orderDetails?idorder=<?php echo $idorder ?>" class="btn btn-outline-secondary btn-sm">View details</a>
        </div>
        </div>
    </div>
</div>