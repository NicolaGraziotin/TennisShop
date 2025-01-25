<section class="bg-light py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-8 col-xl-6">
            <div class="card border-top border-bottom border-3" style="border-color: #007FFF !important;">
                <div class="card-body p-5">

                <p class="lead fw-bold mb-5">Ricevuta</p>

                <div class="row">
                    <div class="col mb-3">
                        <p class="lead fw-bold">User:</p>
                        <p><?php echo $anag['name'] . ' ' . $anag['surname'] ?></p>
                    </div>
                    <div class="col mb-3">
                        <p class="lead fw-bold">Data:</p>
                        <p><?php echo $date?></p>
                    </div>
                    <div class="col mb-3">
                        <p class="lead fw-bold">ID Ordine:</p>
                        <p>#<?php echo $idorder ?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <p class="lead fw-bold">Numero carta:</p>
                        <p><?php echo $card['number']?></p>

                    </div>
                    <div class="col mb-3">
                        <p class="lead fw-bold">Indirizzo di spedizione:</p>
                        <p><?php echo $info['country'] . ", " . $info['city'] . ", " . $info['address']?></p>
                    </div>
                    <div class="col mb-3">
                        <p class="lead fw-bold">Prezzo: </p>
                        <p>€ <?php echo $totalprice?></p>
                    </div>
                </div>

                <p class="lead fw-bold mb-4 pb-2">Tracciamento ordine</p>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 0%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                <span class="progress-description"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <p class="mt-4 pt-2 mb-0">Ti serve aiuto? <a href="https://www.dhl.com/" style="color: #007FFF;">
                    Contatta la compagnia di spedizione.</a>
                </p>
                </div>
            </div>
            <div>
                <a href="/orders" class="btn btn-primary mt-4">Indietro</a>
            </div>
        </div>
    </div>
</section>

<script>
    // Initial state of the order
    let currentOrderState = parseInt("<?php echo $idstatus; ?>"); 

    // Update status
    function updateState() {
        // If the state is out the limit, stop the update 
        if (currentOrderState < 1 || currentOrderState > 4) {
            clearInterval(updateInterval); 
            return;
        }

        function sendNotification(title, message) {
            let xhr = new XMLHttpRequest();
            xhr.open('GET', `/sendNotification?title=${title}&message=${message}`, true);
            xhr.send();

            xhr.onload = () => {
                if (xhr.status == 200) {
                    console.log("NOTIFICATION");
                }
        }

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
                sendNotification("Tennishop", "Il tuo ordine numero <?php echo $idorder; ?> è stato spedito");
                break;
            case 3:
                progressBar.style.width = "75%";
                progressBar.style.backgroundColor = "#e6b800";
                progressBar.querySelector('.progress-description').innerText = "In consegna";
                progressBar.setAttribute('aria-valuenow', 75);
                sendNotification("Tennishop", "Il tuo ordine numero <?php echo $idorder; ?> è in consegna");
                break;
            case 4:
                progressBar.style.width = "100%";
                progressBar.style.backgroundColor = "#b30000";
                progressBar.querySelector('.progress-description').innerText = "Consegnato";
                progressBar.setAttribute('aria-valuenow', 100);
                sendNotification("Tennishop", "Il tuo ordine numero <?php echo $idorder; ?> è stato consegnato");
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