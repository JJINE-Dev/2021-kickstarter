<?php

function view($view, $data = []) {
    extract($data);
    require VIEW."/header.php";
    require VIEW."/$view.php";
    require VIEW."/footer.php";
}

function user() { return isset($_SESSION['user']) ? $_SESSION['user'] : false; }
function admin() { return user() && user()->user_email === 'admin' ? user() : false; }
function go($url, $message) {
    echo "<script>";
    if(!$message !== "") echo "alert('$message');";
    echo "location.href='$url';";
    echo "</script>";
    exit;
}
function back($message = "") {
    echo "<script>";
    if($message !== "") echo "alert('$message');";
    echo "history.back();";
    echo "</script>";
    exit;
}
function pagenation($data) {
    define("LIST_LENGTH", 10);
    define("BLOCK_LENGTH", 5);
    define("SPACING", 4);

    $page = isset($_GET["page"]) && is_numeric($_GET["page"]) && $_GET["page"] >= 1 ? 1 :$_GET["page"];

    $totalPage = ceil(count($page) / LIST_LENGTH);

    $startPage = floor($page / BLOCK_LENGTH) * LIST_LENGTH + 1;

    $endPage = $startPage + SPACING > $totalPage ? $totalPage : $startPage + SPACING;

    $next = true;
    $prev = true;

    if($startPage == 1) $next = false;
    if($endPage == $totalPage) $prev = false;

    $data = array_slice($data, ($page - 1) * LIST_LENGTH, LIST_LENGTH);

    return (object)compact("startPage", "endPage", "data", "next", "prev");
}
