(function() {
  'use strict';

  angular
    .module('app.users')
    .controller('userEditController', userEditController);

  function userEditController(Resource, $location, $routeParams) {
    var vm = this;
    var users = Resource('users', vm, $location);

    vm.type = 'edit';
    vm.save = users.update;

    users.getSingle($routeParams.user_id);

  }

})();