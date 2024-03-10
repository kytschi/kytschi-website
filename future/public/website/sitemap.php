<?php require_once("./website/header.php"); ?>
<div id="page">
    <h2><?= $DUMBDOG->page->title; ?></h2>
    <?php
    if ($DUMBDOG->page->sub_title) {
        ?>
        <h3><?= $DUMBDOG->page->sub_title; ?></h3>
        <?php
    }
    if ($DUMBDOG->page->type == 'blog') {
        echo '<p class="post-date">' . $DUMBDOG->prettyDateFull($DUMBDOG->page->created_at, false) . '</p>';
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

    $pages = $DUMBDOG->pages(["where" => ["query" => "content.sitemap_include=1"]]);
    if (count($pages)) {
        ?>
        <div class="tiles">
            <?php
            foreach ($pages as $page) {
                ?>
                <div class="tile">
                    <div>
                        <h4><?= $page->title; ?></h4>
                        <?php
                        if ($page->type == 'blog') {
                            echo '<p class="post-date">' . $DUMBDOG->prettyDateFull($page->created_at, false) . '</p>';
                        }
                        ?>
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