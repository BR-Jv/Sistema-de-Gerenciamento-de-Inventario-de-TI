<?php
/**
 * This is core configuration file.
 *
 * Use it to configure core behavior of Cake.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

setLocale(LC_ALL, 'pt_BR.UTF-8');

Configure::write('Config.language', 'pt-br');

Configure::write('debug', 2);


Configure::write('Error', array(
	'handler' => 'ErrorHandler::handleError',
	'level' => E_ALL & ~E_DEPRECATED,
	'trace' => true
));


Configure::write('Exception', array(
	'handler' => 'ErrorHandler::handleException',
	'renderer' => 'ExceptionRenderer',
	'log' => true
));


Configure::write('App.encoding', 'UTF-8');


Configure::write('Session', array(
	'defaults' => 'php'
));


Configure::write('Security.salt', 'pK8fZ3xR7n2M0YtqBv6WcJH4a*1L9eUQ@D5oI+NwFEs=');


Configure::write('Security.cipherSeed', '739582046174938205147843');


Configure::write('Acl.classname', 'DbAcl');
Configure::write('Acl.database', 'default');

$engine = 'File';

$duration = '+999 days';
if (Configure::read('debug') > 0) {
	$duration = '+10 seconds';
}

$prefix = 'myapp_';

Cache::config('_cake_core_', array(
	'engine' => $engine,
	'prefix' => $prefix . 'cake_core_',
	'path' => CACHE . 'persistent' . DS,
	'serialize' => ($engine === 'File'),
	'duration' => $duration
));


Cache::config('_cake_model_', array(
	'engine' => $engine,
	'prefix' => $prefix . 'cake_model_',
	'path' => CACHE . 'models' . DS,
	'serialize' => ($engine === 'File'),
	'duration' => $duration
));
