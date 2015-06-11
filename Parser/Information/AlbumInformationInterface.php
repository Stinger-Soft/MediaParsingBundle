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

namespace StingerSoft\MediaParsingBundle\Parser\Information;

use StingerSoft\MediaParsingBundle\Parser\MediaInformationInterface;

interface AlbumInformationInterface extends MediaInformationInterface{
	
	/**
	 * @return string returns the name of the album the media file is from
	 */
	public function getAlbum();
	
	/**
	 * @return integer the disk the song is from
	 */
	public function getSetNumber();
	
	/**
	 * @return integer the count of sets
	 */
	public function getTotalSetNumbers();
	
	/**
	 * @return integer the track number of the media file
	 */
	public function getTrackNumber();
	
	
	/**
	 * @return integer the total amount of songs on this album or set within this album
	 */
	public function getTotalTrackNumbers();
}
