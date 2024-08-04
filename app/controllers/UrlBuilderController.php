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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
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
                        if ($utm) {
                            $genered_url = $genered_url . "&" . $index . "=" . $utm;

                        }
                    }
                }
                $_SESSION['generated_url'] = $genered_url;
                $new_url = new UrlBuilderModel($genered_url);
                $new_url->saveUrl();
                require_once __DIR__ . '/../views/UrlBuilderView.php';
                $_SESSION['generated_url'] = $genered_url;

            } catch (Exception $e) {
                echo "An error occurred:" . $e->getMessage() . "Please try again later.";
            }

        }
    }
    public function loadUrls()
    {
        try {
            $all_urls = UrlBuilderModel::loadAll();
            require_once __DIR__ . '/../views/UrlBuilderView.php';
        } catch (Exception $e) {
            echo "An error occurred:" . $e->getMessage() . "Please try again later.";
        }
    }

    public function exportUrls()
    {
        try {
            $all_urls = UrlBuilderModel::loadAll();
            if (ob_get_length()) {
                ob_end_clean();
            }

            $headers = ['ID', 'URL'];
            $filename = 'urls.csv';

            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename="' . $filename . '"');
            header('Cache-Control: max-age=0');

            $output = fopen('php://output', 'w');

            fputcsv($output, $headers);

            foreach ($all_urls as $url) {
                fputcsv($output, $url);
            }

            fclose($output);

            exit();

        } catch (Exception $e) {
            echo "An error occurred: " . htmlspecialchars($e->getMessage()) . " Please try again later.";
        }
    }

}