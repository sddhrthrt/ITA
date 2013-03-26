<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>
            <head>
                <link rel="stylesheet" type="text/css" href="style.css" />
            </head>
            <body>
                <div class="exercise">
                        <h2> All Ads </h2>
                    <table>
                            <tr><th > Name </th><th> Genre </th><th> Places </th> </tr>
                            <xsl:for-each select="concerts/ad">
                                <tr>
                                    <td>
                                        <xsl:value-of select="name" />
                                    </td>
                                    <td>
                                        <xsl:value-of select="genre" />
                                    </td>
                                    <td>
                                        <xsl:for-each select="performance">
                                            <xsl:value-of select="venue" /><br />
                                        </xsl:for-each>
                                    </td>
                                </tr>
                            </xsl:for-each>
                    </table>
                </div>
                <div>
                    <h2> less than 100 </h2>
                    <table> 
                        <tr><th > Name </th><th> Genre </th><th> Amount </th> </tr>
                        <xsl:for-each select="concert/ad">
                            <xsl:for-each select="ticket_class">
                                <xsl:if test="cost<100">
                                    hello
                                </xsl:if>
                            </xsl:for-each>
                        </xsl:for-each>
                    </table>
                </div>


            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>

