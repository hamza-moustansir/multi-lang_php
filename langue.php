<?php
function loadTranslations($lang)
{
    $jsonFile = "lang_" . $lang . ".json";
    $jsonContent = file_get_contents($jsonFile);
    return json_decode($jsonContent, true);
}
$lang = isset($_GET['lang']) ? $_GET['lang'] : (isset($_COOKIE['selected_lang']) ? $_COOKIE['selected_lang'] : 'en');
setcookie('selected_lang', $lang, time() + 365 * 24 * 60 * 60, '/');
$translations = loadTranslations($lang);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="langue.css" />
    <title>Une interface multi-langue</title>
</head>

<body>
    <div class="navbar">
        <h2>LP ISIR</h2>
        <ul>
            <li><a href="?lang=en">English</a></li>
            <li><a href="?lang=fr">Francais</a></li>
            <li><a href="?lang=ar">العربية</a></li>
        </ul>
    </div>
    <div class="main">
        <?php
        echo '<h4>' . ($translations['welcome_message'] ?? '') . '</h4>';
        echo '<p class="title">' . ($translations['about_us'] ?? '') . '</p>';
        echo '<p class="subtitle">' . ($translations['contact'] ?? '') . '</p>';
        ?>
        <img src="logo.png">
    </div>
</body>

</html>