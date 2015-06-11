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

abstract class AbstractMediaInformation implements MediaInformationInterface {

	protected $title;

	protected $mimeType;

	protected $filePath;

	protected $fileSize;

	protected $lastModified;


	public function getTitle(){
		return $this->title;
	}

	public function setTitle($title){
		$this->title = $title;
		return $this;
	}

	public function getMimeType(){
		return $this->mimeType;
	}

	public function setMimeType($mimeType){
		$this->mimeType = $mimeType;
		return $this;
	}

	public function getFilePath(){
		return $this->filePath;
	}

	public function setFilePath($filePath){
		$this->filePath = $filePath;
		return $this;
	}

	public function getFileSize(){
		return $this->fileSize;
	}

	public function setFileSize($fileSize){
		$this->fileSize = $fileSize;
		return $this;
	}

	public function getLastModified(){
		return $this->lastModified;
	}

	public function setLastModified(\DateTime $lastModified){
		$this->lastModified = $lastModified;
		return $this;
	}
}
