// uncomment to disable notifications:
//process.env.DISABLE_NOTIFIER = true;


// Load all the modules from package.json
var gulp = require( 'gulp' ),
  plumber = require( 'gulp-plumber' ),
  autoprefixer = require('gulp-autoprefixer'),
  watch = require( 'gulp-watch' ),
  jshint = require( 'gulp-jshint' ),
  stylish = require( 'jshint-stylish' ),
  uglify = require( 'gulp-uglify' ),
  rename = require( 'gulp-rename' ),
  notify = require( 'gulp-notify' ),
  include = require( 'gulp-include' ),
  sass = require( 'gulp-sass' ),
  cleanCSS = require('gulp-clean-css'),
  concatCss = require('gulp-concat-css'),
  concat = require('gulp-concat'),
  sourcemaps = require('gulp-sourcemaps');


// Default error handler
var onError = function( err ) {
  console.log( 'An error occured:', err.message );
  this.emit('end');
}




// Minify Custom JavaScript files
gulp.task('scripts', function() {
  return gulp.src('./js/src/*.js')
    .pipe(jshint())
    .pipe(jshint.reporter())
    .pipe(sourcemaps.init())
    .pipe(uglify())
    .pipe(concat('scripts.min.js'))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('./js'))
    .pipe(notify({ message: 'Custom scripts task complete' }));
});

// As with javascripts this task creates two files, the regular and
// the minified one.
var options = {};
options.sass = {
  errLogToConsole: true,
  sourceMap: 'sass',
  sourceComments: 'map',
  outputStyle: 'nested',
  precision: 10
};

gulp.task('sass', function() {
  return gulp.src('./sass/style.scss')
    .pipe(sourcemaps.init())
    .pipe(plumber({ errorHandler: onError }))
    .pipe(sass(options.sass))
    .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4' ))
    .pipe(cleanCSS())
    .pipe(sourcemaps.write())
    .pipe(gulp.dest( './css' ) )
    .pipe(notify({ message: 'SASS task complete' }))
});

gulp.task('style', function() {
  return gulp.src(['css/**/*.css', 'css/*.css'])
    .pipe(concatCss("custom.css"))
    .pipe( cleanCSS() )
    .pipe( rename( {
      basename: 'custom'
    } ) )
    .pipe(gulp.dest('./css'))
    .pipe(notify({ message: 'Custom style complete' }));
});



gulp.task( 'watch', function() {
  gulp.watch( './js/src/*.js', [ 'scripts' ] )
  gulp.watch( './sass/**/*.scss', ['sass'] );
});

gulp.task( 'default', ['scripts', 'sass','style']);





