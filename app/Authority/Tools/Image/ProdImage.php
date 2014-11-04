<?php namespace Authority\Tools\Image;

use Authority\Tools\Grab\ActionMethods;
use Intervention\Image\Facades\Image;

class ProdImage
{
    private $grab;
    private $image;
    private $image_path;
    private $quarter;
    private $save_path;
    private $product_name;
    private $img_big;
    private $img_normal;

    public function __construct($image_path, $save_path, $product_name)
    {
        $this->image_path = $image_path;
        $this->save_path = $save_path;
        $this->product_name = $product_name;
        $this->image = Image::make($image_path);
        $this->grab = new ActionMethods();
        $this->grab->setSource($product_name);
    }

    public function getQuarterHash()
    {
        if ($this->quarter === NULL) {
            $this->quarter = substr(md5(file_get_contents($this->image_path)), 0, 8);
        }
        return $this->quarter;
    }

    public function getOutputPath()
    {
        return realpath(__DIR__ . '\..\..\..\..\public\web\naradi' . '\\' . $this->save_path . '\\');
    }

    public function getImgBig()
    {
        if ($this->img_big === NULL) {
            $this->img_big = $this->grab->friendlyUrl() . '(' . $this->image->width() . 'x' . $this->image->height() . ')-' . $this->getQuarterHash() . '.jpg';
        }
        return $this->img_big;
    }

    public function getImgNormal()
    {
        if ($this->img_normal === NULL) {
            $this->img_normal = $this->grab->friendlyUrl() . '-' . $this->getQuarterHash() . '.jpg';
        }
        return $this->img_normal;
    }

    public function createProdPictures($quality = 95)
    {
        try {

            $this->image->resize(1024, 800, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($this->getOutputPath() . '\\' . $this->getImgBig(), $quality);

            $this->image->sharpen(8)->resize(192, 192, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->resizeCanvas(192, 192)->save($this->getOutputPath() . '\\' . $this->getImgNormal(), $quality);

        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
        }
    }

}