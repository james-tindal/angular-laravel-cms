(function () {

  'use strict';

  angular
    .module('app')
    .config(routes);

  function routes($stateProvider, $urlRouterProvider) {
    // Redirect to the auth state if any other states
    // are requested other than users
    $urlRouterProvider.otherwise('login');

    $stateProvider
      .state('login', {
        url: '/',
        templateUrl: '/ng-admin/auth/login.html',
        controller: 'AuthController as auth'
      })
      .state('users', {
        url: '/users',
        templateUrl: '/ng-admin/users/users.html',
        controller: 'UsersController as users'
      })
      .state('articles', {
        url: '/articles',
        templateUrl: '/ng-admin/articles/all.html',
        controller: 'ArticlesController as articles'
      })
      .state('create-article', {
        url: '/articles/create',
        templateUrl: '/ng-admin/articles/create.html',
        controller: 'ArticlesController as article'
      })
      .state('edit-article', {
        url: '/articles/{id}',
        templateUrl: '/ng-admin/articles/single.html',
        controller: 'ArticlesController as article'
      })
      .state('member-requests', {
        url: '/member-requests',
        templateUrl: '/ng-admin/requests/all.html',
        controller: 'RequestsController as requests'
      })
      .state('manage-member-request', {
        url: '/member-request/{$id}',
        templateUrl: '/ng-admin/requests/single.html',
        controller: 'RequestsController as requests'
      //})
      //.state('enquiries', {
      //  url: '/articles/{id}',
      //  templateUrl: '/ng-admin/articles/edit.html',
      //  controller: 'ArticlesController as article'
      //})
      //.state('events', {
      //  url: '/articles/{id}',
      //  templateUrl: '/ng-admin/articles/edit.html',
      //  controller: 'ArticlesController as article'
      });

  }

})();