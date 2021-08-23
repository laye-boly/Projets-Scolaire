<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="statistiques_equipe">
	<html>
		<head>
			<title>Statistique des équipes</title>
		</head>
	<body>
		<h1>Statistique des équipes</h1>
	
		
		<table style="border: 1px solid black; width:500px background-color:yellow ;">
			<th style="border: 1px solid black;">Equipe</th>
			<th style="border: 1px solid black;">Victoire</th>
			<th style="border: 1px solid black;">Défaites</th>
			<th style="border: 1px solid black;">Classement</th>

			<xsl:for-each select="equipe">
				<xsl:sort select="classement" order="ascending" data-type="number"/>
				<tr>

					<xsl:if test="classement &lt; 4">
						<td style="border: 1px solid black; background-color:green;">
						<xsl:value-of select="@nom"/>
						</td>
						<td style="border: 1px solid black; background-color:green;">
							<xsl:value-of select="victoires"/>
						</td>
						<td style="border: 1px solid black; background-color:green;">
							<xsl:value-of select="defaites"/>
						</td>
						<td style="border: 1px solid black; background-color:green;">
							<xsl:value-of select="classement"/>
						</td>
					</xsl:if>

					<xsl:if test="classement &gt; 3 and classement &lt; 7">
						<td style="border: 1px solid black;">
						<xsl:value-of select="@nom"/>
						</td>
						<td style="border: 1px solid black;">
							<xsl:value-of select="victoires"/>
						</td>
						<td style="border: 1px solid black;">
							<xsl:value-of select="defaites"/>
						</td>
						<td style="border: 1px solid black;">
							<xsl:value-of select="classement"/>
						</td>
					</xsl:if>

					<xsl:if test="classement &gt; 7">
						<td style="border: 1px solid black; background-color:red;">
						<xsl:value-of select="@nom"/>
						</td>
						<td style="border: 1px solid black; background-color:red;">
							<xsl:value-of select="victoires"/>
						</td>
						<td style="border: 1px solid black; background-color:red;">
							<xsl:value-of select="defaites"/>
						</td>
						<td style="border: 1px solid black; background-color:red;">
							<xsl:value-of select="classement"/>
						</td>
					</xsl:if>
					
					
				</tr>		
			</xsl:for-each>
		</table>
	</body>
	</html>
</xsl:template>
</xsl:stylesheet> 