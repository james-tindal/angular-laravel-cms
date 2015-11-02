
(function() {

  'use strict';

  angular
    .module('app')
    .controller('ArticlesController', ArticlesController);

  function ArticlesController($http, $state) {
    var vm = this;

    vm.articles;
    vm.articles;
    vm.error;

    $state.is('articles') ? getArticles() :
    $state.is('article.show') ? getArticle(id) : false;
    ////////////////

    function getArticles() {

      // This request will hit the index method in the AuthenticateController
      // on the Laravel side and will return the list of users
      $http.get('api/articles').success(function(articles) {
        vm.articles = articles.data;
      }).error(function(error) {
        vm.error = error;
      });
    }

    function getArticle(id) {

      // This request will hit the index method in the AuthenticateController
      // on the Laravel side and will return the list of users
      $http.get('api/article/' + id).success(function(article) {
        vm.article = article.data;
      }).error(function(error) {
        vm.error = error;
      });
    }
  }

})();