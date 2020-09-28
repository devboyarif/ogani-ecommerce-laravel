@extends('users.user_master')

@section('home_class')
    active
@endsection

@section('hero')
    <div class="hero__item set-bg" data-setbg="{{asset('user')}}/img/hero/banner.jpg">
        <div class="hero__text">
            <span>FRUIT FRESH</span>
            <h2>Vegetable <br />100% Organic</h2>
            <p>Free Pickup and Delivery Available</p>
            <a href="#" class="primary-btn">SHOP NOW</a>
        </div>
    </div>

@endsection

@section('content')
    
    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach ($product as $item)                                       
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ asset($item->product_image_1) }}">
                            <h5><a href="#">{{ $item->product_name }}</a></h5>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            @foreach ($category as $item)                             
                            <li data-filter=".filter{{ $item->id }}">{{ $item->category_name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach ($category as $cat)     
                    @php
                        $product = App\Models\Product::where('category_id',$cat->id)->get();
                    @endphp   
                            
                   @foreach ($product as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix filter{{ $cat->id }}">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg" data-setbg="{{ asset($item->product_image_1) }}">
                                <ul class="featured__item__pic__hover">
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
                            <div class="featured__item__text">
                                <h6><a target="_blank" href="{{ url('product_details/'.Crypt::encrypt($item->id)) }}">{{ $item->product_name }}</a></h6>
                                <h5>tk {{ $item->product_price }}</h5>
                            </div>
                        </div>
                    </div>
                   @endforeach
                @endforeach
  
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
        <div class="banner mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="banner__pic">
                            <img src="{{ asset('user') }}/img/banner/banner-1.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="banner__pic">
                            <img src="{{ asset('user') }}/img/banner/banner-2.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Banner End -->

@endsection

@section('script')
    
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
                    // data = JSON.parse(response);
                //  console.log(response);
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


  </script>

   @if (session()->has('success')) 
    <script>
        Toast.fire({
            icon: 'success',
            background: '#ecf0f1',
            title: '{{ session('success') }}',
        })
    </script>
    @endif
@endsection