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
					<a href="#">Modifier un produit</a>
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
							  <label class="control-label" for="date01">Nom</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="produit_nom" value="{{$produit_info->produit_nom}}" required="">
							  </div>
							</div>

							<div class="control-group">
								<label class="control-label" for="selectError3">produit Categorie</label>
								<div class="controls">
								  <select id="selectError3" name="categorie_id">
								  	<option>selectionner une categorie</option>
								  	<?php 
                                $toute_publication_categorie=DB::table('table_categorie')
                                        ->where('publication_status',1)
                                        ->get();
                            
                                       foreach($toute_publication_categorie as $v_categorie){?>  
							<option value="{{$v_categorie->categorie_id}}">{{$v_categorie->categorie_nom}}</option>
									<?php } ?>
								  </select>
								</div>
							  </div>
					      
							 <div class="control-group">
								<label class="control-label" for="selectError3">Nom du fournisseur</label>
								<div class="controls">
								  <select id="selectError3" name="fournisseur_id">
								  	<option>Selectionner un fournisseur</option>
								  	 	<?php 
                                $toute_publication_fournisseur=DB::table('table_fournisseur')
                                        ->where('publication_status',1)
                                        ->get();
                                foreach($toute_publication_fournisseur as $v_fournisseur){?>
								<option value="{{$v_fournisseur->fournisseur_id}}">{{$v_fournisseur->fournisseur_nom}}</option>
									<?php } ?>
								  </select>
								</div>
							  </div>
							  <div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">produit petit description</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="produit_court_desc" value="{{$produit_info->produit_court_desc}}">
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">produit long description</label>
							  <div class="controls">
							<input type="text" class="input-xlarge" name="produit_long_desc" value="{{$produit_info->produit_long_desc}}">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="date01">Prix</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="produit_prix" value="{{$produit_info->produit_prix}}" required="">
							  </div>
							</div>

									 

							<div class="control-group">
							  <label class="control-label" for="date01">produit taille</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="produit_size" value="{{$produit_info->produit_size}}" required="">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">produit couleur</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="produit_couleur" value="{{$produit_info->produit_couleur}}" required="">
							  </div>
							</div>
							
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication status</label>
							  <div class="controls">
								<input type="checkbox" name="publication_status" value="1">
							  </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Modifier le produit</button>
							  <button type="reset" class="btn">Annuler</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->


@endsection