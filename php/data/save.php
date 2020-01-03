<?php

if (isset($_POST['filename']) && file_exists(__DIR__ . '/../../data/' . $_POST['filename'])) {
    echo file_put_contents(__DIR__ . '/../../data/' . $_POST['filename'], $_POST['data']);
} else {
    echo 0;
}
