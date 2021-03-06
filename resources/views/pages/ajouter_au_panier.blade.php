@extends('layout')
@section('content')

	<section id="cart_items">
		<div class="container col-sm-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<?php 
				$contents=Cart::content();

				?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Image</td>
							<td class="description">Description</td>
							<td class="price">Prix</td>
							<td class="quantity">Heure</td>
							<td class="total">Total</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($contents as $content) {?>
						<tr>
							<td class="cart_product">
							<a href=""><img src="{{URL::to($content->options->image)}}" height="80 px" width="80 px" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$content->name}}</a></h4>
								
							</td>
							<td class="cart_price">
								<p>{{$content->price}}</p>	
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{URL::to('/update-panier')}}" method="post">
										{{csrf_field()}}
									<input class="cart_quantity_input" type="text" name="qty" value="{{$content->qty}}" autocomplete="off" size="2">
									<input type="hidden" name="rowId" value="{{$content->rowId}}">
									<input type="submit" name="submit" value="update" class="btn btn-sm btn-default">

								</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$content->total}}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/supprimer-panier/'.$content->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php }?>

						</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				
				<div class="col-sm-8">
					<div class="total_area">
						<ul>
							
							<li>Total <span>{{Cart::total()}}</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>

							 <?php 
                                $client_id=Session::get('client_id');
                                ?>

							<?php if($client_id !=NULL){?>
                                 <li><a href="{{URL::to('/commander')}}"><i class="btn btn-default update">commander</i> </a></li>
                                <?php }else{?>
                                <li><a href="{{URL::to('/commander-login')}}"><i class="btn btn-default commander">commander</i> </a></li>
                                 <?php } ?>
						

					</div>
				</div>
			</div>
		
	</section><!--/#do_action-->


@endsection