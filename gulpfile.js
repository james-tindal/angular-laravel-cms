var gulp = require('gulp'),
  gutil = require('gulp-util'),
	plumber = require('gulp-plumber'),
	nodemon = require('gulp-nodemon'),
  minifyCSS = require('gulp-minify-css'),
  sourcemaps = require('gulp-sourcemaps'),
	stylus = require('gulp-stylus'),
	jeet = require('jeet'),
	koutoswiss = require('kouto-swiss'),
  phpunit = require('gulp-phpunit');

var onError = function (err) {
  gutil.beep();
  console.log(err);
};

gulp.task('stylus', function () {
  gulp.src('./public/css/*.styl')		 // .styl
    .pipe(plumber({
      errorHandler: onError
    }))
    .pipe(sourcemaps.init())
      .pipe(stylus({
  			use: [jeet(), koutoswiss()]
      }))
      .pipe(gulp.dest('./public/css')) // .css
      .pipe(minifyCSS({
        cache: true,
        keepSpecialComments: 0,
        noRebase: true
      }))
      .pipe(gulp.dest('./public/css'))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest('./public/css'));  // .min.map
});

gulp.task('watch', function() {
  gulp.watch('./public/css/*.styl', ['stylus']);
});

gulp.task('develop', function () {
  nodemon({
    script: 'bin/www',
    ext: 'js ect'
  })
});

//gulp.task('phpunit', function() {
//  gulp.watch('./public/css/*.styl', ['stylus']);
//});
//
//gulp.task('test', function() {
//  gulp.watch('./public/css/*.styl', ['phpunit']);
//});

gulp.task('default', [
  'stylus',
  'develop',
  'watch'
]);
