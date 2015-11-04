
(function() {

  'use strict';

  angular
    .module('app')
    .controller('UsersController', UsersController);

  function UsersController($http) {

    var vm = this;

    vm.users;
    vm.error;

    vm.getUsers = function() {

      // This request will hit the index method in the AuthenticateController
      // on the Laravel side and will return the list of users
      $http.get('api/users').success(function(users) {
        vm.users = users.data;
      }).error(function(error) {
        vm.error = error;
      });
    }
  }

})();