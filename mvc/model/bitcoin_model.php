<?php
// The following codes (simply echo'd out some formatting - the next version will convert to object oriented PHP and use methods)
// are adapted from Kyle Honeycutt's BTC Threads (https://btcthreads.com/lessons/), 
// which offers a number of interesting, but sparse PHP code examples
// that largely exploit the blockchain.info API for accessing the bitcoin blockchain.
// Kyle has also written a book called 'Building Bitcoin Websites - A Beginners Guide to Bitcoiun Focused Web Development',
// you can Google it and purchase it on Amazon
// Our goal will be to adapt the code on https://btcthreads.com/lessons/ and use it in a MVC design pattern 
// that will use the PHP as the data abstraction layer (DAL) for accessing the bitcoin blockchain
// Kyle also has a Youtube channel: https://www.youtube.com/watch?v=KxnLeuZGAaY
// Bitcoin Programming For Complete Beginners Using Websocket
// Also, a key concept to grasp is how the blockchain works: https://www.youtube.com/watch?v=baJYhYsHkLM

// Several Lessons:
// Lesson #1 — Introduction to Bitcoin
// Watch the video: https://btcthreads.com/a-brief-introduction-to-bitcoin/
// Also, a key concept to grasp is how the blockchain works: https://www.youtube.com/watch?v=baJYhYsHkLM

// Lesson #2 - Web Wallets
// Watch the video: https://btcthreads.com/getting-started-with-bitcoin-web-wallets/

// Lesson #3 - PHP and JSON
// Some simple code to access the latest bitcoin exchange rate using different APIs
// Watch the video: https://btcthreads.com/display-the-exchange-rate-on-your-website/
// Here's the code:
echo "<p>";
echo "<b>Lesson #3: Let's have a look at some Bitcoin latest prices!</b>";
echo "</p>";

echo "</p>";
// Get the latest Bitcoin price from Bitfinex
$Bitfinex_Url = "https://api.bitfinex.com/v1/ticker/btcusd";
$json = json_decode(file_get_contents($Bitfinex_Url), true);
$priceBitfinex = $json["last_price"];
echo "<b>Bitfinex Last Price</b>: ";
echo $priceBitfinex;
echo "</p><p>";

// Get the latest Bitcoin price from Bitstamp
$Bitstamp_Url = "https://www.bitstamp.net/api/ticker/";
$json = json_decode(file_get_contents($Bitstamp_Url), true);
$priceBitstamp = $json["last"];
$timeStamp = $json["timestamp"];
echo "<b>Bitstamp Last Price was:</b> $";
echo $priceBitstamp;
echo "<b> on the </b> ";
echo date ('m/d/Y', $timeStamp);
echo "<b> at </b> ";
echo date ('H:i:s', $timeStamp);
echo "</p><p>";

// Get the latest Bitcoin price from Coinbase
$Coinbase_Url = "https://coinbase.com/api/v1/prices/spot_rate";
$json = json_decode(file_get_contents($Coinbase_Url), true);
$priceCoinbase = $json["amount"];
echo "<b>Coinbase Last Price</b>: ";
echo $priceCoinbase;
echo "</p>";

// Lesson #4 - More PHP and JSON
// Some more code to access the latest bitcoin block using the blockchain.info API
// Watch the video: https://btcthreads.com/how-to-use-blockchain-info-api/
// Here's the code:
echo "<p>";
echo "<b>Lesson #4: Let's have a closer look at the current Bitcoin block!</b>";
echo "</p>";

echo "</p>";
//Get the current block height, i.e. the latest block number, which is mined every 10 minutes or so and added to the 
//bitcoin blockchain. Height is fetcehed using the blockchain.inf 'lastestblock' API call
$BlockchainInfo_Url = "https://blockchain.info/latestblock";
$json = json_decode(file_get_contents($BlockchainInfo_Url), true);
$block = $json["height"];
echo "<b>Current block height is the</b>: ";
echo $block;
echo "<b> block in the blockchain</b>: ";
echo "</p>";

echo "<p>";

// Let's get the total bits transacted in the latest bitcoin block!
// The following code is what we wrote last time,
// except we changed the last variable from block to block_index.
$latestBlock_url = "https://blockchain.info/latestblock";
$json = json_decode(file_get_contents($latestBlock_url), true);
$block_index = $json["block_index"];

