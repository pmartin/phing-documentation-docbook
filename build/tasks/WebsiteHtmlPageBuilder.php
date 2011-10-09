<?php

class WebsiteHtmlPageBuilder extends BaseParamFilterReader
{
    function read($len = null) {

        if ( !$this->getInitialized() ) {
            $this->_initialize();
            $this->setInitialized(true);
        }
        $buffer = $this->in->read($len);
        if($buffer === -1) {
            return -1;
        }
        
        if (!file_exists($this->_menuDataFile)) {
            throw new Exception("Invalid parameter 'menuDataFile'");
        }
        
        $this->_menuData = unserialize(file_get_contents($this->_menuDataFile));
        
        $htmlFullpath = $this->in->getResource();
        $htmlFileName = basename($htmlFullpath);
        
        $this->localizeEntryInMenuData($htmlFileName);
        
        
        
        $htmlInput = file_get_contents($htmlFullpath);
        
        $domInput = new DOMDocument();
        $domInput->loadHTML($htmlInput);
        $bodyInput = $domInput->getElementsByTagName('body')->item(0);
        
        
        $domOutput = new DOMDocument();
        $domOutput->formatOutput = true;
        
        $htmlOutput = $domOutput->createElement('html');
        $domOutput->appendChild($htmlOutput);
        
        
        $headOutput = $domOutput->createElement('head');
        $htmlOutput->appendChild($headOutput);
        
        $metaContentTypeOutput = $domOutput->createElement('meta');
        $metaContentTypeOutput->setAttribute('http-equiv', 'Content-Type');
        $metaContentTypeOutput->setAttribute('content', 'text/html; charset=UTF-8');
        $headOutput->appendChild($metaContentTypeOutput);
        
        $titleOutput = $domOutput->importNode($domInput->getElementsByTagName('title')->item(0), true);
        $headOutput->appendChild($titleOutput);
        
        $linkCssOutput = $domOutput->createElement('link');
        $linkCssOutput->setAttribute('rel', 'stylesheet');
        $linkCssOutput->setAttribute('type', 'text/css');
        $linkCssOutput->setAttribute('href', 'docbook.html.css');
        $headOutput->appendChild($linkCssOutput);
        
        
        $bodyOutput = $domOutput->createElement('body');
        $htmlOutput->appendChild($bodyOutput);
        
        $divMenu = $domOutput->createElement('div');
        $divMenu->setAttribute('class', 'menu');
        $bodyOutput->appendChild($divMenu);
        
        $ulRoot = $domOutput->createElement('ul');
        $divMenu->appendChild($ulRoot);
        foreach ($this->_menuData as $level) {
            $this->addSubmenuItems($level, $domOutput, $ulRoot);
        }
        
        $divContent = $domOutput->createElement('div');
        $divContent->setAttribute('class', 'content');
        $bodyOutput->appendChild($divContent);
        foreach ($bodyInput->childNodes as $child) {
            $divContent->appendChild($domOutput->importNode($child, true));
        }
        
        
        return $domOutput->saveHTML();
    }
    
    
    /**
     * Parses the parameters to set the tab length.
     */
    private function _initialize() {
        $params = $this->getParameters();
        if ( $params !== null ) {
            for($i = 0 ; $i<count($params) ; $i++) {
                if ($params[$i]->getName() == 'menuDataFile') {
                    $this->_menuDataFile = $params[$i]->getValue();
                }
            }
        }
    }
    
    
    protected $_menuData;
    
    protected $_menuDataFile;
    
    protected function addSubmenuItems(array $level, DOMDocument $dom, DOMElement $parentUl) {
        $liLevel = $dom->createElement('li');
        $parentUl->appendChild($liLevel);
        
        $aLevel = $dom->createElement('a');
        $liLevel->appendChild($aLevel);
        
        $textLevel = $dom->createTextNode($level['text']);
        $aLevel->appendChild($textLevel);
        $aLevel->setAttribute('href', $level['href']);
        
        if (isset($level['isBelow']) && $level['isBelow']) {
            $aLevel->setAttribute('class', 'below');
            
            // debug : to see the current path, even without the external CSS
            $aLevel->setAttribute('style', 'font-weight: bold;');
            
            
            if (isset($level['children'])) {
                $ulSubLevel = $dom->createElement('ul');
                $liLevel->appendChild($ulSubLevel);
                foreach ($level['children'] as $child) {
                    $this->addSubmenuItems($child, $dom, $ulSubLevel);
                }
            }
            
        }
    }
    
    
    protected function localizeEntryInMenuData($fileName) {
        foreach ($this->_menuData as & $level) {
            $this->isFileBelow($fileName, $level);
        }
    }
    
    
    protected function isFileBelow($fileName, & $level) {
        $isBelow = false;
        if ($fileName === $level['file']) {
            $isBelow = true;
        }
        if (isset($level['children'])) {
            foreach ($level['children'] as & $child) {
                $isBelowChild = $this->isFileBelow($fileName, $child);
                if ($isBelowChild) {
                    $isBelow = true;
                }
            }
        }
        $level['isBelow'] = $isBelow;
        return $isBelow;
    }
    
}
