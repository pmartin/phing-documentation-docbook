<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                xmlns:fo="http://www.w3.org/1999/XSL/Format"
				version="1.0">

<xsl:import href="##DOCBOOK_XSL##"/>


<xsl:param name="htmlhelp.chm">phing-documentation.chm</xsl:param>
<xsl:param name="htmlhelp.hhp">##BUILDDIR_HTMLHELP##/phing-documentation.hhp</xsl:param>
<xsl:param name="htmlhelp.hhc">##BUILDDIR_HTMLHELP##/phing-documentation.hhc</xsl:param>
<xsl:param name="htmlhelp.only">0</xsl:param>

<xsl:param name="admon.graphics">1</xsl:param>
<xsl:param name="admon.graphics.path">images/docbook/</xsl:param>

<xsl:param name="html.stylesheet">docbook.html.css</xsl:param>

<!-- we redefine the TOC, so list of tables is not generated -->
<xsl:param name="generate.toc">
<!-- see http://www.sagehill.net/docbookxsl/TOCcontrol.html#TOCcomponents -->
appendix  toc,title
article/appendix  nop
article   toc,title
book      toc,title,figure,example,equation
chapter   toc,title
part      toc,title
preface   toc,title
qandadiv  toc
qandaset  toc
reference toc,title
sect1     toc
sect2     toc
sect3     toc
sect4     toc
sect5     toc
section   toc
set       toc,title
</xsl:param>


<xsl:template match="programlisting[@language]" mode="class.value">programlisting <xsl:value-of select="@language"/></xsl:template>

<!-- refsect1 elements have 'role' attribute ; which is used to style the HTML with CSS => 'role' must be transformed to 'class' -->
<xsl:template match="refsect1[@role]" mode="class.value"><xsl:value-of select="@role"/></xsl:template>

</xsl:stylesheet>