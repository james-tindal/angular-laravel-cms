(function() {
  'use strict';

  angular
    .module('app.articles')
    .controller('articleEditController', articleEditController);

  function articleEditController(ResourceCtrl, $location, $routeParams) {
    var vm = this;
    var articles = ResourceCtrl('articles', vm, $location);

    vm.type = 'edit';
    vm.save = articles.update;

    articles.getSingle($routeParams.article_id);

  }

})();