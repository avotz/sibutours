var gulp        = require('gulp'),
    uglify      = require('gulp-uglify'),
    stripDebug  = require('gulp-strip-debug'),
    minifyCSS   = require('gulp-clean-css'),
    stylus      = require('gulp-stylus'),
    nib         = require('nib'),
    concat      = require('gulp-concat'),
    browserSync = require('browser-sync');
    var reload      = browserSync.reload;

  // Dynamic server
 gulp.task('browser-sync', function() {
       browserSync({
          /*server: {
            baseDir: "./"
          }*/
          proxy: "sibutours.test"
      });
      
  });




gulp.task('js', function () {
  gulp.src([
      './assets/js/vendor/jquery-1.11.2.min.js',
      './assets/js/vendor/jquery.hoverIntent.minified.js',
      './assets/js/vendor/owl.carousel.js',
      /*'./assets/js/vendor/jquery.contentcarousel.js',
      './assets/js/vendor/jquery.easing.1.3.js',*/
      
      './assets/js/vendor/jquery.magnific-popup.min.js',
      /*'./assets/js/vendor/jquery.mCustomScrollbar.js',*/
      './assets/js/vendor/jquery.cycle2.min.js',
      /*'./assets/js/vendor/chosen.jquery.min.js',
      './assets/js/vendor/wow.min.js',*/
      /*'./assets/js/vendor/jquery.uniform.js',*/
       './assets/js/vendor/select2.min.js',
      './assets/js/vendor/jquery.slimscroll.js',
      './assets/js/vendor/flatpickr.js',
      './assets/js/vendor/jquery.fullPage.js',
     
     

      './assets/js/main.js'

    ])
    //.pipe(browserify())
    .pipe(uglify({ compress: true }))
    .pipe(stripDebug())
    .pipe(concat('bundle.js'))
    .pipe(gulp.dest('./js'))
    .pipe(reload({stream:true}));

});

// Get and render all .styl files recursively
gulp.task('stylus', function () {
  gulp.src('./assets/stylus/main.styl')
    .pipe(stylus({use: [nib()]}))
    .pipe(gulp.dest('./assets/css/'));
});

gulp.task('css', function () {
  gulp.src(['./assets/css/main.css', './assets/css/magnific-popup.css','./assets/css/jquery.fullPage.css','./assets/css/font-awesome.css','./assets/css/owl.carousel.css','./assets/css/owl.theme.default.css','./assets/css/flatpickr.min.css','./assets/css/select2.min.css'])
    /*.pipe(minifyCSS({ keepSpecialComments: '*', keepBreaks: '*'}))*/
    .pipe(concat('style.css'))
    .pipe(gulp.dest('./'))
    .pipe(reload({stream:true}));
});




gulp.task('watch', function () {
    gulp.watch(['./assets/js/**/*.js'],['js']);
    gulp.watch(['./assets/stylus/**/*.styl'],['stylus']);
    gulp.watch(['./assets/css/**/*.css'],['css']);
    gulp.watch("./**/*.html").on('change', reload);
    gulp.watch("./**/*.php").on('change', reload);

});

gulp.task('default', [ 'js','stylus','css','browser-sync', 'watch' ]);
