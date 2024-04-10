const defaultConfig = require("@wordpress/scripts/config/webpack.config");
const path = require("path");

module.exports = {
  ...defaultConfig,
  entry: {
    index: path.join(__dirname, "blocks/index.js"),
    btc_paywall_admin: path.join(
      __dirname,
      "assets/src/js/btc-paywall-admin.js"
    ),
    btc_paywall_design_preview_admin: path.join(
      __dirname,
      "assets/src/js/btc-paywall-design-preview-admin.js"
    ),
    btc_paywall_public: path.join(
      __dirname,
      "assets/src/js/btc-paywall-public.js"
    ),
    btc_paywall_warn_unsaved: path.join(
      __dirname,
      "assets/src/js/btc-paywall-warn-unsaved.js"
    ),
    btcpayserver: path.join(__dirname, "assets/src/js/btcpayserver.js"),
    opennode: path.join(__dirname, "assets/src/js/opennode.js"),
    lnbits: path.join(__dirname, "assets/src/js/lnbits.js"),
    coinsnap: path.join(__dirname, "assets/src/js/coinsnap.js"),
  },
  output: {
    filename: "[name].js",
    path: path.join(__dirname, "assets/dist/js"),
  },
};
