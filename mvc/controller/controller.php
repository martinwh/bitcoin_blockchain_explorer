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

	function explorer()
	{
		$this->load->view('explorer');
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

	function dbReadBitcoinData()
	{
		$this->load->view('view_simple_message', $this->getBitcoinJSON());
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