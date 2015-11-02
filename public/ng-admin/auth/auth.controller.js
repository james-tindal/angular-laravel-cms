
(function() {

  'use strict';

  angular
    .module('app.auth')
    .controller('AuthController', AuthController);

  AuthController.$inject = ['$auth', '$state'];
  function AuthController($auth, $state) {
    var vm = this;

    vm.login = login;
    vm.error;
    vm.processing = false;

    function login() {

      vm.processing = true;

      var credentials = {
        email: vm.email,
        password: vm.password
      };

      // Use Satellizer's $auth service to login
      $auth.login(credentials).then(function(data) {
        vm.processing = false;
        // If login is successful, redirect to the users state
        $state.go('articles', {});

      }).catch(function(error) {
        vm.processing = false;
        vm.error = error.data.error;
      });
    }

  }

})();