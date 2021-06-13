var web3 = new Web3(Web3.givenProvider || "http://127.0.0.1:8545");
async function start() {
    try {
        var eth_account = 'eth_account';
        var defaultAccount = getCookie(eth_account);
        let balance = await web3.eth.getBalance(defaultAccount);
        var html_account = document.getElementById("account");
        var html_balance = document.getElementById("balance");
        html_account.textContent = defaultAccount;
        html_balance.textContent = web3.utils.fromWei(balance, "ether");
        console.log('eth_account', defaultAccount);
    } catch(err) {
        console.error("Error:", err);
    }
}
window.addEventListener("load", start);

function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}

