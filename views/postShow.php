<div>
    <h1>
        <?= $data['data']['post']->title; ?>
    </h1>
    <div>
        <div>
            <?= $data['data']['post']->date; ?>
            by
            <strong class="d-inline-block mb-2 text-primary">
                <?= $data['data']['post']->createby; ?>
            </strong>
        </div>
        <strong class="d-inline-block mb-2 text-primary">
            <?= $data['data']['post']->category; ?>
        </strong>
        <div>
            <?= $data['data']['post']->content; ?>
        </div>
        <div>
            <img src="/assets/<?= $data['data']['post']->imgFile; ?>" alt="">
        </div>
    </div>
</div>