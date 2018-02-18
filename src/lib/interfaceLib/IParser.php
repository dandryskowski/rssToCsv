<?php
/**
 * Interface parser
 * User: Dariusz Andryskowski
 * Date: 19.02.2018
 */

namespace DariuszAndryskowski\App\Lib\InterfaceLib;


interface IParser {

    /**
     * Function parse data
     * @param $argv - data to parse
     * @return mixed
     */
    public function parseData($argv);

}