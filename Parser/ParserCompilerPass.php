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

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class ParserCompilerPass implements CompilerPassInterface {
	/**
	 * Searches for all Audio Parsers that are tagged as 'stinger_soft.audioparser' inside all services.yml files
	 * @see Symfony\Component\DependencyInjection\Compiler.CompilerPassInterface::process()
	 */
	public function process(ContainerBuilder $container){
		if (!$container->hasDefinition(ParserChainInterface::SERVICE_ID)) {
			return;
		}
		
		$definition = $container->getDefinition(ParserChainInterface::SERVICE_ID);

		$taggedServices = $container->findTaggedServiceIds(MediaParserInterface::SERVICE_TAG);
		
		foreach ($taggedServices as $id => $tagAttributes) {
			foreach ($tagAttributes as $attributes) {
				$definition->addMethodCall(
						'addParser',
						array(new Reference($id))
				);
			}
		}
	}
}
