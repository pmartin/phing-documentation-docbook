<?php

include_once 'phing/filters/XsltFilter.php';


class MyXsltFilter extends XsltFilter {

    /**
     * Whether XML file has been transformed.
     * @var boolean
     */
    private $processed = false;

    /**
     * Reads stream, applies XSLT and returns resulting stream.
     * @return string transformed buffer.
     * @throws BuildException - if XSLT support missing, if error in xslt processing
     */
    function read($len = null) {

        if (!class_exists('XSLTProcessor')) {
            throw new BuildException("Could not find the XSLTProcessor class. Make sure PHP has been compiled/configured to support XSLT.");
        }

        if ($this->processed === true) {
            return -1; // EOF
        }

        if ( !$this->getInitialized() ) {
            $this->_initialize();
            $this->setInitialized(true);
        }

        // Read XML
        $_xml = null;
        while ( ($data = $this->in->read($len)) !== -1 )
            $_xml .= $data;

        if ($_xml === null ) { // EOF?
            return -1;
        }

        if(empty($_xml)) {
            $this->log("XML file is empty!", Project::MSG_WARN);
            return ''; // return empty string, don't attempt to apply XSLT
        }

        // Read XSLT
        $_xsl = null;
        $xslFr = new FileReader($this->getStyle());
        $xslFr->readInto($_xsl);

        $this->log("Tranforming XML " . $this->in->getResource() . " using style " . $this->getStyle()->getPath(), Project::MSG_VERBOSE);

        $out = '';
        try {
            $out = $this->process($_xml, $_xsl);
            $this->processed = true;
        } catch (IOException $e) {
            throw new BuildException($e);
        }

        return $out;
    }


    protected function process($xml, $xsl) {    
                
        $processor = new XSLTProcessor();
        
        // Create and setup document.
        $xmlDom                   = new DOMDocument();
        $xmlDom->resolveExternals = $this->getResolveDocumentExternals();

        // pmartin : this is the reason for which I had to extend the initial filter...
        // Entities will not be substituted, else, it seems...
        $xmlDom->substituteEntities = true;

        // Create and setup stylesheet.
        $xslDom                   = new DOMDocument();
        $xslDom->resolveExternals = $this->getResolveStylesheetExternals();

        if ($this->getHtml()) {
            $xmlDom->loadHTML($xml);
        } else {
            $xmlDom->loadXML($xml);
        }
        
        $xslDom->loadxml($xsl);
        
        $processor->importStylesheet($xslDom);

        // ignoring param "type" attrib, because
        // we're only supporting direct XSL params right now
        foreach($this->getParams() as $param) {
            $this->log("Setting XSLT param: " . $param->getName() . "=>" . $param->getExpression(), Project::MSG_DEBUG);
            $processor->setParameter(null, $param->getName(), $param->getExpression());
        }
        
        $errorlevel = error_reporting();
        error_reporting($errorlevel & ~E_WARNING);
        @$result = $processor->transformToXML($xmlDom);
        error_reporting($errorlevel);
        
        if (false === $result) {
            //$errno = xslt_errno($processor);
            //$err   = xslt_error($processor);    
            throw new BuildException("XSLT Error");            
        } else {
            return $result;
        }
    }

    private function _initialize() {        
        $params = $this->getParameters();
        if ( $params !== null ) {
            for($i = 0, $_i=count($params) ; $i < $_i; $i++) {
                if ( $params[$i]->getType() === null ) {
                    if ($params[$i]->getName() === "style") {
                        $this->setStyle(new PhingFile($params[$i]->getValue()));
                    }
                    else if ($params[$i]->getName() === "base.dir") {
                        $xp = new XSLTParam();
                        $xp->setName($params[$i]->getName());
                        $xp->setExpression($params[$i]->getValue());

                        $xsltParams = $this->getParams();
                        $xsltParams[] = $xp;
                        $this->setParams($xsltParams);

                    }
                }
            }
        }
    }

}

