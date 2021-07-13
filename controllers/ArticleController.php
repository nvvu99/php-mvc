<?php

include_once '../dao/ArticleDAO.php';
include_once '../entities/Article.php';

class ArticleController
{
    private $articleDAO;

    public function __construct()
    {
        $this->articleDAO = new ArticleDAO();
    }

    public function getAllArticles(): array
    {
        return $this->articleDAO->getAllArticles();
    }

    public function getArticleById(int $articleId): ?Article
    {
        return $this->articleDAO->getArticleById($articleId);
    }

    public function createArticle(string $title, string $content)
    {
        $this->articleDAO->createArticle($title, $content);
    }
}
