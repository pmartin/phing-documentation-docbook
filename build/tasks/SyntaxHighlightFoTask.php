<?php

require_once 'phing/Task.php';
require_once __DIR__ . '/../files/geshi/geshi.php';

class SyntaxHighlightFoTask extends Task {
    protected $file = '';


    public function setFile($file) {
        $this->file = $file;
    }

    public function main()
    {
        $this->highlightFile($this->file);
    }


    protected function highlightFile($fullFilePath)
    {
        $this->log("Processing {$fullFilePath}", Project::MSG_VERBOSE);
        
        $dom = new DOMDocument();
        $dom->load($fullFilePath);

        $xpath = new DOMXPath($dom);


        $externalGraphics = $xpath->query("//fo:external-graphic");
        foreach ($externalGraphics as $externalGraphic) {
            $src = $externalGraphic->getAttribute('src');
            if (preg_match('#^url\([^/]*/?images/(.+?)\)$#', $src, $m)) {
                $newSrc = 'url(../images/' . $m[1] . ')';
                $externalGraphic->setAttribute('src', $newSrc);
                $externalGraphic->removeAttribute('height');
                $externalGraphic->setAttribute('width', '100%');
                $externalGraphic->setAttribute('content-height', '100%');
                $externalGraphic->setAttribute('content-width', 'scale-to-fit');
                $externalGraphic->setAttribute('scaling', 'uniform');
            }
        }
        
        file_put_contents($fullFilePath, $dom->saveXML());
    }


    protected function innerHtml($node)
    {
        $innerHTML = "";
        $children = $node->childNodes;
        foreach ($children as $child)
        {
            $tmp_dom = new DOMDocument();
            $tmp_dom->appendChild($tmp_dom->importNode($child, true));
            $innerHTML.=trim($tmp_dom->saveHTML());
        }
        return $innerHTML;
    }



}
