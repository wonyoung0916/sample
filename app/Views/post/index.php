<?php
function show_content($content) // (1)
{
    $content = strip_tags($content); // (2)
    if (mb_strlen($content) > 100) { // (3)
        $content = mb_substr($content, 0, 100); // (4)
    }
    return $content;
}
?>
<ul>
    <?php foreach ($post_list as $post) : ?>
        <a href="<?= site_url("/post/show/{$post["SEQ"]}") ?>"><?= $post["TITLE"] ?></a>  <!-- (5) -->
        <div><?= show_content($post["CONTENT"]) ?></div>
        <a href="<?= site_url("/post/show/{$post["SEQ"]}/#CONTENT") ?>">Read more</a>
    <?php endforeach ?>
</ul>
<?= $pager->links() ?> <!-- (6) -->