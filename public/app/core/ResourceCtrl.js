(function () {
  'use strict';

  angular
    .module('app.core')
    .factory('ResourceCtrl', ResourceCtrl)

  function ResourceCtrl(Resource) {
    return function (name, vm, location) {
      return {
        create: create,
        delete: del,
        getAll: getAll,
        getSingle: getSingle,
        update: update
      };

      vm.processing = true;

      function create() {
        vm.processing = true;
        vm.message = '';

        Resource(name).create(vm.data)
          .success(function () {
            vm.processing = false;
            location.path('/' + name);
          })
          .error(function (response) {
            vm.processing = false;
            vm.message = response.message;
          });
      }

      function del(id) {
        Resource(name).delete(id).success(function () {
          getAll();
        });
      }

      function getAll() {
        Resource(name).all().success(function (response) {
          vm.processing = false;
          vm.data = response.data;
        });
      }

      function getSingle(id) {
        Resource(name).single(id).success(function (response) {
          vm.processing = false;
          vm.data = response.data;
        }).error(function () {
          vm.message = response.message;
        });
      }

      function update(id) {
        vm.processing = true;
        vm.message = '';

        Resource(name).update(id, vm.data)
          .success(function () {
            vm.processing = false;
            location.path('/' + name);
          })
          .error(function (response) {
            vm.processing = false;
            vm.message = response.message;
          });
      }

    }
  }

})();
