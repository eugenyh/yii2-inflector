<?php

/**
 * Inflector class.
 **/
namespace frontend\components\helpers;

class Inflector {
	
/**
 * 
 * WARNING:
 * Require CURL installed.
 * Ubuntu (12.10 and up): sudo apt-get install curl libcurl3 libcurl4-openssl-dev php5-curl
 *    
 **/
	   	
	public static function Inflect($iword, $inf) {
		$url = 'http://export.yandex.ru/inflect.xml?name='.urlencode($iword);		
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_USERAGENT, 'Opera/9.80 (Windows NT 6.1; U; ru) Presto/2.6.30 Version/10.61');
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$curl_result = curl_exec($curl);
		curl_close($curl);
			
		preg_match_all('#\<inflection\s+case\=\"([0-9]+)\"\>(.*?)\<\/inflection\>#si', $curl_result, $m);
		
		if (count($m[0]) ) {
			foreach ($m[1] as $i => &$id) {
				$cases[(int)$id] = $m[2][$i];
			} 
			unset ($id);
		} else $cases = null;

		if (isset($cases)) {			
			if (count($cases) > 1) {
				switch ($inf) {
					//именительный
					case 'nominative':
						return $cases[1];
					break;			
					//родительный		
					case 'genitive':
						return $cases[2];
					break;		
					//дательный			
					case 'dative':
						return $cases[3];
					break;	
					//винительный				
					case 'accusative':
						return $cases[4];
					break;		
					//творительный			
					case 'instrumentative':
						return $cases[5];
					break;		
					//предложный			
					case 'prepositional':
						return $cases[6];
					break;	
					default:
					    return $iword;
					break;										
				}
			}
		} else {
			return $iword;
		}

	}
		
}
