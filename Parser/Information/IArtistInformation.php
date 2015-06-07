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

use StingerSoft\MediaParsingBundle\Parser\IMediaInformation;

interface IArtistInformation extends IMediaInformation{
	
	/**
	 * @return string The name of the artist performing the given media file
	 */
	public function getArtist();
}