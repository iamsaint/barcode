<?php

namespace Barcode;

class LinearBarcode extends BaseBarcode
{
    public const DEFAULT_FONT_SIZE = 1;
    public const DEFAULT_TEXT_COLOR = '#000000';

    public const MAP_FONT_SIZE = 'ts';
    public const MAP_TEXT_COLOR = 'tc';

    private string $textColor = self::DEFAULT_TEXT_COLOR;
    private int $padding = 10;
    private int $scaleFactor = 1;
    private int $fontSize = self::DEFAULT_FONT_SIZE;
    private int $textHeight = 10;

    /**
     * @param string $textColor
     * @return LinearBarcode
     */
    public function setTextColor(string $textColor)
    {
        $this->textColor = $textColor;
        return $this;
    }

    /**
     * @param int $padding
     * @return LinearBarcode
     */
    public function setPadding(int $padding)
    {
        $this->padding = $padding;
        return $this;
    }

    /**
     * @param int $scaleFactor
     * @return LinearBarcode
     */
    public function setScaleFactor(int $scaleFactor)
    {
        $this->scaleFactor = $scaleFactor;
        return $this;
    }

    /**
     * Font size. For SVG output, this is in points and the default is 10.
     * For PNG, GIF, or JPEG output, this is the GD library built-in font
     * number from 1 to 5 and the default is 1.
     *
     * @param int $fontSize
     * @return LinearBarcode
     */
    public function setFontSize(int $fontSize)
    {
        $this->fontSize = $fontSize;
        return $this;
    }

    /**
     * @param int $textHeight
     */
    public function setTextHeight(int $textHeight)
    {
        $this->textHeight = $textHeight;
    }

    /**
     * Get config for barcode image generation
     *
     * @return array
     */
    public function getConfig(): array
    {
        return [
            self::MAP_FONT_SIZE => $this->fontSize,
            self::MAP_TEXT_COLOR => $this->textColor
        ];
    }
}