<?php

namespace Locals\AppBundle\Cdn\Common;

/**
 * @author Zmicier Aliakseyeu <z.aliakseyeu@gmail.com>
 */
interface CdnInterface {

	/**
	 * @return string
	 */
	public function getSchemaName();

	/**
	 * @param array $options
	 */
	public function setSettings(array $settings = array());

	/**
	 * @return array
	 */
	public function getSettings();

	/**
	 * @param string $name
	 * @return \Locals\AppBundle\Cdn\Common\ContainerInterface
	 */
	public function getContainer($name);

	/**
	 * @param string $url
	 * @return string $uri
	 */
	public function composeUri($url);
	
	/**
	 * @param \Locals\AppBundle\Cdn\Common\ContainerAdapterInterface $containerAdapter
	 */
	public function setContainerAdapter($containerAdapter);
}
