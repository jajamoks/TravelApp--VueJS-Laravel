<!DOCTYPE html>
<html lang="en">

<head>
<meta name="google-site-verification" content="gbfVvHfItLN-mvHLYPujMdkV95SdkrGqhqMuoDURJi8" />
<script src="https://use.typekit.net/nxt3hwl.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- favicon -->
<link rel="icon" href="/images/favicon.png">
<!-- page title -->
<title>{{ MetaTag::get('title') }}</title>

 {!! MetaTag::tag('description') !!}
 {!! MetaTag::tag('image') !!}

 {!! MetaTag::openGraph() !!}

 {!! MetaTag::twitterCard() !!}

 {{--Set default share picture after custom section pictures--}}
 {!! MetaTag::tag('image') !!}

<link rel="stylesheet" href={{ mix('css/public.css') }} />
<!-- fonts -->
<link rel="stylesheet" type="text/css" href="https://cloud.typography.com/7261976/7928172/css/fonts.css" />

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '692412774197654');
	fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1"
src="https://www.facebook.com/tr?id=692412774197654&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
</head>
<body>
@include('partials.header')
<div class="main-content">
@yield('content')
</div>
@yield('sidemenu')
@include('partials.footer')
@include('partials.newsletter-popup')
@include('cookieConsent::index')
<script>
/*! modernizr 3.6.0 (Custom Build) | MIT *
 * https://modernizr.com/download/?-setclasses !*/
!function(n,e,s){function o(n,e){return typeof n===e}function a(){var n,e,s,a,i,l,r;for(var c in f)if(f.hasOwnProperty(c)){if(n=[],e=f[c],e.name&&(n.push(e.name.toLowerCase()),e.options&&e.options.aliases&&e.options.aliases.length))for(s=0;s<e.options.aliases.length;s++)n.push(e.options.aliases[s].toLowerCase());for(a=o(e.fn,"function")?e.fn():e.fn,i=0;i<n.length;i++)l=n[i],r=l.split("."),1===r.length?Modernizr[r[0]]=a:(!Modernizr[r[0]]||Modernizr[r[0]]instanceof Boolean||(Modernizr[r[0]]=new Boolean(Modernizr[r[0]])),Modernizr[r[0]][r[1]]=a),t.push((a?"":"no-")+r.join("-"))}}function i(n){var e=r.className,s=Modernizr._config.classPrefix||"";if(c&&(e=e.baseVal),Modernizr._config.enableJSClass){var o=new RegExp("(^|\\s)"+s+"no-js(\\s|$)");e=e.replace(o,"$1"+s+"js$2")}Modernizr._config.enableClasses&&(e+=" "+s+n.join(" "+s),c?r.className.baseVal=e:r.className=e)}var t=[],f=[],l={_version:"3.6.0",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(n,e){var s=this;setTimeout(function(){e(s[n])},0)},addTest:function(n,e,s){f.push({name:n,fn:e,options:s})},addAsyncTest:function(n){f.push({name:null,fn:n})}},Modernizr=function(){};Modernizr.prototype=l,Modernizr=new Modernizr;var r=e.documentElement,c="svg"===r.nodeName.toLowerCase();a(),i(t),delete l.addTest,delete l.addAsyncTest;for(var u=0;u<Modernizr._q.length;u++)Modernizr._q[u]();n.Modernizr=Modernizr}(window,document);
</script>
<script src="{{mix('js/manifest.js')}}"></script>
<script src="{{mix('js/vendor.js')}}"></script>
<script src="{{mix('js/public.js')}}"></script>
</body>
<!-- Global Site Tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-27672545-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments)};
  gtag('js', new Date());

  gtag('config', 'UA-27672545-1');
</script>

</html>
