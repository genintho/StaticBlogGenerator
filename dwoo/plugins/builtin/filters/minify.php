<?php

/**
 * Formats any html output (must be valid xml where every tag opened is closed)
 * using a single tab for indenting. 'pre' and other whitespace sensitive
 * tags should not be affected.
 *
 * It is not recommended to use this on every template if you render multiple
 * templates per page, you should only use it once on the main page template so that
 * everything is formatted in one pass.
 *
 * This software is provided 'as-is', without any express or implied warranty.
 * In no event will the authors be held liable for any damages arising from the use of this software.
 *
 * @author     Jordi Boggiano <j.boggiano@seld.be>
 * @copyright  Copyright (c) 2008, Jordi Boggiano
 * @license    http://dwoo.org/LICENSE   Modified BSD License
 * @link       http://dwoo.org/
 * @version    1.0.0
 * @date       2008-10-23
 * @package    Dwoo
 */
class Dwoo_Filter_minify extends Dwoo_Filter
{
	/**
	 * formats the input using the singleTag/closeTag/openTag functions
	 *
	 * It is auto indenting the whole code, excluding <textarea>, <code> and <pre> tags that must be kept intact.
	 * Those tags must however contain only htmlentities-escaped text for everything to work properly.
	 * Inline tags are presented on a single line with their content
	 *
	 * @param Dwoo $dwoo the dwoo instance rendering this
	 * @param string $input the xhtml to format
	 * @return string formatted xhtml
	 */
	public function process($input)
	{
		Log::info( 'Dwoo Process ----');
		Log::info( 'Dwoo Process ' .strlen( $input ) );
		
		if( strlen($input) < 200 ){
			Log::info( 'Dwoo Process '.$input);
		}
		return $input;
	}

}
