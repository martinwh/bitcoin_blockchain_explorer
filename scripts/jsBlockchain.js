// JavaScript Blockchain
const SHA256 = require('./node_modules/crypto-js/sha256');

class Block(){
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
    }

    // Method to claaculate the has of the current block on the blockchain
    calculateHash(){
        // Note, we are accessing the constructor index, previoushas, timestamp and data values
        // We are also converting the javaScript data to a JSON string, and casting the hash result to a string.
        return SHA2569(this.index + this.previoushash + this.timestamp + JSON.stringify(this.data)).toString();
    }

}
