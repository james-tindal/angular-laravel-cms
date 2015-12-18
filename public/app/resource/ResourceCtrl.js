(function () {
  'use strict';

  angular
    .module('resource')
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
          .then(function () {
            location.path('/' + resource.name);
          })
          .catch(function (response) {
            vm.message = response.data.message;
          })
          .finally(function () {
            vm.processing = false;
          });
      };

      function del(id) {
        resource.delete(id).then(function () {
          getAll();
        });
      };

      function getAll() {
        resource.all()
          .then(function (response) {
            vm.data = response.data.data;
          })
          .catch(function (response) {
            vm.message = response.data.message;
          })
          .finally(function () {
            vm.processing = false;
          });
      }

      function getSingle(id) {
        resource.single(id)
          .then(function (response) {
            vm.data = response.data.data;
          })
          .catch(function (response) {
            vm.message = response.data.message;
          })
          .finally(function () {
            vm.processing = false;
          });
      }

      function update(id) {
        vm.processing = true;
        vm.message = '';

        resource.update(id, vm.data)
          .then(function () {
            location.path('/' + resource.name);
          })
          .catch(function (response) {
            vm.message = response.data.message;
          })
          .finally(function () {
            vm.processing = false;
          });
      }

    }
  }

})();
