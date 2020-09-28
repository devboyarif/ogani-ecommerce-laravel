@extends('users.user_master')

@section('hero')
      <!-- Breadcrumb Section Begin -->
      <section class="breadcrumb-section set-bg" data-setbg="{{ asset('user') }}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Payment Details</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ url('/') }}">Home</a>
                            <span>Payment Details</span>
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
        <div class="container" style="margin-top: 100px;margin-bottom: 100px;">
            <div class="row justify-content-center">
                <div class="col-8">
                  
                    <div class="paymentCont">
                        <div class="headingWrap">
                                <h3 class="headingTop text-center">Select Your Payment Method</h3>	
                                <p class="text-center">You just select one method from below</p>
                        </div>
               
                        <div class="paymentWrap">
                            <div class="btn-group paymentBtnGroup btn-group-justified-centered" data-toggle="buttons">
                                <label class="btn paymentMethod">
                                    <div class="method master-card"></div>
                                    <input onchange="payment_way('master_card')" value="master_card" type="radio"> 
                                </label>
                                <label class="btn paymentMethod active">
                                    <div class="method handcash"></div>
                                    <input onchange="payment_way('handcash')" value="handcash" type="radio"> 
                                </label>
                                <label class="btn paymentMethod">
                                    <div class="method nogod"></div>
                                    <input onchange="payment_way('nagod')" value="nagod" type="radio">
                                </label>
                                    <label class="btn paymentMethod">
                                        <div class="method bkash"></div>
                                    <input onchange="payment_way('bkash')" value="bkash" type="radio"> 
                                </label>
                                <label class="btn paymentMethod">
                                    <div class="method rocket"></div>
                                    <input onchange="payment_way('rocket')" value="rocket" type="radio" > 
                                </label>
                                
                            </div>  
                        </div>

                        {{-- payment method start  --}}                
                        <div class="mb-5">
                            @php
                                $sub_total = App\Models\Cart::all()->where('user_id',session()->get('user_id'))->sum(function($tot){
                                    return $tot->product_price * $tot->product_quantity;
                                });
                            @endphp
                            @php
                                $cart_has = App\Models\Cart::where('user_id',session()->get('user_id'))->count();                
                            @endphp
                                <div id="handcash_payment">
                                    <form action="{{ route('order.place') }}" method="post">
                                    @csrf
                                   
                                    <div class="card" >
                                        <div class="card-header bg-dark text-light">
                                            Cash On Delivery
                                        </div>
                                        <div class="card-body">
                                            <div>
                                                <img src="{{ asset('user/img/payment/cashon.jpg') }}" alt="">        
                                                <p style="border: 2px solid #3498db;display: inline-block;padding: 20px;background: #3498db;color: #ffffff;">Payment Via Cash On Delivery</p>
                                            </div>
                                            <h5 class="card-text"> <i class="fa fa-check"></i> You have don't need to do extra anything. Just Click <span class="font-weight-bold">Finish Order</span>.</h5>
                                            <h3>Note: <p class="d-inline text-danger">You'll recieve your product between two/three days.</p><span class="text-success">Thanks</span></h3>
                                        </div>
                                    </div>
                                    <div class="footerNavWrap clearfix mt-5">
                                        <a href="{{ url('/') }}"> <div class="btn btn-success pull-left btn-fyi"><span class="glyphicon glyphicon-chevron-left"></span> CONTINUE SHOPPING</div></a>
                                        <button type="submit" class="btn btn-success pull-right btn-fyi">Finish Order<span class="glyphicon glyphicon-chevron-right"></span></button>
                                    </div>
                                    <input hidden name="payment_method" type="text" value="Cashon">
                                </form>
                                </div>

                               <div  id="bkash_payment">
                                <form action="{{ route('order.place') }}" method="post">
                                    @csrf
                                <div class="card mb-5">  
                                    <div class="card-header bg-dark text-light">
                                        Bkash Payment
                                    </div>                              
                                    <div class="card-body">
                                        <div>
                                            <img src="{{ asset('user/img/payment/bkash.jpg') }}" alt="">  
                                            <p style="border: 2px solid #3498db;display: inline-block;padding: 20px;background: #3498db;color: #ffffff;">Payment Via Bkash Now</p>
                                        </div>
                                        <h5 class="card-text"> <i class="fa fa-check"></i> Send the total money with charge to the following Bkash Number.</h5><br>
                                        <h5 class="card-text"> <i class="fa fa-check"></i> Then add the transaction number to the following input field.</h5><br>
                                        <h5 class="card-text"> <i class="fa fa-check"></i> Then you Just Click <span class="font-weight-bold">Finish Order</span>.</h5><br>
                                        <h3>Note: <p class="d-inline text-danger">Don't click <span class="font-weight-bold">Finish Order</span> without sending money.</p><span class="text-success">Thanks</span></h3>
                                       <div class="border border-warning text-center bg-warning text-light pt-3 mt-3">

                                        @if (Session::has('coupon') && $cart_has != 0)             
                                            <h4>Bkash Account Type : <span>Personal</span></h4><br>
                                            <h4>Account No. : <span>01681729831</span></h4><br>
                                            <h4>Total Amount : <span>{{ 0.018 * $sub_total - session()->get('coupon')['coupon_discount'] + $sub_total - session()->get('coupon')['coupon_discount'] }}</span></h4><br>
                                            <input name="order_total" value="{{ 0.018 * $sub_total - session()->get('coupon')['coupon_discount'] + $sub_total - session()->get('coupon')['coupon_discount'] }}"> 
                                        @else      
                                            <h4>Bkash Account Type : <span>Personal</span></h4><br>
                                            <h4>Account No. : <span>01681729831</span></h4><br>
                                            <h4>Total Pay ( With Charges ) : <span>{{  0.018 * $sub_total + $sub_total }}</span></h4><br>  
                                            <input hidden name="order_total" value="{{  0.018 * $sub_total + $sub_total }}">      
                                        @endif 

                                       </div>

                                       <div class="form-group row mt-3">
                                        <label class="col-sm-2 col-form-label"><span class="text-dark font-weight-bold">Transaction No</span></label>
                                        <div class="col-sm-10">
                                          <input name="transaction_no" type="text" class="form-control" placeholder="Your Transaction Number">
                                        </div>
                                      </div>

                                    </div>
                                </div>
                                <div class="footerNavWrap clearfix mt-5">
                                    <a href="{{ url('/') }}"> <div class="btn btn-success pull-left btn-fyi"><span class="glyphicon glyphicon-chevron-left"></span> CONTINUE SHOPPING</div></a>
                                    <button type="submit" class="btn btn-success pull-right btn-fyi">Finish Order<span class="glyphicon glyphicon-chevron-right"></span></button>
                                </div>
                                <input hidden name="payment_method" type="text" value="Bkash">
                            </form>
                               </div>

                                <div  id="rocket_payment">
                                    <form action="{{ route('order.place') }}" method="post">
                                        @csrf
                                    <div class="card">
                                        <div class="card-header bg-dark text-light">
                                            Rocket Payment
                                        </div>
                                        <div class="card-body">
                                            <div>
                                                <img  src="{{ asset('user/img/payment/rocket.jpg') }}" alt="">  
                                                <p style="border: 2px solid #3498db;display: inline-block;padding: 20px;background: #3498db;color: #ffffff;">Payment Via Rocket Now</p>
                                            </div>
                                            <h5 class="card-text mt-2"> <i class="fa fa-check"></i> Send the total money with charge to the following Rocket Number.</h5><br>
                                            <h5 class="card-text"> <i class="fa fa-check"></i> Then add the transaction number to the following input field.</h5><br>
                                            <h5 class="card-text"> <i class="fa fa-check"></i> Then you Just Click <span class="font-weight-bold">Finish Order</span>.</h5><br>
                                            <h3>Note: <p class="d-inline text-danger">Don't click <span class="font-weight-bold">Finish Order</span> without sending money.</p><span class="text-success">Thanks</span></h3>
                                           <div class="border border-warning text-center bg-warning text-light pt-3 mt-3">
                                            @if (Session::has('coupon') && $cart_has != 0)             
                                            <h4>Rocket Account Type : <span>Personal</span></h4><br>
                                            <h4>Account No. : <span>01681729831</span></h4><br>
                                            <h4>Total Amount : <span>{{ 0.018 * $sub_total - session()->get('coupon')['coupon_discount'] + $sub_total - session()->get('coupon')['coupon_discount'] }}</span></h4><br>
                                            <input name="order_total" value="{{ 0.018 * $sub_total - session()->get('coupon')['coupon_discount'] + $sub_total - session()->get('coupon')['coupon_discount'] }}"> 
                                            @else      
                                            <h4>Rocket Account Type : <span>Personal</span></h4><br>
                                            <h4>Account No. : <span>01681729831</span></h4><br>
                                            <h4>Total Pay ( With Charges ) : <span>{{  0.018 * $sub_total + $sub_total }}</span></h4><br>   
                                            <input hidden name="order_total" value="{{  0.018 * $sub_total + $sub_total }}">   
                                            @endif 
                                            
                                           </div>
    
                                           <div class="form-group row mt-3">
                                            <label class="col-sm-2 col-form-label"><span class="text-dark font-weight-bold">Transaction No</span></label>
                                            <div class="col-sm-10">
                                              <input name="transaction_no" type="text" class="form-control" placeholder="Your Transaction Number">
                                            </div>
                                          </div>
    
                                        </div>
                                    </div>
                                    <div class="footerNavWrap clearfix mt-5">
                                        <a href="{{ url('/') }}"> <div class="btn btn-success pull-left btn-fyi"><span class="glyphicon glyphicon-chevron-left"></span> CONTINUE SHOPPING</div></a>
                                            <button type="submit" class="btn btn-success pull-right btn-fyi">Finish Order<span class="glyphicon glyphicon-chevron-right"></span></button>
                                    </div>
                                    <input hidden name="payment_method" type="text" value="Rocket">
                                </form>
                                </div>

                               <div  id="nagod_payment">
                                <form action="{{ route('order.place') }}" method="post">
                                    @csrf
                                    <div class="card">
                                        <div class="card-header bg-dark text-light">
                                            Nagod Payment
                                        </div>
                                        <div class="card-body">
                                            <div>
                                                <img width="350px" height="160px" src="{{ asset('user/img/payment/nagod.jpg') }}" alt="">  
                                                <p style="border: 2px solid #3498db;display: inline-block;padding: 20px;background: #3498db;color: #ffffff;">Payment Via Nagod Now</p>
                                            </div>
                                            <h5 class="card-text mt-2"> <i class="fa fa-check"></i> Send the total money with charge to the following Nagod Number.</h5><br>
                                            <h5 class="card-text"> <i class="fa fa-check"></i> Then add the transaction number to the following input field.</h5><br>
                                            <h5 class="card-text"> <i class="fa fa-check"></i> Then you Just Click <span class="font-weight-bold">Finish Order</span>.</h5><br>
                                            <h3>Note: <p class="d-inline text-danger">Don't click <span class="font-weight-bold">Finish Order</span> without sending money.</p><span class="text-success">Thanks</span></h3>
                                        <div class="border border-warning text-center bg-warning text-light pt-3 mt-3">
                                                @if (Session::has('coupon') && $cart_has != 0)             
                                                <h4>Nagod Account Type : <span>Personal</span></h4><br>
                                                <h4>Account No. : <span>01681729831</span></h4><br>
                                                <h4>Total Amount : <span>{{ 0.018 * $sub_total - session()->get('coupon')['coupon_discount'] + $sub_total - session()->get('coupon')['coupon_discount'] }}</span></h4><br>
                                                <input name="order_total" value="{{ 0.018 * $sub_total - session()->get('coupon')['coupon_discount'] + $sub_total - session()->get('coupon')['coupon_discount'] }}"> 
                                                @else      
                                                <h4>Nagod Account Type : <span>Personal</span></h4><br>
                                                <h4>Account No. : <span>01681729831</span></h4><br>
                                                <h4>Total Pay ( With Charges ) : <span>{{  0.018 * $sub_total + $sub_total }}</span></h4><br> 
                                                <input hidden name="order_total" value="{{  0.018 * $sub_total + $sub_total }}"> 
                                                @endif 
                                        
                                        </div>

                                        <div class="form-group row mt-3">
                                            <label class="col-sm-2 col-form-label"><span class="text-dark font-weight-bold">Transaction No</span></label>
                                            <div class="col-sm-10">
                                            <input name="transaction_no" type="text" class="form-control"  placeholder="Your Transaction Number">
                                            </div>
                                        </div>

                                        </div>
                                    </div>
                                    <div class="footerNavWrap clearfix mt-5">
                                        <a href="{{ url('/') }}"> <div class="btn btn-success pull-left btn-fyi"><span class="glyphicon glyphicon-chevron-left"></span> CONTINUE SHOPPING</div></a>
                                        <button type="submit" class="btn btn-success pull-right btn-fyi">Finish Order<span class="glyphicon glyphicon-chevron-right"></span></button>
                                    </div>
                                    <input hidden name="payment_method" type="text" value="Nagod">
                                </form>
                               </div>


                            </div>
                        {{-- payment method end --}}



                       
                    </div>

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

                <div class="col-lg-4 col-md-6" style="margin-top: 15%">
                    <div class="checkout__order">
                        <h4>Your Order</h4>
                        <div class="checkout__order__products">Products <span>Total</span></div>
                        <ul>
                            @foreach ($cart as $item)     
                                <li>{{ $item->product->product_name }} <span>${{ $item->product_quantity*$item->product_price }}</span></li>                             
                            @endforeach
                        </ul>

                        @if (Session::has('coupon') && $cart_has != 0)
                            <div class="checkout__order__subtotal">Subtotal <span>${{ $sub_total }}</span></div>
                            <div class="checkout__order__subtotal">Coupon Discount <span>${{ session()->get('coupon')['coupon_discount'] }} OFF</span></div>
                            <div class="checkout__order__subtotal">Grand Total <span>${{ $sub_total - session()->get('coupon')['coupon_discount'] }}</span></div>
                            <input type="text" value="{{ $sub_total - session()->get('coupon')['coupon_discount'] }}">

                        @else             
                            <div name="total_price" class="checkout__order__subtotal">Subtotal <span>${{ $sub_total }}</span></div>
                            
                        @endif                       
                      
                    </div>      
                </div>

        {{-- </form> --}}
                
            @endif
                
            </div>
        </div>
           
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
            $('#handcash_payment').hide();
            $('#bkash_payment').hide();
            $('#rocket_payment').hide();
            $('#nagod_payment').hide();
           




            function payment_way(method){
                if (method == "handcash") {
                    $('#handcash_payment').show();
                    $('#bkash_payment').hide();
                    $('#rocket_payment').hide();
                    $('#nagod_payment').hide();
                }
                else if(method == "bkash"){
                    $('#bkash_payment').show();
                    $('#handcash_payment').hide();
                    $('#rocket_payment').hide();
                    $('#nagod_payment').hide();
                }
                else if(method == "nagod"){
                    $('#nagod_payment').show();
                    $('#handcash_payment').hide();
                    $('#bkash_payment').hide();
                    $('#rocket_payment').hide();
                }
                else if(method == "rocket"){
                    $('#rocket_payment').show();
                    $('#handcash_payment').hide();
                    $('#bkash_payment').hide();
                    $('#nagod_payment').hide();
                }
                else {
                    $('#handcash_payment').hide();
                    $('#bkash_payment').hide();
                    $('#rocket_payment').hide();
                    $('#nagod_payment').hide();
                    alert('master_card')
                }
            }


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