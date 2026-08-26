<!DOCTYPE html>
<html lang="en">

<meta http-equiv="cache-control" content="private, max-age=0, no-cache">
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="expires" content="0">

<head>
    @include('layout.partials.head')
</head>
@if(!Route::is(['error-404','error-500']))
<body>
    @endif
    @if(Route::is(['error-404','error-500']))
    <body class="error-page">
        @endif
        @if(Route::is(['forgetpassword','resetpassword','signin','signup']))
        <body class="account-page">
            @endif
            @include('layout.partials.loader')
            <!-- Main Wrapper -->
            <div class="main-wrapper">
                @if(!Route::is(['error-404','error-500','forgetpassword','pos','resetpassword','signin','signup']))

                @if(!Route::is(['login']))

                @include('layout.partials.header')
                @include('layout.partials.sidebar')
                
                @endif
                @endif
                @yield('content')
            </div>
            <!-- /Main Wrapper -->
            @include('layout.partials.footer-scripts')
        </body>
</html>
