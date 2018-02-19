<?php
namespace DariuszAndryskowski\App\Lib\InterfaceLib;

/**
 * Interfce generate
 */
interface IGenerator
{
    /**
     * Function generate
     * @param array $arrayData - array data to generate
     * @param string $nameFile - name export file
     * @param string $action - action generate
     * @return mixed
     */
    public function generator($arrayData, $nameFile, $action);
}
?>