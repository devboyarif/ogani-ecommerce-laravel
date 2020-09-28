@extends('users.user_master')

@section('hero')
      <!-- Breadcrumb Section Begin -->
      <section class="breadcrumb-section set-bg" data-setbg="{{ asset('user') }}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Order Complete</h2>                     
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
               
               <div class="col-10">
                <div class="card">
                    
                    <div class="card-body text-center">
                        <h3 class="font-weight-bold text-success">Thanks for complete order.</h3>
                      
                    </div>
                    <div class="card-body">
                        <h3>Your order is now <span class="text-warning font-weight-bold">Pending</span>.</h3>
                        <h3>We'll notify you after some minute.</h3>
                        <h3>For more informations you can call this number <span class="text-info">01681729831</span>.</h3>
                    </div>
                    <div class="card-footer">
                       <a href="{{ url('/') }}" class="btn btn-primary">Continue Shopping</a>                       
                    </div>

                </div>
               </div>
                
            </div>
        </div>
           
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