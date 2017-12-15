// JavaScript document to access bitcoin unconfirmed transaction values in real-time
// using the blockchain.info websocket
$(document).ready(function(){
      //
      var btcs = new WebSocket('wss://ws.blockchain.info/inv');
      console.log(btcs);
      //
      btcs.onopen = function() {
        btcs.send(JSON.stringify({"op":"unconfirmed_sub"}));
      }
      //
      btcs.onmessage = function(onmsg){
        var response = JSON.parse(onmsg.data);
        var amount = response.x.out[0].value;
        var calAmount = amount / 100000000;
        var btc = calAmount.toFixed(8);
        $('#messages').prepend('<p class="box_text_p">'  + btc + ' BTC' + '</p>');
      }
});