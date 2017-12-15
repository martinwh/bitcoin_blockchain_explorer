// JavaScript Document
$(document).ready(function (){
    
	//AJAX service request to get the main text data from the JSON data store
    $.getJSON('../mvc/model/data.json', function(jsonObj) {		
		console.log(jsonObj);
		// Handler parses the model data into the view's div classes and ID tags
		// Very lazy coding, should probably put a loop round the classes, as I am treating a
		// class selector like an id selector, can't remember why I did this other than being too lazy to organise a loop!
        // Get asset data 0
        $('.title_0').html('<h2 class ="box_text_h2">' + jsonObj.pageTextData[0].title + '</h2>');
		$('.subTitle_0').html('<h3 class ="box_text_h3">' + jsonObj.pageTextData[0].subTitle + '</h3>');
		$('.description_0').html('<h4 class ="box_text_h4">' + jsonObj.pageTextData[0].description + '</h4>');		
		$('#image_0').html('<img class="img-thumbnail" id="1" data-toggle="modal" data-target="#myModal" src="' + jsonObj.pageTextData[0].imageUrl + '" alt=" WIP Image 1"/>');
        
		// Get asset data 1
		$('.title_1').html('<h2 class ="box_text_h2">' + jsonObj.pageTextData[1].title + '</h2>');
		$('.subTitle_1').html('<h3 class ="box_text_h3">' + jsonObj.pageTextData[1].subTitle + '</h3>');
		$('.description_1').html('<h4 class ="box_text_h4">' + jsonObj.pageTextData[1].description + '</h4>');
        $('#image_1').html('<img class="img-thumbnail" id="1" data-toggle="modal" data-target="#myModal" src="' + jsonObj.pageTextData[1].imageUrl + '" alt=" WIP Image 2"/>');
 
 		// Get asset data 2
		$('.title_2').html('<h2 class ="box_text_h2">' + jsonObj.pageTextData[2].title + '</h2>');
		$('.subTitle_2').html('<h3 class ="box_text_h3">' + jsonObj.pageTextData[2].subTitle + '</h3>');
		$('.description_2').html('<h4 class ="box_text_h4">' + jsonObj.pageTextData[2].description + '</h4>');
        $('#image_2').html('<img class="img-thumbnail" id="1" data-toggle="modal" data-target="#myModal" src="' + jsonObj.pageTextData[2].imageUrl + '" alt=" WIP Image 3"/>');

		// Get asset data 3
 		$('.title_3').html('<h2 class ="box_text_h2">' + jsonObj.pageTextData[3].title + '</h2>');
		$('.subTitle_3').html('<h3 class ="box_text_h3">' + jsonObj.pageTextData[3].subTitle + '</h3>');
		$('.description_3').html('<h4 class ="box_text_h4">' + jsonObj.pageTextData[3].description + '</h4>');
        $('#image_3').html('<img class="img-thumbnail" id="1" data-toggle="modal" data-target="#myModal" src="' + jsonObj.pageTextData[3].imageUrl + '" alt=" WIP Image 4"/>');

		// Get asset data 4
 		$('.title_4').html('<h2 class ="box_text_h2">' + jsonObj.pageTextData[4].title + '</h2>');
		$('.subTitle_4').html('<h3 class ="box_text_h3">' + jsonObj.pageTextData[4].subTitle + '</h3>');
		$('.description_4').html('<h4 class ="box_text_h4">' + jsonObj.pageTextData[4].description + '</h4>');
        $('#image_4').html('<img class="img-thumbnail" id="1" data-toggle="modal" data-target="#myModal" src="' + jsonObj.pageTextData[4].imageUrl + '" alt=" WIP Image 5"/>');
		
		// Get asset data 5
 		$('.title_5').html('<h2 class ="box_text_h2">' + jsonObj.pageTextData[5].title + '</h2>');
		$('.subTitle_5').html('<h3 class ="box_text_h3">' + jsonObj.pageTextData[5].subTitle + '</h3>');
		$('.description_5').html('<h4 class ="box_text_h4">' + jsonObj.pageTextData[5].description + '</h4>');
        $('#image_5').html('<img class="img-thumbnail" id="1" data-toggle="modal" data-target="#myModal" src="' + jsonObj.pageTextData[5].imageUrl + '" alt=" WIP Image 6"/>');
		
		// Get asset data 6
 		$('.title_6').html('<h2 class ="box_text_h2">' + jsonObj.pageTextData[6].title + '</h2>');
		$('.subTitle_6').html('<h3 class ="box_text_h3">' + jsonObj.pageTextData[6].subTitle + '</h3>');
		$('.description_6').html('<h4 class ="box_text_h4">' + jsonObj.pageTextData[6].description + '</h4>');
        $('#image_6').html('<img class="img-thumbnail" id="1" data-toggle="modal" data-target="#myModal" src="' + jsonObj.pageTextData[6].imageUrl + '" alt=" WIP Image 7"/>');

		// Get asset data 7
 		$('.title_7').html('<h2 class ="box_text_h2">' + jsonObj.pageTextData[7].title + '</h2>');
		$('.subTitle_7').html('<h3 class ="box_text_h3">' + jsonObj.pageTextData[7].subTitle + '</h3>');
		$('.description_7').html('<h4 class ="box_text_h4">' + jsonObj.pageTextData[7].description + '</h4>');
        $('#image_7').html('<img class="img-thumbnail" id="1" data-toggle="modal" data-target="#myModal" src="' + jsonObj.pageTextData[7].imageUrl + '" alt=" WIP Image 8"/>');
		
		// Get asset data 8
		$('.title_8').html('<h2 class ="box_text_h2">' + jsonObj.pageTextData[8].title + '</h2>');
		$('.subTitle_8').html('<h3 class ="box_text_h3">' + jsonObj.pageTextData[8].subTitle + '</h3>');
		$('.description_8').html('<h4 class ="box_text_h4">' + jsonObj.pageTextData[8].description + '</h4>');
        $('#image_8').html('<img class="img-thumbnail" id="1" data-toggle="modal" data-target="#myModal" src="' + jsonObj.pageTextData[8].imageUrl + '" alt=" WIP Image 8"/>');

		// Get the section titles
		// Blockchain Tutorial 1 — Build a MVC Framework to Explore the Bitcoin Blockchain
		$('.section_1').html('<h2 class ="box_text_h2">' + jsonObj.pageTextData[9].section_1 + '</h2>');
		// Blockchain Tutorial 2 — Build a Simple Blockchain in JavaScript
		$('.section_2').html('<h2 class ="box_text_h2">' + jsonObj.pageTextData[9].section_2 + '</h2>');
		// Blockchain Tutorial 3 — Build a Bitcoin Currency Exchange with API Endpoints
		$('.section_3').html('<h2 class ="box_text_h2">' + jsonObj.pageTextData[9].section_3 + '</h2>');
		// Blockchain Tutorial 4 — Explore the bitcoin blockchain with API Endpoints
		$('.section_4').html('<h2 class ="box_text_h2">' + jsonObj.pageTextData[9].section_4 + '</h2>');
		// Blockchain Tutorial 5 — Explore the bitcoin blockchain with WebSockets
		$('.section_5').html('<h2 class ="box_text_h2">' + jsonObj.pageTextData[9].section_5 + '</h2>');
		// Blockchain Tutorial 6— Build a simple blockchain explorer with the Webchain API
		$('.section_6').html('<h2 class ="box_text_h2">' + jsonObj.pageTextData[9].section_6 + '</h2>');
		
		// Get the section texts
		// Blockchain Tutorial 1 — Text
		$('.section_1_text').html('<p class="box_text_p">' + jsonObj.pageTextData[10].text_1 + '</p>');
		// Blockchain Tutorial 2 — Text
		$('.section_2_text').html('<p class="box_text_p">' + jsonObj.pageTextData[10].text_2 + '<p>');
		// Blockchain Tutorial 3 — Text
		$('.section_3_text').html('<p class="box_text_p">' + jsonObj.pageTextData[10].text_3 + '<p>');
		// Blockchain Tutorial 4 — Text
		$('.section_4_text').html('<p class="box_text_p">' + jsonObj.pageTextData[10].text_4 + '<p>');
		// Blockchain Tutorial 5 — Text
		$('.section_5_text').html('<p class="box_text_p">' + jsonObj.pageTextData[10].text_5 + '<p>');
		// Blockchain Tutorial 6 — Text
		$('.section_6_text').html('<p class="box_text_p">' + jsonObj.pageTextData[10].text_6 + '<p>');

		// Get the footer information, e.g. name, email
		$('.copyright').html('<p>' + jsonObj.pageTextData[11].copyright + '</p>');
		$('.name').html('<p>' + jsonObj.pageTextData[11].name + '</p>');
		$('.email').html('<p>' + jsonObj.pageTextData[11].email + '</p>');
	})
});