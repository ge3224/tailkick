const path = require("path");

module.exports = {
  entry: {
    tailkick: "./lib/js/index.ts",
  },
  mode: "production",
  watch: true,
  module: {
    rules: [
      {
        test: /\.tsx?$/,
        exclude: /(node_modules)/,
        use: {
          loader: "swc-loader",
        }
      }
    ]
  },
  resolve: {
    extensions: [".tsx", ".ts", ".js"],
  },
  output: {
    filename: "[name].js",
    path: path.resolve(__dirname, "tailkick/js/"),
  },
};
