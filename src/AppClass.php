<?php
/**
 * Application parse RSS/Atom and generate CSV
 */
namespace DariuszAndryskowski\App;

use DariuszAndryskowski\App\Config\MessagesEnum;
use DariuszAndryskowski\App\Lib\Validator;
use DariuszAndryskowski\App\Model\ArgvConsole;
use DariuszAndryskowski\App\Model\CsvDocument;
use DariuszAndryskowski\App\Model\Messages;
use DariuszAndryskowski\App\Model\ParserRss;

class AppClass extends ArgvConsole
{
    /**
     * Function run app parse RSS/Atom and generate CSV file
     */
    public function runApp()
    {
        $validator = Validator::getInstance();
        $messages = Messages::getInstance();

        if (!$validator->checkValidUrl($this->getUrlArgv())) {
            $messages->display('Error! The URL may not be empty or NULL', MessagesEnum::ERROR);
        }

        if (!$validator->validateFeed($this->getUrlArgv())) {
            $messages->display('Error! Data is not valid XML ', MessagesEnum::ERROR);
        }

        // parse data from RSS/Atom
        $parser = new ParserRss();
        $arrayListArticleRss = $parser->parseData($this->getUrlArgv());

        if (count($arrayListArticleRss) == 0) {
            $messages->display('Error! Data parse site "'. $this->getUrlArgv() .'"" is empty', MessagesEnum::ERROR);
        }

        // generate document CSV
        $csvDoc = new CsvDocument($arrayListArticleRss);
        $resultGenerateCsv = $csvDoc->generator($arrayListArticleRss, $this->getExportNameFile(), $this->getActionArgv());

        if ($resultGenerateCsv['status'] == 'success') {
            $messages->display($resultGenerateCsv['message'], MessagesEnum::SUCCESS);
        } else {
            $messages->display($resultGenerateCsv['message'], MessagesEnum::ERROR);
        }
    }

}
