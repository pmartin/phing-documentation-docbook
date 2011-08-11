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
        /*
        $html = file_get_contents($fullFilePath);
        $dom = new DOMDocument();
        $dom->loadHTML($html);

        $xpath = new DOMXPath($dom);
        $listings = $xpath->query('//pre[contains(@class,"programlisting")]');
        if ($listings->length > 0) {
            for ($i=0 ; $i<$listings->length ; $i++) {
                $node = $listings->item($i);

                $classAttributeStr = $node->getAttribute('class');
                $classes = array_filter(explode(' ', $classAttributeStr), function ($class) {
                    if (strcasecmp($class, 'programlisting') === 0) {
                        return false;
                    }
                    return true;
                });

                if (!empty($classes)) {
                    $language = $classes[1];
                    $htmlListing = $this->innerHtml($node);
                    $sourceCode = html_entity_decode(strip_tags($htmlListing), ENT_COMPAT, 'UTF-8');

                    $geshi = new GeSHi($sourceCode, $language);
                    $geshi->enable_line_numbers(GESHI_NORMAL_LINE_NUMBERS);
                    $geshi->enable_classes();
                    $geshi->set_overall_class('programlisting');
                    $geshi->set_tab_width(4);
                    $remadeSourceCode = $geshi->parse_code();

                    $elt = $dom->createElement('pre');
                    $elt->setAttribute('class', $classAttributeStr);
                    $tmpDom = new DOMDocument();
                    $result = $tmpDom->loadHTML($remadeSourceCode);
                    if ($result) {
                        $import = $tmpDom->getElementsByTagName('pre')->item(0);
                        foreach ($import->childNodes as $child) {
                            $importedNode = $elt->ownerDocument->importNode($child, true);
                            $elt->appendChild($importedNode);
                        }
                    }
                    $node->parentNode->replaceChild($elt, $node);
                }
            }
            file_put_contents($fullFilePath, $dom->saveHTML());
        }*/
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
