@extends('users.user_master')

@section('contact_class')
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
      
    
    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>Phone</h4>
                        <p>01681729831</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"></span>
                        <h4>Address</h4>
                        <p>Adabor,Dhaka,Bangladesh</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt"></span>
                        <h4>Open time</h4>
                        <p>10:00 am to 10:00 pm</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>Email</h4>
                        <p>arif@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Map Begin -->
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14605.143049103855!2d90.34589758036894!3d23.77283635325142!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0bcdf50fd59%3A0x9ab0a63bb3267107!2sAdabar%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1601278056297!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        <div class="map-inside">
            <i class="icon_pin"></i>
            <div class="inside-widget">
                <h4>Bangladesh</h4>
                <ul>
                    <li>Phone: 01681729831</li>
                    <li>Add: Adabor,Dhaka,Bangladesh</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Map End -->

    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Leave Message</h2>
                    </div>
                </div>
            </div>
            <form action="{{ route('contact_messages') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <input class="@error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" type="text" placeholder="Your name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input class="@error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" type="text" placeholder="Your Email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-lg-12 text-center">
                        <textarea class="@error('message') is-invalid @enderror" value="{{ old('message') }}" name="message" placeholder="Your message"></textarea>
                        @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <button type="submit" class="site-btn">SEND MESSAGE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Contact Form End -->
           
@endsection

@section('script')

    
        @if(session()->has('message_sent')) 
            <script>
                Toast.fire({
                    icon: 'success',
                    background: '#ecf0f1',
                    title: '{{ session('message_sent') }}',
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