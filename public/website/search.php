<?php
$query = "";
if (isset($_GET["search"])) {
    $query = $_GET["search"];
}
?>
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
            ?>
            <section id="section-1" class="row mb-0">
                <h2 class="col-12"><span><?= $DUMBDOG->page->title; ?></span></h2>
                <div class="col">
                    <form method="GET" class="text">
                        <input class="form-control" name="search" value="<?= $query; ?>"/>
                    </form>
                </div>
                <div class="col-auto">
                    <img class="box-image" src="/website/assets/boxes/search.png"/>
                </div>
            </section>
            <?php
            if ($query) {
                $pages = $DUMBDOG->pages(
                    [
                        "where" => [
                            "query" => "content.tags LIKE :tag",
                            "data" => [
                                ":tag" => '%{"value":"' . $query . '"}%'
                            ]
                        ]
                    ]
                );
            }
            if (count($pages)) {
                foreach ($pages as $page) {
                    ?>
                    <section class="row child">
                        <h3 class="col-12"><span><?= $page->title; ?></span></h3>
                        <div class="col">
                            <div class="text">
                                <h4><?= $page->sub_title; ?></h4>
                                <p class="mb-5"><?= $page->slogan; ?></p>
                                <a href="<?= $page->url; ?>" class="button">See more</a>
                            </div>
                            <?php
                            if ($page->tags) {
                                ?>
                                <div class="row tags mt-4">
                                    <?php
                                    foreach ($page->tags as $tag) {
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
            } else {
                ?>
                <section class="row child mt-5">
                    <div class="col">
                        <div class="text">
                            Nothing found
                        </div>
                    </div>
                </section>
                <?php
            }
            ?>
            </div>
        </main>
        <?php
            require_once("./website/footer.php");
        ?>
    </body>
</html>
