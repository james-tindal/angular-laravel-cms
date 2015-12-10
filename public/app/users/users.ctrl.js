(function() {
  'use strict';

  angular
    .module('app.users')
    .controller('usersController', usersController);

  function usersController(Resource, $location) {
    var vm = this;
    var users = Resource('users', vm, $location);

    vm.deleteUser = users.delete;
    vm.editUser = users.edit;

    users.getAll();

  };

})();