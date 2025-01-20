<section class="bg-light py-5">
  <div class="container">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-8 col-xl-6">
        <div class="card border-top border-bottom border-3" style="border-color: #007FFF !important;">
          <div class="card-body p-5">

            <p class="lead fw-bold mb-5">Purchase Receipt</p>

            {{components}}

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

            <p class="mt-4 pt-2 mb-0">Want any help? <a href="https://www.dhl.com/" style="color: #007FFF;">Please contact
                the shipping company</a></p>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
    // Array of states for tracking
    const states = ["#ordered", "#shipped", "#on-the-way", "#delivered"];
    const colors = ["#007FFF", "#28a745", "#ffc107", "#dc3545"]; // Change colors for each state
    let currentStateIndex = 0;

    // Function to update the color
    function updateStateColor() {
        if (currentStateIndex < states.length) {
          const currentState = document.querySelector(states[currentStateIndex]);
          currentState.querySelector('p').style.backgroundColor = colors[currentStateIndex];
          currentStateIndex++;
        }
    }

     // Start the state transition every 5 seconds
    setInterval(updateStateColor, 5000);
</script>