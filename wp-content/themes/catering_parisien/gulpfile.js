var gulp = require('gulp-param')(require('gulp'), process.argv);
sass                = require('gulp-sass'),
    compass             = require('gulp-compass'),
    autoprefixer        = require('gulp-autoprefixer'),
    minifycss           = require('gulp-clean-css'),
    uglify              = require('gulp-uglify'),
    rename              = require('gulp-rename'),
    concat              = require('gulp-concat'),
    notify              = require('gulp-notify'),
    livereload          = require('gulp-livereload'),
    plumber             = require('gulp-plumber'),
    path                = require('path')
;


//the title and icon that will be used for the Gulp notifications
var notifyInfo = {
    title: 'Gulp',
    icon: path.join(__dirname, 'gulp.png')
};

//error notification settings for plumber
var plumberErrorHandler = { errorHandler: notify.onError({
    title: notifyInfo.title,
    icon: notifyInfo.icon,
    message: "Error: <%= error.message %>"
})
};

gulp.task('default', function(debug,tag) {

});

// CSS
gulp.task('css',function(){
    return gulp.src(['scss/**/*.scss'])
        .pipe(plumber(plumberErrorHandler))
        .pipe(compass({
            style: 'compressed',
            comments: false,
            relative: true,
            css: '',
            sass: 'scss',
            import_path: [],
            //font:   'public/fonts',
            // javascript: 'wp-content/themes/DiviChild/js',
            image: 'img'
        }))
        //.pipe(autoprefixer('last 2 version', 'safari 5', 'ie 7', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
        //.pipe(gulp.dest('public/css'))
        //.pipe(rename({ suffix: '.min' }))
        //.pipe(minifycss())
        .pipe(gulp.dest(''));

});

// exemple pour le JS
gulp.task('js', function() {
    return gulp.src('js/**/*.js')
        .pipe(plumber(plumberErrorHandler))
        .pipe(concat('main.js'))
        .pipe(gulp.dest('js'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(uglify())
        .pipe(gulp.dest('js'));
});

gulp.task('live', function() {
    livereload.listen();

    //watch .scss files
    gulp.watch('scss/**/*.scss', ['css']);

    //watch .js files
    gulp.watch('js/**/*.js', ['js']);

    //reload when a template file, the minified css, or the minified js file changes
//    gulp.watch('templates/**/*.html', 'html/css/styles.min.css', 'html/js/main.min.js', function(event) {
//        gulp.src(event.path)
//            .pipe(plumber())
//            .pipe(livereload())
//            .pipe(notify({
//                title: notifyInfo.title,
//                icon: notifyInfo.icon,
//                message: event.path.replace(__dirname, '').replace(/\\/g, '/') + ' was ' + event.type + ' and reloaded'
//            })
//            );
//    });
});
