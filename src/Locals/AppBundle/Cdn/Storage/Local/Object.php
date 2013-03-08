<?php

namespace Locals\AppBundle\Cdn\Storage\Local;

use Locals\AppBundle\Cdn\Common\ObjectInterface;

class Object implements ObjectInterface
{
	/**
	 * object path
	 *
	 * @var string
	 */
	protected $_path = null;

	/**
	 * File name
	 * @var string
	 */
	protected $_name = null;

	/**
	 *
	 * @param type $name
	 * @param type $path
	 * @param type $url
	 * @throws \InvalidArgumentException
	 */
	public function __construct($name, $path, $url)
    {
		if (!file_exists($path . DIRECTORY_SEPARATOR . $name) || !is_readable($path . DIRECTORY_SEPARATOR . $name)) {
//			throw new \InvalidArgumentException(sprintf('File %s does not exists or unreadable', $name));
			$this->_url = null;
			$this->_path = null;
			$this->_name = null;
		} else {
			$this->_path = $path;
			$this->_name = $name;
			$this->_url  = $url;
		}
	}

	/**
	 * @return string $_url
	 */
	public function __toString()
    {
		return $this->getUrl();
	}

	/**
	 * {@inheritDoc}
	 */
	public function getPath()
    {
		return $this->_path . DIRECTORY_SEPARATOR . $this->_name;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getName()
    {
		return $this->_name;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getResource()
    {
		$binary = file_get_contents($this->_path);
		if (!$binary) {
			throw new \RuntimeException('Unable to get file as resource');
		}

		return $binary;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getUrl()
    {
		return $this->_url;
	}

	/**
	 * @return boolean
	 */
	public function remove()
    {
		unlink($this->_path . '/' . $this->_name);

		return !file_exists($this->_path . '/' . $this->_name);
	}
}
