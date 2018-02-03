var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('sass', function(){
	return gulp.src("resources/assets/sass/app.sass")
		.pipe(sass())
		.pipe(gulp.dest("public/css"))
});
gulp.task('watch', function(){
	gulp.watch("resources/assets/sass/app.sass", ['sass']);
});