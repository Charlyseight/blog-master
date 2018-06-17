<main role="main" class="container">
    <div class="row">
        <div class="col-md-8 blog-main">
            <h3 class="pb-3 mb-4 font-italic border-bottom">Articles</h3>
            <?php
            foreach ($data['data']['posts'] as $post): ?>
                <div class="blog-post">
                    <h2 class="blog-post-title">
                        <a href="index.php?a=show&r=post&id=<?= $post->id; ?>"><?= $post->title; ?></a>
                    </h2>
                    <strong class="d-inline-block mb-2 text-primary">
                        <?= $post->category; ?>
                    </strong>
                    <?php if (isset($_SESSION['user'])): ?>
                        <div>
                            <a href="index.php?a=confirmDelete&r=post&id=<?= $post->id; ?>">Delete post</a>
                        </div>
                    <?php endif; ?>
                    <p class="blog-post-meta"><?= $post->date; ?> by <a href="index.php#"><?= $post->createby; ?></a>
                    </p>
                    <p><?= $post->content; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <aside class="col-md-4 blog-sidebar">
            <div>
                <h3 class="pb-3 mb-4 font-italic border-bottom">Category</h3>
                <form action="index.php" method="post">
                    <label for="cat" class="d-inline-block mb-2 text-primary">Add a category</label><br>
                    <input type="text" name="cat" id="cat">
                    <input type="hidden" name="a" value="addCat">
                    <input type="hidden" name="r" value="post">
                    <input type="submit" value="Add" class="btn btn-sm btn-outline-secondary">
                </form>
                <form action="index.php" method="post">
                    <label for="cat" class="d-inline-block mb-2 text-primary">Remove a category</label><br>
                    <select name="category" id="category">
                        <option value=""></option>
                        <?php foreach ($data['data']['categories'] as $category): ?>
                            <option value="<?=$category->name; ?>"><?=$category->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="hidden" name="a" value="removeCat">
                    <input type="hidden" name="r" value="post">
                    <input type="submit" value="Delete" class="btn btn-sm btn-outline-secondary">
                </form>
            </div>
            <div>
                <h3 class="pb-3 mb-4 font-italic border-bottom">About's space</h3>
                <form action="index.php" method="post">
                    <select name="category" id="category">
                        <option value=""></option>
                        <?php foreach ($data['data']['categories'] as $category): ?>
                            <option value="<?=$category->name; ?>"><?=$category->name; ?></option>
                        <?php endforeach; ?>
                    </select><br>
                    <label for="about" class="d-inline-block mb-2 text-primary">Edit the about's space<br> in the main page</label>
                    <textarea name="about" id="about" cols="30" rows="10"></textarea><br>
                    <input type="hidden" name="a" value="catAbout">
                    <input type="hidden" name="r" value="post">
                    <input type="submit" value="Edit" class="btn btn-sm btn-outline-secondary">
                </form>
            </div>
        </aside>
    </div>
</main>
