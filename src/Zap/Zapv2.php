<?php
/**
 * Zed Attack Proxy (ZAP) and its related class files.
 *
 * ZAP is an HTTP/HTTPS proxy for assessing web application security.
 *
 * Copyright 2015 the ZAP development team
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

// Client implementation for using the ZAP pentesting proxy remotely.

namespace App\Zap;

use App\Zap\Acsrf;
use App\Zap\AjaxSpider;
use App\Zap\Ascan;
use App\Zap\Authentication;
use App\Zap\Autoupdate;
use App\Zap\Brk;
use App\Zap\Context;
use App\Zap\Core;
use App\Zap\ForcedUser;
use App\Zap\HttpSessions;
use App\Zap\ImportLogFiles;
use App\Zap\Params;
use App\Zap\Pnh;
use App\Zap\Pscan;
use App\Zap\Reveal;
use App\Zap\Script;
use App\Zap\Search;
use App\Zap\Selenium;
use App\Zap\SessionManagement;
use App\Zap\Spider;
use App\Zap\Users;

class ZapError extends \Exception {
	public function __toString() {
		return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
	}
}

/**
 * Client API implementation for integrating with ZAP v2.
 */
class Zapv2 {

	// base JSON api url
	public $base = 'http://zap/JSON/';
	// base OTHER api url
	public $base_other = 'http://zap/OTHER/';

	/**
	 * Creates an instance of the ZAP api client.
	 *
	 * Note that all of the other classes in this directory are generated
	 * new ones will need to be manually added to this file
	 *
	 * @param string $proxy e.g. 'tcp://127.0.0.1:8080'
	 */
	public function __construct($proxy = 'tcp://127.0.0.1:8080') {
		$this->proxy = $proxy;

		$this->acsrf = new Acsrf($this);
		$this->ajaxSpider = new AjaxSpider($this);
		$this->ascan = new Ascan($this);
		$this->authentication = new Authentication($this);
		$this->autoupdate = new Autoupdate($this);
		$this->brk = new Brk($this);
		$this->context = new Context($this);
		$this->core = new Core($this);
		$this->forcedUser = new ForcedUser($this);
		$this->httpsessions = new HttpSessions($this);
		$this->importLogFiles = new ImportLogFiles($this);
		$this->params = new Params($this);
		$this->pnh = new Pnh($this);
		$this->pscan = new Pscan($this);
		$this->reveal = new Reveal($this);
		$this->script = new Script($this);
		$this->search = new Search($this);
		$this->selenium = new Selenium($this);
		$this->sessionManagement = new SessionManagement($this);
		$this->spider = new Spider($this);
		$this->users = new Users($this);
	}

	/**
	 * Overwrite a field
	 *
	 * mainly used for unit test
	 *
	 * @param $name the name of overwritten field
	 * @param $obj  the value of overwritten field
	 */
	public function setFieldByName($name, $obj) {
		$this->{$name} = $obj;
	}

	/**
	 * Checks that we have an OK response, else raises an exception.
	 *
	 * checks the result json data after doing action request
	 *
	 * @param array $json_data the json data to look at.
	 * @return array
	 * @throws ZapError
	 */
	public function expectOk($json_data) {
		if (is_array($json_data) && reset($json_data) === 'OK') {
			return $json_data;
		}
		throw new ZapError("json_data: " . json_encode($json_data));
	}

	/**
	 * Opens a url
	 *
	 * @param $url
	 * @return string || false
	 */
	public function sendRequest($url) {
		$context = stream_context_create(array('http' => array('proxy' => $this->proxy)));
		return file_get_contents($url, false, $context);
	}

	/**
	 * Open a url
	 *
	 * @param string $url
	 * @return string
	 */
	public function statusCode($url) {
		// get the current proxy value
		$sc_before = stream_context_get_default();
		if (isset($sc_before['http']['proxy']) && $sc_before['http']['proxy'] != '') {
			$proxy_before = $sc_before['http']['proxy'];
		} else {
			$proxy_before = null;
		}

		stream_context_set_default(array('http' => array('proxy' => $this->proxy)));
		$headers = get_headers($url);

		// put the proxy value back
		stream_context_set_default(array('http' => array('proxy' => $proxy_before)));

		return substr($headers[0], 9, 3);
	}

	/**
	 * Shortcut for a GET request.
	 *
	 * @param string $url the url to GET at.
	 * @param array $get the disctionary to turn into GET variables.
	 * @return mixed
	 * @throws ZapError
	 */
	public function request($url, $get=array()) {
        // create curl resource
        $ch = \curl_init();
        // set url
//        \curl_setopt($ch, CURLOPT_URL, "http://127.0.0.1:8080/JSON/ascan/action/scan/?apikey=l40ssrb8geospr95ppaps7eb88&url=http%3A%2F%2F127.0.0.1&recurse=&inScopeOnly=&scanPolicyName=&method=&postData=&contextId=");
        \curl_setopt($ch, CURLOPT_URL, "http://127.0.0.1:8080/JSON/ascan/action/scan/?apikey=l40ssrb8geospr95ppaps7eb88&url=http%3A%2F%2F127.0.0.1&recurse=&inScopeOnly=&scanPolicyName=&method=&postData=&contextId=");
        //return the transfer as a string
        \curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // $output contains the output string
        $output = \curl_exec($ch);
        $err = \curl_error($ch);

        // close curl resource to free up system resources
        \curl_close($ch);

        dump($output);
        dump($err);
}}