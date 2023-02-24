<p>Chào bạn <b> <?php echo $result['email'] ?></b> , thư cấp lại mật khẩu vui lòng click vào link <em> bên dưới</em> để đặt lại mật khẩu</p>
<a style="
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;" href="http://<?php echo TFO_DOMAIN . TFO_URI ?>&a=changePassword&id=<?php echo $result['id'] ?>" class="button">Click To Change Password</a>