                </main>
                <footer>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="copyright">
                                &copy;<?= date('Y'); ?>
                                <?= $DUMBDOG->site->name; ?>
                            </div>
                            <div class="powered-by">
                                <a href="https://dumbdog.kytschi.com" target="_blank">
                                    Powered by Dumb Dog
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <ul>
                                <?php
                                if (count($menu = $DUMBDOG->menusByTag("footer"))) {
                                    $menu = reset($menu);
                                    include("components/menu.php");
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </body>
</html>