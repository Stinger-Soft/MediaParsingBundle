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

class SongInformation implements ISongInformation{
	
	protected $title;
	
	protected $artist;
	
	protected $mimeType;
	
	protected $album;
	
	protected $trackNumber;
	
	protected $totalTrackNumbers;
	
	protected $setNumber;
	
	protected $totalSetNumbers;
	
	public function getTitle() {
		return $this->title;
	}
	public function setTitle($title) {
		$this->title = $title;
		return $this;
	}
	public function getArtist() {
		return $this->artist;
	}
	public function setArtist($artist) {
		$this->artist = $artist;
		return $this;
	}
	public function getMimeType() {
		return $this->mimeType;
	}
	public function setMimeType($mimeType) {
		$this->mimeType = $mimeType;
		return $this;
	}
	public function getAlbum() {
		return $this->album;
	}
	public function setAlbum($album) {
		$this->album = $album;
		return $this;
	}
	public function getTrackNumber() {
		return $this->trackNumber;
	}
	public function setTrackNumber($trackNumber) {
		$this->trackNumber = $trackNumber;
		return $this;
	}
	public function getTotalTrackNumbers() {
		return $this->totalTrackNumbers;
	}
	public function setTotalTrackNumbers($totalTrackNumbers) {
		$this->totalTrackNumbers = $totalTrackNumbers;
		return $this;
	}
	public function getSetNumber() {
		return $this->setNumber;
	}
	public function setSetNumber($setNumber) {
		$this->setNumber = $setNumber;
		return $this;
	}
	public function getTotalSetNumbers() {
		return $this->totalSetNumbers;
	}
	public function setTotalSetNumbers($totalSetNumbers) {
		$this->totalSetNumbers = $totalSetNumbers;
		return $this;
	}
	
	
}