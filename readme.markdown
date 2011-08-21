# Introduction #

The current User Guide for Phing doesn't feel *OK* :

 - There is are several tasks documented on each manual page,
 - The documentation only exists in HTML,
 - The source of the documentation is that HTML: it's not made of any structured-format
 - There is only an english version, and no translation seems to be planned.

Ticket [#408](http://www.phing.info/trac/ticket/408) and [r421](http://www.phing.info/trac/browser/branches/2.4-docbook?rev=421&order=name)
are a first step to re-writing the documentation in docbook; but those are quite old *(december 2009)*, and have not been really active...

So, this is my attempt to :

 - Re-write the documentation in docbook
 - Have it available in more than one format: at least HTML and PDF
 - Plan for some translations


# Pre-requisites #

In order to build the documentation, you will need :

 - Phing ; latest stable version is OK
 - Apache FOP -- Ubuntu, you can get it with a simple `apt-get install fop`
 - Microsoft HTML Help Workshop, to build .chm documentation

Other things which are *(for now)* commited inside the project, but should not be :

 - `build/files/docbook.dtd` : the docbook DTD
   - You should get it from [docbook.org](http://docbook.org/xml/5.0/dtd/docbook.dtd)
 - `build/files/geshi` : GeSHi v1.0.8.10, to syntax-highlight code
   - You should get it from its official website
   - And, as a result, you should have `build/files/geshi/geshi.php`, `build/files/geshi/geshi/php.php`, `build/files/geshi/geshi/xml.php`, ...
 - `build/files/docbook-csl-1.76.1` (or any other version) : the XSL stylesheets, required to generate the HTML, FO, ... outputs
   - You should get the `docbook-xsl` package from [sourceforge.net](http://sourceforge.net/projects/docbook/files/)

And you will have to copy `build/build.properties.dist` to `build/build.properties`; and set the correct values, if needed.


If using FOP >= 0.95 on Debian/Ubuntu, see `build/reade.markdown` for some additional informations.

For Microsoft HTML Help Workshop on Linux, see [Microsoft HTML Help Workshop with Wine How-to](http://code.google.com/p/htmlhelp/wiki/HHW4Wine)


# How to build the documentation #

After installing the pre-requisites, and configuring build/build.properties, building the documentation is just a matter of launching one Phing target :

    cd build
    phing

This will generate the documentation in

    build/dist
        en/
        fr/

In order to delete all generated files, you just have to launch

    phing clean

Disclaimer: I've only tried to build this documentation on Linux *(Ubuntu, latest version)*; but, in, theory, you should be able to build it from Windows.


# Thanks #

Many of the ideas *(and some portions of code)* I've used here come from what's been done for [ZFSTDE](http://survivethedeepend.com/)
-- and there are probably still a few things that need to be configured *(like changing the colors in the CSS file, for example)*.