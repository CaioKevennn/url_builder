<?php

namespace app\controllers;

use app\models\UrlBuilderModel;
use Exception;

class UrlBuilderController
{
    public function home()
    {
        require_once __DIR__ . '/../views/UrlBuilderView.php';
    }
    public function CreateUrl()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $utms = [];
                $genered_url = " ";
                $url = filter_var($_POST['url'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $utms['utm_campaign'] = filter_var($_POST['utm_campaign'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $utms['utm_source'] = filter_var($_POST['utm_source'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $utms['utm_medium'] = filter_var($_POST['utm_medium'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $utms['utm_content'] = filter_var($_POST['utm_content'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $utms['utm_term'] = filter_var($_POST['utm_term'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                foreach ($utms as $index => $utm) {
                    if ($genered_url == " ") {
                        $genered_url = $url . "?" . $index . "=" . $utm;
                    } else {
                        $genered_url = $genered_url . "&" . $index . "=" . $utm;
                    }
                }
                $_SESSION['generated_url'] = $genered_url;
                $new_url = new UrlBuilderModel($genered_url);
                $new_url->saveUrl();
                require_once __DIR__ . '/../views/UrlBuilderView.php';                $_SESSION['generated_url'] = $genered_url;

            } catch (Exception $e) {
                echo "ocorreu o erro:" . $e->getMessage();
            }

        }
    }

}