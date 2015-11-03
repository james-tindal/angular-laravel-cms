
(function() {

  'use strict';

  angular
    .module('app')
    .controller('ArticlesController', ArticlesController);

  function ArticlesController($http, $state, $stateParams, $timeout) {
    var vm = this;

    vm.articles;
    vm.article = {
      title: '',
      brief: '',
      extended: '',
      archived: 0
    };
    vm.processingUpdate = false;
    vm.error;
    vm.success;

    vm.update = update;
    vm.create = create;



    if( $state.is('articles') )
      getArticles();
    if( $state.is('edit-article') )
      getArticle();
    ////////////////


    function update() {
      vm.processingUpdate = true;
      $http.put('api/articles/' + $stateParams.id, vm.article).success(function(response) {
        vm.processingUpdate = false;
        vm.error = false;
        vm.success = true;
        $timeout(function() {
          vm.success = false;
        }, 6000);
      }).error(function(error) {
        vm.processingUpdate = false;
        vm.error = error;
        vm.success = false;
      });
    }

    function create() {
      vm.processingUpdate = true;
      $http.post('api/articles', vm.article).success(function(response) {
        vm.processingUpdate = false;
        vm.error = false;
        vm.success = true;
        console.log(response);

        $timeout(function() {
          vm.success = false;
        }, 6000);
      }).error(function(error) {
        console.log(error);

        vm.processingUpdate = false;
        vm.error = error;
        vm.success = false;
      });
    }

    function getArticles() {

      // This request will hit the index method in the AuthenticateController
      // on the Laravel side and will return the list of users
      $http.get('api/articles').success(function(articles) {
        vm.articles = articles.data;
      }).error(function(error) {
        vm.error = error;
      });
    }

    function getArticle() {

      // This request will hit the index method in the AuthenticateController
      // on the Laravel side and will return the list of users
      $http.get('api/articles/' + $stateParams.id).success(function(article) {
        vm.article = article.data;
      }).error(function(error) {
        vm.error = error;
      });
    }
  }

})();