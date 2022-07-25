
<h3><?= esc($post['TITLE']) ?></h3> <!-- (1) -->
<article>  <!-- (2) -->
    <?= nl2br(esc($post['CONTENT'])) ?>  <!-- (3) -->
</article>