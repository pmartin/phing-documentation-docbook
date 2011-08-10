<?php

require_once 'phing/Task.php';

/**
* CSS styles required to be added to DocBook HTML output (any attached .css file):
*
ol.code {
    width: 90%;
    margin: 0 5%;
    padding: 0;
    font-size: 0.75em;
    line-height: 1.5em;
    overflow: hidden;
    color: #939399;
    text-align: left;
    list-style-position: inside;
    border: 1px solid #d3d3d0;
}
ol.code li {
    float: left;
    clear: both;
    width: 99%;
    white-space: nowrap;
    margin: 0;
    padding: 0 0 0 1%;
    background: #fff;
}
ol.code li.even { background: #f3f3f0; }
ol.code li code {
    font: 1.2em courier, monospace;
    color: #c30;
    white-space: pre;
    padding-left: 0.5em;
}
ul.code {
    width: 90%;
    margin: 0 5%;
    padding: 0;
    font-size: 0.75em;
    line-height: 1.5em;
    overflow: hidden;
    color: #939399;
    text-align: left;
    list-style-position: inside;
    border: 1px solid #d3d3d0;
}
ul.code li {
    float: left;
    clear: both;
    width: 99%;
    white-space: nowrap;
    margin: 0;
    padding: 0 0 0 1%;
    background: #fff;
}
ul.code li.even { background: #f3f3f0; }
ul.code li code {
    font: 1.2em courier, monospace;
    color: #c30;
    white-space: pre;
    padding-left: 0.5em;
}
.code .comment { color: #939399; }
.code .default { color: #44c; }
.code .keyword { color: #373; }
.code .string { color: #c30; }
*/

class PhpDocbookHighlighterTask extends Task
{

    private $_directory = null;

    private static $_lineNumbering = false;

    public function setDir($directory)
    {
        $this->_directory = $directory;
    }

    public function setLinenumbers($bool)
    {
        self::$_lineNumbering = $bool;
    }

    public function init()
    {

    }

    public static function highlightOld($input)
    {
        $toHighlight = str_replace(array('&gt;', '&lt;', '&amp;','&quot;'), array('>', '<', '&', '"'), $input[1]);
        $output = highlight_string('<?php ' . $toHighlight, true);
        $output = str_replace('&lt;?php&nbsp;', '', $output);
        return '<pre class="programlisting">' . trim($output) . '</pre>';
    }

    public static function highlight($input)
    {
        ini_set('highlight.comment', 'comment');
        ini_set('highlight.default', 'default');
        ini_set('highlight.keyword', 'keyword');
        ini_set('highlight.string', 'string');
        ini_set('highlight.html', 'html');

        $output = '';
        $toHighlight = str_replace(array('&gt;', '&lt;', '&amp;','&quot;'), array('>', '<', '&', '"'), $input[1]);

        $code = highlight_string('<?php ' . $toHighlight, true);
        $code = substr($code, 33, -15);
        $code = str_replace('&nbsp;', ' ', $code);
        $code = str_replace('&amp;', '&', $code);
        $code = str_replace('<br />', "\n", $code);
        $code = str_replace('<span style="color: ', '<span class="',$code);
        $code = trim($code);
        $code = str_replace("\r", "\n", $code);
        $code = preg_replace("!\n\n\n+!", "\n\n", $code);
        $lines = explode("\n", $code);
        $previous = false;

        if (self::$_lineNumbering) {
            $listType = 'ol';
        } else {
            $listType = 'ul';
        }

        $output .= " <$listType class=\"code\">\n";
        foreach ($lines as $key => $line) {
            if (substr($line, 0, 7) == '</span>') {
                $previous = false;
                $line = substr($line, 7);
            }
            if (empty($line)) {
                $line = ' ';
            }
            if ($previous) {
                $line = "<span class=\"$previous\">" . $line;
            }
            if (strpos($line, '<span') !== false) {
                switch (substr($line, strrpos($line, '<span') + 13,1)) {
                    case 'c':
                        $previous = 'comment';
                        break;
                    case 'd':
                        $previous = 'default';
                        break;
                    case 'k':
                        $previous = 'keyword';
                        break;
                    case 's':
                        $previous = 'string';
                        break;
                }
            }
            if (substr($line, -7) == '</span>') {
                $previous = false;
            } elseif ($previous) {
                $line .= '</span>';
            }
            $num = $key + 1;
            if ($key % 2) {
                $output .= " <li class=\"even\"><code>$line</code></li>\n";
            } else {
                $output .= " <li><code>$line</code></li>\n";
            }
            /**if ($key % 2) {
                $output .= " <li id=\"line-$num\" class=\"even\"><code>$line</code></li>\n";
            } else {
                $output .= " <li id=\"line-$num\"><code>$line</code></li>\n";
            }**/
        }
        $output .= " </$listType>\n";
        //$output = str_replace('&lt;?php ', '', $output);
        $pos = strpos($output, '&lt;?php ');
	    $output = substr_replace($output, '', $pos, 9);
        return $output;
    }

    public function main()
    {
        $this->_highlight();
        $this->log('PHP in Docbook XHTML highlighted');
    }

    private function _highlight()
    {
        $this->log("Highlighting directory : '{$this->_directory}'");

        $files = scandir($this->_directory);
        foreach ($files as $file) {
            if (substr($file, -5, 5) !== '.html') {
                continue;
            }
            $this->log("Highlighting file : '{$file}'");
            
            $highlightedSource = $this->_highlightFile($this->_directory . DIRECTORY_SEPARATOR . $file);
            
            //$highlightedSource = $this->_repairImagesPaths($highlightedSource);
            
            file_put_contents($this->_directory . DIRECTORY_SEPARATOR . $file, $highlightedSource);
        }
    }

    private function _repairImagesPaths($html)
    {
        $doc = new DOMDocument;
        $doc->loadHTML($html);
        $xpath = new DOMXPath($doc);
        
        // Correcting src of images embedded in the chapters
        $imgs = $xpath->query('//img');
        if ($imgs->length > 0) {
            foreach ($imgs as $img) {
                if (strpos($img->getAttribute('src'), '../images/docimg/') === 0) {
                    //var_dump($img->getAttribute('src'), str_replace('../images/docimg/', 'images/docimg/', $img->getAttribute('src')));
                    $img->setAttribute('src', str_replace('../images/docimg/', 'images/docimg/', $img->getAttribute('src')));
                }
            }
        }
        return $doc->saveHTML();
    }


    private function _highlightFile($file)
    {
        $contents = file_get_contents($file);
        $out = preg_replace_callback('%<pre class="programlisting">(.+)</pre>%Us', array('PhpDocbookHighlighterTask', 'highlight'),$contents);
        return $out;
    }

    private function functionLink($string) {
        $linked_string = '';
        $manual = 'http://www.php.net/';
        $linked_string = preg_replace(
        '~([\w_]+)(\s*</span>)'.
        '(\s*<span\s+class="' . $this->previous . '">\s*\()~m',
        '<a href="' . $manual . '$1" target="_blank">$1</a>$2$3',$string);
        return $linked_string;
    }

}
