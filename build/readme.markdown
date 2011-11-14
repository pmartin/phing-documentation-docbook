
# Building the documentation #

First of all, you need to configure the `build.properties` file (copying it from `build.properties.dist`).

Then, building the documentation is only a matter of using `phing`.

To build the raw HTML output, and the PDF/CHM (depending on the options set in `build.properties`) :

    phing build

This should be enough to check if the modifications you made to the Docbook XML files are OK -- and if you just want
to check the raw output, there is no need to build the PDF/CHM outputs.

Then, to process the raw HTML output, and create the documentation website (especially, adding the menu on the left) :

    phing html2website

And, finally, to publish the website + PDF/CHM (depending on the options) :

    phing publish



# A few useful notes #

## Configuring FOP on Debian/Ubuntu ##

Note: Apache FOP is used to build the PDF output.

If using FOP 0.95 on Debian/Ubuntu, generating the PDF will get you the following error :

    log4j:WARN No appenders could be found for logger (org.apache.fop.util.ContentHandlerFactoryRegistry).
    log4j:WARN Please initialize the log4j system properly.

Quick-fix (from http://bugs.debian.org/cgi-bin/bugreport.cgi?bug=575411 ) :

    sudo vim /usr/bin/fop

Add the following portion of code :

    -Dorg.apache.commons.logging.Log=org.apache.commons.logging.impl.SimpleLog

Into the last line, so it becomes :

    run_java -Dorg.apache.commons.logging.Log=org.apache.commons.logging.impl.SimpleLog $HEADLESS org.apache.fop.cli.Main "$@"


## Configuring Microsoft HTML Help Workshop ##

Note: Microsoft HTML Help Workshop is used to build the CHM output; and can run on Linux, using Wine.

See http://code.google.com/p/htmlhelp/wiki/HHW4Wine

