<h1>글쓰기</h1>
<form method="POST">
    <p>
    <h3>제목</h3>
    <input type="text" name="TITLE" value="<?= $post_data['TITLE'] ?? "" ?>" />
    </p>
    <p>
    <h3>내용</h3>
    <textarea name="CONTENT"><?= $post_data['CONTENT'] ?? "" ?></textarea>
    </p>
    <p><input type="submit" value="저장"></p>
    <?php
    if (isset($errors)) {
        echo "<ul>";
        foreach ($errors as $val) {
            echo "<li>$val</li>";
        }
        echo "</ul>";
    }
    ?>
</form>