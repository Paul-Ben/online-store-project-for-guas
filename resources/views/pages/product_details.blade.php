@extends('layouts.homeLayout')
@section('content')

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
                        <h2>Price Range</h2>
                        <div class="well text-center">
                             <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                             <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div><!--/price-range-->
                    
                    <div class="shipping text-center"><!--shipping-->
                        <img src="../images/home/shipping.jpg" alt="" />
                    </div><!--/shipping-->
                
                </div>
            </div>
            
            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <h2 class="title text-center">Products Details</h2>
                    @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">X</button>
                        <p>{{ session()->get('message') }}</p>
                    </div>
                @endif
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="{{asset($featured->product_image)}}" alt="" />
                            <h3>{{$featured->product_name}}</h3>
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">
                            
                             
                        </div>

                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            {{-- <img src="{{asset($featured->product_image)}}" class="newarrival" alt="" /> --}}
                            <h2>{{$featured->product_name}}</h2>
                            <p>Web ID: {{$featured->product_id}}</p>
                            <img src="../images/product-details/rating.png" alt="" />

                            <form action="{{route('addcart', $featured->id)}}" method="POST">
                                @csrf
                            <span>
                                <span>NGN {{number_format($featured->product_price)}}</span>
                                <label>Quantity:</label>
                                <input type="number" name="purchase_quantity" value="1" min="1" />
                           
                            </span>
                            <div class="mb-3">

                            <i class="fa fa-shopping-cart">
                            <input class="btn" type="submit" style="color: white; background:green; border:none" value="Add to Cart">
                            </i>
                            </div>
                            </form><br>
                            <p><b>Availability:</b> {{$featured->product_stock}}</p>
                            <p><b>Condition:</b> New</p>
                            <p><b>Brand:</b> {{$featured->product_name}}</p>
                            <p><b>Description:</b> {{$featured->description}}</p>
                            
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->
                
                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#details" data-toggle="tab">Pay Online</a></li>
                            <li><a href="#companyprofile" data-toggle="tab">Bank Transfer</a></li>
                            <!-- <li><a href="#tag" data-toggle="tab">Tag</a></li> -->
                            <li ><a href="#reviews" data-toggle="tab">Reviews</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="details" >
                            <div class="col-sm-3">
                                
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <!-- <img src="../images/home/gallery1.jpg" alt="" /> -->
                                            <h2>Pay with Flutterwave</h2>
                                            <!-- <p>Easy Polo Black Edition</p> -->
                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i><a href="https://flutterwave.com/pay/ozateckwvke">Pay Now</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="tab-pane fade" id="companyprofile" >
                            <div class="col-sm-6">
                                    <h2>Transfer Instructions</h2>	
                                            <ol>
                                                <li> Transfer to account number shown</li>
                                                <li> Send email to : orders@gearuparcheryshop.com </li>
                                                <li> Use Order as subject of Email</li>
                                                <li> In the body of the email indicate the following:</li>
                                                <ol type="a">
                                                        <li> Customer Name</li>
                                                        <li> Customer Phone number</li>
                                                        <li> product ID</li>
                                                        <li> Name of item ordered</li>
                                                        <li> Quantity Ordered</li>
                                                        <li> Upload evidence of transaction(Receipt)</li>
                                                        <li> Date of Order</li>
                                                    </ol>
                                                    <li>when your order is confirmed you will recieve a confirmation email.</li>
                                            </ol>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <!-- <img src="../images/home/gallery1.jpg" alt="" /> -->
                                            <h2>Account Details</h2>
                                            <p>BANK NAME: Unity bank plc</p>
                                            <p>ACCOUNT NAME: Gear up and multi ventures</p>
                                            <ul>
                                        
                                                <li><a href=""><i class="fa fa-clock-o"></i>ACCOUNT NO: 0046182902</a></li>
                                                
                                            </ul>
                                            <!-- <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button> -->
                                            
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- <div class="tab-pane fade" id="tag" >
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="../images/home/gallery1.jpg" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div> -->
                        
                        <div class="tab-pane fade" id="reviews" >
                            <div class="col-sm-12">
                                <!-- <ul>
                                    <li><a href=""><i class="fa fa-user"></i>BANK NAME: </a></li>
                                    <li><a href=""><i class="fa fa-clock-o"></i>ACCOUNT NO: </a></li>
                                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                                </ul>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>-->
                                <p><b>Write Your Review</b></p> 
                                <form action="#">
                                    <span>
                                        <input type="text" placeholder="Your Name"/>
                                        <input type="email" placeholder="Email Address"/>
                                    </span>
                                    <textarea name="" ></textarea>
                                    <b>Rating: </b> <img src="../images/product-details/rating.png" alt="" />
                                    <button type="button" class="btn btn-default pull-right">
                                        Submit Review
                                    </button>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div><!--/category-tab-->
                
                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>
                    
                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">	
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="../images/home/woodenArrow.jpeg" alt="" />
                                                <h2>$56</h2>
                                                <p>Wooden Arrows</p>
                                                <a href="wooden-arrow.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="../images/home/RecurveBow.jpeg" alt="" />
                                                <h2>$56</h2>
                                                <p>Recurve Bow</p>
                                                <a href="recurve-bow.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="../images/home/Buttress.jpeg" alt="" />
                                                <h2>$56</h2>
                                                <p>Buttress</p>
                                                <a href="buttress.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">	
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="../images/home/TargetPaper.jpeg" alt="" />
                                                <h2>$56</h2>
                                                <p>Target Paper</p>
                                                <a href="target-paper.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="../images/home/TargetStand.jpeg" alt="" />
                                                <h2>$56</h2>
                                                <p>Target Stand</p>
                                                <a href="target-stand.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="../images/home/pistol.jpeg" alt="" />
                                                <h2>$56</h2>
                                                <p>pistol</p>
                                                <a href="pistol-bow.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
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