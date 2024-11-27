<section class="h-100">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-10">

        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-normal mb-0">Shopping Cart</h3>
          <div>
            <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!" class="text-body">price <i
                  class="bi bi-arrow-down-short mt-1"></i></a></p>
          </div>
        </div>

        {{content}}

        <div class="card mb-4">
          <div class="card-body p-4 d-flex flex-row">
            <div data-mdb-input-init class="form-outline flex-fill">
              <input type="text" id="form1" class="form-control form-control-lg" />
              <label class="form-label" for="form1">Discound code</label>
            </div>
            <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-warning btn-lg ms-3">Apply</button>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-warning btn-block btn-lg">Proceed to Pay</button>
            <a href="/payment" class="btn btn-success btn-lg btn-block" role="button">Proceed to Pay</a>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>