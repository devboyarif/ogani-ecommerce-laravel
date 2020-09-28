@extends('users.user_master')

@section('hero')
      <!-- Breadcrumb Section Begin -->
      <section class="breadcrumb-section set-bg" data-setbg="{{ asset('user') }}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Product Details</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ url('/') }}">Home</a>
                            <span>Product Details</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
@endsection

@section('content')

     <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                      
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                            src="{{ asset($item->product_image_1) }}" alt="">
                        </div>                     
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="{{ asset($item->product_image_2) }}"
                                src="{{ asset($item->product_image_2) }}" alt="">
                            <img data-imgbigurl="{{ asset($item->product_image_3) }}"
                                src="{{ asset($item->product_image_3) }}" alt="">                   
                        </div>
                    </div>
                </div>
               
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{ $item->product_name }}</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <div class="product__details__price">tk{{ $item->product_price }}</div>
                        <div>{!! $item->short_description !!}</div>                 
                            @if ($item->product_quantity != 0) 
                            {{-- <div class="product__details__quantity">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1">
                                    </div>
                                </div>
                            </div> --}}
                                @if (session()->has('user_id') && session()->has('user_ip'))
                                <span style="display: none" id="user_id">{{ session()->get('user_id') }}</span>
                                <span style="display: none" id="user_ip">{{ session()->get('user_ip') }}</span>
                                <button onclick="cartBTN({{$item->id}})" style="border: none" class="primary-btn"><i class="fa fa-shopping-cart"></i> ADD TO CART</button>
                                @else  
                                    <button onclick="login_cartBTN()" style="border: none" class="primary-btn"><i class="fa fa-shopping-cart"></i> ADD TO CART</button>
                                @endif

                            @else
                            <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                            @endif                     
                        <ul>
                           
                            <li><b>Availability</b>
                                @if ($item->product_quantity == 0)
                                <span class="text-danger">Out Stock</span>
                                @else    
                                <span class="text-success">In Stock</span>
                                @endif 
                            </li>
                            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                            <li><b>Weight</b> <span>0.5 kg</span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                    aria-selected="false">Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">Reviews <span>(1)</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>{!! $item->long_description !!}</p>
                                    {{-- <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                        Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Vivamus
                                        suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam sit amet quam
                                        vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada.
                                        Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur arcu erat,
                                        accumsan id imperdiet et, porttitor at sem. Praesent sapien massa, convallis a
                                        pellentesque nec, egestas non nisi. Vestibulum ac diam sit amet quam vehicula
                                        elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus
                                        et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam
                                        vel, ullamcorper sit amet ligula. Proin eget tortor risus.</p>
                                        <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                        ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                        elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                        porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                        nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.
                                        Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed
                                        porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum
                                        sed sit amet dui. Proin eget tortor risus.</p> --}}
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                        Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                        Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                        sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                        eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                        Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                        sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                        diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                        ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                        Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                        Proin eget tortor risus.</p>
                                    <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                        ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                        elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                        porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                        nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                        Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                        Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                        sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                        eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                        Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                        sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                        diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                        ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                        Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                        Proin eget tortor risus.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    @foreach ($related_product as $itemm)               
    @if ($itemm->count() != 0)
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($related_product as $itemm)               
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ asset($itemm->product_image_1) }}">
                            <ul class="product__item__pic__hover">
                                <li>
                                    @if (session()->has('user_id') && session()->has('user_ip'))
                                    <span style="display: none" id="user_id">{{ session()->get('user_id') }}</span>
                                    <span style="display: none" id="user_ip">{{ session()->get('user_ip') }}</span>
                                    <button onclick="wishBTN({{$item->id}})"><i class="fa fa-heart"></i></button>
                                    @else  
                                        <button onclick="login_cartBTN()"><i class="fa fa-heart"></i></button>           
                                    @endif
                                </li>
                                <li>
                                    @if (session()->has('user_id') && session()->has('user_ip'))
                                    <span style="display: none" id="user_id">{{ session()->get('user_id') }}</span>
                                    <span style="display: none" id="user_ip">{{ session()->get('user_ip') }}</span>
                                    <button  ><i class="fa fa-retweet"></i></button>
                                    @else  
                                        <button onclick="login_cartBTN()"><i class="fa fa-retweet"></i></button>           
                                    @endif
                                   
                                </li>
                                <li>
                                    @if (session()->has('user_id') && session()->has('user_ip'))
                                    <span style="display: none" id="user_id">{{ session()->get('user_id') }}</span>
                                    <span style="display: none" id="user_ip">{{ session()->get('user_ip') }}</span>
                                    <button onclick="cartBTN({{$item->id}})" ><i class="fa fa-shopping-cart"></i></button>
                                    @else  
                                        <button onclick="login_cartBTN()"><i class="fa fa-shopping-cart"></i></button>
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">{{ $itemm->product_name }}</a></h6>
                            <h5>tk{{ $itemm->product_price }}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    @endforeach
    <!-- Related Product Section End -->
