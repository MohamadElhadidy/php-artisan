<?php
session_start();

if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [];
}