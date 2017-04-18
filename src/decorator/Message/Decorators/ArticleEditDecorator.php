<?php

namespace Message\Decorators;

use Message\ArticleInterface;

class ArticleEditDecorator implements ArticleInterface
{
    /**
     * ArticleInterface
     */
    private $article;

    /**
     * ArticleEditDecorator constructor.
     */
    public function __construct(ArticleInterface $article)
    {
        $this->article = $article;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->article->getMessage().' edité.';
    }
}