@endsection

@section('script')

    
        @if(session()->has('cart_quantity')) 
            <script>
                Toast.fire({
                    icon: 'success',
                    background: '#ecf0f1',
                    title: '{{ session('cart_quantity') }}',
                })
            </script>
        @endif
        
        <script>
            // Login Notification Start
                function login_cartBTN(){
                    Toast.fire({
                        icon: 'error',
                        background: '#ecf0f1',
                        title: 'Please login your account first!',
                    })
                }
            // Login Notification End
            
            // Get Total Price Start  

                        function total_price(){

                    var user_id = $('#user_id').html();
                    $.ajax({
                        type: "GET",
                        dataType: "json",
                        data: {user_id: user_id},  
                        url: "/cart/total/price",
                        success: function(response){
                            $('#total_price').html(response)
                        },
                    })
                    }

                    total_price();  

            // Get Total Price End

            // Get Cart Quantity Start  

                function cart_quantity(){
                    var user_id = $('#user_id').html();
                    $.ajax({
                        type: "GET",
                        dataType: "json",
                        data: {user_id: user_id},  
                        url: "/cart/quantity",
                        success: function(response){
                            $('#cart_quantity').html(response)
                            
                        },
                    })
                }

                cart_quantity();                    

            // Get Cart Quantity End
            // Wishlist Adding Start
                function wishBTN(id){
                    
                    var user_id = $('#user_id').html();
                    var user_ip = $('#user_ip').html();

                    $.ajax({
                        type: "POST",
                        dataType: "json", 
                        data: {user_id: user_id,user_ip:user_ip},           
                        url: "/wishlist/add/"+id,
                        success: function(response){ 
                        
                        wishlist_count();
                        Toast.fire({
                            icon: 'success',
                            background: '#ecf0f1',
                            title: response.message,
                        })
                                                
                        },
                
                    })
                }
            // Wishlist Adding End
            // Get Wishlist  Start  

                function wishlist_count(){

                var user_id = $('#user_id').html();
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    data: {user_id: user_id},  
                    url: "/wishlist/count",
                    success: function(response){            
                        $('#total_wishlist').html(response)
                    },
                })
                }

                wishlist_count();

            // Get Wishlist  End

             // Cart Adding Start
                    function cartBTN(id){
                    
                    var user_id = $('#user_id').html();
                    var user_ip = $('#user_ip').html();

                    $.ajax({
                        type: "POST",
                        dataType: "json", 
                        data: {user_id: user_id,user_ip:user_ip},           
                        url: "/cart/add/"+id,
                        success: function(response){                        
                            cart_quantity();
                            total_price();
                            Toast.fire({
                                icon: 'success',
                                background: '#ecf0f1',
                                title: response.message,
                            })
                                                
                        },
                
                    })
                }
            // Cart Adding End

        </script>
@endsection