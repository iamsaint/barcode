<?php

namespace Barcode;

class SquareBarcode extends BaseBarcode
{
    private string $textColor = '#000000';
    private int $padding = 10;
    private int $scaleFactor = 1;
    private int $fontSize = 1;
    private int $baseline = 10;

    /**
     * @param string $textColor
     */
    public function setTextColor(string $textColor)
    {
        $this->textColor = $textColor;
    }

    /**
     * @param int $padding
     */
    public function setPadding(int $padding)
    {
        $this->padding = $padding;
    }

    /**
     * @param int $scaleFactor
     */
    public function setScaleFactor(int $scaleFactor)
    {
        $this->scaleFactor = $scaleFactor;
    }

    /**
     * Font size. For SVG output, this is in points and the default is 10.
     * For PNG, GIF, or JPEG output, this is the GD library built-in font
     * number from 1 to 5 and the default is 1.
     *
     * @param int $fontSize
     */
    public function setFontSize(int $fontSize)
    {
        $this->fontSize = $fontSize;
    }

    /**
     * @param int $textHeight
     */
    public function setBaseline(int $baseline)
    {
        $this->baseline = $baseline;
    }
}