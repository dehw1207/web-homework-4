<!DOCTYPE html>
<html>
<head>
    <title>전체 리스트 뷰</title>
    <style>
      table, th, td {
        border: 1px solid #bcbcbc;
      }
      table {
        width: 800px;
        height: 200px;
      }
      td {
        text-align: center;
      }
    </style>
    <script>
      var childPrice;
      var adultPrice;
      var childPriceElement;
      var adultPriceElement;

      function showOptions(select) {
        var selectedOption = select.options[select.selectedIndex];
        var prices = selectedOption.getAttribute("data-prices").split(",");
        childPrice = parseInt(prices[0]);
        adultPrice = parseInt(prices[1]);

        childPriceElement = document.getElementById("childPrice");
        adultPriceElement = document.getElementById("adultPrice");

        childPriceElement.textContent = childPrice;
        adultPriceElement.textContent = adultPrice;

        updateOptionValues();
      }

      function updateOptionValues() {
        var op1 = document.getElementById("op1");
        var op2 = document.getElementById("op2");
        var op3 = document.getElementById("op3");
        var op4 = document.getElementById("op4");

        var count = document.getElementById("count").value;
        var opt1Prices = (childPrice * count) + "," + (adultPrice * count);
        var opt2Prices = (childPrice * count * 2) + "," + (adultPrice * count * 2);
        var opt3Prices = (childPrice * count * 3) + "," + (adultPrice * count * 3);
        var opt4Prices = (childPrice * count * 4) + "," + (adultPrice * count * 4);

        op1.setAttribute("data-prices", opt1Prices);
        op2.setAttribute("data-prices", opt2Prices);
        op3.setAttribute("data-prices", opt3Prices);
        op4.setAttribute("data-prices", opt4Prices);

        childPriceElement.textContent = opt1Prices.split(",")[0];
        adultPriceElement.textContent = opt1Prices.split(",")[1];
      }
    </script>
</head>
<body>
    <table border="1">
    <tr>
       <td>No</td><td>구분</td><td colspan="2">어린이</td><td colspan="2">어른</td><td>비고</td>
    </tr>
    <tr>
       <td>1</td><td>입장권</td><td colspan="2" id="op1" data-prices="7000,10000">7,000</td><td colspan="2">10,000</td><td>입장</td>
    </tr>
    <tr>
       <td>2</td><td>BIG3</td><td colspan="2" id="op2" data-prices="12000,16000">12,000</td><td colspan="2">16,000</td><td>입장+놀이3종</td>
    </tr>
    <tr>
       <td>3</td><td>자유이용권</td><td colspan="2" id="op3" data-prices="21000,26000">21,000</td><td colspan="2">26,000</td><td>입장+놀이자유</td>
    </tr>
    <tr>
       <td>4</td><td>연간이용권</td><td colspan="2" id="op4" data-prices="70000,90000">70,000</td><td colspan="2">90,000</td><td>입장+놀이자유</td>
    </tr>
    <tr>
       <td colspan="7">
           <select onchange="showOptions(this)">
               <option value="0" selected disabled>구분 선택</option>
               <option value="1" data-prices="7000,10000">입장권</option>
               <option value="2" data-prices="12000,16000">BIG3</option>
               <option value="3" data-prices="21000,26000">자유이용권</option>
               <option value="4" data-prices="70000,90000">연간이용권</option>
           </select>
           <select id="count" onchange="updateOptionValues()">
                <option value="0" selected disabled>개수 선택</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
       </td>
    </tr>
    
    <tr>
       <td colspan="7">어린이 가격: <span id="childPrice">-</span></td>
    </tr>
    <tr>
       <td colspan="7">어른 가격: <span id="adultPrice">-</span></td>
    </tr>
    </table>
</body>
</html>