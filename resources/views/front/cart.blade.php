@extends('layout.frontend')
@section('content')
    <div class="page-wrapper">
        <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Shopping Cart<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
            <form method="post" action="{{route('pharmacy.front.user.placeorder')}}">
                {{csrf_field()}}
            <div class="page-content">
            	<div class="cart">
	                <div class="container">
	                	<div class="row">
                            @if(count($products)>0)
                                @if( Session::has('message') )
                                    <div class="alert alert-primary mg-b-10" role="alert" id="alert">{{ Session::get('message') }}</div>
                                @endif
                                <div class="col-lg-9">
                                    <table class="table table-cart table-mobile">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $total = 0; ?>
                                            @foreach($products as $product)
                                            <?php 
                                                $qty = $product->quantity;
                                                $mrp = $product->mrp;
                                                $result = $qty * $mrp;
                                                $total = $total + $result;
                                            ?>
                                            <tr>
                                                <td class="product-col">
                                                    <input type="hidden" name="product_id[]" value="{{$product->product_id}}">
                                                    <div class="product">
                                                        <figure class="product-media">
                                                                <img src="{{asset('product/'.$product->image)}}" alt="Product image">
                                                        </figure>

                                                        <h3 class="product-title">
                                                            <a>{{$product->product_name}}</a>
                                                        </h3><!-- End .product-title -->
                                                    </div><!-- End .product -->
                                                </td>
                                                <td class="price-col">Rs.{{$product->mrp}}</td>
                                                <td class="quantity-col">
                                                <input type="hidden" name="qty[]" value="{{$product->quantity}}">
                                                {{$product->quantity}}
                                                </td>
                                                <td class="total-col">{{$product->quantity * $product->mrp}}</td>
                                                <td class="remove-col"><button class="btn-remove" type="button" data-item-id="{{$product->id}}"><i class="icon-close"></i></button></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table><!-- End .table table-wishlist -->
                                </div><!-- End .col-lg-9 -->
                                <aside class="col-lg-3">
                                    <div class="summary summary-cart">
                                        <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                                        <table class="table table-summary">
                                            <tbody>
                                                <tr class="summary-subtotal">
                                                    <td>Subtotal:</td>
                                                    <td>Rs.{{$total}}</td>
                                                </tr><!-- End .summary-subtotal -->

                                                <tr class="summary-total">
                                                    <td>Total:</td>
                                                    <td>Rs.{{$total}}</td>
                                                </tr><!-- End .summary-total -->
                                            </tbody>
                                        </table><!-- End .table table-summary -->

                                        <div class="accordion-summary" id="accordion-payment">
                                                <div class="card">
                                                    <h5>Payment</h5>
                                                </div><!-- End .card -->

                                                <div class="card">
                                                    <div class="card-header" id="heading-3">
                                                        <h2 class="card-title">
                                                            <input type="hidden" name="payment" value="cod">
                                                            <a role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="true" aria-controls="collapse-3">Cash on delivery</a>
                                                        </h2>
                                                    </div><!-- End .card-header -->
                                                </div><!-- End .card -->
                                            </div>
                                        <button class="btn btn-outline-primary-2 btn-order btn-block">PLACE ORDER</button>
                                    </div><!-- End .summary -->
                                </aside><!-- End .col-lg-3 -->
                            @else
                            <p>No Items is added on Cart.</p>
                            @endif
	                	</div><!-- End .row -->
	                </div><!-- End .container -->
                </div><!-- End .cart -->
            </div><!-- End .page-content -->
            </form>
        </main><!-- End .main -->
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>
    @section('script')
    <script>
        $("#alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert").slideUp(1000);
        });

        $('.btn-remove').click(function(event) {
            
            const itemId = $(this).data('item-id');
           
            $.ajax({
                url: "{{URL::route('pharmacy.front.user.removecartitem')}}",
                method: "POST",
                data: { 
                    _token: "{{ csrf_token() }}",
                    itemId: itemId 
                },
                success: function(result) {
                    console.log(result);
                    location.reload();
                }
                
            });
        });
    </script>
    @endsection
@endsection