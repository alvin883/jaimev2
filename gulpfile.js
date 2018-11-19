// Disable SnoareToast notification
process.env.DISABLE_NOTIFIER = true;


var gulp = require('gulp'),
	plumber = require('gulp-plumber'),
	autoprefixer = require('gulp-autoprefixer'),
	notify = require( 'gulp-notify' ),
	sass = require('gulp-sass'),
	uglify =  require('gulp-uglify-es').default,
	concat = require('gulp-concat'),
	options = {
		sass: {
			errLogToConsole: true,
			precision: 8,
			noCache: true,
			outputStyle: "compressed"
		}
	};


// Javascript
	// Compiler
	gulp.task('compile-js', function() {
		return gulp.src('./js/src/**/*.js')
			// Compile to one file
			.pipe(concat('script.js'))
			// Minify
			.pipe(uglify())
			.pipe(gulp.dest('./js/dist'))
			.pipe(notify({ title: 'Javascript', message: 'Javascript have compiled !' }))
	});
	// Watcher
	gulp.task('watch-js',function(){
		gulp.watch('./js/src/**/*.js', gulp.series('compile-js'));
	});


// SASS
	// Compiler
	gulp.task('compile-sass', function () {
		return gulp.src('./sass/style.scss')
			.pipe(plumber())
			.pipe(sass(options.sass))
			.pipe(autoprefixer())
			.pipe(gulp.dest('.'))
			.pipe(notify({ title: 'SASS', message: 'SASS have compiled !' }))
	});
	// Watcher
	gulp.task('watch-sass', function () {
		gulp.watch('./sass/**/*.scss', gulp.series('compile-sass'));
	});


// Default run of `gulp` command
gulp.task('default', gulp.parallel([
	gulp.series('compile-sass'),
	gulp.series('compile-js'),
	gulp.series('watch-sass'),
	gulp.series('watch-js')
]));