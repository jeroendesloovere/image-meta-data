<?php
/**
 * Exif
 *
 * Get/set meta to image
 *
 * @author Jeroen Desloovere <jeroen@siesqo.be>
 * @date 20130826
 */
class Exif
{
	/**
	 * Get value from image
	 *
	 * @param string $imagePath
	 * @param string $key
	 * @param string $name
	 * @return string
	 */
	public static function get($imagePath, $key, $name)
	{
		// error checking
		if($imagePath == null || $key == null || $name == null)
		{
			throw new ExifException('All variables are required.');
		}

		// get data
		$data = self::get($imagePath);

		// return value
		return (isset($data[$key][$name])) ? $data[$key][$name] : false;
	}

	/*
	 * Get all data of image
	 *
	 * @param string $imagePath
	 * @return dump
	 */
	public static function getAll($imagePath)
	{
		// read file
		$data = exif_read_data($filename, 'IFD0');

		// error checking
		if(!$data)
		{
			throw new ExifException("No header data found.<br />\n. Image contains headers<br />\n");	
		}

		// return
		return $data;
	}

	/*
	 * Show embedded thumbnail of file
	 *
	 * @param string $imagePath
	 * @return thumbnail
	 */
	public static function getThumb($imagePath, $width = 100, $height = 100, $type = 'png')
	{
		// get thumbnail
		$image = exif_thumbnail($imagePath, $width, $height, $type);
		
		// error checking
		if(!$image)
		{
			throw new ExifException('No thumbnail available');	
		}

		header('Content-type: ' .image_type_to_mime_type($type));
		return $image;
		exit;
	}
}


/**
 * Exif Exception
 *
 * @author Jeroen Desloovere <jeroen@siesqo.be>
 */
class ExifException extends Exception
{
}

