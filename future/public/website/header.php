<?php

/**
 * Header for Kytschi site.
 */

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" type="image/png" sizes="64x64" href="/website/assets/img/favicon.png">
                
        <?php
            //Automatically build the meta tags.
            $DUMBDOG->meta();

            //Automatically build the feed tags.
            $DUMBDOG->feeds();
        ?>
                
        <title><?= $DUMBDOG->page->title . ' - ' . $DUMBDOG->site->name;?></title>

        <link rel="stylesheet" href="<?= $DUMBDOG->site->theme . '?t=' . time(); ?>">
        <link rel="icon" href="/website/assets/img/favicon.ico" sizes="64x64">

        <link rel="canonical" href="<?= $DUMBDOG->canonical($DUMBDOG->page->url); ?>">

        <script src="/website/assets/js/jquery.min.js"></script>
        <script src="/website/assets/js/popper.min.js"></script>
        <script src="/website/assets/js/bootstrap.min.js"></script>
    </head>
    <body <?= count($DUMBDOG->page->images) ? ' style="background-image: url(' . $DUMBDOG->page->images[0]->image . ');"' : '' ?>>
        <div class="container-fluid">
            <div class="container">
                <header>
                    <nav id="menu" class="row m-0">
                        <div class="col-12 p-0">
                            <h1 class="float-left">
                                <a href="/" title="Go to home">
                                    <?= $DUMBDOG->site->name; ?>
                                </a>
                            </h1>
                            <ul id="menu-nav" class="float-right">
                                <?php
                                if (count($menu = $DUMBDOG->menusByTag("header"))) {
                                    $menu = reset($menu);
                                    include("components/menu.php");
                                }
                                ?>
                            </ul>
                            <div id="menu-nav-mini">
                                <span class="nav-link" data-toggle="dropdown">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
                                    </svg>
                                </span>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <?php
                                    if ($menu) {
                                        include("components/menu.php");
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </header>
                <main>
