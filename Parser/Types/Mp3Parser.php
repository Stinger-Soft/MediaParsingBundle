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
namespace StingerSoft\MediaParsingBundle\Parser\Types;

use StingerSoft\MediaParsingBundle\Parser\IMediaParser;
use StingerSoft\MediaParsingBundle\Parser\IMediaInformation;
use Symfony\Component\HttpFoundation\File\File;
use GetId3;

class Mp3Parser implements IMediaParser{
	
	/* (non-PHPdoc)
	 * @see \StingerSoft\MediaParsingBundle\Parser\IAudioParser::parseFile()
	 */
	public function parseFile(File $file, IMediaInformation $info) {
		$getId3 = new GetId3();
		$getId3->option_md5_data        = true;
		$getId3->option_md5_data_source = true;
		$getId3->encoding               = 'UTF-8';
		$getId3->option_tag_id3v2 		= true;
		$getId3->option_tags_images 	= true;
		
		$audio = $getId3->analyze($file->getRealPath());
		if (isset($audio['error']))
		{
			throw new \RuntimeException('Error at reading audio properties with GetId3 : ' . $file->getRealPath()." ". print_r($audio['error'], true));
		}

	}

	/* (non-PHPdoc)
	 * @see \StingerSoft\MediaParsingBundle\Parser\IAudioParser::canHandle()
	 */
	public function canHandle(File $file) {
		return $file->getExtension() == "mp3";

	}

}