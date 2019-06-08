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
					<a href="#">Modififer un fournisseur</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Modifier un fournisseur</h2>
						
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
						<form class="form-horizontal" action="{{url('/modifier-fournisseur',$fournisseur_info->fournisseur_id)}}" method="post">
							{{ csrf_field() }}
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="date01">Nom fournisseur</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="fournisseur_nom" value="{{$fournisseur_info->fournisseur_nom}}">
							  </div>
							</div>
					      
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">fournisseur description</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="fournisseur_nom" value="{{$fournisseur_info->fournisseur_description}}">
							  </div>
							</div>
							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Modifier le fournisseur</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->


@endsection