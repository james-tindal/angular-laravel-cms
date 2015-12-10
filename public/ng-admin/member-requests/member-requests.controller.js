
(function() {

  'use strict';

  angular
    .module('app')
    .controller('MemberRequestsController', MemberRequestsController);

  function MemberRequestsController($http, $state, $stateParams, $timeout) {
    var vm = this;

    vm.requests;
    vm.request = {
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



    if( $state.is('member-requests') )
      getMemberRequests();
    if( $state.is('manage-member-request') )
      getMemberRequest();
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

      $http.put('/api/articles/' + $stateParams.id, vm.article).success(function(response) {
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

    function destroy() {
      vm.processingDestroy = true;

      $http.delete('/api/articles/' + $stateParams.id).success(function(response) {
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

    function getMemberRequests() {

      $http.get('/api/articles').success(function(articles) {
        vm.articles = articles.data;
      }).error(function(error) {
        vm.error = error;
      });
    }

    function getMemberRequest() {

      // This request will hit the index method in the AuthenticateController
      // on the Laravel side and will return the list of users
      $http.get('/api/articles/' + $stateParams.id).success(function(article) {
        vm.article = article.data;
      }).error(function(error) {
        vm.error = error;
      });
    }
  }

})();