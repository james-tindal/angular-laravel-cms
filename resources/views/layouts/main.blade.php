<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/style.css">
    <!--[if !IE 7]><style>#wrap{display:table;height:100%}</style><![endif]-->
    <!--[if lt IE 9]><script src="js/vendor/selectivizr-1.0.2.min.js"></script><![endif]-->
    @yield('head')
  </head>
  <body>
    <!--[if lt IE 9]>
      <div class="browsehappy">
        <p>
          You are using an <strong>outdated</strong> browser. Please <a href="//browsehappy.com/" target="_blank">upgrade your browser</a> to improve your experience.
        </p>
      </div>
    <![endif]-->

    <div class="wrap">
    <header>
      <nav>
        <ul>
          <li><a href="/about-us">About Us</a></li>
          <li><a href="/news">News</a></li>
          <li><a href="/events-and-training">Events &amp; Training</a></li>
          <li class="logo">
            <a href="/"><img src="/img/logo.png" alt="Home"></a></li>
          <li><a href="/become-a-member">Become a Member</a></li>
          <li><a href="/contact-us">Contact Us</a></li>
          <li><a href="/member-area">Member Area</a></li>
        </ul>
      </nav>
      @yield('header')
    </header>

    <main>
      @yield('main')
    </main>
    </div>

    <footer>

      <div class="footer__left">
        <a href="/" class="logo"><img src="/img/logo.png"></a>
        <p>The Hertfordshire Law Society founded in 1883 is the professional body for solicitors practising or living within Hertfordshire providing valuable benefits to its members including local CPD training, social activities and a regular newsletter.</p>
      </div>

      <div class="footer__right">

        <nav>
          <ul>
            <li><a href="/about-us">About Us</a></li>
            <li><a href="/news">News</a></li>
            <li><a href="/events-and-training">Events &amp; Training</a></li>
            <li><a href="/become-a-member">Become a Member</a></li>
            <li><a href="/contact-us">Contact Us</a></li>
            <li><a href="/member-area">Member Area</a></li>
          </ul> 
        </nav>
        <div>
          <a class="become-a-member-button" href="/become-a-member">Become a member</a>
          <p>Copyright Hertfordshire Law Society 2015.</p>
        </div>

      </div>

    </footer>


    <!--[if lt IE 9]>
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.min.js"><\/script>')</script>
    <![endif]-->
    <!--[if gt IE 8]><!-->
      <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script>window.jQuery || document.write('<script src="js/vendor/jquery-2.1.1.min.js"><\/script>')</script>
    <!--<![endif]-->
    @yield('foot')
  </body>
</html>