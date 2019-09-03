@extends('layout')
@section('content')
@include('slider')
                        <h2 class="title text-center">Terrains Disponibles</h2>
                       <?php foreach($tous_terrain_publication as $v_terrain_publication){?> 
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{URL::to($v_terrain_publication->terrain_image)}}" style="height: 200px;" alt="" />
                                            <h2>{{$v_terrain_publication->terrain_prix}} Franc CFA</h2>
                                            <p>{{$v_terrain_publication->terrain_nom}}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Louer Terrain</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>{{$v_terrain_publication->terrain_prix}} Franc CFA</h2>
                                            <a href="{{URL::to('/voir_terrain/'.$v_terrain_publication->terrain_id)}}">
                                                <p>{{$v_terrain_publication->terrain_nom}}</p></a>
                                                <a href="{{URL::to('/voir_terrain/'.$v_terrain_publication->terrain_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Louer Terrain</a>
                                            </div>
                                        </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>{{$v_terrain_publication->lieu_nom}}</a></li>
                                        <li><a href="{{URL::to('/voir_terrain/'.$v_terrain_publication->terrain_id)}}"><i class="fa fa-plus-square"></i>Voir terrain</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                       <?php }?>
                        
                    </div><!--features_items-->
                    
                   
@endsection