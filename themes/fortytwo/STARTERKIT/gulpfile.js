var gulp = require('gulp'),
  sass = require('gulp-sass'),
  autoprefixer = require('gulp-autoprefixer'),
  sourcemaps = require('gulp-sourcemaps'),
  uglify = require('gulp-uglify'),
  browserSync = require('browser-sync').create(),
  jshint = require('gulp-jshint'),
  del = require('del'),
  concat = require('gulp-concat'),
  shell = require('gulp-shell');

// You can change your local url here so you can use browsersync.
// Also set the use_bs variable to true to enable this.
var enable_bs = false;
var bs_proxy_host = 'localhost.dev';

/**
 * @task sass
 * Compile and check sass.
 */
gulp.task('sass', function () {
  return gulp.src('static/sass/**/*.s+(a|c)ss') // Gets all files ending
    .pipe(sourcemaps.init())
    .pipe(sass())
    .on('error', function (err) {
      console.log(err);
      this.emit('end');
    })
    .pipe(autoprefixer({
      browsers: ['ie 8-9', 'last 2 versions']
    }))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('static/css'));
});

/**
 * @task js
 * Do javascript stuff.
 */
gulp.task('js', function () {
  return gulp.src(['static/js/**/*.js', '!static/js/lib/*.js'])
    .pipe(jshint())
    .pipe(jshint.reporter('default'))
    .pipe(uglify());

});

/**
 * @task clean
 * Clean the dist folder.
 */
gulp.task('clean', function () {
  return del(['static/css/*']);
});

/**
 * @task reload
 * Refresh the page after clearing cache.
 */
gulp.task('reload', function () {
  if (enable_bs) {
    browserSync.reload();
  }
});

/**
 * @task watch
 * Watch files and do stuff.
 */
gulp.task('watch', ['clean', 'sass', 'js'], function () {
  gulp.watch('static/sass/**/*.+(scss|sass)', ['sass', 'reload']);
  gulp.watch('static/js/**/*.js', ['js', 'reload']);

  // Watch php, inc and info file changes to run drush task and reload page.
  gulp.watch('**/*.{php,inc,info}', ['clearcache', 'reload']);
});

/**
 * @task clearcache
 * Run drush to clear the theme registry.
 */
gulp.task('clearcache', shell.task([
  'drush cache-clear theme-registry'
]));

/**
 * @task browser-sync
 * Launch the server.
 */
gulp.task('browser-sync', ['sass', 'js'], function () {
  if (enable_bs) {
    process.stdout.write('We are using browsersync. \n');
    browserSync.init({
      proxy: bs_proxy_host,
      open: false,
      socket: {
        domain: 'localhost:3000'
      }
    });
  }
  else {
    process.stdout.write('Browsersync is not enabled. \n');
  }
});

/**
 * @task default
 * Watch files and do stuff.
 */
gulp.task('default', ['browser-sync', 'watch']);
