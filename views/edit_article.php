<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once '../controllers/ArticleController.php';
    include_once '../forms/ArticleForm.php';

    $articleController = new ArticleController();
    $form = new ArticleForm();

    if (isset($_POST['articleId'])) {
        $form->setArticleId($_POST['articleId']);
    }
    if (isset($_POST['title'])) {
        $form->setTitle($_POST['title']);
    }
    if (isset($_POST['content'])) {
        $form->setContent($_POST['content']);
    }

    if ($form->isValid()) {
        $articleController->updateArticle(
            $form->getArticleId(),
            $form->getTitle(),
            $form->getContent()
        );
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['articleId'])) {
        $articleId = $_GET['articleId'];
        include './templates/article_form.php';
    }
}
