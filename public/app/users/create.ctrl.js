(function() {
  'use strict';

  angular
    .module('app.users')
    .controller('userCreateController', userCreateController);

  function userCreateController(Resource, $location) {
    var vm = this;
    var users = Resource('users', vm, $location);

    vm.type = 'create';
    vm.save = users.create;

  }

})();