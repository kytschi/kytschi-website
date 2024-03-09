<?php require_once("./website/header.php"); ?>
<div id="page">
    <h2><?= $DUMBDOG->page->title; ?></h2>
    <?php
    if ($DUMBDOG->page->sub_title) {
        ?>
        <h3><?= $DUMBDOG->page->sub_title; ?></h3>
        <?php
    }
    if ($DUMBDOG->page->content) {
        ?>
        <section>
            <?= $DUMBDOG->page->content; ?>
        </section>
        <?php
    }

    if (count($DUMBDOG->page->tags)) {
        ?>
        <h3 class="mb-0">
            <span>Tags</span>
        </h3>
        <div id="tags">
            <?php
            foreach ($DUMBDOG->page->tags as $tag) {
                ?>
                <a
                    href="/search?search=<?=$tag;?>"
                    title="Click to search based on this tag">&#35;<?= $tag; ?></a>
                <?php
            }
            ?>
        </div>
        <?php
    }

    if (count($DUMBDOG->page->images) > 1) {
        ?>
        <h3>
            <span>Images</span>
        </h3>
        <div class="tiles">
            <?php
            foreach ($DUMBDOG->page->images as $key => $image) {
                if (!$key) {
                    continue;
                }
                ?>
                <div class="tile">
                    <a href="<?= $image->image; ?>" target="_blank">
                        <img src="<?= $image->image; ?>">
                    </a>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
    }

    if (count($DUMBDOG->page->children)) {
        ?>
        <h3>
            <span>Projects</span>
        </h3>
        <div class="tiles">
            <?php
            foreach ($DUMBDOG->page->children as $page) {
                ?>
                <div class="tile">
                    <h4><?= $page->title; ?></h4>
                    <?php
                    if (count($page->images) > 1) {
                        ?>
                        <p class="tile-img">
                            <img 
                                src="<?=$page->images[1]->image;?>"
                                title="Click to view the page labelled <?= $page->title; ?>"
                                alt="<?= $page->title; ?>">
                        </p>
                        <?php
                    }
                    ?>
                    <p>
                        <?= $page->slogan; ?>
                    </p>
                    <p>
                        <a 
                            href="<?= $DUMBDOG->canonical($page->url); ?>"
                            class="button" 
                            title="Show me about the <?= $page->title; ?> project">
                            show me more
                        </a>
                    </p>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
    }
    ?>
</div>
<?php require_once("./website/footer.php"); ?>