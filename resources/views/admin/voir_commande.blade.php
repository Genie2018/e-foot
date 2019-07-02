@extends('admin_layout')
@section('admin_content')

	<div class="row-fluid sortable">
		<div class="box span6">
			<div class="box-header">
				<h2><i class="halflings-icon align-justify "></i><span class="break"></span>
						Clients Infos</h2>				
			</div>
			<div class="box-content">
				<table class="table">
					<thead>
						<tr>
							<th>Utilisateur</th>
							<th>Telephone</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>{{$tous_commande_info->client_nom}}</td>
							<td>{{$tous_commande_info->client_telephone}}</td>
						</tr>
					</tbody>
					
				</table>
				
			</div>
			
		</div>


		<div class="box span6">
			<div class="box-header">
				<h2><i class="halflings-icon align-justify "></i><span class="break"></span>
						Informations Commandes</h2>				
			</div>
			<div class="box-content">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Prenom</th>
							<th>Nom</th>							
							<th>Adresse</th>

						</tr>
					</thead>
					<tbody>
						<tr>
							<td>{{$tous_commande_info->commander_prenom}}</td>
							<td>{{$tous_commande_info->commander_nom}}</td>
							<td>{{$tous_commande_info->commander_adresse}}</td>
						</tr>
					</tbody>
					
				</table>
				
			</div>
			
		</div>
		
	</div>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Details des produits</h2>
						
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>

							  <tr>
								  <th>ID</th>
								  <th>Nom Produit</th>
								  <th>Prix</th>
								  <th>quantite</th>
								  <th>Total</th>
							  </tr>
						  </thead>
						    
						  <tbody>
							<tr>
								<td>{{$tous_commande_info->produit_id}}</td>
								<td class="center">{{$tous_commande_info->produit_nom}}</td>
								<td class="center">{{$tous_commande_info->produit_prix}}</td>
								<td class="center">{{$tous_commande_info->produit_quantite}}</td>
							</tr>
							
						  </tbody>
						  <tfoot>
						  	<tr>
						  		<td colspan="4">Total</td>
						  		<td><strong>=Total:{{$tous_commande_info->order_total}}	FCFA</strong></td>
						  	</tr>
						  </tfoot>
						  
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->


@endsection