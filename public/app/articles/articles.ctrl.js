(function() {
  'use strict';

  angular
    .module('app.articles')
    .controller('articlesController', articlesController);


  function articlesController(Resource, $location) {
    var vm = this;

    vm.deleteArticle = deleteArticle;
    vm.processing = true;
    vm.editArticle = editArticle;


    getArticles();

    //-------------------------------

    function deleteArticle(id) {
      vm.processing = true;

      Resource('articles').delete(id)
        .success(getArticles());
    };

    function editArticle(id) {
      $location.path('/articles/' + id)
    }

    function getArticles() {
      Resource('articles').all()
        .success(function (data) {
          vm.processing = false;
          vm.articles = data;
        });
    }

  };

})();