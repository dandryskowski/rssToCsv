<?php
/**
 * Interface parser
 */
namespace DariuszAndryskowski\App\Lib\InterfaceLib;

interface IParser
{
    /**
     * Function parse data
     * @param $argv - data to parse
     * @return mixed
     */
    public function parseData($argv);

}