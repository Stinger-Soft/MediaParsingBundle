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
interface IParserChain {
	
	const SERVICE_ID = 'stinger_soft_media_parser.parser_chain';
	
	/**
	 * Adds a parser to the parser chain. Should be called by the compiler pass
	 * @param IMediaParser $parser
	 */
	public function addParser(IMediaParser $parser);
	
	/**
	 * Tries to find a parser instance for the given file
	 * @param File $file
	 * @return IMediaParser|NULL
	 */
	public function getParser(File $file);
	
	/**
	 * Parses the given file and returns a IMediaInformation object
	 * @param string|File $file Filepath or file instance to the file
	 * @throws \Exception Thrown if the file is not readable (i.e. IO problems)
	 * @return IMediaInformation|boolean|NULL An IMediaInformation instance on success, 
	 * false if no parser was found, or null if the selected parser can't extract information
	 */
	public function parseFile($file=null);
	
	/**
	 * @return IMediaParser[]
	 */
	public function getAllParser();
}