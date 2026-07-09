<?php
/*
=================================================
Hatim Education Site
Common Functions
Version 1.0
=================================================
*/


// Secure output function
function clean($data)
{
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}


// Create SEO friendly slug
function createSlug($text)
{
    $text = strtolower($text);

    $text = preg_replace('/[^a-z0-9]+/', '-', $text);

    $text = trim($text, '-');

    return $text;
}


// Redirect function
function redirect($page)
{
    header("Location: ".$page);
    exit();
}


// Check login status
function isLoggedIn()
{
    return isset($_SESSION['user_id']);
}


// Display message
function showMessage($message, $type="success")
{
    echo '
    <div class="alert '.$type.'">
        '.$message.'
    </div>
    ';
}


// Limit text length
function shortText($text, $length=150)
{
    if(strlen($text) > $length)
    {
        return substr($text,0,$length)."...";
    }

    return $text;
}


// Format date
function formatDate($date)
{
    return date("F d, Y", strtotime($date));
}

?>
