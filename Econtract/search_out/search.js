function search() {
    //search contract....
    var search = document.getElementById('search').value;
    var err = document.getElementById('err');
    if(search == "") {
        err.innerHTML="搜尋不能為空，請輸入金鑰！";
        err.style = "coror: red;";
        return false;
    } else {
        return true;
    }
}