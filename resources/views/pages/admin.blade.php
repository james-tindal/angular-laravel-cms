<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Angular-Laravel Authentication</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/admin.css">
</head>
<body ng-app="app">

    <div ui-view></div>

</body>

<script src="{{ asset('js/vendor/angular.min.js') }}"></script>
<script src="{{ asset('js/vendor/angular-ui-router.min.js') }}"></script>
<script src="{{ asset('js/vendor/satellizer.min.js') }}"></script>
<script src="{{ asset('ng-admin/app.js') }}"></script>
<script src="{{ asset('ng-admin/app.routes.js') }}"></script>
<script src="{{ asset('ng-admin/authController.js') }}"></script>
<script src="{{ asset('ng-admin/userController.js') }}"></script>

</html>