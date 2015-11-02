<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Hertfordshire Law Society</title>
    <link rel="stylesheet" href="https://bootswatch.com/paper/bootstrap.min.css">
    <link rel="stylesheet" href="/css/admin.css">

    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>--}}
</head>
<body ng-app="app">

<div ui-view></div>

</body>

<script src="{{ asset('js/vendor/angular.min.js') }}"></script>
<script src="{{ asset('js/vendor/angular-ui-router.min.js') }}"></script>
<script src="{{ asset('js/vendor/ui-bootstrap-tpls.min.js') }}"></script>
<script src="{{ asset('js/vendor/satellizer.min.js') }}"></script>
<script src="{{ asset('ng-admin/app.js') }}"></script>
<script src="{{ asset('ng-admin/app.routes.js') }}"></script>
<script src="{{ asset('ng-admin/auth/auth.module.js') }}"></script>
<script src="{{ asset('ng-admin/auth/auth.controller.js') }}"></script>
<script src="{{ asset('ng-admin/userController.js') }}"></script>
<script src="{{ asset('ng-admin/articles/articlesController.js') }}"></script>

</html>