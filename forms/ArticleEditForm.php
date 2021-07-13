<?php

include_once 'ArticleCreateForm.php';

class ArticleEditForm extends ArticleCreateForm
{
    private $articleId;

    public function __construct(
        int $articleId = 0,
        string $title = '',
        string $content = ''
    ) {
        $this->articleId = $articleId;
        parent::__construct($title, $content);
    }

    private function validateArticleId()
    {
        if ($this->articleId === 0) {
        }
    }
}
