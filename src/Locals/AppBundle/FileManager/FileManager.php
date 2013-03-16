<?php

namespace Locals\AppBundle\FileManager;

use Locals\AppBundle\Cdn\Storage\CdnFactory;

class FileManager
{
	protected $_cdnFactory;
	
	protected $_cdn;
	
	protected $_defaultCdn;
	
	public function __construct(CdnFactory $cdnFactory) 
	{
		$this->_cdnFactory = $cdnFactory;
	}
	
	public function get($uri)
	{
		return $this->_cdnFactory->getByUri($uri);
	}
	
	public function upload(array $fileData, $objectName = null, $containerName = null)
	{
		if (!isset($fileData['tmp_name']) && !isset($fileData['name'])) {
			throw new \InvalidArgumentException('File tmp_name or name wasn\'t set');
		}

		if ($objectName) {
			$objectName = $this->getUploadName($fileData['name'], $objectName);
		} else {
			$objectName = $fileData['name'];
		}
		
		$container = $this->getCdn()->getContainer($containerName);
		$original = $container->save($fileData['tmp_name'], $objectName);
		
		return $original;
	}
	
	public function composeUri($url, $cdn = null)
	{
		return $this->getCdn($cdn)->composeUri($url);
	}
	
	public function getUploadName($originalName, $wantedName) 
	{
		$ext = strtolower(substr($originalName, (strrpos($originalName, '.') + 1)));
		$uploadName = $wantedName . '.' . $ext;	
		
		return $uploadName;
	}
	
	public function remove($uri)
	{
		$object = $this->get($uri);
		
		return $object->remove();
	}
	
	public function getCdn($name = null) 
	{
		if (null === $this->_cdn) {
			if (null === $this->_defaultCdn) {
				/* @var $cdn \Filesystem\Cdn\CdnFactory */
				$this->_defaultCdn = $this->_cdnFactory->createStorage($name);
			}

			return $this->_defaultCdn;
		}

		return $this->_cdn;
	}
	
	public function setCdn($name) 
	{
		$this->_cdn = $this->_cdnFactory->createStorage($name);

		return $this;
	}	
}