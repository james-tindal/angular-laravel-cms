(function() {
  'use strict';

  angular
    .module('app.users')
    .controller('userCreateController', userCreateController);

  function userCreateController(ResourceCtrl, $location) {
    var vm = this;
    var users = ResourceCtrl('users', vm, $location);

    vm.type = 'create';
    vm.save = users.create;

  }

})();