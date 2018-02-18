<?php
namespace DariuszAndryskowski\App\Lib\InterfaceLib;

interface IParser {

    /**
     * Function parse data
     * @param $argv
     * @return mixed
     */
    public function parseData($argv);

}