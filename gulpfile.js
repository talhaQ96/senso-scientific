var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');
var uglify = require('gulp-uglify');
var cleancss = require('gulp-clean-css');
var concat = require('gulp-concat');

// Sass core

gulp.task('sass-core', function() {
  return gulp.src('sass/core.scss')
	.pipe(sourcemaps.init())
    .pipe(sass())
	.pipe(autoprefixer())
	.pipe(cleancss())
	.pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('assets/css'))
});

// Sass templates

gulp.task('sass-archive', function() {
  return gulp.src('sass/templates/archive.scss')
	.pipe(sourcemaps.init())
    .pipe(sass())
	.pipe(autoprefixer())
	.pipe(cleancss())
	.pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('assets/css/templates'))
});

gulp.task('sass-home', function() {
  return gulp.src('sass/templates/home.scss')
	.pipe(sourcemaps.init())
    .pipe(sass())
	.pipe(autoprefixer())
	.pipe(cleancss())
	.pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('assets/css/templates'))
});

gulp.task('sass-page', function() {
  return gulp.src('sass/templates/page.scss')
	.pipe(sourcemaps.init())
    .pipe(sass())
	.pipe(autoprefixer())
	.pipe(cleancss())
	.pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('assets/css/templates'))
});

gulp.task('sass-single', function() {
  return gulp.src('sass/templates/single.scss')
	.pipe(sourcemaps.init())
    .pipe(sass())
	.pipe(autoprefixer())
	.pipe(cleancss())
	.pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('assets/css/templates'))
});

// JS

gulp.task('js', function() {
  return gulp.src(['assets/js/source/vendor/jquery.slicknav.js', 'assets/js/source/main.js'])
	.pipe(sourcemaps.init())
	.pipe(concat('main.js'))
	.pipe(uglify())
	.pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('assets/js'))
});

// Watch

gulp.task('watch', function() {
	gulp.watch('sass/core/**/*.scss', gulp.series('sass-core'));
	gulp.watch('sass/vendor/slicknav/_slicknav.scss', gulp.series('sass-core'));
	gulp.watch('sass/_mixins-master.scss', gulp.series('sass-core'));
	gulp.watch('sass/_variables.scss', gulp.series('sass-core'));
	gulp.watch('sass/templates/archive.scss', gulp.series('sass-archive'));
	gulp.watch('sass/templates/home.scss', gulp.series('sass-home'));
	gulp.watch('sass/templates/page.scss', gulp.series('sass-page'));
	gulp.watch('sass/templates/single.scss', gulp.series('sass-single'));
	gulp.watch('assets/js/source/main.js', gulp.series('js'));
	gulp.watch('assets/js/source/vendor/jquery.slicknav.js', gulp.series('js'));
})
