<?php
namespace DariuszAndryskowski\App\Lib;

class Validator {


    private static $instance;
    private $logs;


    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Validator();
        }
        return self::$instance;
    }

    /**
     * Function validate address url
     * @param $url
     * @return bool
     */
    public function checkValidUrl($url) {
        if (empty($url) || filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
            return false;
        }

        return true;
    }


    /**
     * Function check exist url
     * @param $url
     * @return bool
     */
    function checkExistUrl($url){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($code == 200) {
            $status = true;
        } else {
            $status = false;
        }

        curl_close($ch);
        return $status;
    }


}