<?php
namespace DariuszAndryskowski\App\Model;

use DariuszAndryskowski\App\Config\ConfigEnum;

/**
 * Class console data
 */
class ArgvConsole
{
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
    public function __construct() {}

    /**
     * Set data argv from console
     * @param array $argv
     */
    public function setArgvConsole($argv)
    {
        $this->argvConsole = $argv;
    }

    /**
     * Get data argv from console
     * @return string
     */
    public function getArgvConsole()
    {
        return $this->argvConsole;
    }

    /**
     * Set path location run file
     * @param string $localPathArgv
     */
    public function setLocalPathArgv($localPathArgv)
    {
        $this->localPathArgv = $localPathArgv;
    }

    /**
     * Get path location run file
     * @return string
     */
    public function getLocalPathArgv()
    {
        return $this->localPathArgv;
    }

    /**
     * Set param action generate file
     * @param string $actionArgv - set type action generate CSV
     */
    public function setActionArgv($actionArgv)
    {
        switch (mb_strtolower( $actionArgv, 'UTF-8')) {
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
     * @return string
     */
    public function getActionArgv()
    {
        return $this->actionArgv;
    }

    /**
     * Set addres url with data xml
     * @param string $urlArgv - address URL RSS/ATOM
     */
    public function setUrlArgv($urlArgv)
    {
        $this->urlArgv = $urlArgv;
    }

    /**
     * Get addres url with data xml
     * @return string
     */
    public function getUrlArgv()
    {
        return $this->urlArgv;
    }

    /**
     * Set name export file
     * @param string $argv
     */
    public function setExportNameFile($argv)
    {
        // set default name file
        if (!isset( $argv[3])) {
            $this->exportNameFileArgv = ConfigEnum::NAME_EXPORT_FILE;
        } else { // set name file from console
            $this->exportNameFileArgv = $argv[3];
        }
    }

    /**
     * Get name export file
     * @return string
     */
    public function getExportNameFile()
    {
        return $this->exportNameFileArgv;
    }

    /**
     * Set data
     */
    public function separationArgvData()
    {
        $this->setLocalPathArgv($this->argvConsole[0]);
        $this->setActionArgv($this->argvConsole[1]);
        $this->setUrlArgv($this->argvConsole[2]);
        $this->setExportNameFile($this->argvConsole);
    }
}
?>