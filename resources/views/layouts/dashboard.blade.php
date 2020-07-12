<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Welcome to Healthcare</title>

    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">

   

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    @toastr_css
    @stack('css')
</head>
<body >
    <div id="app">


        <div class="mobile-sidebar" id="mobileSidebar" style="width: 0px;">
            @include('partials._mobile-sidebar')
        </div>
        
        <div id="main">
        @include('partials._navbar')

        <main>
            <div class="breadcrumb-bar px-3">
                <div class="container-fluid">
                    @yield('breadcrumbs')
                </div>
            </div>
            <div class="container-fluid py-5">
                <div class="row">
                    <div class="col-md-3">
                        @include('partials._sidebar')
                    </div>
                    <div class="col-md-9 main-content" >
                         @yield('content')
                    </div>
                </div>
            </div>
        </main>
         </div>

        @include('partials._footer')


        @include('modals.find-doctor')
        @include('modals.find-lab')
        @include('modals.find-pharmacy')

      
    </div>

     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}"></script>
     <script src="/js/rater.min.js" data-turbolinks-track="true"></script>  
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>     
     @toastr_js
     @toastr_render

       

     @stack('js')
</body>
</html>
