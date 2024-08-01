<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/layout/header.php');
?>
<!-- Main Container  -->
<article id="container" style="height: 3600px;">
    <iframe src="trangchu.php" name="page" frameborder="0" style="width: 100%;height: 100%; margin:60px auto"></iframe>
</article>

<!-- Aside  -->
<aside>
    <div class="contact">
        <div class="zalo">

            <a href=""><img src="images/contact/zalo-icon.png" alt="">
                <span>Chat với chúng tôi qua Zalo</span>
            </a>
        </div>
        <div class="message">
            <a href=""><img src="images/contact/Facebook_Messenger_logo_2020.svg.png" alt="">
                <span>Chat với chúng tôi qua Facebook Message</span>
            </a>
        </div>
    </div>
</aside>

</div>

<div id="overlay"></div>
<div class="popup" id="popup">
    <button class="close-btn" onclick="closePopup()"><i class="fa-solid fa-circle-xmark"></i></button>
    <img src="./images/header-icon/login-icon.png" alt="Smember Logo" style="width: 50px; height: 50px;">
    <p>Bạn có tài khoản chưa?</p>
    <button class="register">Đăng ký</button>
    <button class="login">Đăng nhập</button>
</div>
<script src="./js/popup.js"></script>
</body>
</html>
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/layout/footer.php');