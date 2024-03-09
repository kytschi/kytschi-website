<?php require_once("./website/header.php"); ?>
<div id="home">
    <h2>
        <span><?= $DUMBDOG->page->sub_title; ?></span>
    </h2>
    <?php
    if ($DUMBDOG->page->content) {
        ?>
        <section>
            <?= $DUMBDOG->page->content; ?>
        </section>
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