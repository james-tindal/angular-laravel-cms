(function () {

  'use strict';

  angular
    .module('app')
    .config(routes);

  function routes($stateProvider, $urlRouterProvider) {
    // Redirect to the auth state if any other states
    // are requested other than users

    $urlRouterProvider.otherwise('');
    $stateProvider
      .state('auth', {
        url: '',
        templateUrl: 'ng-admin/auth/auth.html',
        controller: 'AuthController as auth'
      })
      .state('users', {
        url: '/users',
        templateUrl: 'ng-admin/views/user.html',
        controller: 'UserController as user'
      })
      .state('articles', {
        url: '/articles',
        templateUrl: 'ng-admin/articles/all.html',
        controller: 'ArticlesController as articles'
      })
      .state('edit-article', {
        url: '/articles/{id}',
        templateUrl: 'ng-admin/articles/edit.html',
        controller: 'ArticlesController as article'
      });

  }

})();