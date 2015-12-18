(function() {
  'use strict';

  angular
    .module('app.users')
    .controller('usersCtrl', usersCtrl);

  function usersCtrl(ResourceCtrl, $location) {
    var vm = this;
    var users = ResourceCtrl('users', vm, $location);

    vm.delete = users.delete;

    users.getAll();

  }

})();