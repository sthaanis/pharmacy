@extends('layout.frontend')
@section('content')
        <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">My Account<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">My Account</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="dashboard">
	                <div class="container">
	                	<div class="row">
	                		<aside class="col-md-4 col-lg-3">
	                			<ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
								    <li class="nav-item">
								        <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Dashboard</a>
								    </li>
								    <li class="nav-item">
								        <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">Orders</a>
								    </li>
								    <li class="nav-item">
								        <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Account Details</a>
								    </li>
								</ul>
	                		</aside><!-- End .col-lg-3 -->

	                		<div class="col-md-8 col-lg-9">
	                			<div class="tab-content">
								    <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                                        @if(Auth::check())
								    	<p>Hello <span class="font-weight-normal text-dark">{{Auth::user()->name}}</span>
                                        @endif
								    	<br>
								    	From your account dashboard you can view your <a href="#tab-orders" class="tab-trigger-link link-underline">recent orders</a>, manage your <a href="#tab-address" class="tab-trigger-link">shipping and billing addresses</a>, and <a href="#tab-account" class="tab-trigger-link">edit your password and account details</a>.</p>
								    </div><!-- .End .tab-pane -->

								    <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
										@if(count($orders)>0)
											<table class="table table-wishlist table-mobile">
												<thead>
													<tr>
														<th>Product</th>
														<th>Price</th>
														<th>Qty</th>
														<th>Amount</th>
														<th>Status</th>
													</tr>
												</thead>

												<tbody>
													@foreach($orders as $order)
													<tr>
														<td class="product-col">
															<div class="product">
																<figure class="product-media">
																	<a>
																		<img src="{{asset('product/'.$order->image)}}" alt="Product image">
																	</a>
																</figure>
																<h3 class="product-title">
																	<a>{{$order->product_name}}</a>
																</h3><!-- End .product-title -->
															</div><!-- End .product -->
														</td>
														<td class="price-col">Rs.{{$order->mrp}}</td>
														<td class="price-col">{{$order->quantity}}</td>
														<td class="stock-col">Rs.{{$order->quantity * $order->mrp}}</td>
														<td>
															@if($order->status == "pending") Pending @endif
															@if($order->status == "delivered") Delivered @endif
														</td>
													</tr>
													@endforeach
												</tbody>
											</table>
										@else
											<p>No order has been made yet.</p>
										@endif
								    </div><!-- .End .tab-pane -->

								    <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
								    	<form action="#">
			                				<div class="row">
			                					<div class="col-sm-12">
			                						<label>Name *</label>
			                						<input type="text" class="form-control" value="{{Auth::user()->name}}" name="name">
			                					</div><!-- End .col-sm-6 -->
			                				</div><!-- End .row -->

		                					<label>Email address *</label>
		        							<input type="email" class="form-control" value="{{Auth::user()->email}}" name="email">

		            						<label>Email address *</label>
		        							<input type="email" class="form-control" value="{{Auth::user()->email}}" name="email">

		            						<label>New password (leave blank to leave unchanged)</label>
		            						<input type="password" class="form-control" name>

		            						<label>Confirm new password</label>
		            						<input type="password" class="form-control mb-2">

		                					<button type="submit" class="btn btn-outline-primary-2">
			                					<span>SAVE CHANGES</span>
			            						<i class="icon-long-arrow-right"></i>
			                				</button>
			                			</form>
								    </div><!-- .End .tab-pane -->
								</div>
	                		</div><!-- End .col-lg-9 -->
	                	</div><!-- End .row -->
	                </div><!-- End .container -->
                </div><!-- End .dashboard -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>
@endsection