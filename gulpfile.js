var elixir = require('laravel-elixir');

var gulp = require('gulp');
var stylus = require('gulp-stylus');
var koutoswiss = require('kouto-swiss');
var jeet = require('jeet');

require("laravel-elixir-babel");


gulp.task('stylus', function () {
  gulp.src('./resources/assets/stylus/style.styl')
    .pipe(stylus({
      use: [jeet(), koutoswiss()]
    }))
    .pipe(gulp.dest('./public/css'));
});

elixir(function (mix) {
  //mix
  //  .styles([
  //    'style.css'
  //  ])
  //  .scripts([
  //    'libs/**/*.js',
  //    'app.js',
  //    'appRoutes.js',
  //    'controllers/**/*.js',
  //    'services/**/*.js',
  //    'directives/**/*.js'
  //  ])
  //  .version([
  //    'css/all.css',
  //    'js/all.js'
  //  ])
  //  .copy(
  //  'public/js/all.js.map', 'public/build/js/all.js.map'
  //)
  //  .copy(
  //  'public/css/all.css.map', 'public/build/css/all.css.map'
  //);
  mix.phpUnit();

  mix.babel("app.js", {
    srcDir: "resources/js",
    output: "public/js",
    sourceMaps: true
  });
});