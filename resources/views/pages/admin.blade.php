<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User CRM</title>

    <!-- FOR ANGULAR ROUTING -->
    <base href="/admin/">

    <!-- CSS  -->
    <!-- load bootstrap from CDN and custom CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.1/paper/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.1.1/animate.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">

    <!-- JS -->
    <script src="/js/vendor/sprintf.js"></script>
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/ramda/0.18.0/ramda.min.js"></script>--}}
    <!-- load angular and angular-route via CDN -->
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.8/angular.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.8/angular-route.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.8/angular-animate.js"></script>

    <!-- main Angular app files -->
    <script src="/app/app.js"></script>
    <script src="/app/app.routes.js"></script>
    <script src="/app/MainCtrl.js"></script>
    <script src="/app/resource/Resource.js"></script>
    <script src="/app/resource/ResourceCtrl.js"></script>

    <!-- auth -->
    <script src="/app/auth/auth.js"></script>
    <script src="/app/auth/token.js"></script>
    <script src="/app/auth/interceptor.js"></script>

    <!-- users -->
    <script src="/app/users/users.ctrl.js"></script>
    <script src="/app/users/edit.ctrl.js"></script>
    <script src="/app/users/create.ctrl.js"></script>

    <!-- articles -->
    <script src="/app/articles/articles.ctrl.js"></script>
    <script src="/app/articles/edit.ctrl.js"></script>
    <script src="/app/articles/create.ctrl.js"></script>
    
    <!-- member requests -->
    <script src="/app/member-requests/member-requests.ctrl.js"></script>
    <script src="/app/member-requests/edit.ctrl.js"></script>

</head>
<body ng-app="app" ng-controller="mainCtrl as main">

<!-- NAVBAR -->
<header>
    <div class="navbar navbar-inverse" ng-if="main.loggedIn">
        <div class="container">
            <div class="navbar-header">
                <a href="" class="navbar-brand">Hertfordshire Law Society</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="users"></span>Users</a></li>
                <li><a href="articles"></span>Articles</a></li>
                <li><a href="member-requests"></span>Member Requests</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="navbar-text">Hello @{{ main.user.username }}!</li>
                <li><a ng-click="main.doLogout()">Logout</a></li>
            </ul>
        </div>
    </div>
</header>

<main class="container">
    <div ng-view></div>
</main>

</body>
</html>