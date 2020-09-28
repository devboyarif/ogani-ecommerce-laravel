@extends('users.user_master')

@section('shop_class')
    active
@endsection

@section('hero')
      <!-- Breadcrumb Section Begin -->
      <section class="breadcrumb-section set-bg" data-setbg="{{ asset('user') }}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ url('/') }}">Home</a>
                            <span>Shop</span>
                        </div>                  
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
@endsection

@section('content')

        @if (session()->has('user_id') && session()->has('user_ip'))
            <span style="display: none" id="user_id">{{ session()->get('user_id') }}</span>
            <span style="display: none" id="user_ip">{{ session()->get('user_ip') }}</span>          
        @endif
      
      
    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Department</h4>
                            @php
                                $category = App\Models\Category::where('status',1)->get();
                                $category_url = 1;
                            @endphp
                            <ul>
                                @foreach ($category as $item)                       
                                <li><a href="{{ url('categories/'.encrypt($item->id)) }}">{{ $item->category_name }}</a></li>
        
                                @php
                                    $category_url++;
                                @endphp
                                @endforeach
                            </ul>
                        </div>
                        {{-- <div class="sidebar__item">
                            <h4>Price</h4>
                            <div class="price-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="10" data-max="540">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="sidebar__item sidebar__item__color--option">
                            <h4>Colors</h4>
                            <div class="sidebar__item__color sidebar__item__color--white">
                                <label for="white">
                                    White
                                    <input type="radio" id="white">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--gray">
                                <label for="gray">
                                    Gray
                                    <input type="radio" id="gray">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--red">
                                <label for="red">
                                    Red
                                    <input type="radio" id="red">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--black">
                                <label for="black">
                                    Black
                                    <input type="radio" id="black">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--blue">
                                <label for="blue">
                                    Blue
                                    <input type="radio" id="blue">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--green">
                                <label for="green">
                                    Green
                                    <input type="radio" id="green">
                                </label>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <h4>Popular Size</h4>
                            <div class="sidebar__item__size">
                                <label for="large">
                                    Large
                                    <input type="radio" id="large">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="medium">
                                    Medium
                                    <input type="radio" id="medium">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="small">
                                    Small
                                    <input type="radio" id="small">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="tiny">
                                    Tiny
                                    <input type="radio" id="tiny">
                                </label>
                            </div>
                        </div> --}}
                       
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                               
                            </div>
                          
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>{{   $total_product  }}</span> Products found</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                               
                            </div>
                        </div>
                    </>
                    <div class="row">
                        @foreach ($product as $item)  
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ asset($item->product_image_1 ) }}">
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
                                    <h6><a target="_blank" href="{{ url('product_details/'.Crypt::encrypt($item->id)) }}">{{ $item->product_name }}</a></h6>
                                    <h5>tk{{ $item->product_price }}</h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                      
                    </div>
                       {{ $product->links() }} 
                    {{-- <div class="product__pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
           
@endsection

@section('script')

    
        @if(session()->has('order_complete')) 
            <script>
                Toast.fire({
                    icon: 'success',
                    background: '#ecf0f1',
                    title: '{{ session('order_complete') }}',
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