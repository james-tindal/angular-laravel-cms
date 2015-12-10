(function () {
  'use strict';

  angular
    .module('app.core')
    .factory('Resource', Resource)

  function Resource($http) {
    return function (resource, vm) {
      return {
        getAll: getAll,
        new: reqNew,
        delete: del,
        single: single,
        edit: edit
      }

      vm.processing = true;

      function getAll() {
        reqAll().success(function (response) {
          vm.processing = false;
          vm.users = response.data;
        });
      }

      function del() {
        vm.processing = true;
        reqDelete(id).success(getAll());
      }

      function edit(id) {
        $location.path('/users/' + id)
      }

      function single() {

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

      function reqGet(id) {
        return $http.get(sprintf('/api/%s/%s', resource, id));
      }

      function reqUpdate(id, userData) {
        return $http.put(sprintf('/api/%s/%s', resource, id), userData);
      }
    }
  }

})();
