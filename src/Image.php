<?php

namespace Barcode;

class Image
{

    private $data;
    private $canConvert;

    public function __construct($data, $canConvert = true)
    {
        $this->data = $data;
        $this->canConvert;
    }

    /**
     * @param string|null $filename
     * @throws \Exception
     */
    public function asPng($filename = null)
    {
        if (!$this->canConvert) {
            throw new \RuntimeException('Cannot convert image');
        }

        $this->save($filename, 'imagepng');
    }

    /**
     * @param string|null $filename
     * @throws \Exception
     */
    public function asGif($filename = null)
    {
        if (!$this->canConvert) {
            throw new \RuntimeException('Cannot convert image');
        }

        $this->save($filename, 'imagegif');
    }

    /**
     * @param string|null $filename
     * @throws \Exception
     */
    public function asJpg($filename = null)
    {
        if (!$this->canConvert) {
            throw new \RuntimeException('Cannot convert image');
        }

        $this->save($filename, 'imagejpeg');
    }

    /**
     * @param string|null $filename
     */
    public function asSvg($filename = null)
    {
        if ($this->canConvert) {
            throw new \RuntimeException('Cannot convert image');
        }

        $this->save($filename, 'svg');
    }

    private function save($filename, $callable)
    {
        if (null === $filename) {
            switch ($callable) {
                case 'imagepng':
                    header('Content-Type: image/png');
                    break;
                case 'imagegif':
                    header('Content-Type: image/gif');
                    break;
                case 'imagejpeg':
                    header('Content-Type: image/jpeg');
                    break;
                case 'svg':
                    header('Content-Type: image/svg+xml');
                    break;
            }
            if ($callable !== 'svg') {
                $callable($this->data, $filename);
            } else {
                echo $this->data;
            }
        } else {
            file_put_contents($filename, $this->data);
        }
    }

    public function __toString()
    {
        return $this->data;
    }
}