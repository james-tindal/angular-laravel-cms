(function () {
  'use strict';

  angular.module('app.auth')
    .factory('AuthToken', AuthToken);

  function AuthToken($window) {
    return {
      getToken: getToken,
      setToken: setToken
    };

    function getToken() {
      return $window.localStorage.getItem('token');
    }

    function setToken(token) {
      if (token)
        $window.localStorage.setItem('token', token);
      else
        $window.localStorage.removeItem('token');
    }

  };


})();
