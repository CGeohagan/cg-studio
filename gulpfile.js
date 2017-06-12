var gulp         = require('gulp'),
    babelify     = require('babelify'),
    browserify   = require('browserify'),
    buffer       = require('vinyl-buffer'),
    source       = require('vinyl-source-stream'),
    sass         = require('gulp-sass'),
    cache        = require('gulp-cache'),
    autoprefixer = require('gulp-autoprefixer'),
    cleancss     = require('gulp-clean-css'),
    eslint       = require('gulp-eslint'),
    image        = require('gulp-image'),
    pump         = require('pump'),
    sourcemaps   = require('gulp-sourcemaps'),
    uglify       = require('gulp-uglify');

gulp.task('styles', function(){
    return gulp.src('scss/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(autoprefixer())
        .pipe(cleancss())
        .pipe(sourcemaps.write(''))
        .pipe(gulp.dest(''));
});

gulp.task('build', function() {
    return browserify({entries: './assets/development/js/theme.js', debug: true})
        .transform('babelify', { presets: ['es2015']})
        .bundle()
        .pipe(source('theme.js'))
        .pipe(buffer())
        .pipe(sourcemaps.init())
        .pipe(uglify())
        .pipe(sourcemaps.write('./maps'))
        .pipe(gulp.dest('./assets/js'));
});

// gulp.task('compress', function (cb) {
//   pump([
//         gulp.src('assets/development/js/*.js'),
//         uglify(),
//         gulp.dest('assets/js')
//     ],
//     cb
//   );
// });

// Check on settings due to error messages.
// gulp.task('image', function() {
//     return gulp.src('assets/development/images/**/*')
//         .pipe(cache(image({
//           pngquant: true,
//           optipng: false,
//           zopflipng: true,
//           jpegRecompress: true,
//           jpegoptim: false,
//           mozjpeg: false,
//           gifsicle: true,
//           svgo: false,
//           concurrent: 10
//         })))
//         .pipe(gulp.dest('assets/images'))
// });

gulp.task('lint', () => {
    // ESLint ignores files with "node_modules" paths. 
    // So, it's best to have gulp ignore the directory as well. 
    // Also, Be sure to return the stream from the task; 
    // Otherwise, the task may end before the stream has finished. 
    return gulp.src(['assets/**/*.js','!node_modules/**'])
        // eslint() attaches the lint output to the "eslint" property 
        // of the file object so it can be used by other modules. 
        .pipe(eslint())
        // eslint.format() outputs the lint results to the console. 
        // Alternatively use eslint.formatEach() (see Docs). 
        .pipe(eslint.format())
        // To have the process exit with an error code (1) on 
        // lint error, return the stream and pipe to failAfterError last. 
        .pipe(eslint.failAfterError());
});

gulp.task('default',['styles', 'compress']);

gulp.task('watch', function() {
    
    // Watch .scss files
    gulp.watch('scss/*.scss', ['styles']);
    gulp.watch('scss/**/*.scss', ['styles']);

    // Watch .js files
    gulp.watch('assets/development/js/*.js', ['build']);
 
});