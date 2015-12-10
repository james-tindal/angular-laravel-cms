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
        new: reqNew,
        delete: del,
        getSingle: getSingle,
        edit: edit,
        save: save
      }



      function getAll() {
        reqAll().success(function (response) {
          vm.processing = false;
          vm.data = response.data;
        });
      }

      function del() {
        vm.processing = true;
        reqDelete(id).success(getAll());
      }

      function edit(id) {
        location.path(sprintf('/%s/%s', resource, id))
      }

      function getSingle(id) {
        reqSingle(id).success(function (response) {
          vm.processing = false;
          vm.data = response.data;
        }).error(function () {
          vm.message = response.message;
        });
      }

      function save(id) {
        vm.processing = true;
        vm.message = '';

        reqSave(id, vm.data)
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

      function reqNew(userData) {
        return $http.post('/api/' + resource, userData);
      }

      function reqDelete(id) {
        return $http.delete(sprintf('/api/%s/%s', resource, id));
      }

      function reqSingle(id) {
        return $http.get(sprintf('/api/%s/%s', resource, id));
      }

      function reqSave(id, userData) {
        return $http.put(sprintf('/api/%s/%s', resource, id), userData);
      }
    }
  }

})();
