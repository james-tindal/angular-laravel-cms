(function() {

  'use strict';

  angular
    .module('app', [
      'app.auth',

      'ui.router',
      'ui.bootstrap',
      'satellizer'
    ])
    .config(configure);

  function configure($authProvider, $locationProvider) {

    // Satellizer configuration that specifies which API
    // route the JWT should be retrieved from
    $authProvider.loginUrl = '/api/authenticate';

    $locationProvider.html5Mode(true);

  }


  angular.module('app.auth', []);

})();