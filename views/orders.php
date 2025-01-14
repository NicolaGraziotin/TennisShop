<section class="bg-light py-5">
  <div class="container">
    <div class="mx-auto" style="max-width: 960px;">
      <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <h2 class="h4 text-dark mb-0">My Orders</h2>

        <div class="d-flex flex-wrap align-items-center gap-3">
          <div>
            <label for="order-type" class="visually-hidden">Select order type</label>
            <select id="order-type" class="form-select form-select-sm">
              <option selected>All orders</option>
              <option value="pre-order">Pre-order</option>
              <option value="transit">In transit</option>
              <option value="confirmed">Confirmed</option>
              <option value="cancelled">Cancelled</option>
            </select>
          </div>

          <span class="text-secondary">from</span>

          <div>
            <label for="duration" class="visually-hidden">Select duration</label>
            <select id="duration" class="form-select form-select-sm">
              <option selected>this week</option>
              <option value="this month">this month</option>
              <option value="last 3 months">the last 3 months</option>
              <option value="last 6 months">the last 6 months</option>
              <option value="this year">this year</option>
            </select>
          </div>
        </div>
      </div>
    
      {{components}}

      <nav class="mt-4" aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item active" aria-current="page">
            <a class="page-link" href="#">3</a>
          </li>
          <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
          <li class="page-item"><a class="page-link" href="#">100</a></li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</section>
