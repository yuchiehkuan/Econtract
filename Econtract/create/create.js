add_person_click = 0;
add_data_click = 0;
add_content_click = 0;
add_transaction_click = 0;


function add_person() {
    add_person_click += 1;
    add_person_clicked();
    return add_person_click;
}

function add_person_clicked() {
    //add person....
    var id_name = [{ id: 'C', name: '丙'}, { id: 'D', name: '丁'}, { id: 'E', name: '戊'}, { id: 'F', name: '己'},
                { id: 'G', name: '庚'}, { id: 'H', name: '辛'}, { id: 'I', name: '壬'}, { id: 'J', name: '癸'}];
    personId = String;
    personName = String;
    personConut = String;
    // alert(add_person_click);
    var input_person = document.createElement('input');
    var persons = document.getElementById('contract_persons');
    personId = 'contract_' + id_name[add_person_click - 1].id;
    person_data_Id = id_name[add_person_click - 1].id + "_data";
    personName = id_name[add_person_click - 1].name + '方';
    personConut = 'contract_persons' + (add_person_click - 1);
    personConuts = 'contract_persons' + (add_person_click - 2);
    if (add_person_click - 1 <= 0) {
        persons.innerHTML = "<br><label>" + personName +" 資料：</label><br><label>" + personName +"</label><label>甲方：</label><input type='text' id='" + personId + "_name' name='" + personId + "_name' placeholder='" + personName + "姓名'><br><label>地址：</label><input type='text' id='" + personId + "_address' name='" + personId + "_address' placeholder='" + personName + "地址'><br><label>聯絡電話：</label><input type='text' id='" + personId + "_mobile' name='" + personId + "_mobile' placeholder='" + personName + "電話'><br><span id='" + person_data_Id + "'></span><br><span id='"+ personConut +"'></span>";
    } else {
        persons = document.getElementById(personConuts);
        persons.innerHTML = "<br><label>" + personName +" 資料：</label><br><label>" + personName +"</label><label>甲方：</label><input type='text' id='" + personId + "_name' name='" + personId + "_name' placeholder='" + personName + "姓名'><br><label>地址：</label><input type='text' id='" + personId + "_address' name='" + personId + "_address' placeholder='" + personName + "地址'><br><label>聯絡電話：</label><input type='text' id='" + personId + "_mobile' name='" + personId + "_mobile' placeholder='" + personName + "電話'><br><span id='" + person_data_Id + "'></span><br><span id='"+ personConut +"'></span>";
    }
    // alert("新增立書人...");
}

function add_dataType() {
    add_data_click += 1;
    add_dataType_clicked();
    return add_data_click;
}

function add_dataType_clicked() {
    //add dataType....
    // alert("新增立書人資料...");
    // alert(add_data_click);
    var a_data = document.getElementById('a_data');
    var b_data = document.getElementById('b_data');

    a_data_ID = "contract_A_data" + (add_data_click - 1);
    a_datas = "a_data" + (add_data_click - 1);
    a_datass = "a_data" + (add_data_click - 2);

    b_data_ID = "contract_B_data" + (add_data_click - 1);
    b_datas = "b_data" + (add_data_click - 1);
    b_datass = "b_data" + (add_data_click - 2);

    if (add_data_click - 1 <= 0) {
        a_data.innerHTML="<input type='text' placeholder='資料項目'>：<input type='text' id='" + a_data_ID + "' name='" + a_data_ID + "' placeholder='甲方資料'><br><span id='"+ a_datas +"'></span>"
        b_data.innerHTML="<input type='text' placeholder='資料項目'>：<input type='text' id='" + b_data_ID + "' name='" + b_data_ID + "' placeholder='乙方資料'><br><span id='"+ b_datas +"'></span>"
    } else {
        a_data = document.getElementById(a_datass);
        b_data = document.getElementById(b_datass);
        a_data.innerHTML="<input type='text' placeholder='資料項目'>：<input type='text' id='" + a_data_ID + "' name='" + a_data_ID + "' placeholder='甲方資料'><br><span id='"+ a_datas +"'></span>";
        b_data.innerHTML="<input type='text' placeholder='資料項目'>：<input type='text' id='" + b_data_ID + "' name='" + b_data_ID + "' placeholder='乙方資料'><br><span id='"+ b_datas +"'></span>";
    }
}

function add_content() {
    add_content_click += 1;
    add_content_clicked();
    return add_content_click;
}

function add_content_clicked() {
    //add content....
    // alert("新增合約內容...");
    // alert(add_content_click);
    var contract_contents = document.getElementById('contract_contents');
    content_ID = "contract_content" + (add_content_click - 1);
    contents = "contract_contents" + (add_content_click - 1);
    contentss = "contract_contents" + (add_content_click - 2);

    if (add_content_click - 1 <= 0) {
        contract_contents.innerHTML="<br><label>" + (add_content_click + 1) + ".</label><input type='text' id='" + content_ID + "' name='" + content_ID + "' placeholder='合約內容(條文)'><span id='" + contents + "'></span>";
    } else {
        // alert(content_ID);
        contract_contents = document.getElementById(contentss);
        contract_contents.innerHTML="<br><label>" + (add_content_click + 1) + ".</label><input type='text' id='" + content_ID + "' name='" + content_ID + "' placeholder='合約內容(條文)'><span id='" + contents + "'></span>";
    }

}

function add_transaction() {
    add_transaction_click += 1;
    add_transaction_clicked();
    return add_transaction_click;
}

function add_transaction_clicked() {
    //add transaction....
    alert("新增交易日期...");
    var contract_dates = document.getElementById('contract_dates');
    date_ID = "contract_date" + (add_transaction_click - 1);
    dates = "contract_dates" + (add_transaction_click - 1);
    datess = "contract_dates" + (add_transaction_click - 2);
    money_ID = "contract_money" + (add_transaction_click - 1);

    if (add_transaction_click - 1 <= 0) {
        contract_dates.innerHTML="<br><input type='datetime-local' id='" + date_ID + "' name='" + date_ID + "' placeholder='日期'>前 <input type='number' id='" + money_ID + "' name='" + money_ID + "' placeholder='金額'><span id='" + dates + "'></span>";
    } else {
        // alert(content_ID);
        contract_dates = document.getElementById(datess);
        contract_dates.innerHTML="<br><input type='datetime-local' id='" + date_ID + "' name='" + date_ID + "' placeholder='日期'>前 <input type='number' id='" + money_ID + "' name='" + money_ID + "' placeholder='金額'><span id='" + dates + "'></span>";
    }
}