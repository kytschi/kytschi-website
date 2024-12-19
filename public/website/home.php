<!DOCTYPE html>
<html lang="en">
    <?php
        require_once("./website/head.php");
    ?>
    <body>
        <main>
            <div class="container">
                <?php
                    require_once("./website/header.php");
                ?>
                <section id="section-1" class="row">
                    <h2 class="col-12"><span><?= $DUMBDOG->page->sub_title; ?></span></h2>
                    <div class="col">
                        <div class="text">
                            <?= $DUMBDOG->page->content; ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <img class="box-image" src="/website/assets/boxes/1.png"/>
                    </div>
                </section>
                <?php
                if (count($DUMBDOG->page->children)) {
                    foreach ($DUMBDOG->page->children as $key => $child) {
                        ?>
                        <section id="section-<?= $key + 2; ?>" class="row">
                            <h3 class="col-12"><span><?= $child->sub_title; ?></span></h3>
                            <div class="col-auto">
                                <img src="/website/assets/boxes/2.png"/>
                            </div>
                            <div class="col">
                                <div class="text">
                                    <?= $child->content; ?>
                                </div>
                            </div>
                        </section>
                        <?php
                    }
                }
                ?>
            </div>
        </main>
        <div id="projects">
            <div class="container">
            <?php
            $featured = $DUMBDOG->pages(["where" => ["query" => "featured=1"], "limit" => 4]);
            ?>
            <h4><span>Some of my work</span></h4>
            <?php
            foreach ($featured as $key => $item) {
                ?>
                <section id="section-<?= $key + 3; ?>" class="child row">
                    <h5 class="col-12"><span><?= $item->title; ?></span></h5>
                    <?php
                    if ($key % 2 === 0) {
                        ?>
                        <div class="col">
                            <div class="text">
                                <p class="mb-5"><?= $item->slogan; ?></p>
                                <a href="<?= $item->url; ?>" class="button">See more</a>
                            </div>
                            <?php
                            if ($item->tags) {
                                ?>
                                <div class="row tags">
                                    <?php
                                    foreach ($item->tags as $tag) {
                                        ?>
                                        <a
                                            class="tag col-auto"
                                            href="/search?search=<?=$tag;?>"
                                            title="Click to search based on this tag">&#35;<?= $tag; ?></a>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="col-auto">
                            <img src="/website/assets/boxes/<?= $key + 3; ?>.png"/>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="col-auto">
                            <img src="/website/assets/boxes/<?= $key + 3; ?>.png"/>
                        </div>
                        <div class="col">
                            <div class="text">
                                <p class="mb-5"><?= $item->slogan; ?></p>
                                <a href="<?= $item->url; ?>" class="button">See more</a>
                            </div>
                            <?php
                            if ($item->tags) {
                                ?>
                                <div class="row tags">
                                    <?php
                                    foreach ($item->tags as $tag) {
                                        ?>
                                        <a
                                            class="tag col-auto"
                                            href="/search?search=<?=$tag;?>"
                                            title="Click to search based on this tag">&#35;<?= $tag; ?></a>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                </section>
                <?php
            }
            ?>
            </div>
        </div>
        <?php
            require_once("./website/footer.php");
        ?>
    </body>
</html>
