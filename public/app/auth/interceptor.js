(function () {
  'use strict';

  angular.module('app.auth')
    .factory('AuthInterceptor', AuthInterceptor);

  function AuthInterceptor($q, $location, AuthToken) {
    return {
      request: request,
      responseError: responseError
    };

    function request(config) {

      var token = AuthToken.getToken();

      if (token)
        config.headers['Authorization'] = 'Bearer ' + token;

      return config;
    };

    function responseError(response) {

      if (
        response.status == 403 |
        response.status == 401
      ) {
        AuthToken.setToken();
        $location.path('/login');
      }

      return $q.reject(response);
    };

  };


})();
