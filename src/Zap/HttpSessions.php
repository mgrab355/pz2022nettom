<?php
/**
 * Zed Attack Proxy (ZAP) and its related class files.
 *
 * ZAP is an HTTP/HTTPS proxy for assessing web application security.
 *
 * Copyright 2016 the ZAP development team
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


namespace App\Zap;


/**
 * This file was automatically generated.
 */
class HttpSessions {

	public function __construct ($zap) {
		$this->zap = $zap;
	}

	/**
	 * Gets the sessions of the given site. Optionally returning just the session with the given name.
	 */
	public function sessions($site, $session=NULL) {
		$params = array('site' => $site);
		if ($session !== NULL) {
			$params['session'] = $session;
		}
		$res = $this->zap->request($this->zap->base . 'httpSessions/view/sessions/', $params);
		return reset($res);
	}

	/**
	 * Gets the name of the active session for the given site.
	 */
	public function activeSession($site) {
		$res = $this->zap->request($this->zap->base . 'httpSessions/view/activeSession/', array('site' => $site));
		return reset($res);
	}

	/**
	 * Gets the names of the session tokens for the given site.
	 */
	public function sessionTokens($site) {
		$res = $this->zap->request($this->zap->base . 'httpSessions/view/sessionTokens/', array('site' => $site));
		return reset($res);
	}

	/**
	 * Creates an empty session for the given site. Optionally with the given name.
	 */
	public function createEmptySession($site, $session=NULL, $apikey='') {
		$params = array('site' => $site, 'apikey' => $apikey);
		if ($session !== NULL) {
			$params['session'] = $session;
		}
		$res = $this->zap->request($this->zap->base . 'httpSessions/action/createEmptySession/', $params);
		return reset($res);
	}

	/**
	 * Removes the session from the given site.
	 */
	public function removeSession($site, $session, $apikey='') {
		$res = $this->zap->request($this->zap->base . 'httpSessions/action/removeSession/', array('site' => $site, 'session' => $session, 'apikey' => $apikey));
		return reset($res);
	}

	/**
	 * Sets the given session as active for the given site.
	 */
	public function setActiveSession($site, $session, $apikey='') {
		$res = $this->zap->request($this->zap->base . 'httpSessions/action/setActiveSession/', array('site' => $site, 'session' => $session, 'apikey' => $apikey));
		return reset($res);
	}

	/**
	 * Unsets the active session of the given site.
	 */
	public function unsetActiveSession($site, $apikey='') {
		$res = $this->zap->request($this->zap->base . 'httpSessions/action/unsetActiveSession/', array('site' => $site, 'apikey' => $apikey));
		return reset($res);
	}

	/**
	 * Adds the session token to the given site.
	 */
	public function addSessionToken($site, $sessiontoken, $apikey='') {
		$res = $this->zap->request($this->zap->base . 'httpSessions/action/addSessionToken/', array('site' => $site, 'sessionToken' => $sessiontoken, 'apikey' => $apikey));
		return reset($res);
	}

	/**
	 * Removes the session token from the given site.
	 */
	public function removeSessionToken($site, $sessiontoken, $apikey='') {
		$res = $this->zap->request($this->zap->base . 'httpSessions/action/removeSessionToken/', array('site' => $site, 'sessionToken' => $sessiontoken, 'apikey' => $apikey));
		return reset($res);
	}

	/**
	 * Sets the value of the session token of the given session for the given site.
	 */
	public function setSessionTokenValue($site, $session, $sessiontoken, $tokenvalue, $apikey='') {
		$res = $this->zap->request($this->zap->base . 'httpSessions/action/setSessionTokenValue/', array('site' => $site, 'session' => $session, 'sessionToken' => $sessiontoken, 'tokenValue' => $tokenvalue, 'apikey' => $apikey));
		return reset($res);
	}

	/**
	 * Renames the session of the given site.
	 */
	public function renameSession($site, $oldsessionname, $newsessionname, $apikey='') {
		$res = $this->zap->request($this->zap->base . 'httpSessions/action/renameSession/', array('site' => $site, 'oldSessionName' => $oldsessionname, 'newSessionName' => $newsessionname, 'apikey' => $apikey));
		return reset($res);
	}

}
