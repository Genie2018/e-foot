@extends('layout')
@section('content')
                        <h2 class="title text-center">Terrain Disponibles</h2>
                       <?php foreach($terrain_par_lieu as $vterrain_par_lieu){?> 
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{URL::to($vterrain_par_lieu->terrain_image)}}" style="height: 200px;" alt="" />
                                            <h2>{{$vterrain_par_lieu->terrain_prix}} Franc CFA</h2>
                                            <p>{{$vterrain_par_lieu->terrain_nom}}</p>
                                            <a href="{{URL::to('/voir_terrain/'.$vterrain_par_lieu->terrain_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Louer Terrain</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>{{$vterrain_par_lieu->terrain_prix}} Franc CFA</h2>
                                                <p>{{$vterrain_par_lieu->terrain_nom}}</p>
                                                <a href="{{URL::to('/voir_terrain/'.$vterrain_par_lieu->terrain_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Louer Terrain</a>
                                            </div>
                                        </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href=""><i class="fa fa-plus-square"></i>{{$vterrain_par_lieu->lieu_nom}}</a></li>
                                        <li><a href="{{URL::to('/voir_terrain/'.$vterrain_par_lieu->terrain_id)}}"><i class="fa fa-plus-square"></i>Voir terrain</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                       <?php }?>
                        
                    </div><!--features_items-->
                        
@endsection