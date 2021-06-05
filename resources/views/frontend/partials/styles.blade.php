<style>
    .wishlist-btn {
        border: none;
        background-color: white;
    }

    .remove_cart {
        border: none;
        background-color: white;
    }

    .list-result {
        position: absolute;
        z-index: 99;
        background: #fff;
        margin: 15px !important;
        border: 1px solid #f1f1f1;
    }

    .list-result ul {
        list-style: none;
        padding: 15px;
        margin: 0;
    }

    .ser-txt-clr {
        font-weight: 600;
        border: none;
        background: transparent;
    }

    .list-result ul li {
        padding: 5px 10px;
    }

    .list-result ul li:hover {
        background-color: #f7f7f7;
    }

    .sear-field {
        position: relative;
    }

    .btn_remove {
        border: none;
        background-color: transparent;
    }

    .scroll::-webkit-scrollbar {
        width: 5px; /* width of the entire scrollbar */
    }

    .scroll::-webkit-scrollbar-thumb {
        background-color: #fed700; /* color of the scroll thumb */
        border-radius: 20px; /* roundness of the scroll thumb */

    }

    .scroll {
        height: 150px;
        overflow-y: scroll;
    }

</style>

<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('favicon.png') }}">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap"
      rel="stylesheet">

<!-- CSS Implementing Plugins -->
<link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/fontawesome-all.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/font-electro.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/ion-rangeslider/css/ion.rangeSlider.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/animate.css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/hs-megamenu/src/hs.megamenu.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/fancybox/jquery.fancybox.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/slick-carousel/slick/slick.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
<!-- CSS Electro Template -->
<link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script src="{{ asset('js/app.js') }}" defer></script>
