# yii2-inflector
inflect russians names, using yandex API

Require CURL installed.
Ubuntu (12.10 and up): <b>sudo apt-get install curl libcurl3 libcurl4-openssl-dev php5-curl</b>

Example:
<pre>
...
use eugenyho\helpers\Inflector;
...
$fio = Yii::$app->user->identity->profile->name; //Get username Иванов Иван Иванович
$fio_a_dative = Inflector::Inflect($fio, 'dative'); // After inflect: Иванову Ивану Ивановичу
...
</pre>
    
