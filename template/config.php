<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$base_url = "/sumatropic";
