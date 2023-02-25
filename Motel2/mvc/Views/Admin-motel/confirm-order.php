<p>Chào bạn <b> <?php echo $infoUser[0]['email']  ?></b> , Thư gửi xác nhận order:</p>
<h2>information order</h2>
<table style="
  border: 1px solid;
  border-collapse:collapse;
  width: 100%;
  ">
  <tr>
    <th style="border: 1px solid;">name room</th>
    <th style="border: 1px solid;">address</th>
    <th style="border: 1px solid;">price</th>
  </tr>
  <tr>
    <td style="border: 1px solid;"><?php echo $data[0]['name'] ?></td>
    <td style="border: 1px solid;"><?php echo $data[0]['ward'] . ', ' . $data[0]['district'] . ', ' . $data[0]['province'] ?></td>
    <td style="border: 1px solid;"><?php echo $data[0]['price'] ?></td>
  </tr>
</table>
<p> Vui lòng click vào link <em> bên dưới</em> để xác nhận Order hoặc từ chối Order</p>
<a style="
        background-color: #4CAF50;
        border: none;
        border-radius:4px;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;" href="http://<?php echo TFO_DOMAIN . TFO_URI ?>&a=changePassword&id=<?php echo $data[0]['id'] ?>" class="button">resolve order</a>
<a style="
        background-color: #333;
        border: none;
        color: white;
        border-radius:4px;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;" href="http://<?php echo TFO_DOMAIN . TFO_URI ?>&a=changePassword&id=<?php echo $data[0]['id'] ?>" class="button">reject order</a>