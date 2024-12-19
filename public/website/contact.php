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
?>
<!DOCTYPE html>
<html lang="en">
    <?php
        require_once("./website/head.php");
    ?>
    <body id="page-contact">
        <main>
            <div class="container">
                <?php
                    require_once("./website/header.php");
                ?>
                <div id="sent" <?= $sent ? "" : 'class="d-none"'; ?>>
                    <div class="h3">
                        Thank you for your message. 
                        I will be in touch very shortly.
                    </div>
                </div>
                <div id="error" <?= $error ? "" : 'class="d-none"'; ?>>
                    <div class="h3"><?= $error; ?></div>
                </div>
                <div class="row">
                    <form method="POST" action="/contact-kytschi" class="col-4 card p-4 mb-5">
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
                    <div class="col-6">
                        <img id="page-contact-image" src="/website/assets/boxes/contact.png"/>
                    </div>
                </div>
            </div>
        </main>
        <?php
            require_once("./website/footer.php");
        ?>
    </body>
</html>
