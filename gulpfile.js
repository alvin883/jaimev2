// Disable SnoareToast notification
process.env.DISABLE_NOTIFIER = true;


var gulp = require('gulp'),
	plumber = require('gulp-plumber'),
	autoprefixer = require('gulp-autoprefixer'),
	notify = require( 'gulp-notify' ),
	sass = require('gulp-sass'),
	options = {
		sass: {
			errLogToConsole: true,
			precision: 8,
			noCache: true
		}
	};


// Compiling `./sass/style.scss` to `style.css`
gulp.task('styles', function () {
	return gulp.src('./sass/style.scss')
		.pipe(plumber())
		.pipe(sass(options.sass))
		.pipe(autoprefixer())
		.pipe(gulp.dest('.'))
		.pipe(notify({ title: 'Sass', message: 'sass task complete' }))
});


// Compiling `./sass/login-style.scss` to `./css/login-styles.css`
gulp.task('login-styles', function () {
	return gulp.src('./sass/login-style.scss')
		.pipe(plumber())
		.pipe(sass(options.sass))
		.pipe(autoprefixer())
		.pipe(gulp.dest('./css'))
		.pipe(notify({ title: 'Sass', message: 'sass task complete' }))
});


// Watch changes to all SCSS file in ./sass
gulp.task('watch', function () {
	gulp.watch('./sass/**/*.scss', gulp.parallel([gulp.series('styles')/*, gulp.series('login-styles')*/]));
});


// Default run of `gulp` command
gulp.task('default', gulp.parallel([gulp.series('styles'), gulp.series('watch')]));