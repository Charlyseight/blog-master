<div>
    <h1>
        la liste des posts
    </h1>
    <ol>
        <?php foreach ($data['data']['posts'] as $post): ?>
            <li>
                <h2>
                    <a href="index.php?a=show&r=post&id=<?= $post->id; ?>"><?= $post->title; ?>
                    </a>
                </h2>
                <?php if(isset($_SESSION['user'])): ?>
                    <div>
                        <a href="index.php?a=edit&r=post&id=<?= $post->id; ?>">
                            Modifier l'article
                        </a>
                        <a href="index.php?a=confirmDelete&r=post&id=<?= $post->id; ?>">
                            Supprimer l'article
                        </a>
                    </div>
                <?php endif ?>
            </li>
        <?php endforeach; ?>
    </ol>
</div>
