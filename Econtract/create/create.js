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
        contract_dates.innerHTML="<br><input type='datetime-local' id='" + date_ID + "' name='" + date_ID + "' placeholder='日期'>前 <input type='number' id='" + money_ID + "' name='" + money_ID + "' placeholder='金額'><span id='" + dates + "'></span>";
    } else {
        // alert(content_ID);
        contract_dates = document.getElementById(datess);
        contract_dates.innerHTML="<br><input type='datetime-local' id='" + date_ID + "' name='" + date_ID + "' placeholder='日期'>前 <input type='number' id='" + money_ID + "' name='" + money_ID + "' placeholder='金額'><span id='" + dates + "'></span>";
    }
    // alert(add_transaction_click);
    return false;
}