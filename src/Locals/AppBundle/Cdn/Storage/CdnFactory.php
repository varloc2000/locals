<?php
namespace Locals\AppBundle\Cdn\Storage;

use Locals\AppBundle\Cdn\Common\ContainerAdapterInterface;

class CdnFactory 
{
	
	protected $_repositories;
	
	protected $_default;
	
	protected $_containerAdapter;
	
	public function __construct($config, ContainerAdapterInterface $containerAdapter) 
	{
		$this->_repositories = $config['repositories'];
		$this->_default = $config['default'];
		$this->_containerAdapter = $containerAdapter;
	}
	
	public function createStorage($name = null) 
	{
		if (!$name) {
			$name = $this->_default;
		}

		if (!isset($this->_repositories[$name]) || !isset($this->_repositories[$name]['storage'])) {
			throw new \InvalidArgumentException(sprintf("Storage with name %s does not exists or configured without storage key", $name));
		}

		$cdnClass = new $this->_repositories[$name]['storage'];
		$cdnOptions = $this->_repositories[$name]['options'];

		$cdn = new $cdnClass();
		$cdn->setSettings($cdnOptions);
		$cdn->setContainerAdapter($this->_containerAdapter);

		return $cdn;		
	}
	
	
	public function getByUri($uri, $dimension = null) 
	{
		$uriData = $this->_parseUriString($uri);
		$cdn = $this->createStorage($uriData['cdn_name']);
		$container = $cdn->getContainer($uriData['container']);
		$object = $container->get($uriData['object']);

		return $object;
	}

	
	protected function _parseUriString($uri) 
	{
		$pathInfo = pathinfo($uri);
		$dirName = $pathInfo['dirname'];

		list($cdnName, $dirName) = preg_split('#://#', $dirName, 2);

		return array(
			'object' => $pathInfo['basename'],
			'cdn_name' => $cdnName,
			'uri' => $uri,
			'container' => $dirName,
		);
	}	
}
