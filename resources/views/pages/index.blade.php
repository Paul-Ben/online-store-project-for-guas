@extends('layouts.homeLayout')

@section('content')
<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>
                    
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>Gear</span>Up</h1>
                                <h2>Archery Supplies</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{asset('assets/images/home/woodenArrow.jpeg')}}" class="girl img-responsive" height="500" alt="" />
                                {{-- <img src="{{asset('assets/images/home/pricing.png')}}"  class="pricing" alt="" /> --}}
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>Gear</span>Up</h1>
                                <h2>Archery Supplies</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{asset('assets/images/home/RecurveBow.jpeg')}}" class="girl img-responsive" alt="" />
                                <img src="images/home/pricing.png"  class="pricing" alt="" />
                            </div>
                        </div>
                        
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>Gear</span>Up</h1>
                                <h2>Archery Shop</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{asset('assets/images/home/compoundBow.jpeg')}}" class="girl img-responsive" alt="" />
                                <img src="images/home/pricing.png" class="pricing" alt="" />
                            </div>
                        </div>
                        
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

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        @foreach ($categories as $category)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    

                                    <a data-toggle="collapse" data-parent="#accordian" href="">
                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                        <a href="{{route('categoryProducts', $category->id)}}">{{$category->category_name}}|</a>
                                        
                                    </a>
                                    
                                </h4>
                               
                            </div>
                            {{-- <div id="sportswear" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li><a href="product_details/aluminium-arrow.html">Alluminium </a></li>
                                        <li><a href="#">Arrow Accessories </a></li>
                                        <li><a href="product_details/carbon-aluminium-arrow.html">Carbon </a></li>
                                        <li><a href="product_details/fiberglass-arrow.html">Fiber Glass </a></li>
                                        <li><a href="product_details/wooden-arrow.html">Wooden</a></li>
                                        
                                    </ul>
                                </div>
                            </div> --}}
                             
                        </div>
                        {{-- <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordian" href="#mens">
                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                        Bows
                                    </a>
                                </h4>
                            </div>
                            <div id="mens" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li><a href="product_details/compound-bow.html">Compound</a></li>
                                        <li><a href="product_details/newcross-bow.html">Cross Bows</a></li>
                                        <li><a href="product-details/recurve-bow.html">Hunting Bows</a></li>
                                        <li><a href="#">Bow Accessories</a></li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordian" href="#womens">
                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                        Target Accesssories
                                    </a>
                                </h4>
                            </div>
                            <div id="womens" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li><a href="product_details/buttress.html">Buttress</a></li>
                                        <li><a href="product_details/target-paper.html">Target Paper</a></li>
                                        <li><a href="product_details/target-stand.html">Target Stand</a></li>
                                        <li><a href="#">Others</a></li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Others</a></h4>
                            </div>
                        </div> --}}
                        
                        @endforeach
                    </div><!--/category-products-->
                
                    <div class="brands_products"><!--brands_products-->
                        <h2>Brands</h2>
                        <div class="brands-name">
                            <!-- <ul class="nav nav-pills nav-stacked">
                                <li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
                                <li><a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                                <li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
                                <li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
                                <li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
                                <li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
                                <li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
                            </ul> -->
                        </div>
                    </div><!--/brands_products-->
                    
                    <div class="price-range"><!--price-range-->
                        <!-- <h2>Price Range</h2>
                        <div class="well text-center">
                             <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                             <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                        </div> -->
                    </div><!--/price-range-->
                    
                    <div class="shipping text-center"><!--shipping-->
                        <img src="{{asset('assets/images/home/Shipit.png')}}" width="100%" height="100%" alt="" />
                    </div><!--/shipping-->
                
                </div>
            </div>
            
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Featured Items</h2>
                    @foreach ($featureds as $featured)
                    <div class="col-sm-4">
                       
                        <div class="product-image-wrapper">
                           
                            <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{asset($featured->product_image)}}" width="80" height="180" alt="" />
                                        <h2>NGN {{number_format($featured->product_price)}}</h2>
                                        <p>{{$featured->product_name}}</p>
                                        <a href="{{route('product_details', $featured->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>NGN {{number_format($featured->product_price)}}</h2>
                                            <p>{{$featured->product_name}}</p>
                                            <a href="{{url('product_details',$featured->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View</a>
                                        </div>
                                    </div>
                            </div>
                            {{-- <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                </ul>
                            </div> --}}
                        </div>
                        
                    </div>
                    @endforeach
                    
                </div><!--features_items-->
                
            
                
                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>
                    
                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            
                            <div class="item active">
                                @foreach ($rec_items as $rec_item)
                                    
                                	
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{asset($rec_item->product_image)}}" width="40" height="120" alt="" />
                                                <h2>NGN {{number_format($rec_item->product_price)}}</h2>
                                                <p>{{$rec_item->product_name}}</p>
                                                <a href="{{url('product_details',$rec_item->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="item">	
                                @foreach ($rec_items as $rec_item)
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{asset($rec_item->product_image)}}" width="40" height="120" alt="" />
                                                <h2>NGN {{$rec_item->product_price}}</h2>
                                                <p>{{$rec_item->product_name}}</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            
                        </div>
                         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                          </a>
                          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                          </a>			
                    </div>
                </div><!--/recommended_items-->
                
            </div>
        </div>
    </div>
</section>
@endsection