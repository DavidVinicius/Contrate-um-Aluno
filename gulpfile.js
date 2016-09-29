
var gulp = require('gulp');
var concat = require('gulp-concat');
var cleanCSS = require('gulp-clean-css');
var uglify = require('gulp-uglify');
var pump = require('pump');
var concatCss = require('gulp-concat-css');
var es6transpiler = require('gulp-es6-transpiler');

gulp.task('scripts', function() {
  return gulp.src('./js/*.js')
    .pipe(concat('all.js').on('error',function(e){
      console.log(e);
  }))
    .pipe(uglify().on('error',function(e){
      console.log(e)
  }))
    .pipe(gulp.dest('./Teste/'));
});

gulp.task('sass', function () {
  return gulp.src('./sass/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./css'));
});

gulp.task('transpiler', function () {
    return gulp.src('src/app.js')
        .pipe(es6transpiler())
        .pipe(gulp.dest('dist'));
});

gulp.task('stream', function () {
    // Endless stream mode 
    return watch('css/**/*.css', { ignoreInitial: false })
        .pipe(gulp.dest('build'));
});

 
gulp.task('minify-css', function() {
  return gulp.src('styles/*.css')
    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(gulp.dest('dist'));
});

gulp.task('concat-css', function () {
  return gulp.src('assets/**/*.css')
    .pipe(concatCss("styles/bundle.css"))
    .pipe(gulp.dest('out/'));
});

gulp.task('default', function() {
  // place code for your default task here
    console.log("Olá");
});