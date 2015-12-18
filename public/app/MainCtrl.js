angular.module('app')

  .controller('mainCtrl', function ($rootScope, $location, Auth) {
    var vm = this;

    vm.doLogin = doLogin;
    vm.doLogout = doLogout;

    vm.loggedIn = Auth.isLoggedIn();

    $rootScope.$on('$routeChangeStart', function () {
      vm.loggedIn = Auth.isLoggedIn();

      Auth.getUser()
        .then(function (data) {
          vm.user = data.data;
        });
    });

    //-----------------------------------------------

    function doLogin() {
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

    function doLogout() {
      Auth.logout();
      vm.user = '';

      $location.path('/login');
    };

  });
