<?php
$error = "";
$sent = !empty($_GET['sent']) ? true : false;
if (isset($_POST['send'])) {
    if ($DUMBDOG->required($_POST, ["email", "name", "message"])) {
        if ($DUMBDOG->captcha->validate()) {
            if (
                $DUMBDOG->addMessage(
                    [
                        'email' => $_POST['email'],
                        'full_name' => $_POST['name'],
                        'phone' => $_POST['phone'],
                        'subject' => 'Web form contact',
                        'message' => $_POST['message']
                    ]
                )
            ) {
                header("Location: " . $DUMBDOG->page->url . '?sent=true#sent');
                exit();
            }
        } else {
            $error = "Invalid captcha";
        }
    } else {
        $error = "Missing required";
    }
}

require_once("./website/header.php");
?>
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
    ?>
    <section>
        <div id="sent" <?= $sent ? "" : 'class="d-none"'; ?>>
            <div class="h3">
                Thank you for your message. 
                I will be in touch very shortly.
            </div>
        </div>
        <div id="error" <?= $error ? "" : 'class="d-none"'; ?>>
            <div class="h3"><?= $error; ?></div>
        </div>
        <form method="post">
            <div class="form">
                <div class="form-body">
                    <div class="form-group">
                        <span>Your name<i class="required">*</i></span>
                        <input 
                            class="form-control"
                            name="name" 
                            value="<?= !empty($_POST['name']) ? $_POST['name'] : ''; ?>" 
                            placeholder="Please enter your name"
                            required>
                    </div>
                    <div class="form-group">
                        <span>Your email<i class="required">*</i></span>
                        <input 
                            class="form-control"
                            name="email" 
                            value="<?= !empty($_POST['email']) ? $_POST['email'] : ''; ?>" 
                            placeholder="Please enter your email"
                            required>
                    </div>
                    <div class="form-group">
                        <span>Your number</span>
                        <input 
                            class="form-control"
                            name="phone" 
                            value="<?= !empty($_POST['phone']) ? $_POST['phone'] : ''; ?>" 
                            placeholder="Please enter your number if you like">
                    </div>
                    <div class="form-group">
                        <span>Your message<i class="required">*</i></span>
                        <textarea 
                            class="form-control"
                            rows="5" 
                            name="message" 
                            placeholder="What's your question or message?"
                            required><?= !empty($_POST['message']) ? $_POST['message'] : ''; ?></textarea>
                    </div>
                    <div class="form-group row">
                        <span class="col-12">Captcha<i class="required">*</i></span>
                        <div class="col-auto">
                            <?= $DUMBDOG->captcha->draw(); ?>
                        </div>
                    </div>
                </div>
                <div class="form-footer">
                    <p><i class="required">*</i>&nbsp;required fields</p>
                    <button class="button" type="submit" name="send">Send</button>
                </div>
            </div>
        </form>
    </section>

    <?php
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

    if (count($DUMBDOG->page->images) > 2) {
        ?>
        <h3>
            <span>Images</span>
        </h3>
        <div class="tiles">
            <?php
            foreach ($DUMBDOG->page->images as $key => $image) {
                if (!$key) {
                    continue;
                }
                ?>
                <div class="tile">
                    <a href="<?= $image->image; ?>" target="_blank">
                        <img src="<?= $image->image; ?>">
                    </a>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
    }

    if (count($DUMBDOG->page->children)) {
        ?>
        <h3>
            <span>
                <?= $DUMBDOG->page->type == 'blog-category' ? 'Posts' : 'Projects'; ?>
            </span>
        </h3>
        <div class="tiles">
            <?php
            foreach ($DUMBDOG->page->children as $key => $page) {
                ?>
                <div id="tile-<?= $key; ?>" class="tile">
                    <div>
                        <h4><?= $page->title; ?></h4>
                        <?php
                        if (in_array($page->type, ['blog', 'blog-category'])) {
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