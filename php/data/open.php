<?php

if (isset($_POST['filename']) && file_exists(__DIR__ . '/../../data/' . $_POST['filename'])) {
    echo file_get_contents(__DIR__ . '/../../data/' . $_POST['filename']);
} else {
    echo '{}';
}
