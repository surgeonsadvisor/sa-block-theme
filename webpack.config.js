const path = require('path');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

module.exports = {
    entry: [
        './assets/js/mobile-menu.js',
        './assets/scss/main.scss'
    ],
    output: {
        filename: 'mobile-menu.js',
        path: path.resolve(__dirname, 'dist'),
    },
    plugins: [
        new BrowserSyncPlugin(
            {
                host: "localhost",
                port: 3000,
                files: ["dist/*.css"],
                proxy: "http://blocktheme.test/"
            },
            {
                reload: false
            }
        )
    ],
    module: {
        rules: [
            {
                test: /\.(sc|c)ss$/,
                use: [
                    {
                        loader: "file-loader",
                        options: {
                            name: "[name].css",
                        }
                    },
                    {
                        loader: "extract-loader"
                    },
                    {
                        loader: "css-loader"
                    },
                    {
                        loader: "sass-loader"
                    }
                ]
            }
        ]
    }
}