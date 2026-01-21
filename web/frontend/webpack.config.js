const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');
const Dotenv = require('dotenv-webpack');
// Xác định chế độ chạy dựa trên biến môi trường từ lệnh script
const isDev = process.env.NODE_ENV === 'development';

module.exports = {
  // 1. Chế độ: Tự động switch giữa 'development' và 'production'
  mode: isDev ? 'development' : 'production',

  
  entry: './service/FacadeAlgorithyms.js',

  // 3. Output: Cấu hình nơi xuất file (Đã phân chia thư mục)
  output: {
    path: path.resolve(__dirname, 'dist'),
    // Dev: Tên file đơn giản. Prod: Thêm hash để trình duyệt không cache file cũ
    filename: isDev ? 'js/bundle.js' : 'js/[name].[contenthash].js',
    clean: true, 
    // Đưa toàn bộ ảnh/font vào thư mục assets
    assetModuleFilename: 'assets/[name].[hash][ext]',
  },

  // 4. Source Map: Dev bật để debug, Prod tắt để bảo mật và nhẹ web
  devtool: isDev ? 'source-map' : false,

  // 5. Module Rules: Cách xử lý từng loại file
  module: {
    rules: [
      // Xử lý CSS
      {
        test: /\.css$/i,
        use: [
          // Dev: Style-loader (nhanh). Prod: MiniCssExtract (tách file riêng)
          isDev ? 'style-loader' : MiniCssExtractPlugin.loader,
          'css-loader',
        ],
      },
      // Xử lý JS (Babel - để tương thích trình duyệt cũ)
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
      // Xử lý Ảnh/Font
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
      inject: 'body', // Nhúng script vào cuối thẻ body
    }),
    // Chỉ tách CSS ra file riêng khi ở chế độ Production
    !isDev && new MiniCssExtractPlugin({
      filename: 'css/[name].[contenthash].css',
    }),
    // <--- 2. Cấu hình Dotenv để đọc file .env tương ứng
    new Dotenv({
      path: isDev ? './env/.env.development' : './env/.env.production', // Chọn file dựa trên mode
      safe: false, 
      systemvars: true, 
    }),
  ].filter(Boolean), // Lọc bỏ plugin null/false

  // 7. Optimization: Tối ưu hóa file output
  optimization: {
    minimize: !isDev, 
    minimizer: [
      '...', 
      new CssMinimizerPlugin(), 
    ],
  },

  // 8. Dev Server: Cấu hình server ảo
  devServer: {
    static: {
      directory: path.join(__dirname, 'dist'),
    },
    compress: true,
    port: 3000,
    hot: true,
    open: true,
    // Proxy API sang Backend
    proxy: {
      '/server': {
        target: 'http://localhost:8000',
        pathRewrite: { '^': '' },
        changeOrigin: true,
      },
    },
  },
};