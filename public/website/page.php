<!DOCTYPE html>
<html lang="en">
    <?php
        require_once("./website/head.php");
    ?>
    <body id="page">
        <main>
            <div class="container">
                <?php
                    require_once("./website/header.php");
                ?>
                <section id="section-1" class="row">
                    <h2 class="col-12"><span><?= $DUMBDOG->page->title; ?></span></h2>
                    <div class="col">
                        <div class="text">
                            <h3><?= $DUMBDOG->page->sub_title; ?></h3>
                            <?= $DUMBDOG->page->content; ?>
                        </div>
                        <?php
                        if ($DUMBDOG->page->images) {
                            ?>
                            <div class="row images">
                            <?php
                            foreach ($DUMBDOG->page->images as $img) {
                                ?>
                                <a
                                    class="col-auto image"
                                    href="<?= $img->image; ?>"
                                    title="Click to view the image"
                                    target="_blank">
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
                        if ($DUMBDOG->page->tags) {
                            ?>
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
                            <?php
                        }
                        ?>
                    </div>
                    <div class="col-auto">
                        <img class="box-image" src="/website/assets/boxes/1.png"/>
                    </div>
                </section>
            </div>
        </main>
        <?php
            require_once("./website/footer.php");
        ?>
    </body>
</html>
