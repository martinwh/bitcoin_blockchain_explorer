// JavaScript Blockchain
const SHA256 = require('./node_modules/crypto-js/sha256');

class Block{
    // Constructor to hold the block properties of the blockchain, such as: index (a blockchain id), 
    // timestamp (when the block was appended), transaction data (e.g. bitcoins transacted), previoushash
    // of the previous block
    constructor(index, timestamp, data, previoushash = ''){
        // Keep track of all these block properties
        this.index = index;
        this.timestamp = timestamp;
        this.data = data;
        this.previoushash = previoushash;
        // We also need to calculate the hash of the current block
        this.hash = this.calculateHash();
        this.nonce = 0;
    }

    // Method to claaculate the has of the current block on the blockchain
    calculateHash(){
        // Note, we are accessing the constructor index, previoushas, timestamp and data values
        // We are also converting the javaScript data to a JSON string, and casting the hash result to a string.
        return SHA256(this.index + this.previoushash + this.timestamp + JSON.stringify(this.data) + this.nonce).toString();
    }

    // Method to mine a block by computing the hash value that matchses the requirequred difficulty level
    mineBlock(difficulty){
        //We need a while loop to continue computing the hash value until we find a value that has th e required
        // number of leading zeros
        while(this.hash.substring(0, difficulty) !== Array(difficulty + 1).join("0")){
            this.nonce++;
            this.hash = this.calculateHash();
        }

        
        console.log("Block mined: " + this.hash);

    }


}

// A new class for the blockchain
class Blockchain {
    // Constructor responsible for initialising the blockchain
    constructor(){
        // Create an array of blocks
        this.chain = [this.createGenesisBlock()];
        // Set a difficulty level
        this.difficulty = 5;
    }

    // Method to create the first block in the blockchain, i.e. the Gnesis block
    createGenesisBlock(){
        // Obvioisly, the index is zero, a date, some data, and there is no previousHash, so just set this to 0
        return new Block(0, "01/01/2017", "Genesis block", "0"); 
    }

    // Method to get the latest block
    getLatestBlock(){
        // Returns the latest block on this chain by computing the chain length and subtracting 1, 
        // blockchain starts at 0 remember
        return this.chain[this.chain.length - 1];

    }

    // Method to add a new block to the blockchain
    addBlock(newBlock){
        // Need to find the previousHash of the previous block, so use the getLatestBlock() method
        newBlock.previousHash = this.getLatestBlock().hash;
        // Calculate the new block's hash — Part 1 of Blockchain Turorial 2
        // newBlock.hash = newBlock.calculateHash();
        // Calculate the mined block — Part 2 of Blockchain Turorial 2
        newBlock.mineBlock(this.difficulty);
        // And, add the new block to the blockchain
        this.chain.push(newBlock);
    }

    // Method to check that the blockchain is valid
    isChainValid(){
        // Loop round the blockchain for the block after the Genesis block to the end of the blockchain
        for(let i = 1; i < this.chain.length; i++){
            // Grab the current block
            const currentBlock = this.chain[i];
            
            // and, the previous block, so that we can check that they are properly linked together with the correct hash values
            const previousBlock = this.chain[i - 1];
            
            // Check if the hash of the current block is still valid by comparing with a recalculated current hash value.
            if(currentBlock.hash !== currentBlock.calculateHash()){
                console.log('Bad hash value!');
                return "No, the blockchain currentBlock.previousHash does not match the currentBlock.calculateHash(), suspect current block data tampered with!";
            }

            // Check that our current block points to the correct previous block as indicated by the previousHash value.
            if(currentBlock.previousHash !== previousBlock.hash){
                console.log('Bad previousHash!');                
                return "No, the blockchain currentBlock.previousHash does not match the previousBlock.hash; suspect current block points to invalid chain!";
            }
        }
        // If the blocks do not return false,, then they must be valid
        return "Yes, I confirm that the blockchain is valid";
    }
}

    // Instantiate the new blockchain using the Blockchain class, call it myBitcoin 
    let myBitcoin = new Blockchain();
    
    // Add a couple of blocks to the blockchain
    console.log("Mining block 1 ...");
    myBitcoin.addBlock(new Block(1, "10/07/2017", { amount: 4}));
    
    console.log("Mining block 2 ...");
    myBitcoin.addBlock(new Block(2, "12/07/2017", { amount: 10}));

    
    
    
    // Test the isChainValid() method
    //console.log('Is blockchain valid? ' + myBitcoin.isChainValid());

    // Tamper with block 2 by overwriting the data, e.g. transfer 100 coins, make ourselves rich!
    //myBitcoin.chain[1].data = { amount: 100 };
    // Just tampering with block 2 by overwriting the data didn't work, we got rumbled,
    // so let's recalculate and inject a new hash value!
    //myBitcoin.chain[1].hash = myBitcoin.chain[1].calculateHash();

    // Test the isChainValid() method, again
    //console.log('Is blockchain valid? ' + myBitcoin.isChainValid());
   
    // View the result as a JSON string using console.log() in JSON format
    //console.log(JSON.stringify(myBitcoin, null, 4));



