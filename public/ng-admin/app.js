
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

  function configure($authProvider) {

      // Satellizer configuration that specifies which API
      // route the JWT should be retrieved from
      $authProvider.loginUrl = '/api/authenticate';

    }

})();