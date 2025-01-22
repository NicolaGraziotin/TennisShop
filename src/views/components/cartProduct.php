<div class="card rounded-3 mb-4">
    <div class="card-body p-4">
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-md-2 col-lg-2 col-xl-2">
                <img src="assets/<?php echo $image?>.webp"
                    class="img-fluid rounded-3" alt="">
            </div>
            <div class="col-md-3 col-lg-3 col-xl-3">
                <p class="lead fw-normal mb-2"><?php echo $name ?></p>
                <p><span class="text-muted"><?php echo $description ?></span></p>
            </div>
            <div class="col-md-3 col-lg-3 col-xl-3 d-flex">
                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2"
                    onclick="updateQuantity(this, 'decrease', <?php echo $idproduct ?>)">
                    <i class="bi bi-dash-lg"></i>
                </button>

                <input id="form1" min="0" name="quantity" value="<?php echo $quantity ?>" type="number"
                    class="form-control form-control-sm text-center" readonly/>

                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2"
                    onclick="updateQuantity(this, 'increase',<?php echo $idproduct ?>)">
                    <i class="bi bi-plus-lg"></i>
                </button>
            </div>
            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                <h5 class="mb-0"><?php echo "€".$price ?></h5>
            </div>
            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
            </div>
        </div>
    </div>
</div>
<script>
    function updateQuantity(button, action, idproduct) {
        const parentDiv = button.parentNode;
        const input = parentDiv.querySelector('input[name="quantity"]');
        let currentQuantity = parseInt(input.value);

        if (action === 'increase') {
            currentQuantity++;
        } else if (action === 'decrease' && currentQuantity > 0) {
            currentQuantity--;
        }

        input.value = currentQuantity;

        // Invio AJAX al server
        let xhr = new XMLHttpRequest();
        xhr.open('GET', `/updateQuantity?idproduct=${idproduct}&quantity=${currentQuantity}`, true);

        xhr.send();

        xhr.onload = function () {
            if (xhr.status === 200) {
                console.log('Quantità aggiornata con successo:', xhr.responseText);
            } else {
                console.error('Errore nell\'aggiornamento della quantità');
            }
        };

        updateTotalPrice();
    }

</script>