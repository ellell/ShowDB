<?php
foreach (logger::$message_array as $item) {
    echo '<p class="error">' . $item . '</p>';
}