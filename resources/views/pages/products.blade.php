@extends('layouts.homeLayout')

@section('content')





	<section id="advertisement">
		<div class="container">
			<img src="{{asset('assets/images/home/advertisement.jpg')}}" alt="" />
		</div>
	</section>

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
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											{{$category->category_name}}
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
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Products in Stock</h2>
						@foreach ($products as $product)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="{{asset($product->product_image)}}" width="80" height="180" alt="" />
										<h2>NGN{{ $product->product_price }}</h2>
										<p>{{$product->product_name}}</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Buy Now</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>NGN{{ $product->product_price }}</h2>
											<p>{{$product->product_name}}</p>
											<a href="recurve-bow.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View</a>
										</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
					
					
					</div><!--features_items-->
					
				</div>
				<div class="row text-center">	
					<ul class="pagination ">
						
						<li>{!! $products->links()!!}</li>
					
					</ul>
					<div class="pagination">
					
					</div>
				</div>
				
			</div>
			
		</div>
	</section>

  


@endsection