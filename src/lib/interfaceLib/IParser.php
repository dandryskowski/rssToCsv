<?php
namespace DariuszAndryskowski\App\Lib\InterfaceLib;

/**
 * Interface parser
 */
interface IParser
{
    /**
     * Function parse data
     * @param $argv - data to parse
     * @return mixed
     */
    public function parseData($argv);
}
?>