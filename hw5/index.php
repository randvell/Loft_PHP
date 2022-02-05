<?php
/**
 * Created by PhpStorm.
 * User: Nikita Zimin
 * Date: 05.02.2022
 * Time: 13:49
 */

use Intervention\Image\AbstractFont;
use Intervention\Image\Constraint;
use Intervention\Image\ImageManagerStatic as Image;

require_once '../vendor/autoload.php';

$img = Image::make('photo.jpg');

$img->resize(200, null, function (Constraint $constraint) {
   $constraint->aspectRatio();
});

$img->text("Съешь еще\nэтих мягких\nфранцузских\nбулок", 5, 50, function (AbstractFont $font) {
    $font->size(24);
    $font->file('open_sans.ttf');
    $font->color('#FFF');
});

echo $img->response('jpg');
