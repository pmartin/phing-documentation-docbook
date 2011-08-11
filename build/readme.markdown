
If using FOP 0.95 on Debian/Ubuntu, generating the PDF will get you the following error :

    log4j:WARN No appenders could be found for logger (org.apache.fop.util.ContentHandlerFactoryRegistry).
    log4j:WARN Please initialize the log4j system properly.

Quick-fix (from http://bugs.debian.org/cgi-bin/bugreport.cgi?bug=575411 ) :

    sudo vim /usr/bin/fop

Add the following portion of code :

    -Dorg.apache.commons.logging.Log=org.apache.commons.logging.impl.SimpleLog

Into the last line, so it becomes :

    run_java -Dorg.apache.commons.logging.Log=org.apache.commons.logging.impl.SimpleLog $HEADLESS org.apache.fop.cli.Main "$@"

