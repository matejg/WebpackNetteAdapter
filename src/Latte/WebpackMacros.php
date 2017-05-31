<?php

declare(strict_types = 1);

namespace Oops\WebpackNetteAdapter\Latte;

use Latte\Compiler;
use Latte\MacroNode;
use Latte\Macros\MacroSet;
use Latte\PhpWriter;
use Tracy\Debugger;


/**
 * - {webpack 'asset.name.js'}
 */
class WebpackMacros extends MacroSet
{

	public static function install(Compiler $compiler)
	{
		$me = new static($compiler);
		$me->addMacro('webpack', [$me, 'macroWebpackAsset']);
	}


	public function macroWebpackAsset(MacroNode $node, PhpWriter $writer)
	{
		return $writer->write('echo %escape(%modify($template->webpack(%node.word)))');
	}

}
