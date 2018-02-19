<?php
namespace DariuszAndryskowski\App\Model;

use DariuszAndryskowski\App\Config\ConfigEnum;
use DariuszAndryskowski\App\Lib\InterfaceLib\IGenerator;

/**
 * Class generate CSV document
 */
class CsvDocument implements IGenerator
{
    /**
     * Default fields in header csv
     * @var array - list header items document
     */
    public $headerDocument = array(
        'title',
        'creator',
        'link',
        'description',
        'pubDate'
    );

    /**
     * Function generate csv document
     * @param array $arrayData - list data for save
     * @param string $nameFile - name generate file
     * @param string $action - action for generate document
     * @return boolean - true:generate ok; false: error generate
     */
    public function generator($arrayData, $nameFile, $action = ConfigEnum::CSV_SIMPLE)
    {
        $message = array();
        try {
            // validation input data before generate CSV file
            $this->validateInputData($arrayData, $nameFile);

            // generate simple CSV
            if ($action == ConfigEnum::CSV_SIMPLE) {
                $fp = @fopen( $nameFile, 'w' );
            }
            // generate extended CSV
            if ($action == ConfigEnum::CSV_EXTENDED) {
                $fp = @fopen($nameFile, 'a');
            }

            if ($fp == false) {
                $message['message'] = 'Error! Permission denied create/open the file. Check the path for the file or close file if You opened.';
                $message['status'] = 'error';

                return $message;
            }

            // add header element in CSV
            fputcsv($fp, $this->headerDocument());

            // add items to file
            foreach ($arrayData as $fields) {
                // utf-8 decode
                $fields = array_map("utf8_decode", $fields);
                fputcsv($fp, $fields);
            }

            fclose($fp);

            $message['message'] = 'Success! Finish create CSV file. Application use action: ' . $action;
            $message['status'] = 'success';

            return $message;
        } catch(\Exception $e) {
            $message['message'] = 'Error! Error parse data.';
            $message['status'] = 'error';

            return $message;
        }
    }

    /**
     * Default title in header csv
     * @return array
     */
    public function headerDocument()
    {
        return $this->headerDocument;
    }

    /**
     * Function validation input data before generate CSV file
     * @return boolean
     */
    public function validateInputData($arrayData, $nameFile) {
        if(!isset($arrayData) || count($arrayData) == 0 ) {
            $message['message'] = 'Error! Data for save is empty.';
            $message['status'] = 'error';

            return $message;
        }

        if(!isset($nameFile)) {
            $message['message'] = 'Error! Name file not exist.';
            $message['status'] = 'error';

            return $message;
        }

        return true;
    }
}
?>