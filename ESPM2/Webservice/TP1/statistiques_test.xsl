<?xml version="1.0" encoding="ISO-8859-1" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="statistiques_equipe">
<html>
<head>
<title>Statistique des <xsl:value-of select="equipe"/></title>
</head>
<body>
<h1>statistique des <xsl:value-of select="equipe" /></h1>
<p>
les <xsl:value-of select="equipe" />
sont en position <xsl:value-of select="classement"/>
</p>
</body>
</html>
</xsl:template>
</xsl:stylesheet>