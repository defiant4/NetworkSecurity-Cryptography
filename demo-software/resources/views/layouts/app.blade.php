<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Network Security and Crytography</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />

        <link rel="shortcut icon" href="/images/favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="/css/style.css" />
		<link rel="stylesheet" type="text/css" href="/css/animate-custom.css" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="/css/font-awesome.min.css">
        <!-- Sweet Alert 2 -->
        <link rel="stylesheet" type="text/css" href="/css/sweetalert2.min.css" />
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        @yield('head')

    </head>

    <body>
        
        @yield('content')

        <!-- Sweet Alert 2 -->
        <script type="text/javascript" src="/js/sweetalert2.min.js"></script>    
        <script>
            @if(session()->has('error'))
                swal('', "{{ session()->get('error') }}", 'error');
            @endif
        </script>

        <script>
            @if(session()->has('success'))
                swal('', "{{ session()->get('success') }}", 'success');
            @endif
        </script>

        <script type="text/javascript" src="/js/jquery.js"></script>
        
        @yield('scripts')

    </body>

</html>
    

