@extends('layout')
@section('content')
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-3 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Se connecter à votre compte</h2>
						<form action="{{url('/connexion-client')}}" method="post">
							{{csrf_field()}}
							<input type="email" name="client_email" required="" placeholder="Votre email" />
							<input type="password" name="client_password" required="" placeholder="Votre mot de passe" />
							
							<button type="submit" class="btn btn-default">Se connecter</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">Ou</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>S'inscrire!</h2>
						<form action="{{url('/inscription-client')}}" method="post">
							{{csrf_field()}}
							<input type="text" placeholder="Votre nom complet" name="client_nom" />
							<input type="email" name="client_email" required="" placeholder="Votre email" />
							<input type="password" name="client_password" required="" placeholder="Votre mot de passe" />
							<input type="text" name="client_telephone" placeholder="Votre numero">
							<button type="submit" class="btn btn-default">je m'inscris</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
@endsection