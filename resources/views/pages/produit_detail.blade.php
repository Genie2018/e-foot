@extends('layout')
@section('content')


				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{URL::to($produit_detail->produit_image)}}" alt="" />
								<h3>ZOOM</h3>
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{$produit_detail->produit_nom}}</h2>
								<p>{{$produit_detail->produit_couleur}}</p>
								<img src="{{URL::to('frontend/images/product-details/rating.png')}}" alt="" />
								<span>
									<span>{{$produit_detail->produit_prix}}Francs CFA</span>
									<form action="{{URL::to('/ajouter-au-panier')}}" method="post">
										{{csrf_field()}}
									<label>Quantite:</label>
									<input type="text" name="qty" value="1" />
									<input type="hidden" name="produit_id" value="{{$produit_detail->produit_id}}">
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Ajouter au panier
									</button>
									</form>
								</span>
								<p><b>Disponibilité:</b> En Stock</p>
								<p><b>Description:</b>{{$produit_detail->produit_court_desc}}</p>
								<p><b>Fournisseur:</b>{{$produit_detail->fournisseur_nom}} </p>
								<p><b>Categorie:</b>{{$produit_detail->categorie_nom}} </p>
								
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					@endsection
					