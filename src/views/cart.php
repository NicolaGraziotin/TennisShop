<?php
  use app\core\Session;
  use app\models\Cart;
  use app\models\User;

  $idcustomer = Session::getUserId();
  $totalPrice = Cart::totalCartPrice($idcustomer);
  $shipping = 5; // Shipping cost (DA MODIFICARE CON UNA VARIABILE SUCCESSIVAMENTE)
?>

<section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body p-4">

            <div class="row">

              <div class="col-lg-7">
                <h5 class="mb-3"><a href="/" class="text-body"><i class="bi bi-arrow-left me-2"></i>Continue
                    shopping</a></h5>
                <hr>

                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <p class="mb-1">Shopping cart</p>
                    <p class="mb-0">You have
                      <?php echo Cart::getTotalElements($idcustomer) ?> items in your cart
                    </p>
                  </div>
                  <div>
                    <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!" class="text-body">price <i
                          class="bi bi-arrow-down-short mt-1"></i></a></p>
                  </div>
                </div>

                {{components}}

              </div>
              <div class="col-lg-5">

                <div class="card bg-primary text-white rounded-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <h5 class="mb-0">Card details</h5>
                    </div>

                    <div class="dropdown">
                      <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Choose your card
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">1</a></li>
                        <li><a class="dropdown-item" href="#">2</a></li>
                        <li><a class="dropdown-item" href="#">3</a></li>
                      </ul>
                    </div>
                    <form class="mt-4">
                      <div data-mdb-input-init class="form-outline form-white mb-4">
                        <input type="text" id="typeName" class="form-control form-control-lg" siez="17"
                          value="<?php echo Cart::getCreditCard($idcustomer)['holdername']." ".Cart::getCreditCard($idcustomer)['holdersurname'] ?>"
                          disabled />
                        <label class="form-label" for="typeName">Cardholder's name</label>
                      </div>

                      <div data-mdb-input-init class="form-outline form-white mb-4">
                        <input type="text" id="typeNum" class="form-control form-control-lg" siez="17"
                          value="<?php echo Cart::getCreditCard($idcustomer)['number'] ?>" minlength="19" maxlength="19"
                          disabled />
                        <label class="form-label" for="typeNum">Card Number</label>
                      </div>

                      <div class="row mb-4">
                        <div class="col-md-6">
                          <div data-mdb-input-init class="form-outline form-white">
                            <input type="text" id="typeExp" class="form-control form-control-lg"
                              value="<?php echo Cart::getCreditCard($idcustomer)['expire'] ?>" size="7" id="exp"
                              minlength="7" maxlength="7" disabled />
                            <label class="form-label" for="typeExp">Expiration</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div data-mdb-input-init class="form-outline form-white">
                            <input type="password" id="typeCvv" class="form-control form-control-lg"
                              value="<?php echo Cart::getCreditCard($idcustomer)['cvv'] ?>" size="1" minlength="3"
                              maxlength="3" disabled />
                            <label class="form-label" for="typeCvv">Cvv</label>
                          </div>
                        </div>
                      </div>

                    </form>

                    <hr class="my-4">

                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Subtotal</p>
                      <p class="mb-2">€
                        <?php echo $totalPrice?>
                      </p>
                    </div>

                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Shipping</p>
                      <p class="mb-2">€
                        <?php echo $shipping?>
                      </p> <!-- Shipping cost (DA MODIFICARE CON UNA VARIABILE SUCCESSIVAMENTE)-->
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                      <p class="mb-2">Total(Incl. taxes)</p>
                      <p class="mb-2">€
                        <?php echo $totalPrice + $shipping?>
                      </p>
                    </div>

                    <form action="/checkout" method="post">
                      <input type="text" name="idcustomer" value="<?php echo $idcustomer?>" hidden>
                      <input type="text" name="idpersonaldata"
                        value="<?php echo User::getPersonalInformations($idcustomer)['idpersonaldata']?>" hidden>
                      <input type="text" name="idcreditcard"
                        value="<?php echo Cart::getCreditCard($idcustomer)['idcreditcard']?>" hidden>
                      <input type="text" name="idstatus" value="1" hidden>
                      <input type="text" name="total" value="<?php echo $totalPrice + $shipping?>" hidden>
                      <button type="submit" data-mdb-button-init data-mdb-ripple-init
                        class="btn btn-info btn-block btn-lg">
                        <div class="d-flex justify-content-between">
                          <i class="bi bi-cart-check-fill"></i>
                          <span>Checkout<i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                        </div>
                      </button>
                    </form>
                  </div>
                </div>

              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>