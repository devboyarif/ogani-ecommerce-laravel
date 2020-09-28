@extends('users.user_master')

@section('hero')
      <!-- Breadcrumb Section Begin -->
      <section class="breadcrumb-section set-bg" data-setbg="{{ asset('user') }}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shipping Details</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ url('/') }}">Home</a>
                            <span>Shipping Details</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
@endsection

@section('content')

   
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if (session()->has('user_id') && session()->has('user_ip'))                
                    <h6>
                        <span class="icon_tag_alt"></span> Have a coupon? <a href="{{ url('cart/'.Crypt::encrypt(session()->get('user_id')))  }}">Click here</a> to enter your code
                    </h6>
                    @else 

                    @endif  
                </div>
            </div>
            @if (session()->has('user_id') && session()->has('user_ip'))
                <span style="display: none" id="user_id">{{ session()->get('user_id') }}</span>
                <span style="display: none" id="user_ip">{{ session()->get('user_ip') }}</span>          
            @endif
            <div class="checkout__form">
                <h4>Billing Details</h4>
        
                <form action="{{ url('checkout/done') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>First Name<span>*</span></p>
                                        <input class="@error('fname') is-invalid @enderror" value="{{ old('fname') }}" name="fname" type="text">
                                         @error('fname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input class="@error('lname') is-invalid @enderror" value="{{ old('lname') }}" name="lname" type="text">
                                        @error('lname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input class="@error('address') is-invalid @enderror" value="{{ old('address') }}" name="address" type="text" placeholder="Flat No: / House No: / Road No: /" class="checkout__input__add">
                                @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input class="@error('town') is-invalid @enderror" value="{{ old('town') }}" name="town" type="text">
                                @error('town')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Country/State<span>*</span></p>
                                <input class="@error('country') is-invalid @enderror" value="{{ old('country') }}" name="country" type="text">
                                @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input class="@error('zip') is-invalid @enderror" value="{{ old('zip') }}" name="zip" type="text">
                                @error('zip')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input class="@error('phone') is-invalid @enderror" value="{{ old('phone') }}"  name="phone" type="text">
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input class="@error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" type="text">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                                                
                            {{-- <div class="checkout__input">
                                <p>Order notes<span>*</span></p>
                                <textarea name="order_note" class="form-control" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                
                            </div> --}}
                        </div>
                      
                    @if (session()->has('user_id') && session()->has('user_ip'))
                        @php
                            $sub_total = App\Models\Cart::all()->where('user_id',session()->get('user_id'))->sum(function($tot){
                                return $tot->product_price * $tot->product_quantity;
                            });
                        @endphp
                        @php
                            $cart_has = App\Models\Cart::where('user_id',session()->get('user_id'))->count();                
                        @endphp
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>
                                    @foreach ($cart as $item)     
                                        <li>{{ $item->product->product_name }} <span>tk{{ $item->product_quantity*$item->product_price }}</span></li>                             
                                    @endforeach
                                </ul>

                                @if (Session::has('coupon') && $cart_has != 0)
                                    <div class="checkout__order__subtotal">Subtotal <span>tk{{ $sub_total }}</span></div>
                                    <div class="checkout__order__subtotal">Coupon Discount <span>{{ session()->get('coupon')['coupon_discount'] }} tk OFF</span></div>
                                    <div class="checkout__order__subtotal">Grand Total <span>tk{{ $sub_total - session()->get('coupon')['coupon_discount'] }}</span></div>
                                    <input hidden value="{{ $sub_total - session()->get('coupon')['coupon_discount'] }}" name="total_price">
                                @else             
                                    <input hidden value="{{ $sub_total }}" name="total_price">
                                    <div name="total_price" class="checkout__order__subtotal">Subtotal <span>${{ $sub_total }}</span></div>
                                @endif                       
                            </div>
                           
                                <div class="checkout__order">
                                    <h4>Payment Details</h4>                               
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input value="paypal" name="payment_method" type="radio" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="bkash">
                                        Bkash
                                        <input value="bkash" name="payment_method" type="radio" id="bkash">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="handcash">
                                        Hand Cash
                                        <input value="handcash" name="payment_method" type="radio" id="handcash">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <input name="user_id" hidden value="{{ session()->get('user_id') }}">
                                <input name="user_ip" hidden value="{{ session()->get('user_ip') }}">
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                                </div>
                                   
                        </div>
                        
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
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