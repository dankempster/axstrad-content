<xsl:transform version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="xml" indent="yes"/>

    <xsl:template match="phpunit">
        <phpunit>
            <xsl:copy-of select="testsuites" />

            <logging>
                <!-- Apply other templates to the logging/log nodes (including the commented out ones) -->
                <xsl:apply-templates select="logging/node()"/>
            </logging>

            <xsl:copy-of select="filter" />
        </phpunit>
    </xsl:template>

    <!-- Matches the commented out <log type="coverage-xml"> line and outputs it -->
    <xsl:template match="comment()[contains(., 'coverage-xml') or contains(., 'coverage-html')]">
        <xsl:value-of select="." disable-output-escaping="yes"/> <!-- uncomments the log line -->
    </xsl:template>

    <!-- Matches all uncomments <log /> elements and outputs them -->
    <!--<xsl:template match="log">
        <xsl:copy-of select="." />
    </xsl:template>-->
</xsl:transform>
