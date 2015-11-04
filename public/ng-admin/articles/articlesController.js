
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
    vm.processing = false;
    vm.processingDestroy = false;
    vm.error;
    vm.success;
    vm.disabled = false;

    vm.update = update;
    vm.create = create;
    vm.destroy = destroy



    if( $state.is('articles') )
      getArticles();
    if( $state.is('edit-article') )
      getArticle();
    ////////////////


    function update() {
      if( vm.article.title == '' ) {
        vm.error = {'message': 'Article must have a title.'};
        $timeout(function() {
          vm.error = false;
        }, 6000);
        return
      }
      vm.processing = true;

      $http.put('api/articles/' + $stateParams.id, vm.article).success(function(response) {
        vm.processing = false;
        vm.error = false;
        vm.success = 'Article updated!';
        $timeout(function() {
          vm.success = false;
        }, 6000);
      }).error(function(error) {
        vm.processing = false;
        vm.error = error;
        vm.success = false;
      });
    }

    function create() {
      if( vm.article.title == '' ) {
        vm.error = {'message': 'Article must have a title.'};
        $timeout(function() {
          vm.error = false;
        }, 6000);
        return
      }
      vm.processing = true;

      $http.post('api/articles', vm.article).success(function(response) {
        vm.processing = false;
        vm.error = false;
        vm.success = 'Article created!';
        console.log(response);

        $timeout(function() {
          $state.go('articles')
        }, 2000);
      }).error(function(error) {
        console.log(error);

        vm.processing = false;
        vm.error = error;
        vm.success = false;
      });
    }

    function destroy() {
      vm.processingDestroy = true;

      $http.delete('api/articles/' + $stateParams.id).success(function(response) {
        $('.modal').modal('hide');
        vm.processingDestroy = false;
        vm.error = false;
        vm.success = 'Article deleted!';
        console.log(response);

        $timeout(function() {
          $state.go('articles')
        }, 2000);
      }).error(function(error) {
        console.log(error);
        $('.modal').modal('hide');

        vm.processingDestroy = false;
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