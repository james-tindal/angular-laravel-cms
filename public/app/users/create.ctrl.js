(function() {
  angular
    .module('app.users')
    .controller('userCreateController', userCreateController);


  function userCreateController(Resource) {
    var vm = this;

    vm.type = 'create';

    vm.save = function() {
      vm.processing = true;
      vm.message = '';

      Resource('users').create(vm.userData)
        .success(function(response) {
          vm.processing = false;
          vm.userData = {};
          vm.message = response.message;
        });

    };

  };

})();