<?php

namespace Framework\Controller;

use Framework\Config\Dispatch;
use Framework\Model\AuthorDAO;
use Framework\Model\ArticleDAO;


/*
 * Administration Controller
 * @access public
 * @author Evandro Morini
 */
class AdminController 
{
    public function management()
    {
        $dispatch = new Dispatch();
        
        if(isset($_SESSION['login']))
        {
            $authorDAO = new AuthorDAO();
            $authors = $authorDAO->load();
            $articleDAO = new ArticleDAO();
            $articles = $articleDAO->load();
            $dispatch->render('management', [
                    'authors' => $authors,
                    'articles' => $articles
                ]
            );
        }
        else
        {
            $dispatch->render('login', ['error' => 'You need to log in first!']);
        }
    }
}