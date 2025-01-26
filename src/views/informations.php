<div class="container py-5">
  <div class="main-body">
    <!-- /Breadcrumb -->

    <div class="row gutters-sm">
      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
              <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle"
                width="150">
              <div class="mt-3">
                <p class="h4"><?php echo $name." ".$surname ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="card mt-3">
          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <strong class="bi bi-globe"> Website</strong>
              <a class="text-secondary" href="https://www.unibo.it">https://unibo.it</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <strong class="bi bi-github"> GitHub</strong>
              <a class="text-secondary" href="https://github.com"><?php echo $name.$surname ?></a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <strong class="bi bi-twitter-x"> X</strong>
              <a class="text-secondary" href="https://x.com">@<?php echo $name.$surname ?></a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <strong class="bi bi-instagram text-danger"> Instagram</strong>
              <a class="text-secondary" href="https://instagram.com"><?php echo $name.$surname ?></a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <strong class="bi bi-facebook text-primary"> Facebook</strong>
              <a class="text-secondary" href="https://facebook.com"><?php echo $name.$surname ?></a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card mb-3">
          <form action="/informations" method="post">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <label for="country" class="mb-0 h6">Paese</label>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="text" class="form-control" id="country" name="country" value="<?php echo $country ?>"
                    disabled>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <label for="state" class="mb-0 h6">Regione</label>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="text" class="form-control" id="state" name="state" value="<?php echo $state ?>" disabled>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <label for="city" class="mb-0 h6">Città</label>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="text" class="form-control" id="city" name="city" value="<?php echo $city ?>" disabled>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <label for="address" class="mb-0 h6">Indirizzo</label>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="text" class="form-control" id="address" name="address" value="<?php echo $address ?>"
                    disabled>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <label for="cap" class="mb-0 h6">CAP</label>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="text" class="form-control" id="cap" name="cap" value="<?php echo $cap ?>" disabled>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <label for="phone" class="mb-0 h6">Cellulare</label>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone ?>" disabled>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                    <button type="button" class="btn btn-info" id="editButton">Modifica</button>
                </div>
                <div class="col-sm-9">
                  <button type="submit" class="btn btn-info" id="saveButton" hidden>Salva</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>