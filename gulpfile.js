var gulp = require("gulp");
var less = require("gulp-less");
var LessAutoprefix = require("less-plugin-autoprefix");
var autoprefix = new LessAutoprefix({ browsers: ["last 2 versions"] });
var path = require("path");
var plumber = require("gulp-plumber");
var server = require("browser-sync");

gulp.task('less', function () {
  return gulp.src('./less/**/*.less')
    .pipe(less({
      paths: [ path.join(__dirname, 'less', 'includes') ]
    }))
    .pipe(gulp.dest('./public/'))
    .pipe(server.stream());
});

gulp.task("default", ["less"], function() {
  server.init({
    server: "./public/"
  });

  gulp.watch("less/*.less", ["less"]);
  gulp.watch("*.html")
  .on("change", server.reload);
});
