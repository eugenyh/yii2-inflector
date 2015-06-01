# yii2-inflector
Yii2 helper for inflect russians names (and words), using yandex API

Require CURL installed.
Ubuntu (12.10 and up): <b>sudo apt-get install curl libcurl3 libcurl4-openssl-dev php5-curl</b>

# Example:
<pre>
...
use eugenyho\helpers\Inflector;
...
$fio = Yii::$app->user->identity->profile->name; //Get username Иванов Иван Иванович
$fio_a_dative = Inflector::Inflect($fio, 'dative'); // After inflect: Иванову Ивану Ивановичу
...
</pre>
    
# Installation:
php composer.phar require eugenyho/yii2-inflector "*"

# Usage:
<pre>
$NewWord = Inflector::Inflect($OldWord, $Case);
</pre>
where $Case can be:
	'nominative'        //именительный
	'genitive'          //родительный		
	'dative'            //дательный			
	'accusative'        //винительный				
	'instrumentative'   //творительный			
	'prepositional'     //предложный			
