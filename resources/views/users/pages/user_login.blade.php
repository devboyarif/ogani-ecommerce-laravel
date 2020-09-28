@extends('users.user_master')

@section('content')
               <!-- login area start -->
               <div class="login-register-area mb-60px mt-53px">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                            <div class="login-register-wrapper" style="margin-top: -110px;">
                                <div class="login-register-tab-list nav">
                                    <a class="active" data-toggle="tab" href="#lg1">
                                        <h4>login</h4>
                                    </a>
                                    <a data-toggle="tab" href="#lg2">
                                        <h4>register</h4>
                                    </a>
                                </div>
                                <div class="tab-content">
                                    <div id="lg1" class="tab-pane active">
                                        <div class="login-form-container">
                                            <div class="login-register-form">
                                                @if (session()->has('login_error')) 
                                                    <div class="alert alert-danger" role="alert">
                                                        <span>{{ session('login_error') }}</span>
                                                    </div>
                                                @endif
                                                @livewire('login')
                                            </div>
                                        </div>
                                    </div>
                                    <div id="lg2" class="tab-pane">
                                        <div class="login-form-container">
                                            <div class="login-register-form">
                                               @livewire('register')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- login area end -->
@endsection

@section('script')

    @if (session()->has('success')) 
    <script>
        Toast.fire({
            icon: 'success',
            background: '#ecf0f1',
            title: "You're successfully registered!",
        })
    </script>
    @endif
  
@endsection