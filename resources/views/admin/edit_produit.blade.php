@extends('admin_layout')
@section('admin_content')


			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Accueil</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Modififer un produit</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Modifier un produit</h2>
						
							<p class="alert-success">
								<?php
								
					$message=Session::get('message');
					if ($message) {
						echo $message;
						Session::put('message',null);
					}

					?>
							</p>
								
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="{{url('/modifier-produit',$produit_info->produit_id)}}" method="post">
							{{ csrf_field() }}
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="date01">Nom produit</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="produit_nom" value="{{$produit_info->produit_nom}}">
							  </div>
							</div>
					      
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">produit description</label>
							  <div class="controls">
								<textarea class="cleditor" name="produit_description" value="">{{$produit_info->produit_description}}</textarea>
							  </div>
							</div>
							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Modifier le produit</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->


@endsection