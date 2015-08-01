<?
	/**
	 * Collection of PHP functions
	 *
	 * @author      Niko Halink :: ARGH!media
	 * @copyright   2015 ARGH!media :: arghmedia.nl {@link http://www.arghmedia.nl/}
	 * @license     http://opensource.org/licenses/MIT
	 */

	/* classic ASP ported functions */

	/**
	 * Cut off the left part of a string
	 *
	 * @param string $string Input string
	 * @param int $count Number of characters to cut off
	 *
	 * @return string Remaining string
	 */
	function right($string, $count)
	{
		return substr($string, ($count*-1));
	}

	/**
	 * Cut off the right part of a string
	 *
	 * @param string $string Input string
	 * @param int $count Number of characters to cut off
	 *
	 * @return string Remaining string
	 */
	function left($string, $count)
	{
		return substr($string, 0, $count);
	}

	/**
	 * Returns the position of the first occurrence of the needle within the haystack
	 *
	 * @param string $haystack Input string
	 * @param string $needle Search string
	 * @param int $offset Number of characters from the beginning of the string
	 *
	 * @return int First occurrence of needle with in haystack or 0
	 */
	function instr($haystack, $needle, $offset=0)
	{
		$result = stripos($haystack, $needle, $offset);

		if (is_numeric($result))
		{
			$result++;
		}
		else
		{
			$result = 0;
		}

		return $result;
	}

	/* misc functions */

	/*
	 * Generate a random string of given length
	 *
	 * @param int $length Number of characters to be returned 
	 *
	 * @return string Generated string of random characters
	 */
	function randomString($length=12)
	{
		return substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, $length);
	}

	/*
	 * Prepend leading zero's to a number
	 *
	 * @param string $input Input string
	 * @param int $totaldigits Length of output string
	 *
	 * @return string Padded number
	 */
	function paddigits($input, $totaldigits)
	{
		return str_pad($input, $totaldigits, '0', STR_PAD_LEFT);
	}

	/*
	 * Prepend a character to a string
	 *
	 * @param string $input Input string
	 * @param string $character Character to prepend
	 * @param int $totalchar Length of output string
	 *
	 * @return string Padded string
	 */
	function padchars($input, $character, $totalchar)
	{
		return str_pad($input, $totalchar, $character, STR_PAD_LEFT);
	}

	/*
	 * Check if a number is even
	 *
	 * @param int $number Number to check
	 *
	 * @return bool True if even, else false
	 */
	function is_even($number)
	{
		return ($number%2==0) ? true : false;
	}

	/*
	 * Check if a number is odd
	 *
	 * @param int $number Number to check
	 *
	 * @return bool True if odd, else false
	 */
	function is_odd($number)
	{
		return ($number%2==0) ? false : true;
	}

	/* string functions */

	/*
	 * Remove all characters from a string except for those in the second parameter
	 *
	 * @param string $str Input string
	 * @param string $chars Characters to remove 
	 *
	 * @return string Filtered string
	 */
	function str_remain($str, $chars)
	{
		$array = str_split($str);
		$output = '';

		foreach ($array as $char)
		{
			if (strpos($chars, $char) !== false)
			{
				$output .= $char;
			}
		}

		return $output;
	}

	/*
	 * Replace specific characters with specific characters in a string
	 *
	 * @param string $str Input string
	 * @param string $chars Characters to replace 
	 * @param string $chars Replacement characters
	 *
	 * @return string Replaced character string
	 */
	function chr_replace($str, $chars, $repchars)
	{
		$output = '';
		$array1 = str_split($str);
		$array2 = str_split($repchars);

		foreach ($array1 as $char)
		{
			$pos = strpos($chars, $char);

			if ($pos !== false)
			{
				$output .= $array2[$pos];
			}
			else
			{
				$output .= $char;
			}
		}

		return $output;
	}

	/*
	 * Replaces special characters to their html-entity
	 *
	 * @param string $input Input string
	 *
	 * @return string Parsed string
	 */
	function GeneralParser($input)
	{
		if (get_magic_quotes_gpc()) {$input = stripslashes($input);}
		$input = utf8_decode($input);

		$original = array("\r\n", ' & ', "'", '"', '`', '´', '‘', '’', '“', '”', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'Þ', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'þ', 'ÿ', 'Œ', 'œ', 'Š', 'š', 'Ÿ', '€', '®', '©', '™');
		$replacement = array('<br />', ' &#38; ', '&#39;', '&#34;', '&#96;', '&#180;', '&#8216;', '&#8217;', '&#8220;', '&#8221;', '&#192;', '&#193;', '&#194;', '&#195;', '&#196;', '&#197;', '&#198;', '&#199;', '&#200;', '&#201;', '&#202;', '&#203;', '&#204;', '&#205;', '&#206;', '&#207;', '&#208;', '&#209;', '&#210;', '&#211;', '&#212;', '&#213;', '&#214;', '&#216;', '&#217;', '&#218;', '&#219;', '&#220;', '&#221;', '&#222;', '&#223;', '&#224;', '&#225;', '&#226;', '&#227;', '&#228;', '&#229;', '&#230;', '&#231;', '&#232;', '&#233;', '&#234;', '&#235;', '&#236;', '&#237;', '&#238;', '&#239;', '&#240;', '&#241;', '&#242;', '&#243;', '&#244;', '&#245;', '&#246;', '&#248;', '&#249;', '&#250;', '&#251;', '&#252;', '&#253;', '&#254;', '&#255;', '&#338;', '&#339;', '&#352;', '&#353;', '&#376;', '&#8364;', '&#174;', '&#169;', '&#8482;');

		$output = str_replace($original, $replacement, $input);

		return $output;
	}

	/*
	 * Cleanup input received from ckeditor
	 * newlines and tabs are removed, opening paragraph right after a closing paragraph is replace by two line breaks
	 *
	 * @param string $input Input string
	 *
	 * @return string Parsed string
	 */
	function ckeditor_cleanup($input)
	{
		$output = str_replace(array("\n\r", "\r\n", "\r", "\n", "\t"), '', $input);
		$output = str_replace('</p><p>', '<br /><br />', $output);

		return $output;
	}

	/*
	 * Returns the given number in a human friendly format (NL)
	 *
	 * @param int $number Input number
	 * @param int $decimalcount Maximum decimals
	 *
	 * @return string Parsed number
	 */
	function HumanNumber($number, $decimalcount=0)
	{
		$result = '';
		$whole = floor($number);
		$numberlength = strlen($whole);
		$loops = floor($numberlength/3);
		$rest = $numberlength % 3;

		for ($i=1;$i<=$loops;$i++)
		{
			$result = '.'. substr($whole, (-3*$i), 3) . $result;
		}

		if ($rest != 0)
		{
			$result = left($whole, $rest) . $result;
		}
		else
		{
			$result = right($result, strlen($result)-1);
		}

		if ($decimalcount>0)
		{
			$newnumber = round($number, $decimalcount);
			$whole = (($newnumber - floor($newnumber)) == 0) ? true : false;

			if (!$whole)
			{
				$result = $result .','. right($newnumber, $decimalcount);
			}
			else
			{
				$result = $result .',-';
			}
		}

		return $result;
	}

	/*
	 * Returns the given truncated iso date in a human friendly format (NL)
	 *
	 * @param int $input ISO date (YYYYMMDDHHMMSS)
	 *
	 * @return string Parsed date
	 */
	function HumanDate($input)
	{
		if (is_numeric($input))
		{
			$year = left($input, 4);
			$month = right(left($input, 6), 2);
			$day = right(left($input, 8), 2);

			if (strlen($input)==14)
			{
				$hour = left(right($input, 6), 2);
				$minute = left(right($input, 4), 2);
				$second = right($input, 2);
			}
			else
			{
				$hour = 0;
				$minute = 0;
				$second = 0;
			}
		}
		else
		{
			return '';
		}

		$newdate = mktime($hour, $minute, $second, $month, $day, $year);

		if (strlen($input)==14)
		{
			$result = date('d-m-Y H:i:s', $newdate);
		}
		else
		{
			$result = date('d-m-Y', $newdate);
		}

		return $result;
	}
?>
