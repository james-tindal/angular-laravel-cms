angular
  .module('app', [
    'ngAnimate',

    'app.routes',
    'app.auth',
    'resource',
    'app.articles',
    'app.users',
    'app.memberRequests'
  ])

.config(function($httpProvider) {

	$httpProvider.interceptors.push('AuthInterceptor');

});

angular.module('resource', []);
angular.module('app.auth', []);
angular.module('app.articles', []);
angular.module('app.users', []);
angular.module('app.memberRequests', []);

