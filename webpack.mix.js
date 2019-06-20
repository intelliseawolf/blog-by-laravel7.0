const mix = require('laravel-mix');
const imageminMozjpeg = require('imagemin-mozjpeg');
const ImageminPlugin = require('imagemin-webpack-plugin').default;
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

var adminScripts = [
    'node_modules/jquery/dist/jquery.min.js',
    'node_modules/paper-dashboard-2/assets/js/core/jquery.min.js',
    'node_modules/paper-dashboard-2/assets/js/plugins/perfect-scrollbar.jquery.min.js',
    'node_modules/paper-dashboard-2/assets/js/plugins/chartjs.min.js',
    'node_modules/paper-dashboard-2/assets/js/plugins/bootstrap-notify.js',
    'node_modules/paper-dashboard-2/assets/js/paper-dashboard.min.js',
    'node_modules/pickadate/lib/picker.js',
    'node_modules/pickadate/lib/picker.time.js',
    'node_modules/pickadate/lib/picker.date.js',
    'resources/admin/js/set-ckeditor.js',
    'public/js/admin.js',
    'resources/admin/js/bs-tooltips.js',
    'public/vendor/laravel-filemanager/js/lfm.js',
];

// mix.webpackConfig({
//     resolve: {
//         alias: { 'picker': 'pickadate/lib/picker' }
//     },
//     plugins: [
//         new ImageminPlugin({
//             test: /\.(jpe?g|png|gif|svg)$/i,
//             pngquant: {
//                 quality: '65-80'
//             },
//             plugins: [
//                 imageminMozjpeg({
//                     quality: 65,
//                     maxmemory: 1000 * 512
//                 })
//             ]
//         })
//     ]
// }).js('resources/js/app.js', 'public/js')
//     .js('resources/admin/js/admin.js', 'public/js')
//     .copy('node_modules/@fortawesome/fontawesome-free/webfonts/**', 'public/fonts/font-awesome/', true)
//     .copy('node_modules/paper-dashboard-2/assets/fonts/**', 'public/fonts/nucleo/', true)
//     .copy('node_modules/datatables/media/js/jquery.dataTables.min.js', 'public/js/', true)
//     .copy('node_modules/ckeditor/config.js', 'public/js/ckeditor/config.js')
//     .copy('node_modules/ckeditor/styles.js', 'public/js/ckeditor/styles.js')
//     .copy('node_modules/ckeditor/contents.css', 'public/js/ckeditor/contents.css')
//     .copyDirectory('node_modules/ckeditor/skins', 'public/js/ckeditor/skins')
//     .copyDirectory('node_modules/ckeditor/lang', 'public/js/ckeditor/lang')
//     .copyDirectory('node_modules/ckeditor/plugins', 'public/js/ckeditor/plugins')
//     .sass('resources/sass/app.scss', 'public/css')
//     .sass('resources/admin/sass/admin.scss', 'public/css')
//     .scripts(adminScripts, 'public/js/admin.js')
//     .sourceMaps()
//     .version();

mix.webpackConfig({
    plugins: [
        new ImageminPlugin({
            test: /\.(jpe?g|png|gif|svg)$/i,
            pngquant: {
                quality: '65-80'
            },
            plugins: [
                imageminMozjpeg({
                    quality: 65,
                    maxmemory: 1000 * 512
                })
            ]
        })
    ]
}).js('resources/portfolio/js/portfolio.js', 'public/js')
    .copy('resources/portfolio/js/scripts/particles-config.json', 'public/js/particles-config.json')
    .copy( 'resources/portfolio/images', 'public/images', false )
    .sass('resources/portfolio/sass/portfolio.scss', 'public/css')
    .autoload({ jquery: ['$', 'window.jQuery', 'jQuery'] })
    .sourceMaps()
    .version();
