@extends('layout')
@section('content')

<section id="cart_items">
		<div class="container">


			<div class="register-req">
				<p>Veuillez replir ce formulaire SVP</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Details de la commande</p>
							<div class="form-one">
								<form action="{{URL('/save-detail-commande')}}" method="post">
									{{csrf_field()}}
									<input type="text" name="commander_email" placeholder="Email*">
									<input type="text" name="commander_nom" placeholder="Nom">
									<input type="text" name="commander_prenom" placeholder="Prenom">
									<input type="text" name="commander_adresse" placeholder="Addresse">
									<input type="text" name="commander_telephone" placeholder="Numero de telephone *">
									<input type="submit" class="btn btn-default" value="valider">
								</form>
							</div>
							
						</div>
					</div>
								
				</div>
			</div>
	
		</div>
	</section> <!--/#cart_items-->

@endsection