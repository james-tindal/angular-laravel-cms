(function () {
  'use strict';

  angular
    .module('resource')
    .factory('Resource', Resource)

  function Resource($http) {
    return function (name) {
      return {
        all: all,
        create: create,
        delete: del,
        single: single,
        name: name,
        update: update
      };

      function all() {
        return $http.get('/api/' + name);
      }

      function create(userData) {
        return $http.post('/api/' + name, userData);
      }

      function del(id) {
        return $http.delete(sprintf('/api/%s/%s', name, id));
      }

      function single(id) {
        return $http.get(sprintf('/api/%s/%s', name, id));
      }

      function update(id, userData) {
        return $http.put(sprintf('/api/%s/%s', name, id), userData);
      }
    }
  }

})();
