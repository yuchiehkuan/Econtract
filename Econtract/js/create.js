add_transaction_click = 0;
function add_transaction() {
    add_transaction_click += 1;
    add_transaction_clicked();
    return add_transaction_click;
}

function add_transaction_clicked() {
    //add transaction....
    var contract_dates = document.getElementById('contract_dates');
    var transaction_count = document.getElementById('transaction_count');
    date_ID = "contract_date" + add_transaction_click;
    dates = "contract_dates" + (add_transaction_click - 1);
    datess = "contract_dates" + (add_transaction_click - 2);
    money_ID = "contract_money" + add_transaction_click;
    transaction_count.value = add_transaction_click;
    if (add_transaction_click - 1 <= 0) {
        
        contract_dates.innerHTML="<div class='form-group row'><div class='col-sm-5 mb-3 mb-sm-0'><label for='contract_name'>交易方式：</label><input type='datetime-local' class='form-control form-control-user' id='" + date_ID + "' name='" + date_ID + " 'placeholder='日期'></div><div class='col-sm-5'><label for='contract_money'>交易金額：</label><input type='number' class='form-control form-control-user' id='" + money_ID + "' name='" + money_ID + "' placeholder='交易金額'></div></div><span id='" + dates + "'></span>";
    } else {
        // alert(content_ID);
        contract_dates = document.getElementById(datess);
        contract_dates.innerHTML="<div class='form-group row'><div class='col-sm-5 mb-3 mb-sm-0'><label for='contract_name'>交易方式：</label><input type='datetime-local' class='form-control form-control-user' id='" + date_ID + "' name='" + date_ID + " 'placeholder='日期'></div><div class='col-sm-5'><label for='contract_money'>交易金額：</label><input type='number' class='form-control form-control-user' id='" + money_ID + "' name='" + money_ID + "' placeholder='交易金額'></div></div><span id='" + dates + "'></span>";
    }
    // alert(add_transaction_click);
    return false;
}

function getData(contract_json_data) {
	let hex  = JSON.stringify(contract_json_data);
    // hex = hex.toString(16);
    let data = '0x';
	for (var n = 0; n < hex.length; n ++) {
		data += hex.charCodeAt(n).toString(16);
	}
    return data;
}

function backData(contract_json_data) {
	var inputData = contract_json_data.split('');
    let data = '';
    for (var i = 0; i < inputData.length / 2; i++) {
        var tmp = "0x" + inputData[i * 2] + inputData[i * 2 + 1]
        var charValue = String.fromCharCode(tmp);
        data += charValue;
    }
    return data;
}

var web3 = new Web3(Web3.givenProvider || "http://127.0.0.1:8545");
async function to_sendtransaction(contract_json_data, Ethpwd) {
    try {
        // console.log(getData(contract_json_data));
        this.web3.eth.personal.unlockAccount(contract_json_data.A_ethAccount, Ethpwd, 150000);
        let transaction = await web3.eth.sendTransaction({
            from:contract_json_data.A_ethAccount,
            gasPrice: "0",
            gas: "6721975",
            to:contract_json_data.B_ethAccount,
            value:'0x00',
            data: getData(contract_json_data)
        }, Ethpwd).then(function(hash){
            return hash.transactionHash;
        });
        
        // let transactioned = await web3.eth.getTransaction(transaction)
        // .then(function(res){
        //     let inputData = res.input;
        //     let res_str = backData(inputData);
        //     // let res_json = JSON.parse(res_str);
        console.log(transaction);
        // });
        // console.log(transactioned);
        location.href="./hashaddDB.php?transactionHash="+transaction+"&&contract_Key="+contract_json_data.key;
    } catch(err) {
        console.error("Error:", err);
    }
}

