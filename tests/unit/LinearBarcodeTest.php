<?php

use Barcode\BaseBarcode;
use Barcode\LinearBarcode;

class LinearBarcodeTest extends \Codeception\Test\Unit
{

    public function testInheritance()
    {
        $barcode = new LinearBarcode();
        $this->assertInstanceOf(BaseBarcode::class, $barcode);
    }

    public function testGetConfig()
    {
        $barcode = new LinearBarcode();
        $config = $barcode->getConfig();
        $this->assertIsArray($config);
    }

    public function testDefaultConfig()
    {
        $barcode = new LinearBarcode();
        $config = $barcode->getConfig();

        $this->assertArrayHasKey(LinearBarcode::MAP_FONT_SIZE, $config);
        $this->assertIsInt($config[LinearBarcode::MAP_FONT_SIZE]);
        $this->assertEquals(LinearBarcode::DEFAULT_FONT_SIZE, $config[LinearBarcode::MAP_FONT_SIZE]);

        $this->assertArrayHasKey(LinearBarcode::MAP_TEXT_COLOR, $config);
        $this->assertIsString($config[LinearBarcode::MAP_TEXT_COLOR]);
        $this->assertEquals(LinearBarcode::DEFAULT_TEXT_COLOR, $config[LinearBarcode::MAP_TEXT_COLOR]);
    }

    public function testFontSizeSetter()
    {
        $barcode = new LinearBarcode();

        $result = $barcode->setFontSize(10);
        $this->assertInstanceOf(LinearBarcode::class, $result);
        $this->assertEquals($result, $barcode);

        $config = $barcode->getConfig();

        $this->assertArrayHasKey(LinearBarcode::MAP_FONT_SIZE, $config);
        $this->assertIsInt($config[LinearBarcode::MAP_FONT_SIZE]);
        $this->assertEquals(10, $config[LinearBarcode::MAP_FONT_SIZE]);
    }

    public function testTextColorSetter()
    {
        $barcode = new LinearBarcode();

        $result = $barcode->setTextColor('#ff00ff');
        $this->assertInstanceOf(LinearBarcode::class, $result);
        $this->assertEquals($result, $barcode);

        $config = $barcode->getConfig();

        $this->assertArrayHasKey(LinearBarcode::MAP_TEXT_COLOR, $config);
        $this->assertIsString($config[LinearBarcode::MAP_TEXT_COLOR]);
        $this->assertRegExp('/\#[0-9a-fA-F]{6}/', $config[LinearBarcode::MAP_TEXT_COLOR], 'Invalid color code');
        $this->assertEquals('#ff00ff', $config[LinearBarcode::MAP_TEXT_COLOR]);
    }

}