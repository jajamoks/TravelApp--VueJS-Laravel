<!DOCTYPE html>
<html lang="en">

<head>
<meta name="google-site-verification" content="gbfVvHfItLN-mvHLYPujMdkV95SdkrGqhqMuoDURJi8" />
<script src="https://use.typekit.net/nxt3hwl.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Minimal Portfolio Theme">
<meta name="keywords" content="responsive, retina ready, html5, css3, creative, portfolio, bootstrap theme" />
<meta property="og:title" content="Escape to Shape"/>
<meta property="og:site_name" content="Escape to Shape"/>
<meta property="og:description" content="Expertly curated vacations combining yoga + fitness + culture + healthy/delicious cuisine."/>
<meta property="og:type" content="website" />
<meta property="og:image" content=""/>
<meta name="author" content="Escape To Shape">

<!-- favicon -->
<link rel="icon" href="images/favicon.png">
<!-- page title -->
<title>Escape to Shape</title>

<link rel="stylesheet" href={{ mix('css/user.css') }} />
<!-- fonts -->
<link rel="stylesheet" type="text/css" href="https://cloud.typography.com/7261976/7928172/css/fonts.css" />

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
<script src="{{mix('js/manifest.js')}}"></script>
<script src="{{mix('js/vendor.js')}}"></script>
<script src="{{mix('js/user.js')}}"></script>
</body>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-27672545-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments)};
  gtag('js', new Date());
  gtag('config', 'UA-27672545-1');
</script>
</html>
