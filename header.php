<?php

/**

* The Header template for our theme

*

* Displays all of the <head> section and everything up till <div id="main">

*

* @package WordPress

* @subpackage Talent Association
* @since Talent Association

*/

?>

<!DOCTYPE html>
<html class="ie ie7" <?php language_attributes(); ?>>
<html class="ie ie8" <?php language_attributes(); ?>>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<title><?php bloginfo('name'); ?></title>


<?php wp_head(); ?>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/main.css">
<link href="<?php bloginfo('template_url'); ?>/css/raskin_about_v01.css" type="text/css" rel="stylesheet"/>
<!-- before custom -->
<style>
.quicklinks-menu{padding-top:0px;}
.logo_header{margin-bottom:0px;}
.site-header__inner{padding-top:10px;}
.page-content__content__main-content--fixed-width{width:100% !important;}
.page-content__heading{margin:20px 0 24px;}
.page-content{margin:0px 0px 0px 0px !important}
.product-series__information-link-wrap a{
font-size: 14px;
padding: 7px 13px;
background-color: #04bbe2;
border: 1px solid #1393ae;
color: white;
line-height: 1.5;
-webkit-box-shadow: 0px 0px 4px rgba(146, 146, 146, 0.2);
-moz-box-shadow: 0px 0px 4px rgba(146, 146, 146, 0.2);
box-shadow: 0px 0px 4px rgba(146, 146, 146, 0.2);
-webkit-transition: all 1s;
-moz-transition: all 1s;
-o-transition: all 1s;
transition: all 1s;
-webkit-transition-duration: 50;
-moz-transition-duration: 50;
-o-transition-duration: 50;
transition-duration: 50;
-webkit-transition-property: background-color;
-moz-transition-property: background-color;
-o-transition-property: background-color;
transition-property: background-color;
-webkit-border-radius: 2px;
-moz-border-radius: 2px;
-ms-border-radius: 2px;
-o-border-radius: 2px;
border-radius: 2px;
-webkit-background-clip: padding;
-moz-background-clip: padding;
background-clip: padding-box;
}

.product-series__information-link-wrap a:hover{
background-color: #1393ae;
color: white;
text-decoration: none;
}
li[data-path="/Raskin/home/campaign"] > a {font-weight:bold;}
.panel-page .videomodal__iframe{height: 360px;width: 100%;}
</style>
</head>


<script>
var GoogleAnalitycsRollupId = 'UA-25345797-1';
var GoogleAnalitycsId = 'UA-28029223-1';
var GoogleAnalitycsScriptUrl = '.google-analytics.com/ga.js';
var is404ErrorPage = false;
var pageTrackingUrl = '/d/ar-ae/Raskin/about-Raskin';

if (GoogleAnalitycsRollupId) {
var _gaq = _gaq || [];
_gaq.push(['myTracker._setAccount', GoogleAnalitycsRollupId]);
_gaq.push(['myTracker._setDomainName', 'none']);
_gaq.push(['myTracker._setAllowLinker', true]);


if (is404ErrorPage) {
_gaq.push(['myTracker._trackPageview','_trackPageview','/404error/?page-requested=' + document.location.pathname + document.location.search + '&referrer=' + document.referrer]);
} else {
_gaq.push(['myTracker._trackPageview', pageTrackingUrl]);
}

(function () {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
}
if (GoogleAnalitycsId) {
var _gaq = _gaq || [];
_gaq.push(['_setAccount', GoogleAnalitycsId]);


if (is404ErrorPage) {
_gaq.push(['_trackPageview', '/404error/?page-requested=' + document.location.pathname + document.location.search + '&referrer=' + document.referrer]);
} else {
_gaq.push(['_trackPageview', pageTrackingUrl]);
}

(function () {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;

if (GoogleAnalitycsScriptUrl.trim() == 'stats.g.doubleclick.net/dc.js') {
ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
} else {
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + GoogleAnalitycsScriptUrl;    
}

if (GoogleAnalitycsScriptUrl === '') 
return;

var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
}
</script>

<script src="/Components/Project/Design/Scripts/vendor/modernizr-2.6.2.min.js"></script>
<!--[if lt IE 9]>
<script src="/Components/Project/Design/Scripts/vendor/html5shiv.js"></script>
<![endif]-->
<meta property="og:image" content="http://www.boconcept.com/-/media/campaigns/springmm/frontpage/competitiontopheader.jpg" /></head>
<body class="article-page-with-narrow-left-column ">
<form method="post" action="/en-us/boconcept/about-boconcept" id="mainform">
<div class="aspNetHidden">
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUJODU2ODE1ODU1DxYCHhNWYWxpZGF0ZVJlcXVlc3RNb2RlAgEWBGYPZBYCAgMPZBYCZg9kFgJmDxYCHgdWaXNpYmxlaBYCZg8VAQBkAgEQZGQWAgIBDxYCHwFoZGR2SsLo2Jgrtka8pRu3Dqq6016yDQ==" />
</div>

<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->
<div class="site-main-wrapper">


<header>

<div class="site-header__inner">
<div class="content">
<h1 class="logo_header"><a href="<?php echo get_site_url(); ?>" class="no-underline-link">
	<img src="http://progressivewavedesigns.com/raskin/en/gallery/images/raskin_logo_halfsize.jpg">
	</a></h1>
<ul class="quicklinks-menu">
<li>
<a href="<?php echo get_site_url(); ?>">SEARCH</a>
</li> 

<li>
<a href="<?php echo get_site_url(); ?>/order-accessories">ORDER ACCESSORIES</a>
</li> 

<li><a href="<?php echo get_site_url(); ?>/elevations">DESIGN A ROOM</a></li>

</ul>
</div>
<div class="site-navigation-wrapper">
<div class="site-navigation-inner js-navigation" data-path="/Raskin/home/Raskin/about Raskin">


<nav class="site-navigation">
<ul class="site-navigation__list">

</ul>
</nav>

</div>
</div>
</header>