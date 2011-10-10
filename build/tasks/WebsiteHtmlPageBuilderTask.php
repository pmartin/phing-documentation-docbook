<?php
require_once 'phing/Task.php';

class WebsiteHtmlPageBuilderTask extends Task
{
    protected $filesets      = array(); // all fileset objects assigned to this task
    
    protected $_menuDataFile;
    
    public function setMenuDataFile($a) {
        $this->_menuDataFile = $a;
    }
    
    function main() {
        if (!file_exists($this->_menuDataFile)) {
            throw new Exception("Invalid parameter 'menuDataFile'");
        }
        
        $project = $this->getProject();

        foreach($this->filesets as $fs) {
            $ds = $fs->getDirectoryScanner($project);
            $files = $ds->getIncludedFiles();
            $dir =  $fs->getDir($this->project)->getPath();

            foreach ($files as $fileName) {
                $this->buildFile($dir . '/' . $fileName);
            }
        }
        
        
    }
    
    
    protected function buildFile($htmlFullpath) {
        $htmlFileName = basename($htmlFullpath);
        
        $this->log("Processing {$htmlFileName}", Project::MSG_VERBOSE);
        
        $this->_menuData = unserialize(file_get_contents($this->_menuDataFile));
        
        $this->localizeEntryInMenuData($htmlFileName);
        
        
        $htmlInput = file_get_contents($htmlFullpath);
        
        $domInput = new DOMDocument();
        $domInput->loadHTML($htmlInput);
        $xpathInput = new DOMXPath($domInput);
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
        
        $linkCssBootstrapOutput = $domOutput->createElement('link');
        $linkCssBootstrapOutput->setAttribute('rel', 'stylesheet');
        $linkCssBootstrapOutput->setAttribute('type', 'text/css');
        $linkCssBootstrapOutput->setAttribute('href', '../css/bootstrap.min.css');
        $headOutput->appendChild($linkCssBootstrapOutput);
        
        $linkCssOutput = $domOutput->createElement('link');
        $linkCssOutput->setAttribute('rel', 'stylesheet');
        $linkCssOutput->setAttribute('type', 'text/css');
        $linkCssOutput->setAttribute('href', '../css/docbook.html.css');
        $headOutput->appendChild($linkCssOutput);
        
        $linkCssWebsiteOutput = $domOutput->createElement('link');
        $linkCssWebsiteOutput->setAttribute('rel', 'stylesheet');
        $linkCssWebsiteOutput->setAttribute('type', 'text/css');
        $linkCssWebsiteOutput->setAttribute('href', '../css/phingdoc-website.css');
        $headOutput->appendChild($linkCssWebsiteOutput);
        
        
        $bodyOutput = $domOutput->createElement('body');
        $htmlOutput->appendChild($bodyOutput);
        
        $divContainer = $domOutput->createElement('div');
        $divContainer->setAttribute('class', 'container-fluid');
        $bodyOutput->appendChild($divContainer);
        
        
        $divSidebar = $domOutput->createElement('div');
        $divSidebar->setAttribute('class', 'sidebar');
        //$divSidebar->setAttribute('style', 'background-color: blue;');
        $divContainer->appendChild($divSidebar);
        
        $ulRoot = $domOutput->createElement('ul');
        $divSidebar->appendChild($ulRoot);
        foreach ($this->_menuData as $level) {
            $this->addSubmenuItems($level, $domOutput, $ulRoot);
        }
        
        $divContent = $domOutput->createElement('div');
        $divContent->setAttribute('class', 'content');
        //$divContent->setAttribute('style', 'background-color: red;');
        $divContainer->appendChild($divContent);
        
        if (!in_array($htmlFileName, array('phing.appendices.coretasks.html', 
                                           'phing.appendices.optionaltasks.html', 
                                           'phing.appendices.coretypes.html', 
                                           'phing.appendices.corefilters.html', 
                                           'phing.appendices.coremappers.html'))) {
            // If the input document contains a TOC, we remove it
            // (as we already have to full-menu)
            $listToc = $xpathInput->query('//div[@class="toc"]');
            if ($listToc->length > 0) {
                for ($i=$listToc->length-1 ; $i>=0 ; $i--) {
                    $listToc->item($i)->parentNode->removeChild($listToc->item($i));
                }
            }
        }
        
        // The titles have a clear:both style ; that needs to be removed
        $listTitles = $xpathInput->query('//*[@class="title"]');
        if ($listTitles->length > 0) {
            foreach ($listTitles as $title) {
                if ($title->hasAttribute('style') && preg_match('#clear:\s*both;?#', $title->getAttribute('style'))) {
                    $title->removeAttribute('style');
                }
            }
        }
        
        
        foreach ($bodyInput->childNodes as $child) {
            $divContent->appendChild($domOutput->importNode($child, true));
        }
        
        
        
        file_put_contents($htmlFullpath, $domOutput->saveHTML());
    }
    
    
    
    protected $_menuData;
    
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
    
    
    /**
     * Nested creator, creates a FileSet for this task
     *
     * @access  public
     * @return  object  The created fileset object
     */
    public function createFileSet() {
        $num = array_push($this->filesets, new FileSet());
        return $this->filesets[$num-1];
    }
    
}
