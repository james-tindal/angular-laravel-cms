(function() {
  'use strict';

  angular
    .module('app.articles')
    .controller('articlesCtrl', articlesCtrl);


  function articlesCtrl(ResourceCtrl, $location) {
    var vm = this;
    var articles = ResourceCtrl('articles', vm, $location);

    vm.delete = articles.delete;

    articles.getAll();

  }

})();