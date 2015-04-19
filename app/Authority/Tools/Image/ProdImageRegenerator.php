<?php namespace Authority\Tools\Image;

use Intervention\Image\Facades\Image;

class ProdImageRegenerator
{
    private $image;
    private $img_big;
    private $img_normal;

    private $pathname;
    private $path;
    private $filename;

    public function __construct($pathname, $path, $filename)
    {
        $this->pathname = $pathname;
        $this->path = $path;
        $this->filename = $filename;
        $this->image = Image::make($pathname);
    }


    public function getImgBig()
    {
        if ($this->img_big === NULL) {
            $this->img_big = $this->filename;
        }
        return $this->img_big;
    }

    function getImgNormalFromBig($img)
    {
        if (strrpos($img, "(") > 0) {
            return $name = htmlspecialchars(trim(substr_replace($img, NULL, strrpos($img, "("), ((strrpos($img, ".") - (strlen($img)))))));
        } else {
            return $img;
        }
    }

    public function getImgNormal()
    {
        if ($this->img_normal === NULL) {
            $this->img_normal = $this->getImgNormalFromBig($this->filename);
        }
        return $this->img_normal;
    }

    public function createProdPictures($width, $height, $quality = 90)
    {
        try {

            $source = Image::canvas($this->image->width(), $this->image->height(), '#FFFFFF')->insert($this->pathname);

            $source->sharpen(8)->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->resizeCanvas($width, $height)->save($this->path . '\\' . $this->getImgNormal(), $quality);

        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
        }
    }
}