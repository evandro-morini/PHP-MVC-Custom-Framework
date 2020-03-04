<?php

use Framework\Controller\ArticleController;
use Framework\Controller\LoginController;
use Framework\Controller\AdminController;


/*
 * Routes config
 * @access public
 * @author Evandro Morini
 */

$controller = $_REQUEST['controller'];
$action = $_REQUEST['action'];
$params['POST'] = $_POST;
$params['GET'] = $_GET;

switch ($controller) {
    
    //Routes to Login Controller
    case 'LoginController':
        $obj = new LoginController();
        switch ($action) {
            case 'login':
                $obj->login($params['POST']);
                break;
            case 'logout':
                $obj->logout();
                break;
        }
        break;
    
    //Routes to Article Controller
    case 'ArticleController':
        $obj = new ArticleController();
        switch ($action) {
            case 'showArticle':
                $obj->showArticle($params['GET']['id']);
                break;
            case 'newArticle':
                $obj->newArticle($params['POST']);
                break;
            case 'deleteArticle':
                $obj->deleteArticle($params['GET']['id']);
                break;
            case 'editArticle':
                $obj->editArticle($params['GET']['id'], $params['POST']);
                break;
        }
        break;
    
    //Routes to Administration Controller
    case 'AdminController':
        $obj = new AdminController();
        switch ($action) {
            case 'management':
                $obj->management();
                break;
        }
        break;
    
}