<h3>Pay</h3>
<section>
    <h4 class="text-center font-22 mb-5">Make Payment</h4>
    <ul class="nav nav-pills justify-content-center custom-tab-button mb-3" id="pills-tab-button" role="tablist">
        <li class="nav-item mr-1">
            <a class="nav-link border active" id="pills-card-tab-button" data-toggle="pill" href="#pills-card-button" role="tab" aria-controls="pills-card-button" aria-selected="true"><span class="tab-btn-icon"><i class="feather icon-credit-card"></i></span>Card</a>
        </li>
        <li class="nav-item mr-0">
            <a class="nav-link border" id="pills-paypal-tab-button" data-toggle="pill" href="#pills-paypal-button" role="tab" aria-controls="pills-paypal-button" aria-selected="false"><span class="tab-btn-icon"><i class="mdi mdi-paypal"></i></span>Paypal</a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent-button">
        <div class="tab-pane fade show active" id="pills-card-button" role="tabpanel" aria-labelledby="pills-card-tab-button">
            <div class='card-wrapper'></div>
            <form class="card-form">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="cardnumber">Card Number</label>
                        <input type="text" class="form-control" name="cardnumber" id="cardnumber">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="cardfullname">Full Name</label>
                        <input type="text" class="form-control" name="cardfullname" id="cardfullname">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="cardexpiry">Expiry Date</label>
                        <input type="text" class="form-control" name="cardexpiry" id="cardexpiry">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="cardcvc">CVC</label>
                        <input type="text" class="form-control" name="cardcvc" id="cardcvc">
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg btn-block py-2 font-18">Pay Now</button>
                </div>
            </form>
        </div>
        <div class="tab-pane fade" id="pills-paypal-button" role="tabpanel" aria-labelledby="pills-paypal-tab-button">
            <button type="button" class="btn btn-primary btn-lg btn-block py-2 mt-5 font-18">Pay via Paypal</button>
        </div>
    </div>
</section>
