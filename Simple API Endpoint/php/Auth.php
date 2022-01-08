<?php

/**
 * project name: KEYLOGGER API ENDPOINT
 * @package keylogger
 * type : library
 */

class Auth
{
    public function __construct()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_SERVER['CONTENT_TYPE'] !== 'application/json') {
                echo json_encode(array('warning' => 'Request content type is not valid.'));
                exit;
            }
        }
    }

    //private authorization
    public function private()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authentication: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            echo json_encode(array('warning' => 'Sorry, you need proper credentials.'));
            exit;
        } else {
            if ($_SERVER['PHP_AUTH_USER'] == '[BASIC_AUTH_USERNAME_GOES_HERE]' && $_SERVER['PHP_AUTH_PW'] == '[BASIC_AUTH_PASSWORD_GOES_HERE]') {
            } else {
                header("WWW-Authenticate: Basic realm=\"Private Area\"");
                header("HTTP/1.0 401 Unauthorized");
                echo json_encode(
                    array('warning' => 'You have no permission to do this')
                );
                exit;
            }
        }
    }
}
