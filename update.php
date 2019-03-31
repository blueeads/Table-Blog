<?php
    require __DIR__ . '/header.php';

    session_start();

    if (!isset($_SESSION['user'])) {
        echo "<script>alert('로그인이 필요합니다.'); location.href = '/';</script>";
    }

    $idx = $_GET['idx'];

    $db = new PDO("mysql:host=localhost;dbname=newhomepage;charset=utf8", "root", "");
    

    $st = $db->prepare("SELECT * FROM board where idx = ?");
    $st->execute([$idx]);

    $content = $st->fetchObject();

    if (isset($_POST['subject']) && isset($_POST['content'])) {
        $subject = $_POST['subject']; // 수정된 제목
        $content = $_POST['content']; // 수정된 내용

        $st = $db->prepare("UPDATE board SET subject = ?, content = ? where idx = ?");
        $st->execute([$subject, $content, $idx]);

        echo "<script>alert('글수정이 완료되었습니다.'); location.href = '/view.php?idx=$idx';</script>";
    }
?>

<div id="content-box">
    <form action="/update.php?idx=<?php echo $idx; ?>" method="POST">
        <h3>글수정</h3>
        <div class="view-box">
            <div class="line">
                <div class="left-section section">제목</div>
                <div class="right-section section"><input type="text" name="subject" value="<?php echo $content->subject?>"></div>
            </div>
            <div class="line">
                <textarea name="content" cols="30" rows="10"><?php echo $content->content?></textarea>
            </div>
            <div class="btn-row">
                <button type="reset">초기화</button>
                <button type="submit">글수정</button>
            </div>
        </div>
    </form>
</div>

<?php
    require __DIR__ . '/footer.php';
?>