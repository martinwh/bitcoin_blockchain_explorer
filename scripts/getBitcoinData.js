// JavaScript code to get Bitcoin data from the Bitcoin blockchain and various cryptocurrency exchanges

$(document).ready(function() {
	//Intialise the mobile web page on load
	var objID = 0;
	var url1 = '../index.php/apiReadBitcoinData';
	var url2 = '../index.php/getbitcoinjson';
	var url3 = '../index.php/dbreadbitcoindata';
	var url4 = '../index.php/apiGetBitcoinExchangeRate';
	var bitcoinExchange = "Bitfinex";

	// Load the bitcoin data values into the front end view
	apiBitcoinExchangeRate(objID);
	dbBitcoinData(objID);	

	// Function to get some bitcoin test values for the SQLite database
	function dbBitcoinData(objID) {	
	
 		//Read the JSON file as an AJAX request 
		$.getJSON(url3, function(jsonObj) {
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

	// Function to get a range of Bitcoin exchange rate values uisng last price API endpoints
	function apiBitcoinExchangeRate(objID) {	
		
		//Read the JSON file as an AJAX request 
		$.getJSON(url4, function(jsonObj) {
		console.log(jsonObj);
			//Assign the AJAX requested data in to appropriate <div> tag wrapped in HTML
			//Start by making AJAX request for the selected object name and its description
			$('#bitfinex_lp').html('<p class="box_text_p">' + '$' + jsonObj.bitcoin_data[objID].bitfinex_lp + '</p>');
			$('#bitstamp_lp').html('<p class="box_text_p">' + '$' + jsonObj.bitcoin_data[objID].bitstamp_lp + '</p>');
			$('#coinbase_lp').html('<p class="box_text_p">' + '$' + jsonObj.bitcoin_data[objID].coinbase_lp + '</p>');

		});
	}

	// Convert the BTC input value to USD
	function btcConvertUsd(btcValue){
		var btcCurrentRate;
		console.log("BTC Input: " + btcValue);
		// Get the latest exchange rate from the selected bitcoin exchange
		$.getJSON(url4, function(jsonObj) {
			console.log(jsonObj);
			// Choose the bitcoin exchange rate based on the exchange rate selection
			console.log("bitcoin Exchange Selected: " + bitcoinExchange);
			switch(bitcoinExchange){
				case 'Bitfinex':
					btcCurrentRate = jsonObj.bitcoin_data[0].bitfinex_lp;
					break;
				case 'Bitstamp':
					btcCurrentRate = jsonObj.bitcoin_data[0].bitstamp_lp;
					break;
				case 'Coinbase':
					btcCurrentRate = jsonObj.bitcoin_data[0].coinbase_lp;
					break;
			}
			
			console.log("BTC current rate: " + btcCurrentRate);
			// Calculate the USD value
			var usd = btcCurrentRate * btcValue;
			// And, cast it to 2 decimal places
			var usd = usd.toFixed(2);
			console.log("USD conversion is: " + "$" + usd);
			// Write the UDS value back to the USD input box
			$("#usdValue").val(usd);
		});
	}

	// Convert the USD input to BTC
	function usdConvertBtc(usdValue){
		var btcCurrentRate;
		console.log("USD Input: " + usdValue);
		// Get the latest exchange rate from the selected bitcoin exchange
		$.getJSON(url4, function(jsonObj) {
			console.log(jsonObj);
			// Choose the bitcoin exchange rate based on the exchange rate selection
			console.log("bitcoin Exchange Selected: " + bitcoinExchange);
			switch(bitcoinExchange){
				case 'Bitfinex':
					btcCurrentRate = jsonObj.bitcoin_data[0].bitfinex_lp;
					break;
				case 'Bitstamp':
					btcCurrentRate = jsonObj.bitcoin_data[0].bitstamp_lp;
					break;
				case 'Coinbase':
					btcCurrentRate = jsonObj.bitcoin_data[0].coinbase_lp;
					break;
			}
			
			console.log("BTC current rate: " + btcCurrentRate);
			// Calculate the USD value
			var btc = usdValue / btcCurrentRate;
			// And, cast it to 2 decimal places
			var btc = btc.toFixed(8);
			console.log("USD conversion is: " + btc + " BTC");
			// Write the UDS value back to the USD input box
			$("#btcValue").val(btc);
		});
	}

	// Use the JQuery.click() function capture the BTC value entered into the input box when the submit button is pressed
	$('#btcInput').click(function() {
		var btcValue = $("#btcValue").val();
		// Check the user has input a BTC value
		if(btcValue == '') {
				alert("Enter a valid BTC value to convert to USD");
			}
			else {
				// Convert the BTC value to USD and write it to the USD input box 
				//alert(btcValue);
				btcConvertUsd(btcValue);
			}
		});
		// Reset the input box when the reset button is pressed by assigning a blank string to the id selector
		$('#btcReset').click(function() {
			$("#btcValue").val('');
	});

	// Use the JQuery.click() function capture the USD value entered into the input box when the submit button is pressed
	$('#usdInput').click(function() {
		var usdValue = $("#usdValue").val();
		// Check the user has input a USD value
		if(usdValue == '') {
				alert("Enter a valid USD value to convert to BTC");
			}
			else {
				// Convert the USD value to BTC and write it to the BTC input box 
				//alert(usdValue);
				usdConvertBtc(usdValue);
			}
		});
		// Reset the input box when the reset button is pressed by assigning a blank string to the id selector
		$('#usdReset').click(function() {
			$("#usdValue").val('');
	});

	// Use jQuery .change() function to select the bitcoin exchange.
	$('input:radio').change(function(){
		// Look for the checked radio button and get its value
		bitcoinExchange = $("form input[type='radio']:checked").val();
		console.log(bitcoinExchange);
		//alert("Value of Changed Radio Button : " + value);
	});

});