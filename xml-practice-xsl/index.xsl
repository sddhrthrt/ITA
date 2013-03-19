<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>
            <head>
                <link rel="stylesheet" type="text/css" href="style.css" />
            </head>
            <body>
                <div class="title"><xsl:value-of select="foodworld/worldname"/></div>
                <div class="exercise">
                        <h2> All Food </h2>
                    <table>
                            <tr><th rowspan="2"> Name </th><th rowspan="2"> Category </th><th colspan="4"> Nutrition </th> </tr>
                            <tr><th> Carbohydrates </th><th>Fibre</th><th>Fat</th><th>Energy</th></tr>
                            <xsl:for-each select="foodworld/food">
                                <tr>
                                    <td>
                                        <xsl:value-of select="name"/>
                                    </td>
                                    <td>
                                        <xsl:value-of select="category"/>
                                    </td>
                                    <td>
                                        <xsl:value-of select="nutrition/carbohydrates"/>
                                    </td>
                                    <td>
                                        <xsl:value-of select="nutrition/fibre"/>
                                    </td>
                                    <td>
                                        <xsl:value-of select="nutrition/fat"/>
                                    </td>
                                    <td>
                                        <xsl:value-of select="nutrition/energy"/>
                                    </td>
                                </tr>
                            </xsl:for-each>
                    </table>
                </div>
                <div class="exercise">
                    <h2> Snacks with > 30 energy </h2>
                    <table>
                        <tr><th> Name </th> <th> Energy </th></tr>
                        <xsl:for-each select="foodworld/food">
                            <xsl:sort select="nutrition/energy"/>
                            <xsl:if test="nutrition/energy>30">
                                <tr>
                                    <td> <xsl:value-of select="name"/> </td>
                                    <td> <xsl:value-of select="nutrition/energy"/></td>
                                </tr>
                            </xsl:if>
                        </xsl:for-each>
                    </table>
                </div>
                <div class="exercise">
                    <h2> All energies </h2>
                        <h3> Snacks </h3>
                        <table>
                            <tr> <th> Name </th><th> Energy</th></tr>
                            <xsl:for-each select="foodworld/food">
                                <xsl:sort select="nutrition/energy"/>
                                <xsl:if test="category='Snack'">
                                    <tr> 
                                        <td> <xsl:value-of select="name"/> </td>
                                        <td> <xsl:value-of select="nutrition/energy"/> </td>
                                    </tr>
                                </xsl:if>
                            </xsl:for-each>
                        </table>
                        <h3>Desserts </h3>
                        <table>
                            <tr> <th> Name </th><th> Energy</th></tr>
                            <xsl:for-each select="foodworld/food">
                                <xsl:sort select="nutrition/energy"/>
                                <xsl:if test="category='Dessert'">
                                    <tr> 
                                        <td> <xsl:value-of select="name"/> </td>
                                        <td> <xsl:value-of select="nutrition/energy"/> </td>
                                    </tr>
                                </xsl:if>
                            </xsl:for-each>
                        </table>
                </div>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>

