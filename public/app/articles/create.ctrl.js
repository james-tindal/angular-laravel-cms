(function() {
  angular
    .module('app.articles')
    .controller('articleCreateController', articleCreateController);


  function articleCreateController(Article) {
    var vm = this;

    vm.type = 'create';

    vm.saveArticle = function() {
      vm.processing = true;
      vm.message = '';

      Article.create(vm.articleData)
        .success(function(data) {
          vm.processing = false;
          vm.articleData = {};
          vm.message = data.message;
        });

    };

  };

})();