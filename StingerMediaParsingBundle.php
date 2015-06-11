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

namespace StingerSoft\MediaParsingBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use StingerSoft\MediaParsingBundle\Parser\ParserCompilerPass;

class StingerMediaParsingBundle extends Bundle {
	
	public function build(ContainerBuilder $container){
		parent::build($container);
		$container->addCompilerPass(new ParserCompilerPass());
	}
}
