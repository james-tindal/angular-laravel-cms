angular
  .module('app.routes', ['ngRoute'])

  .config(function ($routeProvider, $locationProvider) {

    $routeProvider

    // route for the home page
      .when('/', {
        templateUrl: '/app/home.html',
      })

      // login page
      .when('/login', {
        templateUrl: '/app/auth/login.html',
        controller: 'mainCtrl',
        controllerAs: 'login'
      })

      // articles
      .when('/articles', {
        templateUrl: '/app/articles/views/all.html',
        controller: 'articlesCtrl',
        controllerAs: 'articles'
      })
      .when('/articles/create', {
        templateUrl: '/app/articles/views/single.html',
        controller: 'articleCreateCtrl',
        controllerAs: 'article'
      })
      .when('/articles/:id', {
        templateUrl: '/app/articles/views/single.html',
        controller: 'articleEditCtrl',
        controllerAs: 'article'
      })

      // users
      .when('/users', {
        templateUrl: '/app/users/views/all.html',
        controller: 'usersCtrl',
        controllerAs: 'users'
      })
      .when('/users/create', {
        templateUrl: '/app/users/views/single.html',
        controller: 'userCreateCtrl',
        controllerAs: 'user'
      })
      .when('/users/:id', {
        templateUrl: '/app/users/views/single.html',
        controller: 'userEditCtrl',
        controllerAs: 'user'
      })

      // member-requests
      .when('/member-requests', {
        templateUrl: '/app/member-requests/views/all.html',
        controller: 'memberRequestsCtrl',
        controllerAs: 'memberRequests'
      })
      .when('/member-requests/:id', {
        templateUrl: '/app/member-requests/views/single.html',
        controller: 'memberRequestEditCtrl',
        controllerAs: 'memberRequest'
      })

      .otherwise('/');

    $locationProvider.html5Mode(true);

  });
