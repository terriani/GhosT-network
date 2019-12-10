<?php

return [
$twig->addGlobal('csrfToken', $_SESSION['csrfToken']),
$twig->addGlobal('base_url', BASE_URL),
$twig->addGlobal('assets', ASSET),
$twig->addGlobal('session', $_SESSION),
$twig->addGlobal('session', $_SESSION),
$twig->addGlobal('upload', "Public/uploaded/"),
$twig->addGlobal('btn_sign_in', BTN_SIGN_IN),
$twig->addGlobal('btn_sign_out', BTN_SIGN_OUT),
$twig->addGlobal('btn_sign_up', BTN_SIGN_UP),
$twig->addGlobal('btn_update', BTN_UPDATE),
$twig->addGlobal('btn_delete', BTN_DELETE),
$twig->addGlobal('btn_back', BTN_BACK),
$twig->addGlobal('btn_send', BTN_SEND),
$twig->addGlobal('btn_password_reset', BTN_PASSWORD_RESET)
];