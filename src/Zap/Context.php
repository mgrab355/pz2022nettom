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
class Context {

	public function __construct ($zap) {
		$this->zap = $zap;
	}

	/**
	 * List context names of current session
	 */
	public function contextList() {
		$res = $this->zap->request($this->zap->base . 'context/view/contextList/');
		return reset($res);
	}

	/**
	 * List excluded regexs for context
	 */
	public function excludeRegexs($contextname) {
		$res = $this->zap->request($this->zap->base . 'context/view/excludeRegexs/', array('contextName' => $contextname));
		return reset($res);
	}

	/**
	 * List included regexs for context
	 */
	public function includeRegexs($contextname) {
		$res = $this->zap->request($this->zap->base . 'context/view/includeRegexs/', array('contextName' => $contextname));
		return reset($res);
	}

	/**
	 * List the information about the named context
	 */
	public function context($contextname) {
		$res = $this->zap->request($this->zap->base . 'context/view/context/', array('contextName' => $contextname));
		return reset($res);
	}

	/**
	 * Lists the names of all built in technologies
	 */
	public function technologyList() {
		$res = $this->zap->request($this->zap->base . 'context/view/technologyList/');
		return reset($res);
	}

	/**
	 * Lists the names of all technologies included in a context
	 */
	public function includedTechnologyList($contextname) {
		$res = $this->zap->request($this->zap->base . 'context/view/includedTechnologyList/', array('contextName' => $contextname));
		return reset($res);
	}

	/**
	 * Lists the names of all technologies excluded from a context
	 */
	public function excludedTechnologyList($contextname) {
		$res = $this->zap->request($this->zap->base . 'context/view/excludedTechnologyList/', array('contextName' => $contextname));
		return reset($res);
	}

	/**
	 * Add exclude regex to context
	 */
	public function excludeFromContext($contextname, $regex, $apikey='') {
		$res = $this->zap->request($this->zap->base . 'context/action/excludeFromContext/', array('contextName' => $contextname, 'regex' => $regex, 'apikey' => $apikey));
		return reset($res);
	}

	/**
	 * Add include regex to context
	 */
	public function includeInContext($contextname, $regex, $apikey='') {
		$res = $this->zap->request($this->zap->base . 'context/action/includeInContext/', array('contextName' => $contextname, 'regex' => $regex, 'apikey' => $apikey));
		return reset($res);
	}

	/**
	 * Creates a new context with the given name in the current session
	 */
	public function newContext($contextname, $apikey='') {
		$res = $this->zap->request($this->zap->base . 'context/action/newContext/', array('contextName' => $contextname, 'apikey' => $apikey));
		return reset($res);
	}

	/**
	 * Removes a context in the current session
	 */
	public function removeContext($contextname, $apikey='') {
		$res = $this->zap->request($this->zap->base . 'context/action/removeContext/', array('contextName' => $contextname, 'apikey' => $apikey));
		return reset($res);
	}

	/**
	 * Exports the context with the given name to a file. If a relative file path is specified it will be resolved against the "contexts" directory in ZAP "home" dir.
	 */
	public function exportContext($contextname, $contextfile, $apikey='') {
		$res = $this->zap->request($this->zap->base . 'context/action/exportContext/', array('contextName' => $contextname, 'contextFile' => $contextfile, 'apikey' => $apikey));
		return reset($res);
	}

	/**
	 * Imports a context from a file. If a relative file path is specified it will be resolved against the "contexts" directory in ZAP "home" dir.
	 */
	public function importContext($contextfile, $apikey='') {
		$res = $this->zap->request($this->zap->base . 'context/action/importContext/', array('contextFile' => $contextfile, 'apikey' => $apikey));
		return reset($res);
	}

	/**
	 * Includes technologies with the given names, separated by a comma, to a context
	 */
	public function includeContextTechnologies($contextname, $technologynames, $apikey='') {
		$res = $this->zap->request($this->zap->base . 'context/action/includeContextTechnologies/', array('contextName' => $contextname, 'technologyNames' => $technologynames, 'apikey' => $apikey));
		return reset($res);
	}

	/**
	 * Includes all built in technologies in to a context
	 */
	public function includeAllContextTechnologies($contextname, $apikey='') {
		$res = $this->zap->request($this->zap->base . 'context/action/includeAllContextTechnologies/', array('contextName' => $contextname, 'apikey' => $apikey));
		return reset($res);
	}

	/**
	 * Excludes technologies with the given names, separated by a comma, from a context
	 */
	public function excludeContextTechnologies($contextname, $technologynames, $apikey='') {
		$res = $this->zap->request($this->zap->base . 'context/action/excludeContextTechnologies/', array('contextName' => $contextname, 'technologyNames' => $technologynames, 'apikey' => $apikey));
		return reset($res);
	}

	/**
	 * Excludes all built in technologies from a context
	 */
	public function excludeAllContextTechnologies($contextname, $apikey='') {
		$res = $this->zap->request($this->zap->base . 'context/action/excludeAllContextTechnologies/', array('contextName' => $contextname, 'apikey' => $apikey));
		return reset($res);
	}

	/**
	 * Sets a context to in scope (contexts are in scope by default)
	 */
	public function setContextInScope($contextname, $booleaninscope, $apikey='') {
		$res = $this->zap->request($this->zap->base . 'context/action/setContextInScope/', array('contextName' => $contextname, 'booleanInScope' => $booleaninscope, 'apikey' => $apikey));
		return reset($res);
	}

}
