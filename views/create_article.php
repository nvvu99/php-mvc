<?php

include_once '../controllers/ArticleController.php';
include_once '../forms/ArticleForm.php';

$articleController = new ArticleController();

$form = new ArticleForm();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['title'])) {
        $form->setTitle($_POST['title']);
    }
    if (isset($_POST['content'])) {
        $form->setContent($_POST['content']);
    }

    if ($form->isValid()) {
        $articleController->createArticle(
            $form->getTitle(),
            $form->getContent()
        );
    }
}

include './templates/article_form.php';
