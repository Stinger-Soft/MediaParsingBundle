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

class ParserChain implements IParserChain{
	
	/**
	 * 
	 * @var IMediaParser[]
	 * 
	 */
	private $parser = array();
	
	
	public function addParser(IMediaParser $parser){
		$this->parser[] = $parser;
	}
	
	/**
	 * 
	 * @param File $file
	 * @return IMediaParser|NULL
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
	 * @return IMediaInformation|boolean
	 */
	public function parseFile($file=null){
		if($file == null){
			throw new \Exception("File is null!");
		}
		if(\is_string($file)){
			$file = new File($this->createPath($file));
		}
		if(!$file->isFile()){
			throw new \Exception("Given file is not a file <".$file->getFilename().">");
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
		$info->setLastModified(\DateTime::createFromFormat('U', $file->getMTime()));
		
		return $info;
	}
	/* (non-PHPdoc)
	 * @see \StingerSoft\MediaParsingBundle\Parser\IParserChain::getAllParser()
	 */
	public function getAllParser() {
		return $this->parser;

	}

}