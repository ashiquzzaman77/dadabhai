<meta charset="utf-8" />
<!--[if IE]>
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1" />

<meta name="csrf-token" content="{{ csrf_token() }}">

<title>Goshop HTML Theme || Home</title>

<!-- Favicon -->
<link rel="apple-touch-icon-precomposed" sizes="144x144"
    href="{{ asset('frontend/assets/ico/apple-touch-icon-144-precomposed.png') }}" />

<link rel="shortcut icon" href="{{ asset('frontend/assets/ico/favicon.ico') }}" />

<!-- CSS Global -->
<link href="{{ asset('frontend/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('frontend/assets/plugins/bootstrap-select-1.9.3/dist/css/bootstrap-select.min.css') }}"
    rel="stylesheet" type="text/css" />

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet"
    type="text/css" />

<link href="{{ asset('frontend/assets/plugins/owl-carousel2/assets/owl.carousel.css') }}" rel="stylesheet"
    type="text/css" />

<link
    href="{{ asset('frontend/assets/plugins/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.min.css') }}"
    rel="stylesheet" type="text/css" />

<link href="{{ asset('frontend/assets/plugins/royalslider/skins/universal/rs-universal.css') }}" rel="stylesheet" />

<link href="{{ asset('frontend/assets/plugins/royalslider/royalslider.css') }}" rel="stylesheet" />

<link href="{{ asset('frontend/assets/plugins/subscribe-better-master/subscribe-better.css') }}" rel="stylesheet"
    type="text/css" />

<!-- Icons Font CSS -->
<link href="{{ asset('frontend/assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"
    type="text/css" />

<!-- Theme CSS -->
<link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('frontend/assets/css/header.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('frontend/assets/css/custom.css') }}" rel="stylesheet" type="text/css" />

<style>
    .search-button {
        display: inline-block;
        font-size: 14px;
        text-align: center;
        color: #ef4416;
    }

    .mglass {
        display: inline-block;
        pointer-events: none;
        -webkit-transform: rotate(-45deg);
        -moz-transform: rotate(-45deg);
        -o-transform: rotate(-45deg);
        -ms-transform: rotate(-45deg);
    }

    .searchbutton {
        font-size: 22px;
        width: 100%;
        cursor: pointer;
        position: relative;
        top: 4px;
    }

    .search:focus+.searchbutton {
        transition-duration: 0.4s;
        -moz-transition-duration: 0.4s;
        -webkit-transition-duration: 0.4s;
        -o-transition-duration: 0.4s;
        /* background-color: white; */
        color: black;
    }

    .search {
        position: absolute;
        right: 30px !important;
        background-color: red;
        outline: none;
        border: none;
        padding: 0;
        width: 0;
        height: 45px;
        top: 20px;
        z-index: 10;
        transition-duration: 0.4s;
        -moz-transition-duration: 0.4s;
        -webkit-transition-duration: 0.4s;
        -o-transition-duration: 0.4s;
    }

    .search:focus {
        width: 363px;
        /* Bar width+1px */
        padding: 0 16px 0 0;
    }

    .expandright {
        left: auto;
        right: 49px;
        /* Button width-1px */
    }

    .expandright:focus {
        padding: 0 0 0 16px;
    }

    /* New */
    .day_container {
        display: flex;
        align-items: baseline;
        padding: 20px;
    }

    .counter-texts {
        margin-bottom: 0px;
    }

    .left_side_border {
        margin-left: 5px;
        color: #eee;
    }

    .counter_container {
        display: flex;
        align-items: baseline;
        padding: 20px;
    }

    /* Hide the default checkbox */
    .switch input[type="checkbox"] {
        display: none;
    }

    /* Style the switch track */
    .switch .slider {
        width: 50px;
        height: 26px;
        background-color: #ccc;
        border-radius: 26px;
        position: relative;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    /* Style the switch thumb (circle) */
    .switch .slider:before {
        content: "";
        position: absolute;
        width: 22px;
        height: 22px;
        border-radius: 50%;
        background-color: #fff;
        top: 2px;
        left: 2px;
        transition: left 0.2s;
    }

    /* Style the checked state */
    .switch input[type="checkbox"]:checked+.slider {
        background-color: #007bff;
    }

    .switch input[type="checkbox"]:checked+.slider:before {
        left: 26px;
    }
</style>
