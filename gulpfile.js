var gulp = require('gulp');
var sass = require("gulp-sass");
var autoprefixer = require('gulp-autoprefixer');

gulp.task('default', ['build-styles']);

gulp.task('watch', function() {
  gulp.watch(['styles/**/*.*'], ['build-styles']);
});

gulp.task('build-styles', function() {
  return gulp.src(['./styles/style.scss'])
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer({
      browsers: ['last 3 versions', '> 5%', 'Firefox > 3', 'ie >= 8']
    }))
    .pipe(gulp.dest('./styles'));
});
