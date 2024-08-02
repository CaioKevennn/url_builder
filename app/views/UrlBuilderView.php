<?php

use app\models\UrlBuilderModel;
use app\controllers\UrlBuilderController;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">URL Builder</h1>
        <form action="?router=UrlBuilder/CreateUrl" method="post">
            <div class="form-group">
                <label for="url">URL</label>
                <input type="text" id="url" name="url" class="form-control" value="<?= isset($url) ? $url : ''; ?>" >
            </div>
            <div class="form-group">
                <label for="utm_campaign">UTM Campaign</label>
                <input type="text" id="utm_campaign" name="utm_campaign" class="form-control" >
            </div>
            <div class="form-group">
                <label for="utm_source">UTM Source</label>
                <input type="text" id="utm_source" name="utm_source" class="form-control" >
            </div>
            <div class="form-group">
                <label for="utm_medium">UTM Medium</label>
                <input type="text" id="utm_medium" name="utm_medium" class="form-control" >
            </div>
            <div class="form-group">
                <label for="utm_content">UTM Content</label>
                <input type="text" id="utm_content" name="utm_content" class="form-control" >
            </div>
            <div class="form-group">
                <label for="utm_term">UTM Term</label>
                <input type="text" id="utm_term" name="utm_term" class="form-control" >
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
    <p>
        <?= isset($_SESSION['generated_url']) && $_SESSION['generated_url'] !== '' 
            ? 'Generated URL: ' . htmlspecialchars($_SESSION['generated_url'], ENT_QUOTES, 'UTF-8') 
            : 'No URL generated yet.'; ?>
    </p>
</body>
</html>
