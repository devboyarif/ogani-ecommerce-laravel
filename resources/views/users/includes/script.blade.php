    <script src="{{asset('user')}}/js/jquery-3.3.1.min.js"></script>
    <script src="{{asset('user')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('user')}}/js/jquery.nice-select.min.js"></script>
    <script src="{{asset('user')}}/js/jquery-ui.min.js"></script>
    <script src="{{asset('user')}}/js/jquery.slicknav.js"></script>
    <script src="{{asset('user')}}/js/mixitup.min.js"></script>
    <script src="{{asset('user')}}/js/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @livewireScripts
    <script src="{{asset('user')}}/js/main.js"></script>

    <script>
        // Ajax Setup Start 
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
          // Ajax Setup End

        // Toast Setup Start
        const Toast = Swal.mixin({
          toast: true,
          position: 'top',
          showConfirmButton: false,
          timer: 5000,
          timerProgressBar: true,
        });
        // Toast Setup End
    </script>

    @yield('script')
    