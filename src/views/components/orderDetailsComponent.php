<?php
    use app\models\User;
?>

<?php $statusorder = User::updateOrderStatus($idorder)?>


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

<!-- Inserire dettagli articoli??? -->
<!-- <div class="mx-n5 px-5 py-4" style="background-color: #f2f2f2;">
  <div class="row">
    <div class="col-md-8 col-lg-9">
      <p>BEATS Solo 3 Wireless Headphones</p>
    </div>
    <div class="col-md-4 col-lg-3">
      <p>£299.99</p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8 col-lg-9">
      <p class="mb-0">Shipping</p>
    </div>
    <div class="col-md-4 col-lg-3">
      <p class="mb-0">£33.00</p>
    </div>
  </div>
</div> -->

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
    //state of the order
    const currentOrderState = "<?php echo $idstatus; ?>";
    console.log(currentOrderState == 4);
    // Array of states for tracking
    const states = ["#ordered", "#shipped", "#on-the-way", "#delivered"];
    const colors = ["#007FFF", "#28a745", "#ffc107", "#dc3545"]; // Change colors for each state
    let currentStateIndex = 0;

    if(currentOrderState == 4) {
        const deliveredState = document.querySelector("#delivered");
        if (deliveredState) {
            deliveredState.querySelector('p').style.backgroundColor = "#dc3545";
        }
        
    } else {
        // Function to update the color
        function updateStateColor() {
            if (currentStateIndex < states.length) {
                const currentState = document.querySelector(states[currentStateIndex]);
                currentState.querySelector('p').style.backgroundColor = colors[currentStateIndex];
                currentStateIndex++;
            }
        }
    }

    // Start the state transition every 3 seconds
    setInterval(updateStateColor, 3000);
</script>
