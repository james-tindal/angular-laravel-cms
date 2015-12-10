angular.module('app')

  .controller('mainController', function ($rootScope, $location, Auth) {
    var vm = this;

    vm.doLogin = function () {
      vm.processing = true;

      vm.error = '';

      Auth.login(vm.loginData.email, vm.loginData.password)
        .success(function (data) {
          vm.processing = false;
          $location.path('/users');
        })
        .error(function (data) {
          vm.processing = false;
          vm.error = data.message;
        });
    };

    vm.doLogout = function () {
      Auth.logout();
      vm.user = '';

      $location.path('/login');
    };

    vm.createSample = function () {
      Auth.createSampleUser();
    };

    //-----------------------------------------------

    vm.loggedIn = Auth.isLoggedIn();

    $rootScope.$on('$routeChangeStart', function () {
      vm.loggedIn = Auth.isLoggedIn();

      Auth.getUser()
        .then(function (data) {
          vm.user = data.data;
        });
    });

  });
