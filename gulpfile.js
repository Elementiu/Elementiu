const gulp = require('gulp'),
    browserSync = require('browser-sync').create();

//BrowserSync task
gulp.task('browser-sync', () => {
    browserSync.init({
        proxy: 'elementiu.com',
    });

    gulp.watch('./style.css').on('change', browserSync.reload);
    gulp.watch('./*.php').on('change', browserSync.reload);
    gulp.watch('./includes/**/*.php').on('change', browserSync.reload);
    gulp.watch('./template-parts/*.php').on('change', browserSync.reload);
});

//Default task
gulp.task('default', ['browser-sync'] );