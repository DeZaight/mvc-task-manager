<?php

namespace app\controllers;

use core\Controller;

class MainController extends Controller
{

    public function indexAction()
    {
        $checkAuth =  $this->model->checkAuth();
        $tasks = $this->model->getAllTasks();

        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        $tasksPerPage = 3;
        $pagesCount = ceil(count($tasks) / $tasksPerPage);

        $start = $currentPage * $tasksPerPage - $tasksPerPage;

        $tasks = $this->model->getTasksPerPage($start, $tasksPerPage);
        $vars = [
            'auth' => $checkAuth,
            'tasks' => $tasks,
            'pagesCount' => $pagesCount,
            'currentPage'  => $currentPage
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

    public function createTaskAction()
    {
        $this->model->createTask(file_get_contents('php://input'));
    }

    public function editTaskAction()
    {
        $this->model->editTask(file_get_contents('php://input'));
    }
}
