<?php 
  session_start(); 
  include "../../db.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../main.css">
        <link rel="stylesheet" href="../create.css">
        <script src="https://kit.fontawesome.com/57bd783e21.js" crossorigin="anonymous"></script>
        <script src="../create.js"></script> 
        <!-- <script
        type="module"
        src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.mjs"
      >
            Cookies.set('signature', dataURL);
            img = document.getElementById("signature_A");
            img_url = Cookies.get(signature);
            img.innerHTML="<img src='"+ img_url + "'>"
        </script>   -->
    </head>
    <body>
        <ul>
            <li><a href="../../home.html">Home</a></li>
            <li class="dropdown">
              <a href="javascript:void(0)" class="dropbtn"><i class="fas fa-bars fa-1g"></i></a>
              <div class="dropdown-content">
                <a href="../../account/account.html">帳號資訊</a>
                <a href="#home">創建合約</a>
                <a href="../../search/search.php">查詢合約</a>
                <a href="../../transaction/transaction.html">系統對帳</a>
                <a href="../../login/login.html">登出</a>
              </div>
            </li>
        </ul><br>
        <fieldset>
            <label>立書人簽名：</label><br>
            <label>甲方：</label>
            <a href="../signature-pad/signature-pad.html"><label>甲方簽名</label><span id="signature_A"></span></a>
            <br><label>乙方：</label>
            <a href="../signature-pad/signature-pad.html"><label>乙方簽名</label><span id="signature_B"></span></a>
        </fieldset>
        <script src="../signature-pad/app.js"></script> 
    </body>
</html>