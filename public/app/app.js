angular
  .module('app', [
    'ngAnimate',

    'app.routes',
    'app.auth',
    'app.articles',
    'app.users',
  ])

.config(function($httpProvider) {

	$httpProvider.interceptors.push('AuthInterceptor');

});

angular.module('app.core', []);
angular.module('app.auth', []);
angular.module('app.articles', []);
angular.module('app.users', ['app.core']);

