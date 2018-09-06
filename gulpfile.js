var gulp        = require('gulp');
var sass        = require('gulp-ruby-sass');
var cleanCSS    = require('gulp-clean-css');

// Compiles scss and cleans before destination
gulp.task('sass', () =>
    sass('resources/assets/sass/app.scss')
        .on('error', sass.logError)
        // .pipe(cleanCSS())
        .pipe(gulp.dest('public/css/'))
);

// Watch for changes to partials then fires sass task
gulp.task('sass:watch',function() {
    gulp.watch('resources/assets/sass/**/*.scss', ['sass']);
});

gulp.task('default', [ 'sass:watch' ]);