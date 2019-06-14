<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8"> 
    <!-- Site Title -->
    <title>@yield('title') -- BRYTA shop</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
        <!--
        CSS
        ============================================= -->
        <link rel="stylesheet" href="{{url('css/linearicons.css')}}">
        <link rel="stylesheet" href="{{url('css/owl.carousel.css')}}">            
        <link rel="stylesheet" href="{{url('css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{url('css/nice-select.css')}}">
        <link rel="stylesheet" href="{{url('css/ion.rangeSlider.css')}}" />
        <link rel="stylesheet" href="{{url('css/ion.rangeSlider.skinFlat.css')}}" />
        <link rel="stylesheet" href="{{url('css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{url('css/main.css')}}">
        @yield('pagecss')
    </head>
    <body>

        <!-- Start Header Area -->
        @include('partials.header')
        <!-- End Header Area -->

        @yield('banner')
        <!-- Start Banner Area -->
        <!-- End Banner Area -->
        @include('flash::message')
        @yield('content')
        <!-- Start Cart Area -->
        <!-- End Cart Area -->

        @yield('searched')
        <!-- Start Most Search Product Area -->
        <!-- End Most Search Product Area -->

        <!-- start footer Area -->   
        @include('partials.footer')   
        <!-- End footer Area -->    

        <input type="hidden" id="base" value="{{url('')}}">    

        <script src="{{url('js/vendor/jquery-2.2.4.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="{{url('js/vendor/bootstrap.min.js')}}"></script>
        <script src="{{url('js/jquery.ajaxchimp.min.js')}}"></script>
        <script src="{{url('js/jquery.nice-select.min.js')}}"></script>
        <script src="{{url('js/jquery.sticky.js')}}"></script>
        <script src="{{url('js/ion.rangeSlider.js')}}"></script>
        <script src="{{url('js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{url('js/owl.carousel.min.js')}}"></script>            
        <script src="{{url('js/main.js')}}"></script>
        <script>
            $('div.alert').not('.alert-important').delay(10000).fadeOut(350);
        </script>  
        <script>
            const base = document.getElementById('base').value;
            console.log(base);
            $('document').ready(function() {
                cart_count();
                let timeId = setInterval(function() {
                    $('#cart_count').load(base+'/cart/counter?randval='+Math.random());
                }, 2000);
            })
            function cart_count() {
                $('#cart_count').load(base+'/cart/counter');
        
            }
            
            function addcart(product_id) {
            console.log(product_id);
            let feedback = document.getElementById('cart_feedback'+product_id);
            feedback.innerHTML = '<div class="alert alert-info"><button type="button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>processing...</div>';
              $('#cart_feedback'+product_id).load(base+'/product/cart/'+product_id);
              cart_count();
            }


        </script>
        @yield('scripts')
    </body>
</html>