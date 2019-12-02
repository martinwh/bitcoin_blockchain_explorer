<?php
//Create the controller class for the MVC design pattern
class Controller {
	public $load;
	public $model;

	// Create functions (methods) for the controller class
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

	// Put more controller methods here
	// Method to create some test bitcoin data in the DB
	function dbCreateBitcoinData()
	{
		//echo "Create table in database for test bitcoin data";
		$data = $this->model->dbCreateBitcoinData();
		$this->load->view('view_simple_message',$data);
	}
	
	// Method to read the bitcoin data from the DB
	function dbReadBitcoinData()
	{
		//echo "Read test bitcoin data for database table";
		$data = $this->model->dbReadBitcoinData();
		echo json_encode($data);
	}
	
	// Method to delte (drop) the bitcoin data from the DB
	function dbDelete()
	{
		//echo "delete test bitcoin data, i.e. drop the table";
		$data = $this->model->dbDelete();
		$this->load->view('view_simple_message',$data);
	}
	
	// Method to read bitcoin data from the DB
	function getBitcoinJSON()
	{
		$data = $this->model->dbReadBitcoinData();
		echo json_encode($data);
	}
	
    // Method to read bitcoin data from third party APIs
    function apiReadBitcoinData()
	{
		$data = $this->model->apiReadBitcoinData();
		echo json_encode($data);
	}
	
	// Controller methods to connect to various views
	// Method to use view with Bootsrap
	function bcExplorerBs()
	{
		$this->load->view('bcExplorerBs');
	}

	// Alternative view using Dreamweaver's grid system
	function bcExplorerDw()
	{
		$this->load->view('bcExplorerDw');
	}

	// This method is not needed, it simply calls the getBitcoiunJSON method, which calls
	// the PHP dbReadBitcoinData method in te model and echos the data.
	function displayBitcoinData()
	{
		$this->load->view('view_simple_message', $this->getBitcoinJSON());
	}

	// Method to read bitcoin exchange rates, this method will have an associated PHP method
	// apiGetBitcoinExchangeRate() in the mvc/model folder
	function apiGetBitcoinExchangeRate()
	{
		$data = $this->model->apiGetBitcoinExchangeRate();
		echo json_encode($data);
	}

    // Method to get bitcoin last block data, this method will have an associated PHP method
	// apiGetLatestBlockMinerBtc() in the mvc/model folder
	function apiGetLatestBlockData()
	{
		$data = $this->model->apiGetLatestBlockData();
		echo json_encode($data);
	}

	// Method to get bitcoin last block miner data, this method will have an associated PHP method
	// apiGetLatestBlockMinerData() in the mvc/model folder
	function apiGetLatestBlockMinerData()
	{
		$data = $this->model->apiGetLatestBlockMinerData();
		echo json_encode($data);
	}

	// Method to get test Tehther data in JSON format
	function apiGetJsonTetherData()
	{
		$data = $this->model->apiTestTetherData();
		echo $data;
	}

}
?>