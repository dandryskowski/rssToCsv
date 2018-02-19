<?php
/**
 * Application parse RSS/Atom and generate CSV
 */
namespace DariuszAndryskowski\App;

use DariuszAndryskowski\App\Lib\Validator;
use DariuszAndryskowski\App\Model\ArgvConsole;
use DariuszAndryskowski\App\Model\CsvDocument;
use DariuszAndryskowski\App\Model\ParserRss;

class AppClass extends ArgvConsole
{
    /**
     * Function run app parse RSS/Atom and generate CSV file
     */
    public function runApp()
    {
        $validator = Validator::getInstance();

        if (!$validator->checkValidUrl($this->getUrlArgv())) {
            throw new \Exception('Error! The URL may not be empty or NULL');
        }

        if (!$validator->checkExistUrl($this->getUrlArgv())) {
            throw new \Exception('Error! Address URL not exist');
        }

        // parse data from RSS/Atom
        $parser = new ParserRss();
        $arrayListArticleRss = $parser->parseData($this->getUrlArgv());

        if (count($arrayListArticleRss) == 0) {
            throw new \Exception('Error! Data parse site URL is empty');
        }

        // generate document CSV
        $csvDoc = new CsvDocument($arrayListArticleRss);
        $resultGenerateScv = $csvDoc->generator($arrayListArticleRss, $this->getExportNameFile(), $this->getActionArgv());

        if ($resultGenerateScv == true) {
            echo 'Success! Parse RSS/Atom and generate csv.';
        } else {
            echo 'Error! Not generate csv.';
        }
    }

}
