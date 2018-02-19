<?php
/**
 * Class generate CSV document
 */
namespace DariuszAndryskowski\App\Model;

use DariuszAndryskowski\App\Config\ConfigEnum;
use DariuszAndryskowski\App\Lib\InterfaceLib\IGenerator;

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
     * @param strin $nameFile - name generate file
     * @param string $action - action for generate document
     * @return boolen - true:generate ok; false: error generate
     */
    public function generator($arrayData , $nameFile, $action)
    {
        $message = array();
        try {
            // generate simple CSV
            if ($action == ConfigEnum::CSV_SIMPLE) {
                $fp = @fopen( $nameFile, 'w' );
            }
            // generate extended CSV
            if ($action == ConfigEnum::CSV_EXTENDED) {
                $fp = @fopen($nameFile, 'a');
            }

            if ($fp == false) {
                $message['message'] = 'Error! Permission denied create/open file. Check the path for the file or close file if You opened.';
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

            $message['message'] = 'Success! Finish create CSV file.';
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
}