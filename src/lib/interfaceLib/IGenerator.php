<?php
/**
 * Interfce generate
 */
namespace DariuszAndryskowski\App\Lib\InterfaceLib;

interface IGenerator
{
    /**
     * Function generate
     * @param array $arrayData - array data to generate
     * @param $nameFile - name export file
     * @param $action - action generate
     * @return mixed
     */
    public function generator( $arrayData , $nameFile, $action );
}