<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fo="http://www.w3.org/1999/XSL/Format" version="1.0">

<xsl:import href="##DOCBOOK_XSL##"/>
    
<xsl:param name="fop1.extensions" select="1"/>
<xsl:param name="body.font.master">10</xsl:param>
<xsl:param name="body.start.indent">1pc</xsl:param>
<xsl:param name="body.end.indent">0pt</xsl:param>
<xsl:param name="double.sided">0</xsl:param>
<xsl:param name="admon.graphics">1</xsl:param>
<xsl:param name="admon.graphics.path">##DOCBOOK_XSL_ADMON_GRAPHICS_PATH##/</xsl:param>
<xsl:param name="callout.graphics.path">##DOCBOOK_XSL_ADMON_GRAPHICS_PATH##/callouts/</xsl:param>

<!--xsl:param name="monospace.font.family">Courier-New</xsl:param>
<xsl:param name="title.font.family">Arial</xsl:param>
<xsl:param name="body.font.family">TimesLT-Roman</xsl:param-->

<xsl:attribute-set name="monospace.verbatim.properties" 
use-attribute-sets="verbatim.properties monospace.properties">
  <xsl:attribute name="text-align">start</xsl:attribute>
  <xsl:attribute name="font-size">9pt</xsl:attribute>
  <!--xsl:attribute name="wrap-option">wrap</xsl:attribute-->
  <xsl:attribute name="background-color">#F5F5F5</xsl:attribute>
  <xsl:attribute name="border-width">0.5pt</xsl:attribute>
  <xsl:attribute name="border-style">solid</xsl:attribute>
  <xsl:attribute name="border-color">#575757</xsl:attribute>
  <xsl:attribute name="padding">3pt</xsl:attribute>
</xsl:attribute-set>

<xsl:attribute-set name="monospace.verbatim.properties" 
use-attribute-sets="verbatim.properties monospace.properties">
  <!--<xsl:attribute name="phing">syntaxhighlightfo</xsl:attribute>-->
</xsl:attribute-set>

</xsl:stylesheet>