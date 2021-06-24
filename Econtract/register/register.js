var web3 = new Web3(Web3.givenProvider || "http://127.0.0.1:8545");
var btn = document.getElementById('Register');
function createEth() {
    if(confirmpwd()) {
        try {
            var pwd = document.getElementById('pwd').value;
            // var eth = document.getElementById('eth');
            // var accounts = [];
            // var accounts_len = 0;
            // this.web3.eth.personal.newAccount(pwd).then(function(){
                this.web3.eth.getAccounts().then(function(res){ 
                    // accounts = res;
                    // accounts_len = res.length;
                    EthAccount = res[0];
                    // eth.innerHTML = "<input type='hidden' id='eth_account' name='eth_account' value='"+ EthAccount +"'>";
                    // console.log(EthAccount);
                    this.document.getElementById("eth_account").value = EthAccount;
                    // chk();
                    // return EthAccount;
                });
            // });
    //         let balance = await web3.eth.getBalance(EthAccount);
    //         var html_account = document.getElementById("account");
    //         var html_balance = document.getElementById("balance");
    //         html_account.textContent = defaultAccount;
    //         html_balance.textContent = web3.utils.fromWei(balance, "ether");
        } catch(err) {
            console.error("Error:", err);
            return false;
        }
    }
}

function confirmpwd() {
    var account = document.getElementById('account').value;
    var pwd = document.getElementById('pwd').value;
    var cpwd = document.getElementById('cpwd').value;
    var firstname = document.getElementById('firstname').value;
    var lastname = document.getElementById('lastname').value;
    var male = document.getElementById('male').checked;
    var female = document.getElementById('female').checked;
    var mobile = document.getElementById('mobile').value;
    var err = document.getElementById('error');
    var err2 = document.getElementById('error2');
    var chkvalue = [{id: account, value: '帳號'} , {id: pwd, value: '密碼'}, {id: firstname, value: '姓氏'}, {id: lastname, value: '名字'}, {id: mobile, value: '電話'}];
    chkvalues = "";

    for (let i=0 ; i < chkvalue.length ; i++) {
        if (chkvalue[i].id == '') {
            chkvalues += chkvalue[i].value + ' ';
        }
    }
    if (!male && !female) {
        chkvalues += '性別';
    }
    if (chkvalues != "") {
        err.innerHTML= chkvalues + "不能為空！";
        if (pwd !== cpwd) {
            err2.innerHTML="密碼不符！";
            return false;
        } else {
            err2.innerHTML="";
        }
        return false;
    } else {
        err.innerHTML= "";
        if (pwd !== cpwd) {
            err2.innerHTML="密碼不符！";
            return false;
        } else {
            err2.innerHTML="";
            return true;
        }
    }
}

function chk() {
    createEth();
    var eth_account = document.getElementById('eth_account').value; 
    if(eth_account != "null") {
        this.window.setTimeout(( () => {return true;} ), 2000);
    } else {
        return false;
    }
}