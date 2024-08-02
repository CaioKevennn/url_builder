<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
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
                <input type="text" id="utm_campaign" name="utm_campaign" class="form-control" value="<?= isset($utms['utm_campaign'])?$utms['utm_campaign']:""?>" >
            </div>
            <div class="form-group">
                <label for="utm_source">UTM Source</label>
                <input type="text" id="utm_source" name="utm_source" class="form-control" value="<?= isset($utms['utm_source'])?$utms['utm_source']:""?>">
            </div>
            <div class="form-group">
                <label for="utm_medium">UTM Medium</label>
                <input type="text" id="utm_medium" name="utm_medium" class="form-control"value="<?= isset($utms['utm_medium'])?$utms['utm_medium']:""?>" >
            </div>
            <div class="form-group">
                <label for="utm_content">UTM Content</label>
                <input type="text" id="utm_content" name="utm_content" class="form-control"value="<?= isset($utms['utm_content'])?$utms['utm_content']:""?>" >
            </div>
            <div class="form-group">
                <label for="utm_term">UTM Term</label>
                <input type="text" id="utm_term" name="utm_term" class="form-control"value="<?= isset($utms['utm_term'])?$utms['utm_term']:""?>" >
            </div>
            <button type="submit" class="btn btn-primary"> Generate URL</button>
        </form>
        <!-- display only when a URL was generated-->
        <?php if (isset($_SESSION['generated_url']) && $_SESSION['generated_url'] !== ''): ?>
            <div class="mt-3">
                <div class="alert alert-success w-100 text-break" role="alert">
                    <strong>URL Generated:</strong> <?= htmlspecialchars($_SESSION['generated_url'], ENT_QUOTES, 'UTF-8'); ?>
                </div>
            </div>
        <?php endif; ?>
        
        <form action="?router=UrlBuilder/loadUrls" method="post" class="mt-3">
            <button type="submit" class="btn btn-primary">Show URL History</button>
        </form>
        <!-- Display URLs in a table when available -->
        <?php if (isset($all_urls) && !empty($all_urls)): ?>
            <div class="mt-4">
                <h2>URL History</h2>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>URL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($all_urls as $url): ?>
                                <tr>
                                    <td><?= htmlspecialchars($url['id_url'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><a href="<?= htmlspecialchars($url['link_url'], ENT_QUOTES, 'UTF-8'); ?>" target="_blank"><?= htmlspecialchars($url['link_url'], ENT_QUOTES, 'UTF-8'); ?></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>
    </div>
    </div>
</body>
</html>

