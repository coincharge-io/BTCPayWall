(function($) {
  "use strict";
  $(document).ready(function() {
    showQR(
      $("#btcpw_tipping__button"),
      "lnbc2890n1p3ajzknpp5vtew5gqn7af3uk6zn2z04fv3c7wqycgye56tj7usp6mh9qvpc6esdq2f38xy6t5wvcqzpgxqyz5vqrzjq0nfr7qlprzkl2rke380tj0gkunm66pv7dtqt0396jrq02qz2fs9xzcuhcqqk3sqquqqqqqqqqqqpqsq9gsp5xmevqkh0n7x6yy0qyr6vre8xrxcwsvvkumn65d03fa6l6taxt2ks9qyyssqzd8zhc54nqk58k4p8mgd45hfp0mdk7ucczvjghsaer60d5ded6rklmawuq6cdh23c2cr24y3elh93fzf0077cntxsvncj5nrdqex46gqg4wcyv"
    );
  });
  function showQR(target, request) {
    console.log(target);
    target.append(
      `<div id=lnbits_modal style="padding:20px; margin: 0 auto;"><div class=btcpaywall-qr-code></div></div>`
    );
    $(".btcpaywall-qr-code").qrcode({ width: 450, height: 450, text: request });
    let dialog = $("#lnbits_modal").dialog({
      dialogClass: "no-close",
      autoOpen: true,
      modal: true,
      resizable: false,
      width: 500,
      height: 600,
      buttons: {
        "Copy invoice": function() {
          navigator.clipboard
            .writeText(request)
            .then(() =>
              $(".ui-dialog-buttonset button:first-child")
                .text("Copied to clipboard")
                .css({ backgroundColor: "green" })
            );
        },
        Close: function() {
          $("#lnbits_modal").remove();
        },
      },
    });
  }
})(jQuery);
