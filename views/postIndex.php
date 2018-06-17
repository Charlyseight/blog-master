<div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
        <?php if(!empty($data['data']['articles'])): ?>
        <h1 class="display-4 font-italic"><?=$data['data']['articles'][0]->title;?></h1>
        <p class="lead my-3"><?=$data['data']['articles'][0]->description?>.</p>
        <p class="lead mb-0"><a href="index.php?a=show&r=post&id=<?=$data['data']['articles'][0]->id ?>" class="text-white font-weight-bold">Go to see the entire article</a></p>
        <?php else: ?>
        <h1 class="display-4 font-italic">There are no articles</h1>
        <?php endif; ?>
    </div>
</div>
<div class="row mb-2">
    <div class="col-md-6">
        <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
                <?php if(!empty($data['data']['articles'])): ?>
                <h3 class="mb-0">
                    <a class="text-dark" href="index.php?a=show&r=post"><?=$data['data']['articles'][1]->title?></a>
                </h3>
                <strong class="d-inline-block mb-2 text-primary"><?=$data['data']['articles'][1]->category?></strong>
                <div class="mb-1 text-muted"><?=$data['data']['articles'][1]->date?></div>
                <p class="card-text mb-auto"><?=$data['data']['articles'][1]->description?></p>
                <a href="index.php?a=show&r=post&id=<?=$data['data']['articles'][1]->id ?>">Go to see the entire article</a>
                <?php else: ?>
                <h4 class="display-4 font-italic">There are no articles</h4>
                <?php endif; ?>
            </div>
            <img class="card-img-right flex-auto d-none d-lg-block" data-src="holder.js/200x250?theme=thumb" alt="Card image cap">
        </div>
    </div>
    <div class="col-md-6">
        <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
                <?php if(!empty($data['data']['articles'])): ?>
                <h3 class="mb-0">
                    <a class="text-dark" href="index.php"><?=$data['data']['articles'][2]->title?></a>
                </h3>
                <strong class="d-inline-block mb-2 text-success"><?=$data['data']['articles'][2]->category?></strong>
                <div class="mb-1 text-muted"><?=$data['data']['articles'][2]->date?></div>
                <p class="card-text mb-auto"><?=$data['data']['articles'][2]->description?></p>
                <a href="index.php?a=show&r=post&id=<?=$data['data']['articles'][2]->id ?>">Go to see the entire article</a>
                <?php else: ?>
                <h4 class="display-4 font-italic">There are no articles</h4>
                <?php endif; ?>
            </div>
            <img class="card-img-right flex-auto d-none d-lg-block" data-src="holder.js/200x250?theme=thumb" alt="Card image cap">
        </div>
    </div>
</div>

<main role="main" class="container">
    <div class="row">
        <div class="col-md-8 blog-main">
            <h3 class="pb-3 mb-4 font-italic border-bottom">
                From the Firehose
            </h3>
            <?php if(!empty($data['data']['posts'])): ?>
            <?php foreach($data['data']['posts'] as $post): ?>
                <div class="blog-post">
                    <h2 class="blog-post-title">
                        <a href="index.php?a=show&r=post&id=<?= $post->id; ?>"><?=$post->title; ?></a>
                    </h2>
                    <strong class="d-inline-block mb-2 text-primary">
                        <?= $post->category; ?>
                    </strong>
                    <p class="blog-post-meta"><?= $post->date; ?> by <a href="index.php#"><?=                               $post->createby; ?></a></p>
                    <p><?=$post->content; ?></p>
                </div>
            <?php endforeach; ?>
            <?php else: ?>
            <p class="d-inline-block mb-2 text-primary">There are no articles</p>
            <?php endif; ?>

        </div><!-- /.blog-main -->


        <aside class="col-md-4 blog-sidebar">
            <div class="p-3 mb-3 bg-light rounded">
                <h4 class="font-italic">About</h4>
                <?php if(!empty($data['data']['about'])): ?>
                <p><?=$data['data']['about']->about;?></p>
                <?php else: ?>
                <p class="mb-0"> Here is the Charlotte's blog. You could find a long of topic about                     several subjets</p>
                <?php endif; ?>
            </div>

            <div class="p-3">
                <h4 class="font-italic">Archives</h4>
                <ol class="list-unstyled mb-0">
                    <li><a href="index.php?a=archive&r=post&month=1&year=2018">January 2018</a></li>
                    <li><a href="index.php?a=archive&r=post&month=2&year=2018">February 2018</a></li>
                    <li><a href="index.php?a=archive&r=post&month=3&year=2018">March 2018</a></li>
                    <li><a href="index.php?a=archive&r=post&month=4&year=2018">April 2018</a></li>
                    <li><a href="index.php?a=archive&r=post&month=5&year=2018">May 2018</a></li>
                    <li><a href="index.php?a=archive&r=post&month=6&year=2018">June 2018</a></li>
                    <li><a href="index.php?a=archive&r=post&month=7&year=2018">July 2018</a></li>
                    <li><a href="index.php?a=archive&r=post&month=10&year=2018">August 2018</a></li>
                    <li><a href="index.php?a=archive&r=post&month=9&year=2018">September 2018</a></li>
                    <li><a href="index.php?a=archive&r=post&month=10&year=2018">October 2018</a></li>
                    <li><a href="index.php?a=archive&r=post&month=11&year=2018">November 2018</a></li>
                    <li><a href="index.php?a=archive&r=post&month=12&year=2018">December 2018</a></li>
                </ol>
            </div>

            <div class="p-3">
                <h4 class="font-italic">Elsewhere</h4>
                <ol class="list-unstyled">
                    <li><a href="index.php#">GitHub</a></li>
                    <li><a href="index.php#">Twitter</a></li>
                    <li><a href="index.php#">Facebook</a></li>
                </ol>
            </div>
        </aside><!-- /.blog-sidebar -->

    </div><!-- /.row -->

</main><!-- /.container -->
