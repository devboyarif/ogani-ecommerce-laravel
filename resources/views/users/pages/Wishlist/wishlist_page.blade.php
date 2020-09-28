@extends('users.user_master')

@section('hero')
      <!-- Breadcrumb Section Begin -->
      <section class="breadcrumb-section set-bg" data-setbg="{{ asset('user') }}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Wishlist</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ url('/') }}">Home</a>
                            <span>Wishlist</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
@endsection

@section('content')

        
    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>                             
                                    <th>Product Price</th>
                                    <th>Action</th>                               
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (session()->has('user_id') && session()->has('user_ip'))
                                    @php
                                    $wish_has = App\Models\Wishlist::where('user_id',session()->get('user_id'))->count();                
                                    @endphp
                                @endif
                                @if (session()->has('user_id') && session()->has('user_ip') && $wish_has != 0 )
                                                            
                                @foreach ($wish as $item) 
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <img height="70px" width="70px" src="{{  asset($item->product->product_image_1) }}" alt="">
                                            <h5>{{ $item->product->product_name }}</h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            {{ $item->product->product_price }}
                                        </td>
                                        <td> 
                                            <button onclick="cartBTN({{$item->id}})" style="padding: 10px 10px 7px;" type="submit" class="site-btn fa fa-shopping-cart"> Add to cart</button>
                                        </td>                                     
                                        <td class="shoping__cart__item__close">
                                            <a onclick="return confirm('Are you sure you want to delete this item?');" href="{{ url('wish/destroy/'.Crypt::encrypt($item->id)) }}">
                                            <span class="icon_close text-danger"></span>
                                        </td>
                                    </tr>


                                @endforeach

                                @else
                                <tr>
                                    <td class="shoping__cart__item">                                  
                                        <h5>Not Found</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        tk 0.00
                                    </td>
                                    <td class="shoping__cart__total">
                                        <button style="padding: 10px 10px 7px;" type="button" class="site-btn fa fa-shopping-cart"> Add to cart</button>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a>
                                        <span class="icon_close"></span>
                                        </a>
                                    </td>
                                </tr>
                                @endif
                                @if (session()->has('user_id') && session()->has('user_ip'))
                                <span style="display: none" id="user_id">{{ session()->get('user_id') }}</span>
                                <span style="display: none" id="user_ip">{{ session()->get('user_ip') }}</span>          
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
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
                            // console.log(response);                      
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

            
        </script>
@endsection