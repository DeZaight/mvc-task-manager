<?php

namespace app\controllers;

use core\Controller;

class MainController extends Controller
{

    public function indexAction()
    {
        $checkAuth =  $this->model->checkAuth();

        $vars = [
            'auth' => $checkAuth,
        ];

        $this->view->render('Task manager', $vars);
    }

    public function signinAction()
    {
        $this->model->signin(file_get_contents('php://input'));
    }

    public function logoutAction()
    {
        $this->model->logout(file_get_contents('php://input'), $_COOKIE['session_key']);
    }
}
