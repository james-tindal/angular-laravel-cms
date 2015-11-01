<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Angular-Laravel Authentication</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/admin.css">
</head>
<body ng-app="authApp">

    <div class="container">
        <div ui-view></div>
    </div>

</body>

<script src="{{ asset('js/vendor/angular.min.js') }}"></script>
<script src="{{ asset('js/vendor/angular-ui-router.min.js') }}"></script>
<script src="{{ asset('js/vendor/satellizer.min.js') }}"></script>
<script src="{{ asset('js/admin/app.js') }}"></script>
<script src="{{ asset('js/admin/authController.js') }}"></script>
<script src="{{ asset('js/admin/userController.js') }}"></script>

</html>