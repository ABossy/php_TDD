@extends('template')

@section('titre')
<h1>Faire un Don</h1>
@endsection

@section('form')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

<div class="container">
	<hr>
	<div class="row">
		<aside class="col-sm-8">
			<button class="btn btn-lg btn-info">10 Euros</button>
			<button class="btn btn-lg btn-info">20 Euros</button>
			<button class="btn btn-lg btn-info">50 Euros</button>
			<form class="form-horizontal"><br>
<fieldset>

<!-- Form Name -->
<legend>Autre Montant</legend>

<!-- Prepended text-->
<div class="form-group">
  <label class="col-md-4 control-label" for="prependedtext"></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Euros</span>
      <input id="prependedtext" name="prependedtext" class="form-control" placeholder="Montant du don" type="text">
    </div>
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
    <button id="" name="" class="btn btn-warning">Valider</button>
  </div>
</div>

</fieldset>
</form>

		</aside class="col-sm-8">
		
		<aside class="col-sm-4">
			<article class="card">
				<div class="card-body p-5">
					<p> <img src="http://bootstrap-ecommerce.com/main/images/icons/pay-visa.png"> 
						<img src="http://bootstrap-ecommerce.com/main/images/icons/pay-mastercard.png"> 
						<img src="http://bootstrap-ecommerce.com/main/images/icons/pay-american-ex.png">
					</p>

					
					<form role="form">
						<div class="form-group">

							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-user"></i></span>
								</div>
								<input type="text" class="form-control" name="username" placeholder="" required="">
							</div> <!-- input-group.// -->
						</div> <!-- form-group.// -->

						<div class="form-group">
							<label for="cardNumber">Card number</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-credit-card"></i></span>
								</div>
								<input type="text" class="form-control" name="cardNumber" placeholder="">
							</div> <!-- input-group.// -->
						</div> <!-- form-group.// -->

						<div class="row">
							<div class="col-sm-8">
								<div class="form-group">
									<label><span class="hidden-xs">Expiration</span> </label>
									<div class="form-inline">
										<select class="form-control" style="width:45%">
										  <option>MM</option>
										  <option>01 - Janvier</option>
										  <option>02 - Fevrier</option>
										  <option>03 - Mars</option>
									  </select>
									  <span style="width:10%; text-align: center"> / </span>
									  <select class="form-control" style="width:45%">
										  <option>YY</option>
										  <option>2019</option>
										  <option>2020</option>
									  </select>
								  </div>
							  </div>
						  </div>
						  <div class="col-sm-4">
							<div class="form-group">
								<label data-toggle="tooltip" title="" data-original-title="3 digits code on back side of the card">CVV <i class="fa fa-question-circle"></i></label>
								<input class="form-control" required="" type="text">
							</div> <!-- form-group.// -->
						</div>
					</div> <!-- row.// -->
				<button class="subscribe btn btn-primary btn-block" type="button"> Confirm  </button>
			</form>
		</div> <!-- card-body.// -->
	</article> <!-- card.// -->
</aside class="col-sm-4">

@endsection