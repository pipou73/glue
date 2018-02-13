var Encore  = require('@symfony/webpack-encore');
var path    = require('path');

const assets_path   = path.resolve('./src/AppBundle/Resources/private');
const output_path   = (Encore.isProduction()) ? path.resolve('./src/AppBundle/Resources/public') : path.resolve('./web/build');
const public_path   = (Encore.isProduction()) ? '/public' : '/build';
const sass_path     = path.join(assets_path, './sass');
const js_path       = path.join(assets_path, './js');
const isProduction  = Encore.isProduction();

Encore
    // empty the outputPath dir before each build
    .cleanupOutputBeforeBuild()

    // directory where all compiled assets will be stored
    .setOutputPath(output_path)

    // what's the public path to this directory (relative to your project's document root dir)
    .setPublicPath(public_path)

    // will output as web/build/app.js
    .addEntry('app', path.join(js_path, '/app.js'))

    // will output as web/build/global.css
    .addStyleEntry('style', path.join(sass_path, '/style.scss'))

    // allow sass/scss files to be processed
    .enableSassLoader()
    .enablePostCssLoader()

    // allow legacy applications to use $/jQuery as a global variable
    .autoProvidejQuery()

    .enableSourceMaps(!isProduction)

    // // create hashed filenames (e.g. app.abc123.css)
    // .enableVersioning(Encore.isProduction())

    .enableTypeScriptLoader(function (typeScriptConfigOptions) {
        typeScriptConfigOptions.transpileOnly = true;
    })
    // create hashed filenames (e.g. app.abc123.css)
    .enableVersioning(false)
    .configureFilenames({
        js    : (isProduction) ? '[name].min.js' : '[name].js',
        css   : (isProduction) ? '[name].min.css' : '[name].css',
        images: 'images/[name].[ext]',
        fonts : 'fonts/[name].[ext]'
    })
;

var config = Encore.getWebpackConfig();
config.watchOptions = { poll: true, ignored: /node_modules/ };
if (config.devServer) {
    config.devServer.watchContentBase = true;
}

// export the final configuration
module.exports = config;