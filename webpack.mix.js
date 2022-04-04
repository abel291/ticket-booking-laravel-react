const mix = require("laravel-mix");
const tailwindcss = require("tailwindcss");
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/dashboard.js", "public/js").postCss(
    "resources/css/dashboard.css",
    "public/css",
    [
        require("postcss-import"),
        tailwindcss("tailwind.config.dashboard.js"),
        require("autoprefixer"),
    ]
);

mix.js("resources/js/app.js", "public/js")
    .sourceMaps()
    .react()
    .postCss("resources/css/app.css", "public/css", [
        require("postcss-import"),
        tailwindcss("./tailwind.config.js"),
        require("autoprefixer"),
    ])
    .webpackConfig(require('./webpack.config'));

if (mix.inProduction()) {
    mix.version();
}
