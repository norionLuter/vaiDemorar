const gulp = require('gulp');
const sass = require('gulp-ruby-sass');
 
gulp.task('sass', () =>
    sass('path/scss/home/*')
        .on('error', sass.logError)
        .pipe(gulp.dest('css/home'))
);


gulp.task('default',['sass']);