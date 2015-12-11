(function () {
  'use strict';

  angular
    .module('app.core')
    .factory('ResourceCtrl', ResourceCtrl)

  function ResourceCtrl(Resource) {
    return function (resource, vm, location) {
      resource = Resource(resource);
      vm.processing = true;

      return {
        create: create,
        delete: del,
        getAll: getAll,
        getSingle: getSingle,
        update: update
      };

      function create() {
        vm.message = '';

        resource.create(vm.data)
          .success(function () {
            location.path('/' + resource.name);
          })
          .error(function (response) {
            vm.message = response.message;
          })
          .then(function () {
            vm.processing = false;
          });
      }

      function del(id) {
        resource.delete(id).success(function () {
          getAll();
        });
      }

      function getAll() {
        resource.all()
          .success(function (response) {
            vm.data = response.data;
          })
          .error(function () {
            vm.message = response.message;
          })
          .then(function () {
            vm.processing = false;
          });
      }

      function getSingle(id) {
        resource.single(id)
          .success(function (response) {
            vm.data = response.data;
          })
          .error(function () {
            vm.message = response.message;
          })
          .then(function () {
            vm.processing = false;
          });
      }

      function update(id) {
        vm.processing = true;
        vm.message = '';

        resource.update(id, vm.data)
          .success(function () {
            location.path('/' + resource.name);
          })
          .error(function () {
            vm.message = response.message;
          })
          .then(function () {
            vm.processing = false;
          });
      }

    }
  }

})();
