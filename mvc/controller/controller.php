<?php
//Create the controller class for the MVC design pattern
class Controller {
	public $load;
	public $model;
	// Create functions for the controller class
	function __construct($pageURI = null) // contructor of the class
	{
		//echo $pageURI;
		$this->load = new Load(); //we are accessing the ‘load’ and 
		// ‘model’ variables from the current class object. 
		$this->model = new Model();
		// determine what page you are on
		$this->$pageURI(); //refers to the home function from the current class object.
	}
	function home()
	// home page function
	{
		$this->load->view('home');
	}

	function bcExplorerDw()
	{
		$this->load->view('bcExplorerDw');
	}

	function bcExplorerBs()
	{
		$this->load->view('bcExplorerBs');
	}

	function getBitcoinJSON()
	{
		$data = $this->model->dbReadBitcoinData();
		echo json_encode($data);
	}
	
	function dbCreateBitcoinData()
	{
		$data = $this->model->dbCreateBitcoinData();
		$this->load->view('view_simple_message',$data);
	}

	// This method is not needed, it simply calls the getBitcoiunJSON method, which calls
	// the PHP dbReadBitcoinData method in te model and echos the data.
	function displayBitcoinData()
	{
		$this->load->view('view_simple_message', $this->getBitcoinJSON());
	}

	// This method calls the PHP dbReadBitcoinData method in the model and echos the data
	// to the JQuery AJAX function
	function dbReadBitcoinData()
	{
		$data = $this->model->dbReadBitcoinData();
		echo json_encode($data);
	}
	
	function dbDelete()
	{
		$data = $this->model->dbDelete();
		$this->load->view('view_simple_message',$data);
	}
    
    function apiReadBitcoinData()
	{
		$data = $this->model->apiReadBitcoinData();
		echo json_encode($data);
	}
    
}
?>