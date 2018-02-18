<?php
namespace DariuszAndryskowski\App\Model;

use DariuszAndryskowski\App\Lib\InterfaceLib\IParser;


class ParserRss implements IParser {

    public $articleData = array();
    public $items = array();


    /**
     * Parse data from RSS/Atom
     * @param $argv
     * @return bool
     */
    public function parseData($argv) {

        // get content
        $content = file_get_contents($argv);

        // parse data
        $data = new \SimpleXMLElement($content);

        foreach($data->channel->item as $entry) {
            $namespaces = $entry->getNameSpaces(true);
            $dc = $entry->children($namespaces['dc']);

            $pub_date = explode("-", $entry->pubDate);

            $itemRSS = array (
                'title' => $entry->title,
                'creator' => $dc->creator,
                'link' => $entry->link,
                'description' => $entry->description,
                'pubDate' => date('Y-m-d H:i:s', strtotime(trim($pub_date[0])))
            );

            array_push($this->articleData, $itemRSS);
        }


        return $this->articleData;
    }



}