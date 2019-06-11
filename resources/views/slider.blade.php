<section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <?php 
                             $toute_slide_info=DB::table('table_slide')
                             ->where('publication_status',1)
                             ->get();
                            ?>
                        <ol class="carousel-indicators">
                            
                            @foreach($toute_slide_info as $v_slide)
                            
                            <li data-target="#slider-carousel" data-slide-to="{{$loop->index}}" class="{{$loop->first ? 'active' : ''}}"></li>
                            @endforeach
                         </ol>
                           
                        
                        <div class="carousel-inner" role="listbox">
                            @foreach($toute_slide_info as $v_slide)
                            <div class="item {{$loop->first ? ' active' : ''}}">
                                                              
                            <img src="{{URL::to($v_slide->slide_image)}}" style="width: 25%; height: 100pz;"/>                       
                            
                            </div>
                            @endforeach
                            
                        </div>
                        
                        
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section><!--/slider-->