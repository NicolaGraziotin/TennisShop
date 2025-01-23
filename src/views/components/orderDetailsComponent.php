<?php
    use app\models\User;
?>

<div class="row">
    <div class="col mb-3">
        <p class="small text-muted mb-1">User ID:</p>
        <p><?php echo $idcustomer?></p>
    </div>
    <div class="col mb-3">
        <p class="small text-muted mb-1">Date:</p>
        <p><?php echo $date?></p>
    </div>
    <div class="col mb-3">
        <p class="small text-muted mb-1">Order ID:</p>
        <p>#<?php echo $idorder ?></p>
    </div>
</div>

<div class="row my-4">
    <div class="col-md-4 offset-md-8 col-lg-3 offset-lg-9">
        <p class="lead fw-bold mb-0" style="color: #007FFF;">Price: € <?php echo $totalprice?></p>
    </div>
</div>

<p class="lead fw-bold mb-4 pb-2">Tracking Order</p>

<div class="row">
    <div class="col-lg-12">
        <div class="horizontal-timeline">
            <ul class="list-inline items d-flex justify-content-between">
                <li class="list-inline-item items-list" id="ordered">
                    <p class="py-1 px-2 rounded text-white" >Ordered</p>
                </li>
                <li class="list-inline-item items-list" id="shipped">
                    <p class="py-1 px-2 rounded text-white" >Shipped</p>
                </li>
                <li class="list-inline-item items-list" id="on-the-way">
                    <p class="py-1 px-2 rounded text-white" >On the way</p>
                </li>
                <li class="list-inline-item items-list" id="delivered">
                    <p class="py-1 px-2 rounded text-white" >Delivered</p>
                </li>
            </ul>
        </div>
    </div>
</div>


<script>
    // Initial state of the order
    let currentOrderState = parseInt("<?php echo $idstatus; ?>"); // Converte in numero
    console.log("Stato iniziale:", currentOrderState);

    // Update status
    function updateState() {
        // If the state is out the limit, stop the update 
        if (currentOrderState < 1 || currentOrderState > 4) {
            console.log("Stato non valido o ordine completato.");
            clearInterval(updateInterval); // Stop setInterval
            return;
        }

        // Change status 
        let deliveredState;
        switch (currentOrderState) {
            case 1:
                deliveredState = document.querySelector("#ordered");
                deliveredState.querySelector('p').style.backgroundColor = "#007FFF";
                break;
            case 2:
                deliveredState = document.querySelector("#ordered");
                deliveredState.querySelector('p').style.backgroundColor = "#007FFF";
                deliveredState = document.querySelector("#shipped");
                deliveredState.querySelector('p').style.backgroundColor = "#28a745";
                break;
            case 3:
                deliveredState = document.querySelector("#ordered");
                deliveredState.querySelector('p').style.backgroundColor = "#007FFF";
                deliveredState = document.querySelector("#shipped");
                deliveredState.querySelector('p').style.backgroundColor = "#28a745";
                deliveredState = document.querySelector("#on-the-way");
                deliveredState.querySelector('p').style.backgroundColor = "#ffc107";
                break;
            case 4:
                deliveredState = document.querySelector("#delivered");
                deliveredState.querySelector('p').style.backgroundColor = "#dc3545";
                break;
        }
        currentOrderState++;
        console.log("Stato aggiornato:", currentOrderState);
        
        // AJAX
        let xhr = new XMLHttpRequest();

        xhr.open('GET',`/updateOrderStatus?idorder=${<?php echo $idorder; ?>}&idstatus=${currentOrderState}`,true);
        xhr.send();
        xhr.onload = () => {
                if (xhr.status == 200) {
                    console.log("Done");
                }
            }
    }

    // Interval
    const updateInterval = setInterval(updateState, 2000);
</script>
