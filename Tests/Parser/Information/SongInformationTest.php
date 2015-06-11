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

use StingerSoft\MediaParsingBundle\Parser\Information\SongInformation;

class SongInformationTest  extends \PHPUnit_Framework_TestCase {
	
	/**
	 * @var SongInformation
	 */
	protected $object;
	
	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp()
	{
		$this->object = new SongInformation;
	}
	
	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown()
	{
	}
	
	/**
	 * @covers StingerSoft\MediaParsingBundle\Parser\Information\SongInformation::setAlbum
	 * @covers StingerSoft\MediaParsingBundle\Parser\Information\SongInformation::getAlbum
	 */
	public function testAlbum(){
		$this->object->setAlbum('Album');
		$this->assertEquals('Album', $this->object->getAlbum());
	}
	
	/**
	 * @covers StingerSoft\MediaParsingBundle\Parser\Information\SongInformation::setArtist
	 * @covers StingerSoft\MediaParsingBundle\Parser\Information\SongInformation::getArtist
	 */
	public function testArtist(){
		$this->object->setArtist('Artist');
		$this->assertEquals('Artist', $this->object->getArtist());
	}
	
	/**
	 * @covers StingerSoft\MediaParsingBundle\Parser\Information\SongInformation::setTrackNumber
	 * @covers StingerSoft\MediaParsingBundle\Parser\Information\SongInformation::getTrackNumber
	 */
	public function testTrackNumber(){
		$this->object->setTrackNumber('TrackNumber');
		$this->assertEquals('TrackNumber', $this->object->getTrackNumber());
	}
	
	/**
	 * @covers StingerSoft\MediaParsingBundle\Parser\Information\SongInformation::setTotalTrackNumbers
	 * @covers StingerSoft\MediaParsingBundle\Parser\Information\SongInformation::getTotalTrackNumbers
	 */
	public function testTotalTrackNumbers(){
		$this->object->setTotalTrackNumbers('TotalTrackNumbers');
		$this->assertEquals('TotalTrackNumbers', $this->object->getTotalTrackNumbers());
	}
	
	/**
	 * @covers StingerSoft\MediaParsingBundle\Parser\Information\SongInformation::setSetNumber
	 * @covers StingerSoft\MediaParsingBundle\Parser\Information\SongInformation::getSetNumber
	 */
	public function testSetNumber(){
		$this->object->setSetNumber('SetNumber');
		$this->assertEquals('SetNumber', $this->object->getSetNumber());
	}
	
	/**
	 * @covers StingerSoft\MediaParsingBundle\Parser\Information\SongInformation::setTotalSetNumbers
	 * @covers StingerSoft\MediaParsingBundle\Parser\Information\SongInformation::getTotalSetNumbers
	 */
	public function testTotalSetNumbers(){
		$this->object->setTotalSetNumbers('TotalSetNumbers');
		$this->assertEquals('TotalSetNumbers', $this->object->getTotalSetNumbers());
	}
}