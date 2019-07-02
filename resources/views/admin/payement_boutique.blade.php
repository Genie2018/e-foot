@extends('admin_layout')
@section('admin_content')

	<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Details payements</a></li>
			</ul>
				<p class="alert-success">
								<?php
								
					$message=Session::get('message');
					if ($message) {
						echo $message;
						Session::put('message',null);
					}

					?>
							</p>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Details</h2>
						
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>

							  <tr>
								  <th>ID</th>
								  <th>Nom</th>
								  <th>Total</th>
								  <th>Actions</th>
							  </tr>
						  </thead>
						  @foreach($tous_payement_info as $v_payement)   
						  <tbody>
							<tr>
								<td>{{$v_payement->order_id}}</td>
								<td class="center">{{$v_payement->client_nom}}</td>
								<td class="center">{{$v_payement->order_total}}</td>
								
								
								<td class="center">
									<a class="btn btn-info" href="{{URL::to('/voir-commande/'.$v_payement->order_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{URL::to('/delete-payement/'.$v_payement->order_id)}}" id="delete">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							
						  </tbody>
						  @endforeach
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->


@endsection