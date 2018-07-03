module.exports = {
  networks: {
    development: {
      host: 'localhost',
      port: 8545,
      network_id: '1618', // Match any network id,
      gas: 4712387
    },
    staging: {
      host: '54.154.158.225',
      port: 8545,
      network_id: '1618', // Match any network id,
      from: '0xd912aecb07e9f4e1ea8e6b4779e7fb6aa1c3e4d8', // Some address on the network, be sure its unlocked!, disable
      gas: 4712387
    }
  }
};
