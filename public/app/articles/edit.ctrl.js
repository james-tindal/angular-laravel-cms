(function() {
  angular
    .module('app.articles')
    .controller('articleEditController', articleEditController);


  function articleEditController($routeParams, Resource) {
    var vm = this;

    // variable to hide/show elements of the view
    // differentiates between create or edit pages
    vm.type = 'edit';

    // get the article data for the article you want to edit
    // $routeParams is the way we grab data from the URL
    Resource('articles').get($routeParams.article_id)
      .success(function (data) {
        vm.articleData = data;
      });

    vm.savearticle = function () {
      vm.processing = true;
      vm.message = '';

      Resource('articles').update($routeParams.article_id, vm.articleData)
        .success(function (data) {
          vm.processing = false;

          // clear the form
          vm.articleData = {};

          // bind the message from our API to vm.message
          vm.message = data.message;
        });
    };

  };

})();