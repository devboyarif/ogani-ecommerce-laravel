@extends('users.user_master')

@section('hero')
      <!-- Breadcrumb Section Begin -->
      <section class="breadcrumb-section set-bg" data-setbg="{{ asset('user') }}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ url('/') }}">Home</a>
                            <span>Shopping Cart</span>
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
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>                  
                                @if (session()->has('user_id') && session()->has('user_ip'))
                                                            
                                @foreach ($cart as $item)                                                              
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img height="70px" width="70px" src="{{ asset($item->product->product_image_1) }}" alt="">
                                        <h5>{{ $item->product->product_name }}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        tk{{ $item->product_price }}
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <form method="post" action="{{ url('cart/quantity/update/'.$item->id) }}">
                                                @csrf  
                                                <div class="pro-qty">
                                                    <input name="cart_quantity" type="text" value="{{ $item->product_quantity }}">
                                                </div>
                                                <button style="padding: 10px 10px 7px;" type="submit" class="site-btn">Update</button>
                                            </form>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        tk{{ $item->product_quantity*$item->product_price }}
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a onclick="return confirm('Are you sure you want to delete this item?');" href="{{ url('cart/destroy/'.Crypt::encrypt($item->id)) }}">
                                        <span class="icon_close text-danger"></span>
                                        </a>
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
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                           0
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        tk 0.00
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a>
                                        <span class="icon_close"></span>
                                        </a>
                                    </td>
                                </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            @if (session()->has('user_id') && session()->has('user_ip'))
            <span style="display: none" id="user_id">{{ session()->get('user_id') }}</span>
            <span style="display: none" id="user_ip">{{ session()->get('user_ip') }}</span>          
            @endif

            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{ url('/') }}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                       
                    </div>
                </div>

               
                @if (Session::has('coupon'))
                <div class="col-lg-6 mt-5"></div>
                @else
                @php
                $cart_has = App\Models\Cart::where('user_id',session()->get('user_id'))->count();                
                @endphp
                @if ($cart_has != 0)                  
                 <div class="col-lg-6">
                     <div class="shoping__continue">
                         <div class="shoping__discount">
                             <h5>Discount Codes</h5>     
                             <form action="{{ url('coupon/apply') }}" method="POST">
                                 @csrf
                             <input name="coupon_code" type="text" placeholder="Enter your coupon code">
                             <button type="submit" class="site-btn">APPLY COUPON</button>
                         </form>
                         </div>
                     </div>
                 </div>
                @else
                <div class="col-6"></div>
                @endif

                @endif    
                           
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                    @if (session()->has('user_id') && session()->has('user_ip'))
                        @php
                            $sub_total = App\Models\Cart::all()->where('user_id',session()->get('user_id'))->sum(function($tot){
                                return $tot->product_price * $tot->product_quantity;
                            });
                        @endphp
                        @php
                            $cart_has = App\Models\Cart::where('user_id',session()->get('user_id'))->count();                
                        @endphp
                        <ul>
                            @if (Session::has('coupon') && $cart_has != 0)
                                <li>Subtotal <span>tk{{ $sub_total }}</span></li>
                                <li>Coupon Discount <span>{{ session()->get('coupon')['coupon_discount'] }}tk OFF</span></li>         
                                <li>Grand Total <span>tk{{ $sub_total - session()->get('coupon')['coupon_discount'] }}</span></li>         
                            @else             
                                <li>Total <span>tk{{  $sub_total  }}</span></li>
                            @endif
                        </ul>                      
                    @else
                        <ul>                         
                            <li>Total <span>tk0.00</span></li>                      
                        </ul> 
                    @endif
                    @if (session()->has('user_id') && session()->has('user_ip'))
                        @if ($cart_has != 0)   
                            <a href="{{ url('shipping_details/'.Crypt::encrypt(session()->get('user_id')))}}" class="primary-btn">PROCEED TO CHECKOUT</a>
                        @else
                            <a href="javascript:void(0)" class="primary-btn">PROCEED TO CHECKOUT</a>    
                        @endif
                    @endif
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
@endsection

@section('script')
 <script>
     
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

    @if (session()->has('cart_quantity')) 
        <script>
        Toast.fire({
            icon: 'success',
            background: '#ecf0f1',
            title: '{{ session('cart_quantity') }}',
        })
        </script>
    @endif
@endsection