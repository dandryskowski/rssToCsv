<?php
namespace DariuszAndryskowski\App\Model;


use DariuszAndryskowski\App\Config\ConfigEnum;
use DariuszAndryskowski\App\Lib\InterfaceLib\IGenerator;

class CsvDocument implements IGenerator {

    /**
     * Default fields in header csv
     * @var array
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
     */
    public function generator( $arrayData , $nameFile, $action ) {

        // generate simple CSV
        if ($action == ConfigEnum::CSV_SIMPLE ) {
            $fp = fopen($nameFile, 'w');
        }
        // generate extended CSV
        if ($action == ConfigEnum::CSV_EXTENDED ) {
            $fp = fopen($nameFile, 'a');
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

        return true;
    }

    /**
     * Default title in header csv
     * @return array
     */
    public function headerDocument() {
        return $this->headerDocument;
    }
}