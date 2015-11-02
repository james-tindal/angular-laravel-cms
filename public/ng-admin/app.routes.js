(function () {

  'use strict';

  angular
    .module('app.routes', [
      'ui.router'
    ])
    .config(routes);

  function routes($stateProvider, $urlRouterProvider) {
    // Redirect to the auth state if any other states
    // are requested other than users
    $urlRouterProvider.otherwise('');

    $stateProvider
      .state('auth', {
        url: '',
        templateUrl: 'ng-admin/views/auth.html',
        controller: 'AuthController as auth'
      })
      .state('root', {
        url: '',
        templateUrl: 'ng-admin/views/root.html'
      })
      .state('users', {
        url: '/users',
        templateUrl: 'ng-admin/views/user.html',
        controller: 'UserController as user'
      });

  }

})();