<!DOCTYPE html>
<html lang="en">
    <?php
        require_once("./website/head.php");
    ?>
    <body id="page-with-children">
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
                        <div class="row tags">
                            <?php
                            foreach ($DUMBDOG->page->tags as $tag) {
                                ?>
                                <a
                                    class="tag col-auto"
                                    href="/search?search=<?=$tag;?>"
                                    title="Click to search based on this tag">&#35;<?= $tag; ?></a>
                                <?php
                            }
                            ?>
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
                        <section class="child row">
                            <h3 class="col-12">
                                <span><?= $child->title; ?></span>
                            </h3>
                            <div class="col">
                                <div class="text">
                                    <p class="mb-5"><?= $child->slogan; ?></p>
                                    <a href="<?= $child->url; ?>" class="button">See more</a>
                                </div>
                                <?php
                                if ($child->images) {
                                    ?>
                                    <div class="row images">
                                    <?php
                                    foreach ($child->images as $img) {
                                        ?>
                                        <a
                                            class="col-auto image"
                                            href="<?= $img->image; ?>"
                                            target="_blank"
                                            title="Click to view the image">
                                            <span><img 
                                                src="<?= $img->thumbnail; ?>"
                                                alt="<?= $img->name; ?>"
                                                title="<?= $img->label;?>"/></span>
                                        </a>
                                        <?php
                                    }
                                    ?>
                                    </div>
                                    <?php
                                }
                                if ($child->tags) {
                                    ?>
                                    <div class="row tags">
                                        <?php
                                        foreach ($child->tags as $tag) {
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
                        </section>
                        <?php
                    }
                }
                ?>
            </div>
        </main>
        <?php
            require_once("./website/footer.php");
        ?>
    </body>
</html>
