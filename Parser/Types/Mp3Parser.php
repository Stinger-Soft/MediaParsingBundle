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
use StingerSoft\MediaParsingBundle\Parser\Information\SongInformation;

class Mp3Parser implements IMediaParser{
	
	/* (non-PHPdoc)
	 * @see \StingerSoft\MediaParsingBundle\Parser\IAudioParser::parseFile()
	 */
	public function parseFile(File $file) {
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
		
		$information = new SongInformation();
		
		$information->setAlbum(@$audio['tags']['id3v2']['album'][0]);
		$information->setArtist(@$audio['tags']['id3v2']['artist'][0]);
		$information->setMimeType('audio/mp3');
		$information->setTitle(@$audio['tags']['id3v2']['title'][0]);
		
		if(\strpos(@$audio['tags']['id3v2']['part_of_a_set'][0], "/") !== false){
			$setnumber = explode("/", @$audio['tags']['id3v2']['part_of_a_set'][0]);
			$information->setSetNumber($setnumber[0]);
			$information->setTotalSetNumbers($setnumber[1]);
		}else{
			$information->setSetNumber(@$audio['tags']['id3v2']['part_of_a_set'][0]);
		}
		
		if(\strpos(@$audio['tags']['id3v2']['track_number'][0], "/") !== false){
			$trackNumber = explode("/", @$audio['tags']['id3v2']['track_number'][0]);
			$information->setTrackNumber($trackNumber[0]);
			$information->setTotalTrackNumbers($trackNumber[1]);
		}else{
			$information->setTrackNumber(@$audio['tags']['id3v2']['track_number'][0]);
		}
		
		
		return $information;

	}

	/* (non-PHPdoc)
	 * @see \StingerSoft\MediaParsingBundle\Parser\IAudioParser::canHandle()
	 */
	public function canHandle(File $file) {
		return $file->getExtension() == "mp3";

	}

}