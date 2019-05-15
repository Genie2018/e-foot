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
					<a href="#">Ajouter une categorie</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Ajouter un stock</h2>
						
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
						<form class="form-horizontal" action="{{url('/sauvegarder-stock')}}" method="post" enctype="multipart/form-data">
							{{ csrf_field() }}
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="date01">Nom du stock</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="stock_nom" required="">
							  </div>
							</div>

					       <div class="control-group">
								<label class="control-label" for="selectError3">Stock Categorie</label>
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
								<label class="control-label" for="selectError3">Nom du produit</label>
								<div class="controls">
								  <select id="selectError3" name="produit_id">
								  	<option>Selectionner un produit</option>
								  	 	<?php 
                                $toute_publication_produit=DB::table('table_produit')
                                        ->where('publication_status',1)
                                        ->get();
                                foreach($toute_publication_produit as $v_produit){?>
								<option value="{{$v_produit->produit_id}}">{{$v_produit->produit_nom}}</option>
									<?php } ?>
								  </select>
								</div>
							  </div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Stock petit description</label>
							  <div class="controls">
								<textarea class="cleditor" name="stock_court_desc" required=""></textarea>
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Stock long description</label>
							  <div class="controls">
								<textarea class="cleditor" name="stock_long_desc" required=""></textarea>
							  </div>
							</div>


							
							
							<div class="control-group">
							  <label class="control-label" for="date01">Prix</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="stock_prix" required="">
							  </div>
							</div>

								<div class="control-group">
							  <label class="control-label" for="fileInput">Image</label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" name="stock_image" type="file">
							  </div>
							</div> 

							<div class="control-group">
							  <label class="control-label" for="date01">Stock taille</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="stock_size" required="">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Stock couleur</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="stock_couleur" required="">
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication status</label>
							  <div class="controls">
								<input type="checkbox" name="publication_status" value="1">
							  </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Ajouter un stock</button>
							  <button type="reset" class="btn">Annuler</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->


@endsection