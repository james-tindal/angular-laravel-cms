(function() {
  'use strict';

  angular
    .module('app.memberRequests')
    .controller('memberRequestsCtrl', memberRequestsCtrl);

  function memberRequestsCtrl(ResourceCtrl, $location) {
    var vm = this;
    var memberRequests = ResourceCtrl('member-requests', vm, $location);

    vm.delete = memberRequests.delete;

    memberRequests.getAll();

  }

})();