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

namespace StingerSoft\MediaParsingBundle\Tests\Parser\Types;

use StingerSoft\MediaParsingBundle\Tests\TestCase;
use Symfony\Component\HttpFoundation\File\File;
use StingerSoft\MediaParsingBundle\Parser\MediaParserInterface;


class Mp3Parser extends TestCase {
	
	/**
	 * 
	 * @var MediaParserInterface
	 */
	protected $parser;
	
	public function setUp(){
		$this->parser = $this->createContainer()->get('stinger_soft_media_parser.media_parser.mp3');
	}
	
	public function testService(){
		$this->assertInstanceOf('StingerSoft\MediaParsingBundle\Parser\Types\Mp3Parser', $this->parser);
	}
	
	public function testParsing(){
		$file = new File(__DIR__.'/../../Fixtures/test.mp3');
		$info = $this->parser->parseFile($file);
		
		$this->assertInstanceOf('StingerSoft\MediaParsingBundle\Parser\Information\SongInformationInterface', $info);
	}
	

	public function testNoMp3Parsing(){
		$this->setExpectedException('RuntimeException');
		$file = new File(__DIR__.'/../../Fixtures/no-mp3.mp3');
		$this->parser->parseFile($file);
	}

}