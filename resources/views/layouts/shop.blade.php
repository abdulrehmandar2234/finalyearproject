<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>Price Comparing</title>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @include('frontend.partials.styles')
    @yield('styles')
    @livewireStyles
</head>

<body>

<!-- ========== HEADER ========== -->
@include('frontend.partials.s_header')
<!-- ========== END HEADER ========== -->

<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
    @yield('content')
</main>
<!-- ========== END MAIN CONTENT ========== -->

<!-- ========== FOOTER ========== -->
@include('frontend.partials.footer')
<!-- ========== END FOOTER ========== -->

<!-- ========== SECONDARY CONTENTS ========== -->
<!-- Account Sidebar Navigation -->
@include('frontend.partials.account')
<!-- End Account Sidebar Navigation -->
<!-- ========== END SECONDARY CONTENTS ========== -->
<!-- Go to Top -->
<a class="js-go-to u-go-to" href="#" data-position='{"bottom": 15, "right": 15 }' data-type="fixed"
   data-offset-top="400" data-compensation="#header" data-show-effect="slideInUp" data-hide-effect="slideOutDown">
    <span class="fas fa-arrow-up u-go-to__inner"></span>
</a>
<!-- End Go to Top -->
@include('frontend.partials.scripts')
@yield('scripts')
@livewireScripts
</body>

</html>
