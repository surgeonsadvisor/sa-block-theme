const path = require("path");

module.exports = function(_env, argv) {
    const isProduction = argv.mode === "production";
    const isDevelopment = !isProduction;
  
    return {
      entry: "./src/index.js",
      output: {
        path: path.resolve(__dirname, "dist"),
        filename: "block-cover-extended.js",
        publicPath: "/"
      },
      module: {
        rules: [
          {
            test: /\.jsx?$/,
            exclude: /node_modules/,
            use: {
              loader: "babel-loader",
              options: {
                presets: ['@babel/preset-env']
              }
            }
          }
        ]
      }
    };
  };