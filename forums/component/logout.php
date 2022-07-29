<?php

session_start();
echo 'loging out';

session_destroy();
header("Location: /Forums")

?>