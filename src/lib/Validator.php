<?php
namespace DariuszAndryskowski\App\Lib;

/**
 * Validator data
 */
class Validator
{
    private static $instance;

    /**
     * Constructor
     */
    private function __construct() {}

    /**
     * Instance class Validator
     * @return Validator
     */
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Validator();
        }
        return self::$instance;
    }

    /**
     * Function validate address url
     * @param string $url
     * @return bool
     */
    public function checkValidUrl($url)
    {
        if (empty($url) || filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
            return false;
        }
        return true;
    }

    /**
     * Validate Rss feed
     * @param $url
     * @return bool
     */
    public function validateFeed( $url )
    {
        $validatorUrl = 'http://feedvalidator.org/check.cgi?url=';

        if ( $validationResponse = @file_get_contents($validatorUrl . urlencode($url)) ) {
            if ( stristr( $validationResponse , 'This is a valid RSS feed' ) !== false ) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
?>