<?php
/**
 * Class messages about error and success action (description)
 */
namespace DariuszAndryskowski\App\Model;

use DariuszAndryskowski\App\Config\MessagesEnum;

class Messages
{
    private static $instance;

    /**
     * Instance class Validator
     * @return Validator
     */
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Messages();
        }
        return self::$instance;
    }

    /**
     * Function display message
     * @param string $message - message to display
     * @param string $typeMessage - type message (error/success)
     */
    public static function display($message, $typeMessage = MessagesEnum::ERROR)
    {
        echo $message;

        if ($typeMessage === MessagesEnum::ERROR) {
            exit;
        }
    }
}