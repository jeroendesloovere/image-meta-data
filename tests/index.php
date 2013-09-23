<?php
/**
 * ImageMetaData Test
 *
 * Get/set meta data to image
 *
 * @author Jeroen Desloovere <jeroen@siesqo.be>
 * @date 20130826
 */

// require
require '../src/ImageMetaData/ImageMetaData.php';

// dump thumb
$thumb = ImageMetaData::getThumb('assets/example.jpg');

// dump thumb
echo $thumb;
