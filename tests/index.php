<?php
/**
 * Exif Test
 *
 * Get/set meta to image
 *
 * @author Jeroen Desloovere <jeroen@siesqo.be>
 * @date 20130826
 */

// require
require '../exif.php';

// dump thumb
$thumb = Exif::getThumb('assets/example.jpg');

// dump thumb
echo $thumb;
