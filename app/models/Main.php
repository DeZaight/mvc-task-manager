<?php

namespace app\models;

use core\Model;

class Main extends Model
{
    public function checkAuth()
    {
        if (!empty($_COOKIE['session_key'])) {
            $result = $this->db->fetch('SELECT * FROM sessions WHERE session_key = :session_key', array(
                ':session_key' => $_COOKIE['session_key']
            ));

            if (!empty($result)) {
                return true;
            }
        }

        return false;
    }

    public function signin($json)
    {
        $obj = json_decode($json, true);

        $login = isset($obj['login']) ? $obj['login'] : null;
        $password = isset($obj['password']) ? $obj['password'] : null;

        $result = false;

        if (!empty($login) && !empty($password)) {
            $result = $this->db->fetch('SELECT * FROM users WHERE login = :login AND password = :password', array(
                ':login' => $login,
                ':password' => $password,
            ));
        }

        if (!empty($result)) {
            $session_key =  bin2hex(random_bytes(10)) . md5(date('d-m-Y-H-i'));
            $this->db->query('INSERT INTO sessions (user_id, session_key) VALUES (:user_id, :session_key)', array(
                ':user_id' => $result['id'],
                ':session_key' => $session_key
            ));

            setcookie('session_key',  $session_key, time() + (3600 * 24 * 30), '/');
        }

        header('Content-type: application/json');
        echo json_encode(array('result' => $result));
    }

    public function logout($json, $session_key)
    {
        $obj = json_decode($json, true);

        $logout = isset($obj['logout']) ? $obj['logout'] : null;
        $session_key = isset($session_key) ? $session_key : null;

        $result = false;

        if (!empty($logout) && !empty($session_key)) {
            $this->db->query('DELETE FROM sessions WHERE session_key = :session_key', array(
                ':session_key' => $session_key,
            ));

            unset($_COOKIE['session_key']);
            setcookie('session_key', null, -1, '/');

            $result = true;
        }

        header('Content-type: application/json');
        echo json_encode(array('result' => $result));
    }
}
