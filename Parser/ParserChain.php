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

class ParserChain implements ParserChainInterface{
	
	/**
	 * 
	 * @var MediaParserInterface[]
	 * 
	 */
	private $parser = array();
	
	
	public function addParser(MediaParserInterface $parser){
		$this->parser[] = $parser;
	}
	
	/**
	 * 
	 * @param File $file
	 * @return MediaParserInterface|NULL
	 */
	public function getParser(File $file){
		foreach($this->parser as $parser){
			if($parser->canHandle($file)){
				return $parser;
			}
		}
		return null;
	}
	
	/**
	 * 
	 * @param string|File $file
	 * @throws \Exception
	 * @return MediaInformationInterface|boolean
	 */
	public function parseFile($file){
		if($file === null){
			throw new \Exception("File is null!");
		}
		if(\is_string($file)){
			$file = new File($this->createPath($file));
		}
		if(!$file->isReadable()){
			throw new \Exception("Can't read file <".$file->getFilename().">");
		}
		
		$parser = $this->getParser($file);
		if(!$parser){
			return false;
		}
	
		$info = $parser->parseFile($file);
		$info->setFilePath($file->getRealPath());
		$info->setFileSize($file->getSize());
		$lastModified = \DateTime::createFromFormat('U', $file->getMTime());
		if($lastModified !== false){
			$info->setLastModified($lastModified);
		}
		
		return $info;
	}
	/* (non-PHPdoc)
	 * @see \StingerSoft\MediaParsingBundle\Parser\ParserChainInterface::getAllParser()
	 */
	public function getAllParser(){
		return $this->parser;
	}
	
	protected function createPath($path){
		if($this->startsWith($path, 'B64')){
			$path = \base64_decode(\substr($path, 3));
		}
		return $path;
	}
	
	protected function startsWith($haystack, $needle){
		return !strncmp($haystack, $needle, strlen($needle));
	}
}
