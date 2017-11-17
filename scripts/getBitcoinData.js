// JavaScript code to get Bitcoin data from the Bitcoin blockchain and various cryptocurrency exchnages

$(document).ready(function() {
	
	//Intilise the mobile web page on load
	var objID = 0;
	var url1 = '../index.php/apiReadBitcoinData';
	var url2 = '../index.php/getbitcoinjson';
	var url3 = '../index.php/dbreadbitcoindata';

	update(objID);
	
	function update(objID) {	
	
 		//Read the JSON file as an AJAX request 
		$.getJSON(url1, function(jsonObj) {
		console.log(jsonObj);
			//Assign the AJAX requested data in to appropriate <div> tag wrapped in HTML
			//Start by making AJAX request for the selected object name and its description
			$('#bitfinex_lp').html('<p class="box_text_p">' + '$' + jsonObj.bitcoin_data[objID].bitfinex_lp + '</p>');
			$('#bitstamp_lp').html('<p class="box_text_p">' + '$' + jsonObj.bitcoin_data[objID].bitstamp_lp + '</p>');
			$('#coinbase_lp').html('<p class="box_text_p">' + '$' + jsonObj.bitcoin_data[objID].coinbase_lp + '</p>');
			$('#current_block_height').html('<p class="box_text_p">' + jsonObj.bitcoin_data[objID].current_block_height + '</p>');
			$('#bits_transacted').html('<p class="box_text_p">' + jsonObj.bitcoin_data[objID].bits_transacted + '</p>');
			$('#miner_address').html('<p class="box_text_p">' + jsonObj.bitcoin_data[objID].miner_address + '</p>');
			$('#amount').html('<p class="box_text_p">' + jsonObj.bitcoin_data[objID].amount + '</p>');
			$('#total_bitcoins').html('<p class="box_text_p">' + jsonObj.bitcoin_data[objID].total_bitcoins + '</p>');				


		});
	}
});