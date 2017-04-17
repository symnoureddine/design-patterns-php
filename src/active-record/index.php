<?php

/**
 * Active record
 */

require_once 'Models/Article.php';

use Models\Article;


/**
 * Dans cette exemple, on ajoute un nouvelle Article
 */
$article = new Article();
$article->title = 'Titre 1';
$article->description = 'Description Article 1';
$article->content = 'Contenu Article 1';
$article->slug = 'article-1';
$article->save();


/**
 * Dans cette exemple, on ajoute un modifie un Article WHERE son id
 */
$article = Article::load()->find(12);
$article->title = 'Titre 2';
$article->description = 'Description Article 2';
$article->content = 'Contenu Article 2';
$article->slug = 'article-2';
$article->save();