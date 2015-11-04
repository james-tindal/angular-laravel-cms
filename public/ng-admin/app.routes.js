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
        templateUrl: 'ng-admin/users/users.html',
        controller: 'UsersController as users'
      })
      .state('articles', {
        url: '/articles',
        templateUrl: 'ng-admin/articles/all.html',
        controller: 'ArticlesController as articles'
      })
      .state('create-article', {
        url: '/articles/create',
        templateUrl: 'ng-admin/articles/create.html',
        controller: 'ArticlesController as article'
      })
      .state('edit-article', {
        url: '/articles/{id}',
        templateUrl: 'ng-admin/articles/edit.html',
        controller: 'ArticlesController as article'
      });

  }

})();