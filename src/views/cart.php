<?php
  use app\core\Session;
  use app\models\Cart;
  use app\models\User;

  $idcustomer = Session::getUserId();
  $totalPrice = Cart::totalCartPrice($idcustomer);
?>

<section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body p-4">
            <div class="row">
              <div class="col-lg-7">
                <h5 class="mb-3"><a href="/" class="text-body"><i class="bi bi-arrow-left me-2"></i>
                    Torna ad acquistare</a></h5>

                <hr>

                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <h4 class="mb-1">Carrello</h4>
                    <p class="mb-0">
                      Hai <?php echo Cart::getTotalElements($idcustomer) ?? 0 ?> prodotti nel carrello.
                    </p>
                  </div>
                </div>

                {{components}}

              </div>
              <div class="col-lg-5">
                <div class="card bg-primary text-white rounded-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <h5 class="mb-0">Dettagli Carta</h5>
                    </div>
                    
                    <form action="/checkout" method="post">
                      <div class="form-outline form-white mb-4">
                        <input type="text" name="typeName" id="proprietario" class="form-control form-control-lg" size="17" minlength="1"
                          placeholder="Nome Cognome" required>
                        <label class="form-label" for="proprietario">Proprietario</label>
                      </div>

                      <div class="form-outline form-white mb-4">
                        <input type="text" name="typeNum" class="form-control form-control-lg" size="17" 
                        id="carta" minlength="19" maxlength="19" placeholder="0000 0000 0000 0000" required>
                        <label class="form-label" for="carta">Numero Carta</label>
                      </div>

                      <div class="row mb-4">
                        <div class="col-md-6">
                          <div class="form-outline form-white">
                            <input type="text" name="typeExp" class="form-control form-control-lg"
                              value="" size="7" id="scadenza" placeholder="MM/YY"
                              minlength="5" maxlength="5" required>
                            <label class="form-label" for="scadenza">Scadenza</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-outline form-white">
                            <input type="password" name="typeCvv" class="form-control form-control-lg"
                              placeholder="000" size="1" minlength="3" id="cvv"
                              maxlength="3" required>
                            <label class="form-label" for="cvv">CVV</label>
                          </div>
                        </div>
                      </div>

                      <hr class="my-4">

                      <div class="d-flex justify-content-between">
                        <p class="mb-2">Subtotale</p>
                        <p class="mb-2" id="subtototal">
                          € <?php echo $totalPrice ?? 0 ?>
                        </p>
                      </div>

                      <div class="d-flex justify-content-between">
                        <p class="mb-2">Spedizione</p>
                        <p class="mb-2">
                          € <?php echo $shipping?>
                        </p>
                      </div>

                      <div class="d-flex justify-content-between mb-4">
                        <p class="mb-2">Totale (Incl. spedizione)</p>
                        <p class="mb-2" id="total">€
                          <?php echo $totalPrice + $shipping?>
                        </p>
                      </div>
                      
                      <input type="text" name="idcustomer" value="<?php echo $idcustomer?>" hidden>
                      <input type="text" name="idpersonaldata"
                        value="<?php echo User::getPersonalInformations($idcustomer)['idpersonaldata']?>" hidden>
                      <input type="text" name="idstatus" value="1" hidden>
                      <input type="text" id="totalPrice" name="total" value="<?php echo Cart::totalCartPrice($idcustomer) + $shipping?>" hidden>

                      <button type="submit" class="btn btn-info btn-block btn-lg" <?php echo Cart::getTotalElements($idcustomer) > 0 ? '' : 'disabled'?>>
                        <i class="bi bi-cart-check-fill"></i>
                        <span><i class="fas fa-long-arrow-alt-right ms-2"></i>Paga</span>
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
<script>
  //For Card Number formatted input
  var cardNum = document.getElementById('carta');
  cardNum.onkeyup = function (e) {
      if (this.value == this.lastValue) return;
      var caretPosition = this.selectionStart;
      var sanitizedValue = this.value.replace(/[^0-9]/gi, '');
      var parts = [];
  
      for (var i = 0, len = sanitizedValue.length; i < len; i += 4) {
          parts.push(sanitizedValue.substring(i, i + 4));
      }
  
      for (var i = caretPosition - 1; i >= 0; i--) {
          var c = this.value[i];
          if (c < '0' || c > '9') {
              caretPosition--;
          }
      }
      caretPosition += Math.floor(caretPosition / 4);
  
      this.value = this.lastValue = parts.join(' ');
      this.selectionStart = this.selectionEnd = caretPosition;
  }
  
  //For Date formatted input
  var expDate = document.getElementById('scadenza');
  expDate.onkeyup = function (e) {
      if (this.value == this.lastValue) return;
      var caretPosition = this.selectionStart;
      var sanitizedValue = this.value.replace(/[^0-9]/gi, '');
      var parts = [];
  
      for (var i = 0, len = sanitizedValue.length; i < len; i += 2) {
          parts.push(sanitizedValue.substring(i, i + 2));
      }
  
      for (var i = caretPosition - 1; i >= 0; i--) {
          var c = this.value[i];
          if (c < '0' || c > '9') {
              caretPosition--;
          }
      }
      caretPosition += Math.floor(caretPosition / 2);
  
      this.value = this.lastValue = parts.join('/');
      this.selectionStart = this.selectionEnd = caretPosition;
  }

  function updateTotalPrice() {
    //AJAX update
    let xhr = new XMLHttpRequest();
    xhr.open('GET', '/updateTotalPrice', true);

    xhr.send();

    xhr.onload = function () {
      if (xhr.status === 200) {
        let data = JSON.parse(xhr.responseText);
        document.getElementById('subtototal').innerText = '€' + data;

        document.getElementById('total').innerText = '€' + (data + <?php echo $shipping?>);
        document.getElementById('totalPrice').value = data + <?php echo $shipping?>;
      }
    };
  }
</script>