<?php
// Model to access bitcoin APIs based on Kyle Honeycutt's lessons
// Extensions planned include breaking out Bitcoin API calls into separate methods (functions)
// For example: 
//
//			public function bitfinex_last_price()
//			public function bitstamp_last_price()
//			public function coinbase_last_price()
// 
// and so on. The methods will then be called from the controller class to create appropriate methods to simulate useful APIs to extract Bitcoin information from the blockchain

// For this project I have just switched to Visual Studio Code because it looks similar to Brackets, but it allows us to integrated with GitHub.  
// Here is a very simple YouTube video (https://www.youtube.com/watch?v=9cMWR-EGFuY)showing how to set up a repository on Githuba dn connect to it via Visual Studio Code
// and, here is another Youtube video (https://www.youtube.com/watch?v=6n1G45kpU2o)showing how to do version control using Git in Visual Studio Code — Cool!

//Create a model class for accessing a SQLite database and Bitcoin APIs
class Model {
	//create a new PDO object that represents a connection to a database
	// Property declaration, in this case we are declaring a variable that points to the database connection
	public $dbhandle;
	//method to create database connection using PHP data Objects (PDO) as the interface to SQLite
	
	// Create an a method to make an initial database connection to SQLite to use as local storage for Bitcoin data returned from Bitcoin APIs
	public function __construct()
	{
		$dsn = 'sqlite:./mvc/model/db/bitcoin.sqlite';
		$user = 'user';
		$password = 'password';
		try {
			//Change connection string for different databases, currently using SQLite
			$this->dbhandle = new PDO($dsn, $user, $password, array(
														PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION,
														PDO::ATTR_EMULATE_PREPARES=> false,
														));
			//$this->dbhandle->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}
		catch (PDOEXception $e) {
			print new Exception($e->getMessage());
		}
	}

	// Create a method to write Bitcoin data to the local SQLite storage — this is just a test at the moment 
	public function dbCreateBitcoinData()
	{
		try{
			$this->dbhandle->exec("CREATE TABLE bitcoin_data
									(id INTEGER PRIMARY KEY,
									bitfinex_lp REAL, 
									bitstamp_lp REAL,
									coinbase_lp REAL,
									current_block_height INTEGER,
									bits_transacted INTEGER,
									miner_address TEXT,
									amount INTEGER,
									total_bitcoins REAL)"); 
			$this->dbhandle->exec("INSERT INTO bitcoin_data
									(id, bitfinex_lp,
									bitstamp_lp,
									coinbase_lp,
									current_block_height,
									bits_transacted,
									miner_address,
									amount,
									total_bitcoins) 
				VALUES (0, '5655.40', '5665.00', '5688.00', '491472', '402713392', '1Hz96kJKF2HLPGY15JWLB5m9qGNxvt8tHJ', '6043155289569', '60,431.55');"
			);
			return "Data inserted successfully inside bitcoin.sqlite file"; 
		}
		catch (PDOEXception $e) {
			print new Exception($e->getMessage());
		}
		$this->dbhandle = NULL;
	}
	
	// Create a method to read Bitcoin data form the SQLite local storage
	public function dbReadBitcoinData()
	{
		try {
		
			//Get the database as an object using a prepared statement
			$sql = 'SELECT * FROM bitcoin_data';
			$stmt = $this->dbhandle->query($sql);
					
			//Set up an array to return the results to the view
			$result = null;
			
			//Set up a variable to index each row of the array
			$i=0;
			
			//Use a while loop to loop through the rows
			while ($data = $stmt->fetch()){
				
				//Write the database contents to the results array for sending back to the view
				$result['bitcoin_data'][$i]['bitfinex_lp'] = $data['bitfinex_lp'];
				$result['bitcoin_data'][$i]['bitstamp_lp'] = $data['bitstamp_lp'];
				$result['bitcoin_data'][$i]['coinbase_lp'] = $data['coinbase_lp'];
				$result['bitcoin_data'][$i]['current_block_height'] = $data['current_block_height'];
				$result['bitcoin_data'][$i]['bits_transacted'] = $data['bits_transacted'];
				$result['bitcoin_data'][$i]['miner_address'] = $data['miner_address'];
				$result['bitcoin_data'][$i]['amount'] = $data['amount'];
				$result['bitcoin_data'][$i]['total_bitcoins'] = $data['total_bitcoins'];
				
				//increment the row index
				$i++;
			}
			
		}
		catch (PDOEXception $e) {
			print new Exception($e->getMessage());
		}
		
		//Close the database connection
		$this->dbhandle = NULL;
		
		//Send the response back to the view
		return $result;
	}
	
	// Create a method to delete the Bitcoin data tabele — this will be useful to execute
	// every so often to ensure we don't run out of local storage
    public function dbDelete() {
		$this->dbhandle->exec("DROP TABLE bitcoin_data");
		return "Bitcoin data table successfully deleted from inside bitcoin.sqlite file";
	}
	
	// Create a method to get Bitcoin data using third party Bitcoin APIs — this is just a simple clump of Bitcoiun APIs calls in one method.
	// Future updates will separate out disctinct API calls into separate methods for access by the controller class
    public function apiReadBitcoinData()
	{
		try {
					
			//Set up an array to return the results to the view
			$result = null;
			
            // Get the latest Bitcoin price from Bitfinex
            $Bitfinex_Url = "https://api.bitfinex.com/v1/ticker/btcusd";
            $json = json_decode(file_get_contents($Bitfinex_Url), true);
			$priceBitfinex = $json["last_price"];

            // Get the latest Bitcoin price from Bitstamp
            $Bitstamp_Url = "https://www.bitstamp.net/api/ticker/";
            $json = json_decode(file_get_contents($Bitstamp_Url), true);
            $priceBitstamp = $json["last"];

            // Get the latest Bitcoin price from Coinbase
            $Coinbase_Url = "https://coinbase.com/api/v1/prices/spot_rate";
            $json = json_decode(file_get_contents($Coinbase_Url), true);
            $priceCoinbase = $json["amount"];
            
            //Get the current block height, i.e. the latest block number, which is mined every 10 minutes or so and added to the 
            //bitcoin blockchain. Height is fetched using the blockchain.inf 'lastestblock' API call
            $BlockchainInfo_Url = "https://blockchain.info/latestblock";
            $json = json_decode(file_get_contents($BlockchainInfo_Url), true);
            $block_number = $json["height"];
            
            // Let's also get the difficulty target of the latest bitcoin block!
            // The following code is what we wrote last time,
            // except we changed the last variable from block to block_index.
            $latestBlock_url = "https://blockchain.info/latestblock";
            $json = json_decode(file_get_contents($latestBlock_url), true);
            $block_index = $json["block_index"];

            // Lets plug in the $block_index variable and get
            // the difficulty target of the last block. returned in compact hexadecimal format
            $block_url = "https://blockchain.info/block-index/$block_index?format=json";
            $json_block = json_decode(file_get_contents($block_url), true);
            $total_bits = $json_block["bits"];
            
            // Let's dig in a little further and pull out the bitcoin address that received the block reward of 12.5 bitcoins for solving the block
            // Notice it's called "addr" and it's stored within the "out" array. And "out" is stored within the "tx" array.
            $miner_address = $json_block["tx"][0]["out"][0]["addr"];
            
            // Ok so we can get the latest block height and the address that received payment for mining the block.
            // Now lets use another JSON request to get information on that address.
            // The JSON url for addresses is https://blockchain.info/address/$bitcoin_address?format=json. 
            // You can replace $bitcoin_address with an actual bitcoin address in order to see the JSON format.
            // It is very similar to the block-index JSON. 
            // We can get the current balance, total amount received, total amount sent, and below that all the transactions on that address.
            // Get the total amount received by that miner address
            $addr_url = "https://blockchain.info/address/$miner_address?format=json";
            $json_addr = json_decode(file_get_contents($addr_url), true);
            $tot_rec = $json_addr["total_received"];
            
            // Convert to Bitcoins
            $tot_rec_con = $tot_rec / 100000000;
            $total_bitcoins = number_format($tot_rec_con,8);
            
            //Write the Bitcoin to the results array for sending back to the view
            $result['bitcoin_data'][0]['bitfinex_lp'] = $priceBitfinex;
            $result['bitcoin_data'][0]['bitstamp_lp'] = $priceBitstamp;
            $result['bitcoin_data'][0]['coinbase_lp'] = $priceCoinbase;
            $result['bitcoin_data'][0]['current_block_height'] = $block_number;
            $result['bitcoin_data'][0]['bits_transacted'] = $total_bits;
            $result['bitcoin_data'][0]['miner_address'] = $miner_address;
            $result['bitcoin_data'][0]['amount'] = $tot_rec;
            $result['bitcoin_data'][0]['total_bitcoins'] = $total_bitcoins;
            
		}
		catch (PDOEXception $e) {
			print new Exception($e->getMessage());
		}
		
		//Send the response back to the view via the controller class
		return $result;

	}

	// Create a method to get the current bitcoin values from various bitcoin exchange sites
	public function apiGetBitcoinExchangeRate()
	{
		try {
					
			//Set up an array to return the results to the controller
			$result = null;
			
			// Get the latest Bitcoin price from Bitfinex
			$Bitfinex_Url = "https://api.bitfinex.com/v1/ticker/btcusd";
			$json = json_decode(file_get_contents($Bitfinex_Url), true);
			$priceBitfinex = $json["last_price"];

			// Get the latest Bitcoin price from Bitstamp
			$Bitstamp_Url = "https://www.bitstamp.net/api/ticker/";
			$json = json_decode(file_get_contents($Bitstamp_Url), true);
			$priceBitstamp = $json["last"];

			// Get the latest Bitcoin price from Coinbase
			$Coinbase_Url = "https://coinbase.com/api/v1/prices/spot_rate";
			$json = json_decode(file_get_contents($Coinbase_Url), true);
			$priceCoinbase = $json["amount"];
			
			//Write the Bitcoin to the results array for sending back to the view
			$result['bitcoin_data'][0]['bitfinex_lp'] = $priceBitfinex;
			$result['bitcoin_data'][0]['bitstamp_lp'] = $priceBitstamp;
			$result['bitcoin_data'][0]['coinbase_lp'] = $priceCoinbase;
	
		}
		catch (PDOEXception $e) {
			print new Exception($e->getMessage());
		}
		
		//Send the response back to the view via the controller class
		return $result;

	}

	// Method to get block data from the latest bitcoin block
    public function apiGetLatestBlockData()
	{
		try {
					
			// Set up an array to return the results to the view via the controller
			$result = null;	

			// Get the current block height, block index, has and timestamp of the latest bitcoin block!
            $latest_block = "https://blockchain.info/latestblock?format=json";
            $json = json_decode(file_get_contents($latest_block), true);
			$block_hash = $json["hash"];
			$block_time = $json["time"];
			$block_index = $json["block_index"];
			$block_height = $json["height"];
			
			// Get the block header data from the last block.
			// Example, run this API endpoint in a browser and use '1650086' as the block_index
            $block_last = "https://blockchain.info/block-index/$block_index?format=json";
            $block_json = json_decode(file_get_contents($block_last), true);
			// Pick off the required block header data
		  //$block_hash = $json["hash"];
			$block_ver = $block_json["ver"];
			$block_prev_block = $block_json["prev_block"];
			$block_mrkl_root = $block_json["mrkl_root"];
			$block_time = $block_json["time"];
			$block_bits = $block_json["bits"];
			$block_difficulty = $block_json["bits"];
			$block_fee = $block_json["fee"];
			$block_nonce = $block_json["nonce"];
			$block_n_tx = $block_json["n_tx"];
			$block_size = $block_json["size"];
			$block_block_index = $block_json["block_index"];
			$block_main_chain = $block_json["main_chain"];
		  //$block_height = $block_json["height"];
			$block_received_time = $block_json["received_time"];
			$block_relayed_by = $block_json["relayed_by"];
            
            //Write the block data to the results array for sending back to the controller
			$result['bitcoin_data'][0]['block_hash'] = $block_hash;
			$result['bitcoin_data'][0]['block_prev_block'] = $block_prev_block;			
			$result['bitcoin_data'][0]['block_mrkl_root'] = $block_mrkl_root;	
			$result['bitcoin_data'][0]['block_time'] = $block_time;
			$result['bitcoin_data'][0]['block_bits'] = $block_bits;
			$result['bitcoin_data'][0]['block_difficulty'] = $block_difficulty;
			$result['bitcoin_data'][0]['block_fee'] = $block_fee;
            $result['bitcoin_data'][0]['block_nonce'] = $block_nonce;
            $result['bitcoin_data'][0]['block_n_tx'] = $block_n_tx;
			$result['bitcoin_data'][0]['block_size'] = $block_size;	
			$result['bitcoin_data'][0]['block_index'] = $block_index;
            $result['bitcoin_data'][0]['block_main_chain'] = $block_main_chain;
			$result['bitcoin_data'][0]['block_height'] = $block_height;
			$result['bitcoin_data'][0]['block_received_time'] = $block_received_time;		
			$result['bitcoin_data'][0]['block_relayed_by'] = $block_relayed_by;	
			
		}
		catch (PDOEXception $e) {
			print new Exception($e->getMessage());
		}
		
		//Send the response back to the view via the controller class
		return $result;

	}

	// Method to get data from the miner of the latest bitcoin block
    public function apiGetLatestBlockMinerData()
	{
		try {	
			// Set up an array to return the results to the view via the controller
			$result = null;	
			// Get the block_index from the latest block data
            $latest_block = "https://blockchain.info/latestblock";
			$json = json_decode(file_get_contents($latest_block), true);
			$block_index = $json["block_index"];
			// Get the last block data.
			// Example, run this API endpoint in a browser and use '1650086' as the block_index
            $block_last = "https://blockchain.info/block-index/$block_index?format=json";
            $block_json = json_decode(file_get_contents($block_last), true);
            // Get the miner address that received the bitcoin block reward for solving the block
            // Notice it's called "addr" and it's stored within the "out" array. And "out" is stored within the "tx" array.
            $block_miner_address = $block_json["tx"][0]["out"][0]["addr"];
			$block_miner_value_satoshi = $block_json["tx"][0]["out"][0]["value"];
			$btc_value = $block_miner_value_satoshi / 100000000;
			$block_miner_value = number_format($btc_value,8);
			// get the reward in BTC
			$block_miner_fee_satoshi = $block_json["fee"];
			$btc_fee = $block_miner_fee_satoshi / 100000000;
			$block_miner_fee = number_format($btc_fee,8);
			$block_miner_reward = $block_miner_value - $block_miner_fee;
            // Get some miner data at that miner address
            $block_miner = "https://blockchain.info/address/$block_miner_address?format=json";
			$block_miner_json = json_decode(file_get_contents($block_miner), true);
			// Miner data at the miner address
			$block_miner_hash160 = $block_miner_json["hash160"];
		  //$block_miner_address = $block_miner_json["address"];
			$block_miner_n_tx = $block_miner_json["n_tx"];
			$block_miner_total_received = $block_miner_json["total_received"];
			$block_miner_total_sent = $block_miner_json["total_sent"];
			$block_miner_final_balance = $block_miner_json["final_balance"];
            // Convert to Bitcoins
            $btc = $block_miner_final_balance / 100000000;
			$block_miner_btc = number_format($btc,8);
			// Convert to dollars using the Coinbase exchange spot rate
			// Get the latest Bitcoin price from Coinbase
			$Coinbase_Url = "https://coinbase.com/api/v1/prices/spot_rate";
			$json = json_decode(file_get_contents($Coinbase_Url), true);
			$priceCoinbase = $json["amount"];
			$dollar = $block_miner_btc * $priceCoinbase;
			$block_miner_dollar = number_format($dollar,2);
            //Write the Bitcoin to the results array for sending back to the view
			$result['bitcoin_data'][0]['block_miner_hash160'] = $block_miner_hash160;
			$result['bitcoin_data'][0]['block_miner_address'] = $block_miner_address;
			$result['bitcoin_data'][0]['block_miner_n_tx'] = $block_miner_n_tx;
            $result['bitcoin_data'][0]['block_miner_total_received'] = $block_miner_total_received;
            $result['bitcoin_data'][0]['block_miner_total_sent'] = $block_miner_total_sent;
            $result['bitcoin_data'][0]['block_miner_final_balance'] = $block_miner_final_balance;
			$result['bitcoin_data'][0]['block_miner_btc'] = $block_miner_btc;
			$result['bitcoin_data'][0]['block_miner_dollar'] = $block_miner_dollar;
			$result['bitcoin_data'][0]['block_miner_fee'] = $block_miner_fee;
			$result['bitcoin_data'][0]['block_miner_value'] = $block_miner_value;
			$result['bitcoin_data'][0]['block_miner_reward'] = $block_miner_reward;
		}
		catch (PDOEXception $e) {
			print new Exception($e->getMessage());
		}
		
		//Send the response back to the view via the controller class
		return $result;
	}


    
}		
?>
		

				
