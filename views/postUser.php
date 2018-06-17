<?php foreach($data['data']['posts'] as $post): ?>
    <div class="blog-post">
        <h2 class="blog-post-title">
            <a href="index.php?a=show&r=post&id=<?= $post->id; ?>"><?=$post->title; ?></a>
        </h2>
        <strong class="d-inline-block mb-2 text-primary">
            <?= $post->category; ?>
        </strong>
        <?php if(isset($_SESSION['user'])): ?>
            <div>
                <a href="index.php?a=edit&r=post&id=<?=$post->id;?>">Modifier l'article </a>
                <a href="index.php?a=confirmDelete&r=post&id=<?=$post->id;?>">Supprimer                                    l'article</a>
            </div>
        <?php endif; ?>
        <p class="blog-post-meta"><?= $post->date; ?> by <a href="index.php#"><?=                               $post->createby; ?></a></p>
        <p><?=$post->content; ?></p>
    </div>
<?php endforeach; ?>
