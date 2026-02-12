<?php

// Si le fichier demandé existe dans public/, on le sert directement
if (file_exists(__DIR__ . '/public' . $_SERVER['REQUEST_URI'])) {
    return false;
}

// Sinon, on redirige tout vers Laravel
require __DIR__ . '/public/index.php';