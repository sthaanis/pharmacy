@extends('layout.frontend')
@section('content')
        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Products</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$product->product_name}}</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <div class="product-details-top">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-gallery product-gallery-vertical">
                                    <div class="row">
                                        <figure class="product-main-image">
                                            <img id="product-zoom" src="{{asset('product/'.$product->image)}}" data-zoom-image="assets/images/products/single/1-big.jpg" alt="product image">

                                            <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                <i class="icon-arrows"></i>
                                            </a>
                                        </figure><!-- End .product-main-image -->
                                    </div><!-- End .row -->
                                </div><!-- End .product-gallery -->
                            </div><!-- End .col-md-6 -->

                            <div class="col-md-6">
                                <div class="product-details">
                                    <h1 class="product-title">{{$product->product_name}}</h1><!-- End .product-title -->

                                    <div class="product-price">
                                        Rs.{{$product->mrp}}
                                    </div><!-- End .product-price -->

                                    <div class="product-content">
                                        <p>{{$product->short_desc}}</p>
                                    </div><!-- End .product-content -->

                                    <form method="post" action="{{route('pharmacy.front.product.detail.cart')}}">
                                    {{csrf_field()}}
                                        <div class="details-filter-row details-row-size">
                                            <label for="qty">Qty:</label>
                                            <div class="product-details-quantity">
                                                <input type="number" name="qty" id="qty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                            </div><!-- End .product-details-quantity -->
                                        </div><!-- End .details-filter-row -->
                                        

                                        <div class="product-details-action">
                                                <input type="hidden" value="{{$product->id}}" name="product_id">
                                                @if(Auth::check())
                                                <button type="submit" class="btn-product btn-cart"><span>add to cart</span></button>
                                                @else
                                                <a href="#signin-modal" class="btn-product btn-cart" data-toggle="modal">Add TO CART</a>
                                                @endif

                                        </div><!-- End .product-details-action -->
                                    </form>

                                    <div class="product-details-footer">
                                        <div class="product-cat">
                                            <span>Category:</span>
                                            <a href="#">{{$product->category->category_name}}</a>

                                            <span>Medicine Type:</span>
                                            <a href="#">{{$product->medicine_type->medicine_type}}</a>
                                        </div>
                                    </div><!-- End .product-details-footer -->
                                </div><!-- End .product-details -->
                            </div><!-- End .col-md-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .product-details-top -->

                    <div class="product-details-tab">
                        <ul class="nav nav-pills justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                                <div class="product-desc-content">{{$product->long_desc}}</div>
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .product-details-tab -->

                    <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->

                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                        data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "480": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                },
                                "1200": {
                                    "items":4,
                                    "nav": true,
                                    "dots": false
                                }
                            }
                        }'>
                        <?php 
                            $similarProducts = Product::where('is_featured','yes')->whereNotIn('id',[$product->id])->get();
                        ?>
                        @foreach($similarProducts as $product)
                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                <span class="product-label label-new">Featured</span>
                                <a href="#">
                                    <img src="{{asset('product/'.$product->image)}}" alt="Product image" class="product-image">
                                </a>
                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <h3 class="product-title"><a href="product.html">{{$product->product_name}}</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    Rs.{{$product->mrp}}
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                        @endforeach
                    </div><!-- End .owl-carousel -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>
@endsection
