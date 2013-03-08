<?php
namespace Locals\AppBundle\Cdn\Storage\Local;

use Locals\AppBundle\Cdn\Common\CdnInterface;

class Cdn implements CdnInterface {

	protected $_settings;

	protected $_path;

	protected $_url;

	protected $_schema;

	protected $_containerAdapter;

	public function getSchemaName() {
		return $this->_schema;
	}

	public function getSettings() {
		return $this->_settings;
	}

	public function setSettings(array $settings = array()) {
		$this->_settings = $settings;
		$this->_path = $settings['path'];
		$this->_url	 = $settings['url'];
		$this->_schema = $settings['schema'];
	}

	public function getContainerAdapter() {
		return $this->_containerAdapter;
	}

	public function setContainerAdapter($containerAdapter) {
		$this->_containerAdapter = $containerAdapter;
	}

	public function getContainer($name = null) {

		if (!$name) {
			$name = $this->getContainerAdapter()->getName();
		}

		$path = $this->_path . '/' . $name;
		if (!is_dir($path) && !is_link($path)) {
			if (false === @mkdir($path, 0777, true)) {
				throw new \RuntimeException(sprintf("Can not create container with name: %s", $name));
			}
		}

		$url = $this->_url. '/' . $name;

		return new Container($path, $url);
	}

	public function composeUri($url) {
		// substr for removing first slash symbol
		$uri = $this->_schema . '://' . substr(str_replace($this->_url, '', $url), 1);

		return $uri;
	}

	/**
	 * Removes container and all included files
	 *
	 * @param type $name
	 * @return boolean
	 * @throws \RuntimeException
	 */
	public function removeContainer($name) {
		$path = $this->_path . '/' . $name;
		if (!is_dir($path)) {
			throw new \RuntimeException(sprintf("Can not create container with name: %s", $name));
		}

		$this->removeContentRecursively($path, true);
		if (!is_dir($path)) {
			//means removed successfully
			return true;
		}
		return false;
	}

	/**
	 * Removes files placed in container
	 *
	 * @param type $name
	 * @return type
	 * @throws \RuntimeException
	 */
	public function removeContainerContent($name) {
		$path = $this->_path . '/' . $name;
		if (!is_dir($path)) {
			throw new \RuntimeException(sprintf("Can not create container with name: %s", $name));
		}

		$this->removeContentRecursively($path, false);
		return;
	}

	/**
	 * Recursive content deletion
	 *
	 * @param type $path
	 * @param type $removeBasePath removes container
	 * @return type
	 */
	public function removeContentRecursively($path, $removeContainerDir = false) {
		$files = scandir($path);

		foreach ($files as $file) {
			if ($file == '.' OR $file == '..') continue;
			$file = "$path/$file";
			if (is_dir($file)) {
				$this->removeContentRecursively($file, true);
				rmdir($file);
			} else {
				unlink($file);
			}
		}

		if ($removeContainerDir) {
			return rmdir($path);
		}
		return;
	}
}