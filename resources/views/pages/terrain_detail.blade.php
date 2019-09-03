@extends('layout')
@section('content')


				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{URL::to($terrain_detail->terrain_image)}}" alt="" />
								<h3>ZOOM</h3>
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{$terrain_detail->terrain_nom}}</h2>
								<img src="{{URL::to('frontend/images/product-details/rating.png')}}" alt="" />
								<span>
									<span>{{$terrain_detail->terrain_prix}}Francs CFA</span>
									<form action="{{URL::to('/ajouter-au-panier')}}" method="post">
										{{csrf_field()}}
									<label>Nombre d'heures:</label>
									<input type="text" name="qty" value="1" />
									<input type="hidden" name="terrain_id" value="{{$terrain_detail->terrain_id}}">
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Louer Terrain
									</button>
									</form>
								</span>
								
								<p><b>Lieu:</b>{{$terrain_detail->lieu_nom}} </p>
								<p><b>Categorie:</b>{{$terrain_detail->categorie_surface}} </p>
								
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					@endsection
					