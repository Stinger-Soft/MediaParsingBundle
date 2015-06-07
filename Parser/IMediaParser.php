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

use Symfony\Component\HttpFoundation\File\File;

interface IMediaParser {

	/**
	 * Parses the given file and extract the meta data
	 * @param File $file
	 * @return IMediaInformation
	 */
	public function parseFile(File $file);
	
	
	/**
	 * Checks whether this parser can handle the file or not
	 * @param File  $file
	 * @return boolean if this parses is able to handle the given file
	*/
	public function canHandle(File $file);
}