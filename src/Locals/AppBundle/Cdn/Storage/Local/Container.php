<?php

namespace Locals\AppBundle\Cdn\Storage\Local;

use Locals\AppBundle\Cdn\Common\ContainerInterface;

class Container implements ContainerInterface
{
	/**
	 * base path
	 * @var string
	 */
	protected $_path = null;

	/**
	 * base path
	 * @var string
	 */
	protected $_url = null;

	/**
	 *
	 * @param string $path
	 */
	public function __construct($path, $url) {
		if (!is_dir($path)) {
			throw new \InvalidArgumentException('Container haven\'t been created');
		}

		$this->_path = $path;
		$this->_url = $url;
	}

	/**
	 * {@inheritDoc}
	 */
	public function get($name) {
		$object = new Object($name, $this->_path, $this->_url . '/' . $name);
		
		if (!$object->getUrl() || !$object->getPath()) {
			return null;
		}
		return $object;
	}

	/**
	 * {@inheritDoc}
	 */
	public function remove($name) {
		$object = $this->get($name);

		return $object->remove();
	}

	/**
	 * {@inheritDoc}
	 */
	public function save($source, $name) {
		$sourceBin = file_get_contents($source);
		$fullPath = $this->_path . DIRECTORY_SEPARATOR . $name;

		if (file_exists($fullPath)) {
			if (!unlink($fullPath)) {
				throw new \RuntimeException('Can not unlink old file. Please check up access rights');
			}
		}

		if (!$sourceBin) {
			throw new \RuntimeException('Unable to get binary of the source');
		}

		$handler = fopen($fullPath , 'w');
		fwrite($handler, $sourceBin);
		fclose($handler);

		chmod($fullPath, 0777);

		unlink($source);

		return $this->get($name);
	}	
}