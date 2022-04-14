const defaultConfig = require('@wordpress/scripts/config/webpack.config')
const path = require('path')

module.exports = {
  ...defaultConfig,
  entry: {
    index: path.join(__dirname, 'blocks/index.js'),
    admin: path.join(__dirname, 'assets/src/js/btc-paywall-admin.js'),
    preview: path.join(__dirname, 'assets/src/js/btc-paywall-design-preview-admin.js'),
    public: path.join(__dirname, 'assets/src/js/btc-paywall-public.js'),
    unsaved: path.join(__dirname, 'assets/src/js/btc-paywall-warn-unsaved.js'),
    btcpay: path.join(__dirname, 'assets/src/js/btcpayserver.js'),
    opennode: path.join(__dirname, 'assets/src/js/opennode.js'),
  },
  output: {
    filename: '[name].js',
    path: path.join(__dirname, 'assets/dist/js')
  }
}
