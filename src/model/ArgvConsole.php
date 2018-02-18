<?php
namespace DariuszAndryskowski\App\Model;

use DariuszAndryskowski\App\Config\ConfigEnum;

class ArgvConsole {

    /**
     * Param from console
     * @var array
     */
    protected $argvConsole;

    /**
     * Path location run file
     * @var string
     */
    protected $localPathArgv;

    /**
     * Name action generate file
     * @var string
     */
    protected $actionArgv;

    /**
     * Adress url with data xml
     * @var string
     */
    protected $urlArgv;

    /**
     * Name file export data
     * @var string
     */
    protected $exportNameFileArgv;


    /**
     * Create a new instance
     */
    public function __construct() {
    }

    /**
     * Set data argv from console
     */
    public function setArgvConsole($argv) {
        $this->argvConsole = $argv;
    }

    /**
     * Get data argv from console
     */
    public function getArgvConsole() {
        return $this->argvConsole;
    }

    /**
     * Set path location run file
     * @param $localPathArgv
     * @return mixed
     */
    public function setLocalPathArgv($localPathArgv) {
        $this->localPathArgv = $localPathArgv;
    }

    /**
     * Get path location run file
     * @return mixed
     */
    public function getLocalPathArgv() {
        return $this->localPathArgv;
    }

    /**
     * Set param action generate file
     * @param $actionArgv
     * @return mixed
     */
    public function setActionArgv($actionArgv) {

        switch ( mb_strtolower($actionArgv, 'UTF-8') ) {
            case ConfigEnum::CSV_SIMPLE;
                $this->actionArgv = ConfigEnum::CSV_SIMPLE;
                break;
            case ConfigEnum::CSV_EXTENDED;
                $this->actionArgv = ConfigEnum::CSV_EXTENDED;
                break;
            default:
                $this->actionArgv = ConfigEnum::CSV_SIMPLE;
                break;
        }
    }

    /**
     * Get param action generate file
     * @return mixed
     */
    public function getActionArgv() {
        return $this->actionArgv;
    }


    /**
     * Set addres url with data xml
     * @param $urlArgv
     * @return mixed
     */
    public function setUrlArgv($urlArgv) {
        $this->urlArgv = $urlArgv;
    }

    /**
     * Get addres url with data xml
     * @return mixed
     */
    public function getUrlArgv() {
        return $this->urlArgv;
    }


    /**
     * Set name export file
     * @param $exportNameFileArgv
     */
    public function setExportNameFile($argv) {

        // set default name file
        if ( !isset($argv[3]) ) {
            $this->exportNameFileArgv = ConfigEnum::NAME_EXPORT_FILE;
        } else { // set name file from console
            $this->exportNameFileArgv = $argv[3];
        }
    }

    /**
     * Get name export file
     * @return mixed
     */
    public function getExportNameFile() {
        return $this->exportNameFileArgv;
    }


    /**
     * Set data
     */
    public function separationArgvData() {

        $this->setLocalPathArgv($this->argvConsole[0]);
        $this->setActionArgv($this->argvConsole[1]);
        $this->setUrlArgv($this->argvConsole[2]);
        $this->setExportNameFile($this->argvConsole);
    }

}