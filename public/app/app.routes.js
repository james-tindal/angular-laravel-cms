angular
  .module('app.routes', ['ngRoute'])

  .config(function($routeProvider, $locationProvider) {

    $routeProvider

      // route for the home page
      .when('/', {
        templateUrl : '/app/home.html'
      })

      // login page
      .when('/login', {
        templateUrl : '/app/auth/login.html',
          controller  : 'mainController',
            controllerAs: 'login'
      })

      // show all users
      .when('/users', {
        templateUrl: '/app/users/views/all.html',
        controller: 'usersController',
        controllerAs: 'users'
      })

      // form to create a new user
      // same view as edit page
      .when('/users/create', {
        templateUrl: '/app/users/views/single.html',
        controller: 'userCreateController',
        controllerAs: 'user'
      })

      // page to edit a user
      .when('/users/:user_id', {
        templateUrl: '/app/users/views/single.html',
        controller: 'userEditController',
        controllerAs: 'user'
      })

      // show all articles
      .when('/articles', {
        templateUrl: '/app/articles/views/all.html',
        controller: 'articlesController',
        controllerAs: 'articles'
      })

      // form to create a new article
      // same view as edit page
      .when('/articles/create', {
        templateUrl: '/app/articles/views/single.html',
        controller: 'articleCreateController',
        controllerAs: 'article'
      })

      // page to edit a article
      .when('/articles/:article_id', {
        templateUrl: '/app/articles/views/single.html',
        controller: 'articleEditController',
        controllerAs: 'article'
      });

    $locationProvider.html5Mode(true);

  });
