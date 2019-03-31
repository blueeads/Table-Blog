<?php
    require __DIR__ . './header.php';

    if (isset($_POST['user_id']) && isset($_POST['user_pw'])) {
        $user_id = $_POST['user_id']; // 회원가입 할 아이디
        $user_pw = $_POST['user_pw'];

        $db = new PDO("mysql:host=localhost;dbname=myhomepage", "root", "");

        $st = $db->prepare("INSERT INTO users (user_id, user_pw) values (?, ?)");
        $st->execute([$user_id, $user_pw]);

        echo "<script>alert('회원가입이 완료되었습니다.'); location.href = './';</script>";
    }
?>

<div id="content-box">
    <form action="./join.php" method="POST">
        <h3>회원가입</h3>
        <div class="view-box">
            <div class="line">
                <div class="left-section section">ID</div>
                <div class="right-section section"><input type="text" name="user_id"></div>
            </div>
            <div class="line">
                <div class="left-section section">PW</div>
                <div class="right-section section"><input type="password" name="user_pw"></div>
            </div>
            <div class="btn-row">
                <button type="reset">초기화</button>
                <button type="submit">회원가입</button>
            </div>
        </div>
    </form>
</div>

<?php
    require __DIR__ . './footer.php';
?>