(function () {
  'use strict';

  angular.module('app.auth')
    .factory('Auth', Auth);

  function Auth($http, $q, AuthToken) {
    return {
      login: login,
      logout: logout,
      isLoggedIn: isLoggedIn,
      getUser: getUser
    };

    function login(email, password) {

      return $http.post('/api/authenticate', {
          email: email,
          password: password
        })
        .success(function (data) {
          AuthToken.setToken(data.token);
          return data;
        });
    }

    function logout() {
      AuthToken.setToken();
    }

    function isLoggedIn() {
      if (AuthToken.getToken())
        return true;
      else
        return false;
    }

    function getUser() {
      if (AuthToken.getToken())
        return $http.get('/api/me', {cache: true});
      else
        return $q.reject({message: 'User has no token.'});
    }

  }

})();

