(function () {
  'use strict';

  angular
    .module('app.core')
    .factory('Resource', Resource)

  function Resource($http) {
    return function (resource, vm, location) {
      vm.processing = true;

      return {
        getAll: getAll,
        create: create,
        delete: del,
        getSingle: getSingle,
        update: update
      }


      function getAll() {
        reqAll().success(function (response) {
          vm.processing = false;
          vm.data = response.data;
        });
      }

      function del(id) {
        reqDelete(id).success(function () {
          getAll();
        });
      }

      function getSingle(id) {
        reqSingle(id).success(function (response) {
          vm.processing = false;
          vm.data = response.data;
        }).error(function () {
          vm.message = response.message;
        });
      }

      function update(id) {
        vm.processing = true;
        vm.message = '';

        reqUpdate(id, vm.data)
          .success(function () {
            vm.processing = false;
            location.path('/' + resource);
          })
          .error(function (response) {
            vm.processing = false;
            vm.message = response.message;
          });
      }
      
      function create() {
        vm.processing = true;
        vm.message = '';

        reqCreate(vm.data)
          .success(function () {
            vm.processing = false;
            location.path('/' + resource);
          })
          .error(function (response) {
            vm.processing = false;
            vm.message = response.message;
          });
      }


      // -------------------------------------------------

      function reqAll() {
        return $http.get('/api/' + resource);
      }

      function reqCreate(userData) {
        return $http.post('/api/' + resource, userData);
      }

      function reqDelete(id) {
        return $http.delete(sprintf('/api/%s/%s', resource, id));
      }

      function reqSingle(id) {
        return $http.get(sprintf('/api/%s/%s', resource, id));
      }

      function reqUpdate(id, userData) {
        return $http.put(sprintf('/api/%s/%s', resource, id), userData);
      }
    }
  }

})();
