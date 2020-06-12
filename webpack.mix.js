const mix = require('laravel-mix');

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

mix.setPublicPath('public_html/');

mix.options({
    processCssUrls: false,
});

mix

// =========== application =============

    .js('resources/application/js/app.js', 'public_html/_app/js')
    .sourceMaps()

.sass('resources/application/sass/_coreui/coreui-icons.scss', 'public_html/_app/css')
    .copy('./node_modules/@coreui/icons/fonts/*.*', './public_html/_app/fonts/')

.sass('resources/application/sass/_coreui/flag-icon.scss', 'public_html/_app/css')
    .copy('./node_modules/flag-icon-css/flags/', './public_html/_app/flags/', false)

.sass('resources/application/sass/_coreui/font-awesome.scss', 'public_html/_app/css')
    .copy('./node_modules/font-awesome/fonts/*.*', './public_html/_app/fonts/')

.sass('resources/application/sass/_coreui/simple-line-icons.scss', 'public_html/_app/css')
    .copy('./node_modules/simple-line-icons/fonts/*.*', './public_html/_app/fonts/')

.copy('./node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css', './public_html/_app/css/')
.copy('./node_modules/select2/dist/css/select2.min.css', 'public_html/_app/css')

.sass('resources/application/sass/_coreui/app.scss', 'public_html/_app/css')

.copy('./resources/application/images/', './public_html/_app/images/')

.copy('./resources/application/tinymce/', './public_html/_app/tinymce/')




// ================= website ==================

.js('resources/website/js/_site.js', 'public_html/js').sourceMaps()
    .sass('resources/website/style.scss', 'public_html/')
    .copy('./resources/website/css/', './public_html/css/')
    .copy('./resources/website/js/', './public_html/js/')
    .copy('./resources/website/images/', './public_html/images/')
    .copy('./resources/website/construction/', './public_html/construction/')
    //.js('resources/website/js/_catalog.js', 'public_html/js').sourceMaps()


//.react('resources/js/catalog.js', 'public_html/js')
    .sass('resources/sass/app.scss', 'public_html/css')
    ;
