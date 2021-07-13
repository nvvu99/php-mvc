<?php

include_once '../controllers/ArticleController.php';

$articleController = new ArticleController();
$articles = $articleController->getAllArticles();

foreach ($articles as $article) {
    include './templates/article_item.php';
}
