const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');
const Dotenv = require('dotenv-webpack');

const isDev = process.env.NODE_ENV === 'development';

module.exports = {
  
  mode: isDev ? 'development' : 'production',  
  entry: './service/FacadeAlgorithyms.js',

  output: {
    path: path.resolve(__dirname, 'dist'),
    filename: isDev ? 'js/bundle.js' : 'js/[name].[contenthash].js',
    clean: true, 
    assetModuleFilename: 'assets/[name].[hash][ext]',
  },

  devtool: isDev ? 'source-map' : false,

  module: {
    rules: [
      {
        test: /\.css$/i,
        use: [
          isDev ? 'style-loader' : MiniCssExtractPlugin.loader,
          'css-loader',
        ],
      },
      

      {
        test: /\.m?js$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['@babel/preset-env'],
          },
        },
      },
      
      {
        test: /\.(png|svg|jpg|jpeg|gif)$/i,
        type: 'asset/resource',
      },
    ],
  },

  // 6. Plugins: Các công cụ hỗ trợ build

  plugins: [
    new HtmlWebpackPlugin({
      template: './index.html',
      filename: 'index.html',
      inject: 'body', 
    }),
  
    !isDev && new MiniCssExtractPlugin({
      filename: 'css/[name].[contenthash].css',
    }),
    
    new Dotenv({
      path: isDev ? './env/.env.development' : './env/.env.production', // Chọn file dựa trên mode
      safe: false, 
      systemvars: true, 
    }),
  ].filter(Boolean), 

  optimization: {
    minimize: !isDev, 
    minimizer: [
      '...', 
      new CssMinimizerPlugin(), 
    ],
  },

  devServer: {
    static: {
      directory: path.join(__dirname, 'dist'),
    },
    compress: true,
    port: 3000,
    hot: true,
    open: true,
    proxy: {
      '/server': {
        target: 'http://localhost:8000',
        pathRewrite: { '^': '' },
        changeOrigin: true,
      },
    },
  },
};