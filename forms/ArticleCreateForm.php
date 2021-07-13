<?php

include_once '../resources/text/ErrorMessages.php';

class ArticleCreateForm
{
    private $title;

    private $content;

    private $errorMessagesForTitle;

    private $errorMessagesForContent;

    private $errorMessages;

    public function __construct(string $title = '', string $content = '')
    {
        $this->title = $title;
        $this->content = $content;
        $this->errorMessagesForTitle = [];
        $this->errorMessagesForContent = [];
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

    public function getErrorMessagesForTitle(): array
    {
        return $this->errorMessagesForTitle;
    }

    public function getErrorMessagesForContent(): array
    {
        return $this->errorMessagesForContent;
    }

    private function validateTitle()
    {
        if ($this->title === '') {
            $this->addErrorMessage(
                $this->errorMessagesForTitle,
                ErrorMessages::ARTICLE_TITLE_REQUIRED_ERROR_MSG
            );
        }
    }

    private function validateContent()
    {
        if ($this->content === '') {
            $this->addErrorMessage(
                $this->errorMessagesForContent,
                ErrorMessages::ARTICLE_CONTENT_REQUIRED_ERROR_MSG
            );
        }
    }

    private function addErrorMessage(array &$errorMessages, string $message)
    {
        if (!in_array($message, $errorMessages)) {
            array_push($errorMessages, $message);
        }
    }

    public function validate()
    {
        $this->validateTitle();
        $this->validateContent();
    }

    public function isValid(): bool
    {
        $this->validate();
        return count($this->errorMessagesForTitle) === 0 &&
            count($this->errorMessagesForContent) === 0;
    }
}
