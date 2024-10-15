let mix = require('laravel-mix');
let path = require('path');

mix.setResourceRoot('../');
mix.setPublicPath('./dist');
mix.webpackConfig({
    watchOptions: { ignored: [
        path.posix.resolve(__dirname, './node_modules'),
        path.posix.resolve(__dirname, './dist/css'),
        path.posix.resolve(__dirname, './dist/js'),
    ]}
});
mix.js('src/js/app.js', 'dist/js/');
mix.postCss("src/css/app.css", "dist/css");
mix.postCss('src/css/editor-style.css', 'dist/css');
mix.disableSuccessNotifications();

if (mix.inProduction()) {
    mix.version();
} else {
    mix.options({ manifest: false });
}
