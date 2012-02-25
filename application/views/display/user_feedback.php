<?php
echo validation_errors('<p class="error">'); 
foreach (feedback::$feedback_array as $item) {
    echo '<p class="error">' . $item . '</p>';
}