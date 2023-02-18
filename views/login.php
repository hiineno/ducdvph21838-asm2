<?php 
    var_dump($user);
    require_once "../views/heading.php";
?>

<script>
   
     function validate() {
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;

        if(username == "" ){
            document.getElementById('loiname').innerHTML = " Không được để trống";
            return false
        }
        else    document.getElementById('loiname').innerHTML = "";
        if(password == "" ){
            document.getElementById('loipass').innerHTML = " Không được để trống";
            return false;
     }  else document.getElementById('loipass').innerHTML ="";
    
        return true;

    
    }
</script>

<?php
if (isset($_POST['submit'])) {
    $error = [];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    
        if($item['user_id'] == $username && $item['user_password'] == $password) {
            $_SESSION['username'] = $username;

                if($username =="admin" && $password = 123456){
                    echo "<script> window.location.href='index.php?act=dashbord' </script>";
                }else{
                
                echo "<script> window.location.href='index.php?act=home_user' </script>";
                }
        }
    
        else {
            $error['error_pass'] = "Thông tin mật khẩu không chính xác";
        }
    }

?>
<link rel="stylesheet" href="src/css/login.css">
<div class="body">
<div class="return">
<a href="index.php?act=home_user">
    <li class="return-text"><i class="fa-solid fa-rotate-left"></i> Quay lại trang chủ</li>
</a>
</div>
<div class="login-page">
    <?php
   
    ?>
    <div class="form">
        <h2 class="title_login">Đăng nhập</h2>
        <form class="login-form" method="POST" action="">
            <input type="text" placeholder="username" id="username" name="user_id">
            <p style="color: red ;" id="loiname"></p>
            <input type="password" placeholder="password" id="password" name="user_password">
            <p style="color: red ;" id="loiname"></p>
            <p style="color: red ;" id="loipass"></p>
            <input onclick="return validate()" type="submit" name="submit" class="submit" value="Đăng nhập">
            <?php
            if(!empty($error['error_pass'])){
                echo '<p style="color: red;">';
                echo $error['error_pass'];
                echo '</p>';
            }
            ?>
            <p class="message">Không có tài khoản? <a href="/register">Đăng kí ngay</a></p>
        </form>
    </div>
</div>
</div>
<?php
    require_once "../views/footer.php";
?>