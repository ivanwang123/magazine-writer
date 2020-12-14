<?php

$conn = mysqli_connect('localhost', 'ivan', 'Tweryui4', 'article');

if (!$conn)
    echo 'Connection error: ' . mysqli_connect_error();