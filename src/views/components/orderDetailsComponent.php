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
        <!-- <div class="horizontal-timeline">
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
        </div> -->
        <div class="progress">
            <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 0%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                <span class="progress-description">Caricamento</span>
            </div>
        </div>
    </div>
</div>


<script>
    // Initial state of the order
    let currentOrderState = parseInt("<?php echo $idstatus; ?>"); // Converte in numero

    // Update status
    function updateState() {
        // If the state is out the limit, stop the update 
        if (currentOrderState < 1 || currentOrderState > 4) {
            clearInterval(updateInterval); // Stop setInterval
            return;
        }

        // Update progress bar
        let progressBar = document.querySelector('.progress-bar');
        switch (currentOrderState) {
            case 1:
            progressBar.style.width = "25%";   
            progressBar.style.backgroundColor = "0000cc";    
            progressBar.querySelector('.progress-description').innerText = "Approvato";
            progressBar.setAttribute('aria-valuenow', 25);
            break;
            case 2:
            progressBar.style.width = "50%";
            progressBar.style.backgroundColor = "#008000";
            progressBar.querySelector('.progress-description').innerText = "Spedito";
            progressBar.setAttribute('aria-valuenow', 50);
            break;
            case 3:
            progressBar.style.width = "75%";
            progressBar.style.backgroundColor = "#e6b800";
            progressBar.querySelector('.progress-description').innerText = "In consegna";
            progressBar.setAttribute('aria-valuenow', 75);
            break;
            case 4:
            progressBar.style.width = "100%";
            progressBar.style.backgroundColor = "#b30000";
            progressBar.querySelector('.progress-description').innerText = "Consegnato";
            progressBar.setAttribute('aria-valuenow', 100);
            break;
        }
        
        // AJAX
        let xhr = new XMLHttpRequest();
        
        xhr.open('GET',`/updateOrderStatus?idorder=${<?php echo $idorder; ?>}&idstatus=${currentOrderState}`,true);
        xhr.send();
        xhr.onload = () => {
            if (xhr.status == 200) {
                console.log("Done");
            }
        }
        
        currentOrderState++;
    }

    // Interval
    const updateInterval = setInterval(updateState, 2000);
</script>
