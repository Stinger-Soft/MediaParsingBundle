<?php

/*
 * This file is part of the Stinger Media Parser package.
 *
 * (c) Oliver Kotte <oliver.kotte@stinger-soft.net>
 * (c) Florian Meyer <florian.meyer@stinger-soft.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace StingerSoft\MediaParsingBundle\Parser;

interface IMediaInformation {
	
	/**
	 * @return string return the printable title of the media file
	 */
	public function getTitle();
	
	/**
	 * @return string the string representation of the mime type
	 */
	public function getMimeType();
	
	public function getFilePath();
	
	public function setFilePath($path);
	
	public function getFileSize();
	
	public function setFileSize($size);
	
	public function getLastModified();
	
	public function setLastModified(\DateTime $date);
}
