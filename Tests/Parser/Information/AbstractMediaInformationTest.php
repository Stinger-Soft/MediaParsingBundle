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

namespace StingerSoft\MediaParsingBundle\Tests\Parser\Information;

use StingerSoft\MediaParsingBundle\Parser\Information\AbstractMediaInformation;

class AbstractMediaInformationTest extends \PHPUnit_Framework_TestCase {
	
	/**
	 * @var AbstractMediaInformation
	 */
	protected $object;
	
	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp()
	{
		$this->object = $this->getMockForAbstractClass('StingerSoft\MediaParsingBundle\Parser\Information\AbstractMediaInformation');
	}
	
	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown()
	{
	}
	
	/**
	 * @covers StingerSoft\MediaParsingBundle\Parser\Information\SongInformation::setTitle
	 * @covers StingerSoft\MediaParsingBundle\Parser\Information\SongInformation::getTitle
	 */
	public function testTitle(){
		$this->object->setTitle('Title');
		$this->assertEquals('Title', $this->object->getTitle());
	}
	
	/**
	 * @covers StingerSoft\MediaParsingBundle\Parser\Information\SongInformation::setMimeType
	 * @covers StingerSoft\MediaParsingBundle\Parser\Information\SongInformation::getMimeType
	 */
	public function testMimeType(){
		$this->object->setMimeType('MimeType');
		$this->assertEquals('MimeType', $this->object->getMimeType());
	}
	
	/**
	 * @covers StingerSoft\MediaParsingBundle\Parser\Information\SongInformation::setFilePath
	 * @covers StingerSoft\MediaParsingBundle\Parser\Information\SongInformation::getFilePath
	 */
	public function testFilePath(){
		$this->object->setFilePath('FilePath');
		$this->assertEquals('FilePath', $this->object->getFilePath());
	}
	
	/**
	 * @covers StingerSoft\MediaParsingBundle\Parser\Information\SongInformation::setFileSize
	 * @covers StingerSoft\MediaParsingBundle\Parser\Information\SongInformation::getFileSize
	 */
	public function testFileSize(){
		$this->object->setFileSize('FileSize');
		$this->assertEquals('FileSize', $this->object->getFileSize());
	}
	

}