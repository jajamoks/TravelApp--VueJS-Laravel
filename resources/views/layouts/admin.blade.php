<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="E2S Admin">
<meta name="author" content="Escape To Shape">

<!-- favicon -->
<link rel="icon" href="images/favicon.png">
<!-- page title -->
<title>E2S Admin</title>

<link rel="stylesheet" href={{ mix('css/admin.css') }} />
<!-- fonts -->
<link href="https://fonts.googleapis.com/css?family=Lora|Oswald|Prata|Raleway:400,700" rel="stylesheet">
<script type="text/javascript">window._trackJs = { token: '919728384eeb426fa6c01b7705e57bce' };</script>
<script type="text/javascript" src="https://cdn.trackjs.com/releases/current/tracker.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script>
  window.Laravel =  <?php echo json_encode([
      'csrfToken' => csrf_token(),
  ]); ?>
</script>
</head>
<body>


@yield('content')

<script type="text/javascript">
	function closeNav() {
	    $( ".navbar-collapse" ).removeClass("collapse in").addClass("collapse");     
	}
</script>
<script src="{{mix('js/manifest.js')}}"></script>
<script src="{{mix('js/vendor.js')}}"></script>
<script src="{{mix('js/admin.js')}}"></script>
</body>

</html>
