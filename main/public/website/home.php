<?php

/**
 * Kytschi main home page.
 */

$page = $DUMBDOG->pages(["where" => ["query" => "content.url='/'"]]);
$page = reset($page);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <?php
            //Automatically build the meta tags.
            $DUMBDOG->meta();

            //Automatically build the feed tags.
            $DUMBDOG->feeds();
        ?>

        <title><?= ucwords($page->name); ?> | <?= $DUMBDOG->site->name; ?></title>
        <link rel="icon" type="image/png" sizes="64x64" href="/website/assets/favicon.png">
        <link rel="stylesheet" type="text/css" href="/website/assets/style.css">

        <link rel="canonical" href="https://kytschi.com">
    </head>
    <body>
        <main>
            <div class="container">
                <h1>Kytschi</h1>
                <h2>Where do you want to go?</h2>
                <img src="/website/assets/illustration-gustavo-viselner-03.jpg">
                <p>
                    <a href="<?= str_replace("future", "past", $DUMBDOG->site->domain); ?>">The Past</a>
                    <a href="<?= $DUMBDOG->site->domain; ?>">The Future</a>
                </p>
                
                <small>art by Gustavo Viselner</small><br/>
                <small>music by Trekster</small><br/>
                <audio controls autoplay>
                    <source src="/website/assets/trekster-gigawatts.mp3" type="audio/mpeg">
                    Your browser can't play the background tune :-(
                </audio> 
            </div>
        </main>
    </body>
</html>
