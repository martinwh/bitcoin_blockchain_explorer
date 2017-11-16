// JavaScript code to get Bitcoin data from the Bitcoin blockchain and various cryptocurrency exchnages

$(document).ready(function() {
	
	//Intilise the mobile web page on load
	var objID = 0;
	update(objID);
	
	function update(objID) {	
	
 		//Read the JSON file as an AJAX request 
		$.getJSON('../index.php/apiReadBitcoinData', function(jsonObj) {
		console.log(jsonObj);
			//Assign the AJAX requested data in to appropriate <div> tag wrapped in HTML
			//Start by making AJAX request for the selected object name and its description
			$('#bitfinex_lp').html('<p style="display:inline">' + jsonObj.bitcoin_data[objID].bitfinex_lp + '</p>');
			$('#bitstamp_lp').html('<p style="display:inline">' + jsonObj.bitcoin_data[objID].bitstamp_lp + '</p>');
			$('#coinbase_lp').html('<p style="display:inline">' + jsonObj.bitcoin_data[objID].coinbase_lp + '</p>');
			$('#current_block_height').html('<p style="display:inline">' + jsonObj.bitcoin_data[objID].current_block_height + '</p>');
			$('#bits_transacted').html('<p style="display:inline">' + jsonObj.bitcoin_data[objID].bits_transacted + '</p>');
			$('#miner_address').html('<p style="display:inline">' + jsonObj.bitcoin_data[objID].miner_address + '</p>');
			$('#amount').html('<p style="display:inline">' + jsonObj.bitcoin_data[objID].amount + '</p>');
			$('#total_bitcoins').html('<p style="display:inline">' + jsonObj.bitcoin_data[objID].total_bitcoins + '</p>');				


		});
	}

//AJAX service request to get the main text data from the JSON data store
$.getJSON('./model/data.json', function(jsonObj) {		
	console.log(jsonObj);
	//Handler parses the model data into the view's div classes and ID tags
	//Get asset data 0
	$('.title_0').html('<h2 class ="box_text_h2">' + jsonObj.pageTextData[0].title + '</h2>');
	$('.subTitle_0').html('<h3 class ="box_text_h3">' + jsonObj.pageTextData[0].subTitle + '</h3>');
	$('.description_0').html('<p class ="box_text_p">' + jsonObj.pageTextData[0].description + '</p>');		
	$('#image_0').html('<img class="img-thumbnail" id="1" data-toggle="modal" data-target="#myModal" src="' + jsonObj.pageTextData[0].imageUrl + '" alt=" WIP Image 1"/>');
	
	//Get asset data 1
	$('.title_1').html('<h2 class ="box_text_h2">' + jsonObj.pageTextData[1].title + '</h2>');
	$('.subTitle_1').html('<h3 class ="box_text_h3">' + jsonObj.pageTextData[1].subTitle + '</h3>');
	$('.description_1').html('<p class ="box_text_p">' + jsonObj.pageTextData[1].description + '</p>');
	$('#image_1').html('<img class="img-thumbnail" id="1" data-toggle="modal" data-target="#myModal" src="' + jsonObj.pageTextData[1].imageUrl + '" alt=" WIP Image 2"/>');

	 //Get asset data 2
	$('.title_2').html('<h2 class ="box_text_h2">' + jsonObj.pageTextData[2].title + '</h2>');
	$('.subTitle_2').html('<h3 class ="box_text_h3">' + jsonObj.pageTextData[2].subTitle + '</h3>');
	$('.description_2').html('<p class ="box_text_p">' + jsonObj.pageTextData[2].description + '</p>');
	$('#image_2').html('<img class="img-thumbnail" id="1" data-toggle="modal" data-target="#myModal" src="' + jsonObj.pageTextData[2].imageUrl + '" alt=" WIP Image 3"/>');

	//Get asset data 3
	 $('.title_3').html('<h2 class ="box_text_h2">' + jsonObj.pageTextData[3].title + '</h2>');
	$('.subTitle_3').html('<h3 class ="box_text_h3">' + jsonObj.pageTextData[3].subTitle + '</h3>');
	$('.description_3').html('<p class ="box_text_p">' + jsonObj.pageTextData[3].description + '</p>');
	$('#image_3').html('<img class="img-thumbnail" id="1" data-toggle="modal" data-target="#myModal" src="' + jsonObj.pageTextData[3].imageUrl + '" alt=" WIP Image 4"/>');

	//Get asset data 4
	 $('.title_4').html('<h2 class ="box_text_h2">' + jsonObj.pageTextData[4].title + '</h2>');
	$('.subTitle_4').html('<h3 class ="box_text_h3">' + jsonObj.pageTextData[4].subTitle + '</h3>');
	$('.description_4').html('<p class ="box_text_p">' + jsonObj.pageTextData[4].description + '</p>');
	$('#image_4').html('<img class="img-thumbnail" id="1" data-toggle="modal" data-target="#myModal" src="' + jsonObj.pageTextData[4].imageUrl + '" alt=" WIP Image 5"/>');
	
	//Get asset data 5
	 $('.title_5').html('<h2 class ="box_text_h2">' + jsonObj.pageTextData[5].title + '</h2>');
	$('.subTitle_5').html('<h3 class ="box_text_h3">' + jsonObj.pageTextData[5].subTitle + '</h3>');
	$('.description_5').html('<p class ="box_text_p">' + jsonObj.pageTextData[5].description + '</p>');
	$('#image_5').html('<img class="img-thumbnail" id="1" data-toggle="modal" data-target="#myModal" src="' + jsonObj.pageTextData[5].imageUrl + '" alt=" WIP Image 6"/>');
	
	//Get asset data 6
	 $('.title_6').html('<h2 class ="box_text_h2">' + jsonObj.pageTextData[6].title + '</h2>');
	$('.subTitle_6').html('<h3 class ="box_text_h3">' + jsonObj.pageTextData[6].subTitle + '</h3>');
	$('.description_6').html('<p class ="box_text_p">' + jsonObj.pageTextData[6].description + '</p>');
	$('#image_6').html('<img class="img-thumbnail" id="1" data-toggle="modal" data-target="#myModal" src="' + jsonObj.pageTextData[6].imageUrl + '" alt=" WIP Image 7"/>');

	//Get asset data 7
	 $('.title_7').html('<h2 class ="box_text_h2">' + jsonObj.pageTextData[7].title + '</h2>');
	$('.subTitle_7').html('<h3 class ="box_text_h3">' + jsonObj.pageTextData[7].subTitle + '</h3>');
	$('.description_7').html('<p class ="box_text_p">' + jsonObj.pageTextData[7].description + '</p>');
	$('#image_7').html('<img class="img-thumbnail" id="1" data-toggle="modal" data-target="#myModal" src="' + jsonObj.pageTextData[7].imageUrl + '" alt=" WIP Image 8"/>');
	
	//Get asset data 8
	$('.title_8').html('<h2 class ="box_text_h2">' + jsonObj.pageTextData[8].title + '</h2>');
	$('.subTitle_8').html('<h3 class ="box_text_h3">' + jsonObj.pageTextData[8].subTitle + '</h3>');
	$('.description_8').html('<p class ="box_text_p">' + jsonObj.pageTextData[8].description + '</p>');
	$('#image_8').html('<img class="img-thumbnail" id="1" data-toggle="modal" data-target="#myModal" src="' + jsonObj.pageTextData[8].imageUrl + '" alt=" WIP Image 8"/>');

	//Get the section titles
	$('.section_1').html('<h2 class ="box_text_h2">' + jsonObj.pageTextData[9].section_1 + '</h2>');
	$('.section_2').html('<h2 class ="box_text_h2">' + jsonObj.pageTextData[9].section_2 + '</h2>');
	$('.section_3').html('<h2 class ="box_text_h2">' + jsonObj.pageTextData[9].section_3 + '</h2>');
	$('.section_4').html('<h2 class ="box_text_h2">' + jsonObj.pageTextData[9].section_4 + '</h2>');
	
	//Get the Assignment footer information, name, candidate number and statement of orginality
	$('.name').html('<p class="p.box_text_p">' + jsonObj.pageTextData[10].name + '</p>');
	$('.email').html('<p>' + jsonObj.pageTextData[10].email + '</p>');
})


});