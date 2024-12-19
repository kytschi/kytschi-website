<!DOCTYPE html>
<html lang="en">
    <?php
        require_once("./website/head.php");
    ?>
    <body id="sitemap">
        <main>
            <div class="container">
            <?php
            require_once("./website/header.php");
            $pages = $DUMBDOG->pages(["where" => ["query" => "content.sitemap_include=1"]]);
            if (count($pages)) {
                foreach ($pages as $page) {
                    ?>
                    <section class="row">
                        <h2 class="col-12"><span><?= $page->title; ?></span></h2>
                        <div class="col">
                            <div class="text">
                                <h3><?= $page->sub_title; ?></h3>
                                <p class="mb-5"><?= $page->slogan; ?></p>
                                <a href="<?= $page->url; ?>" class="button">See more</a>
                            </div>
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
