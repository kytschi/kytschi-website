<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="icon" type="image/png" sizes="64x64" href="/website/assets/favicon.png">
    <link rel="icon" href="/website/assets/favicon.ico" sizes="64x64">
            
    <?php
        //Automatically build the meta tags.
        $DUMBDOG->meta();

        //Automatically build the feed tags.
        $DUMBDOG->feeds();
    ?>
            
    <title><?= $DUMBDOG->page->title . ' - ' . $DUMBDOG->site->name;?></title>

    <link rel="stylesheet" type="text/css" href="/website/assets/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/website/assets/style.css">
    
    <link rel="canonical" href="<?= $DUMBDOG->canonical($DUMBDOG->page->url); ?>">
</head>