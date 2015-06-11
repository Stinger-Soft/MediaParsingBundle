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

use StingerSoft\MediaParsingBundle\Parser\MediaParserInterface;
use Symfony\Component\HttpFoundation\File\File;
use StingerSoft\MediaParsingBundle\Parser\Information\SongInformation;
use GetId3\GetId3Core;

class Mp3Parser implements MediaParserInterface{
	
	
	CONST ALBUM = 'album';
	
	CONST ARTIST = 'artist';
	
	CONST TITLE = 'title';
	
	CONST PART_OF_A_SET = 'part_of_a_set';
	
	CONST TRACK_NUMBER = 'track_number';

	
	/* (non-PHPdoc)
	 * @see \StingerSoft\MediaParsingBundle\Parser\IAudioParser::parseFile()
	 */
	public function parseFile(File $file) {
		$getId3 = new GetId3Core();
		$getId3->option_md5_data        = true;
		$getId3->option_md5_data_source = true;
		
		$audio = $getId3->analyze($file->getRealPath());
		if(isset($audio['error'])){
			throw new \RuntimeException('Error at reading audio properties with GetId3 : ' . $file->getRealPath()." ". print_r($audio['error'], true));
		}
		
		//No id3v2 tag found
		if(!array_key_exists('tags', $audio) || !array_key_exists('id3v2', $audio['tags'])){
			return false;
		}
		
		$information = new SongInformation();
		
		$information->setAlbum($this->getAttribute($audio, self::ALBUM));
		$information->setArtist($this->getAttribute($audio, self::ARTIST));
		$information->setMimeType('audio/mp3');
		$information->setTitle($this->getAttribute($audio, self::TITLE));
		
		$partOfASet = $this->getAttribute($audio, self::PART_OF_A_SET);
		if(\strpos($partOfASet, "/") !== false){
			$setnumber = explode("/", $partOfASet);
			$information->setSetNumber($setnumber[0]);
			$information->setTotalSetNumbers($setnumber[1]);
		}else{
			$information->setSetNumber($partOfASet);
		}
		
		$trackNumberArr = $this->getAttribute($audio, self::PART_OF_A_SET);
		if(\strpos($trackNumberArr, "/") !== false){
			$trackNumber = explode("/", $trackNumberArr);
			$information->setTrackNumber($trackNumber[0]);
			$information->setTotalTrackNumbers($trackNumber[1]);
		}else{
			$information->setTrackNumber($trackNumberArr);
		}
		
		return $information;
	}
	
	protected function getAttribute($audio, $property){
		if(array_key_exists($property, $audio['tags']['id3v2'])){
			$values = $audio['tags']['id3v2'][$property];
			if(is_array($values)){
				if(count($values)>0){
					return $values[0];
				}
			}
			return $values;
		}
		return null;
	}

	/* (non-PHPdoc)
	 * @see \StingerSoft\MediaParsingBundle\Parser\IAudioParser::canHandle()
	 */
	public function canHandle(File $file) {
		return $file->getExtension() == "mp3";

	}
}
