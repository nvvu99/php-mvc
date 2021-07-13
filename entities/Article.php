<?php

class Article
{
    private $article_id;

    private $title;

    private $content;

    public function __construct(
        int $articleId = null,
        string $title = null,
        string $content = null
    ) {
        $this->article_id = $articleId;
        $this->title = $title;
        $this->content = $content;
    }

    public function getArticleId(): int
    {
        return (int) $this->article_id;
    }

    public function setArticleId(int $articleId)
    {
        $this->article_id = $articleId;
    }

    public function getTitle(): string
    {
        return (string) $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getContent(): string
    {
        return (string) $this->content;
    }

    public function setContent(string $content)
    {
        $this->content = $content;
    }
}