// Lets plug in the $block_index variable and get
// the total number of bits that were in the last block.
$block_url = "https://blockchain.info/block-index/$block_index?format=json";
$json_block = json_decode(file_get_contents($block_url), true);
$total_bits = $json_block["bits"];
$block_number = $json_block["height"];
echo "<b>Block number</b>: ";
echo $block_number;
echo " <b>has </b>";
echo $total_bits;
echo " <b>bits transacted in this block</b>";
echo "</p>";

// Let's dig in a little further and pull out the bitcoin address that received the block reward of 25 bitcoins for solving the block
// Notice it's called "addr" and it's stored within the "out" array. And "out" is stored within the "tx" array.
$latestBlock_url = "https://blockchain.info/latestblock";
$json = json_decode(file_get_contents($latestBlock_url), true);
$block_index = $json["block_index"];
$block_url = "https://blockchain.info/block-index/$block_index?format=json";
$json_block = json_decode(file_get_contents($block_url), true);
$miner_address = $json_block["tx"][0]["out"][0]["addr"];
$block_number = $json_block["height"];
echo "<b>The address of the miner in block </b>";
echo $block_number;    
echo " <b>that received the 25 bitcoin reward for validating this transaction is</b>: ";
echo $miner_address;
echo " <b> and </b>";
echo $total_bits;
echo " <b>bits were transacted in this block</b>";
echo "</p>";

// Ok so we can get the latest block height and the address that received payment for mining the block.
// Now lets use another JSON request to get information on that address.
// The JSON url for addresses is https://blockchain.info/address/$bitcoin_address?format=json. 
// You can replace $bitcoin_address with an actual bitcoin address in order to see the JSON format.
// It is very similar to the block-index JSON. 
// We can get the current balance, total amount received, total amount sent, and below that all the transactions on that address.

// Get the latest block height
$latestBlock_url = "https://blockchain.info/latestblock";
$json = json_decode(file_get_contents($latestBlock_url), true);
$block_index = $json["block_index"];

// Get the address of the miner who validated the last block
$block_url = "https://blockchain.info/block-index/$block_index?format=json";
$json_block = json_decode(file_get_contents($block_url), true);
$miner_address = $json_block["tx"][0]["out"][0]["addr"];

// Get the total amount received by that miner address
$addr_url = "https://blockchain.info/address/$miner_address?format=json";
$json_addr = json_decode(file_get_contents($addr_url), true);
$tot_rec = $json_addr["total_received"];
$block_number = $json_block["height"];

// Print the block information to the web page
echo "<b>The address of the miner in block </b>";
echo $block_number;    
echo "<b> that received the 25 bitcoin reward for validating this transaction is</b>: ";
echo $miner_address;
echo "<b> and </b>";
echo $total_bits;
echo "<b> bits were transacted in this block.</b>";
echo "<b> The total amount received at the miner address is</b>: ";
echo $tot_rec;

// Convert to Bitcoins
echo "<b> Which is in Bitcoins</b>: ";
$tot_rec_con = $tot_rec / 100000000;
echo number_format($tot_rec_con,2);
echo " BTC";
echo "</p>";


echo "</br><br>";
echo "</br><br>";



// Lesson #5 - Introduction to Web Sockets
// Introduces how to use the blockchain.info Websocket API o you can get real-time information 
// on new transactions and new blocks as they happen.
// Watch the video: https://btcthreads.com/display-real-time-bitcoin-transactions-with-jquery-and-websocket/
// Here's the code:
echo "<p>";
echo "<b>Lesson #5: Let's use the blockchain.info Websocket API to access in real-time blockchain transation information!</b>";
echo "</p>";


// Lesson #6 - How to make a Block Explorer with Chain.com API
// This lesson shows you how to build a Block Explorere with the Chain.com API 
// Watch the video: https://btcthreads.com/how-to-make-a-block-explorer-with-chain-com-api/
// Here's the code:
echo "<p>";
echo "<b>Lesson #6: Let's Let's build a Block Explorer with the Chain.com API!</b>";
echo "</p>";


?>