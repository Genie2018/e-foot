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
					<a href="#">Modififer une categorie</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Modifier une categorie</h2>
						
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
						<form class="form-horizontal" action="{{url('/modifier-categorie',$categorie_info->categorie_id)}}" method="post">
							{{ csrf_field() }}
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="date01">Nom Categorie</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="categorie_nom" value="{{$categorie_info->categorie_nom}}">
							  </div>
							</div>
					      
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">categorie description</label>
							  <div class="controls">
								<textarea class="cleditor" name="categorie_description" value="">{{$categorie_info->categorie_description}}</textarea>
							  </div>
							</div>
							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Modifier la categorie</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->


@endsection