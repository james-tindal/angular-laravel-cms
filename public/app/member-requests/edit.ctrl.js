(function() {
  'use strict';

  angular
    .module('app.memberRequests')
    .controller('memberRequestEditCtrl', memberRequestEditCtrl);

  function memberRequestEditCtrl(ResourceCtrl, $location, $routeParams) {
    var vm = this;
    var memberRequests = ResourceCtrl('member-requests', vm, $location);

    vm.save = memberRequests.update;

    memberRequests.getSingle($routeParams.id);

  }

})();