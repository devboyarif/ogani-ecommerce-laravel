
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    @include('users.includes.links')

</head>

<body>
    <!-- Page Preloder -->
    {{-- <div id="preloder">
        <div class="loader"></div>
    </div> --}}

    <!-- Humberger Begin -->
    @include('users.includes.top_header') 
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    @include('users.includes.header')
    <!-- Header Section End -->
<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All Category</span>
                    </div>
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
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>01681729831</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
                @yield('hero')
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

    {{-- <!-- Breadcrumbs Section Start -->
        @yield('breadcrumbs')
    <!-- Breadcrumbs Section End --> --}}

    <!-- Main Section Begin -->  
    @yield('content')
    <!-- Main Section End -->  

    <!-- Footer Section Begin -->  
    @include('users.includes.footer')
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    @include('users.includes.script')



</body>

</html>