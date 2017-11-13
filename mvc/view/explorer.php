<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="../styles/boilerplate.css" rel="stylesheet" type="text/css">
	<link href="../styles/main.css" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="../scripts/getBitcoinData.js"></script>

	<title>Blockchain Explorer</title>

</head>

<body>

	<div id="content">

		<div id="header">
		<h1>Blockchain Explorer</h1>
			<ul>
                <li><a href="../index.php/home">HOME</a></li>
				<li><a href="#">BITCOIN</a></li>
				<li><a href="#">ETHER</a></li>
			</ul>
		</div>
	
		<!-- Display selected Bitcoin information from Bitcoin exchnages and current current block -->
		<div id="information"> 
			<h3 id="information_header">Blockchain Information</h3>  
			<div id="information_body">
				<!-- Grab lastes Bitcoin price from Bitfinex, Bitstamp and Coinbase exchanges -->
				<p><div class="information_sub_heading">BitFinex Last Price: </div><div id="bitfinex_lp"></div></p>
				<p><div class="information_sub_heading">Bitstamp Last Price: </div><div id="bitstamp_lp"></div></p>
				<p><div class="information_sub_heading">Coinbase Last Price: </div><div id="coinbase_lp"></div></p>
				<!-- Get current block height, bits transacted at this block, miner address who validated this block, current value of Satoshi for this miner, and Bitcoin value for this miner -->
				<p><div class="information_sub_heading">Current Block Height: </div><div id="current_block_height"></div></p>
				<p><div class="information_sub_heading">Bits Transacted in this Block: </div><div id="bits_transacted"></div></p>
				<p><div class="information_sub_heading">Miner Address in this Block: </div><div id="miner_address"></div></p>
				<p><div class="information_sub_heading">Amount Received at this Miner Address: </div></b><div id="amount"></div></p>
				<p><div class="information_sub_heading">Total Bitcoins at this Miner Address: </div><div id="total_bitcoins"></div></p>
			</div>
		</div>
				
		<div id="footer">

			
        </div>
	
	</div>
		  			
</body>
</html>
