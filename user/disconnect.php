<?php
session_start();

session_destroy();
echo "<script> document.location.href=\"http://ciconia.io/ask\"</script>";