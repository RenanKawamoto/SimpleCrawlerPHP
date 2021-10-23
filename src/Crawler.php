<?php

namespace SimpleCrawler;
use DOMDocument;
use DOMXPath;
use Exception;

class Crawler
    {
        private $URL;
        private $rule;
        private $informations = [];

        public function __construct($URL)
        {
            $this->URL = $URL;
        }

        public function setRule($rule)
        {
            $this->rule = $rule;
        }

        public function searchInformationByRule()
        {
            try
            {
                $ch = curl_init($this->URL);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $html = curl_exec($ch);
        
                $dom = new DOMDocument();
                $dom->loadHTML($html);
        
                $xpath = new DOMXPath($dom);
                $resultRaw = $xpath->query($this->rule);
        
                foreach($resultRaw as $elementOfResult)
                {
                    $this->informations[] = $elementOfResult->textContent;
                }
                return true;
            }
            catch(Exception $ex)
            {
                return false;
            }
        }

        public function getInformationsOfSearch()
        {
            return $this->informations;
        }
    }
?>