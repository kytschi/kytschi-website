<?php
if ($DUMBDOG->page->name != "contact") {
    ?>
<div id="contact">
    <div class="container">
        <form method="POST" action="/contact-kytschi" class="card p-4">
            <div class="card-header">
                Chat with me
            </div>
            <div class="card-body">
                <div class="form-group mb-3">
                    <span>Your name<i class="required">*</i></span>
                    <input 
                        class="form-control mt-2"
                        name="name" 
                        value="<?= !empty($_POST['name']) ? $_POST['name'] : ''; ?>" 
                        required>
                </div>
                <div class="form-group mb-3">
                    <span>Your email<i class="required">*</i></span>
                    <input 
                        class="form-control mt-2"
                        name="email" 
                        value="<?= !empty($_POST['email']) ? $_POST['email'] : ''; ?>" 
                        required>
                </div>
                <div class="form-group mb-3">
                    <span>Your message<i class="required">*</i></span>
                    <textarea 
                        class="form-control mt-2"
                        rows="5" 
                        name="message" 
                        required><?= !empty($_POST['message']) ? $_POST['message'] : ''; ?></textarea>
                </div>
                <div class="form-group row">
                    <span class="col-12 mb-2">Captcha<i class="required">*</i></span>
                    <div class="col-auto">
                        <?= $DUMBDOG->captcha->draw(); ?>
                    </div>
                </div>
            </div>
            <div class="card-footer py-3">
                <button type="submit" name="send">Send</button>
            </div>
        </form>
    </div>
</div>
    <?php
}
?>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="copyright">
                    &copy;<?= date('Y'); ?>
                    <?= $DUMBDOG->site->name; ?>
                </div>
                <div class="powered-by">
                    <a href="https://dumb-dog.kytschi.com" target="_blank">
                        Powered by Dumb Dog
                    </a>
                </div>
                <div>
                    <a href="https://www.freepik.com/author/pikisuperstar" target="_blank">
                        Art by pikisuperstar
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <ul>
                    <?php
                    if (count($menu = $DUMBDOG->menusByTag("footer"))) {
                        $menu = reset($menu);
                        foreach ($menu->items as $item) {
                            ?>
                            <li class="nav-item">
                                <a
                                    href="<?= $item->url; ?>"
                                    class="nav-link <?= $item->active ? ' active' : '';?>"
                                    <?= !empty($item->new_window) ? 'target="_blank"' : ''; ?>
                                    title="Click to view the <?= $item->title; ?>">
                                    <?= $item->title; ?>
                                </a>
                            </li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
                <ul>
                    <?php
                    if (count($menu = $DUMBDOG->menusByTag("footer-2"))) {
                        $menu = reset($menu);
                        foreach ($menu->items as $item) {
                            ?>
                            <li class="nav-item">
                                <a
                                    href="<?= $item->url; ?>"
                                    class="nav-link <?= $item->active ? ' active' : '';?>"
                                    <?= !empty($item->new_window) ? 'target="_blank"' : ''; ?>
                                    title="Click to view the <?= $item->title; ?>">
                                    <?= $item->title; ?>
                                </a>
                            </li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 text-end">
                <a href="mailto:<?= $DUMBDOG->site->contact_email; ?>" target="_blank">
                    <?= $DUMBDOG->site->contact_email; ?>
                </a>
            </div>
        </div>
    </div>
</footer>