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

namespace StingerSoft\MediaParsingBundle\Tests\Parser;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use StingerSoft\MediaParsingBundle\Parser\IParserChain;
use StingerSoft\MediaParsingBundle\Tests\TestCase;
use Symfony\Component\HttpFoundation\File\File;


class ParserChainTest extends TestCase {
	
	/**
	 * 
	 * @var IParserChain
	 */
	protected $parserChain;
	
	public function setUp(){
		$this->parserChain = $this->createContainer()->get(IParserChain::SERVICE_ID);
	}
	
	public function testAddParser(){
		$this->assertGreaterThanOrEqual(1, count($this->parserChain->getAllParser()), 'No media parser found!');
	}
	
	public function testFindFileParser(){
		$file = new File(__DIR__.'/../Fixtures/test.mp3');
		$parser = $this->parserChain->getParser($file);
		$this->assertInstanceOf('StingerSoft\MediaParsingBundle\Parser\Types\Mp3Parser', $parser, 'No mp3 media parser found!');
	}
	
	public function testFindNoFileParser(){
		$file = new File(__DIR__.'/../Fixtures/notparsable.ddd');
		$parser = $this->parserChain->getParser($file);
		$this->assertNull($parser);
	}
	
	public function testParseNull(){
		$this->setExpectedException('Exception');
		$this->parserChain->parseFile(null);
	}
	
	public function testParseDirectory(){
		$this->setExpectedException('Exception');
		$this->parserChain->parseFile(__DIR__);
	}
	
	public function testMp3Parsing(){
		$file = new File(__DIR__.'/../Fixtures/test.mp3');
		$info = $this->parserChain->parseFile($file);
	
		$this->assertInstanceOf('StingerSoft\MediaParsingBundle\Parser\Information\ISongInformation', $info);
	}
	
	public function testParseTheUnparsable(){
		$file = new File(__DIR__.'/../Fixtures/notparsable.ddd');
		$parser = $this->parserChain->parseFile($file);
		$this->assertFalse($parser);
	}
}