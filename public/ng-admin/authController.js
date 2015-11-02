
(function() {

  'use strict';

  angular
    .module('app')
    .controller('AuthController', AuthController);

  AuthController.$inject = ['$auth', '$state'];
  function AuthController($auth, $state) {

    var vm = this;

    vm.error;

    vm.login = function() {

      var credentials = {
        email: vm.email,
        password: vm.password
      };

      // Use Satellizer's $auth service to login
      $auth.login(credentials).then(function(data) {

        // If login is successful, redirect to the users state
        $state.go('users', {});

      }).catch(function(error) {
        vm.error = error.data.error;
      });
    }

  }

})();