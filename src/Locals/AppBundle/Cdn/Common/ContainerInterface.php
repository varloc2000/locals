<?php

namespace Locals\AppBundle\Cdn\Common;

/**
 *
 * @author Zmicier Aliakseyeu <z.aliakseyeu@gmail.com>
 */
interface ContainerInterface {

	/**
	 * @param string $name
	 * @return \Locals\AppBundle\Cdn\Common\ObjectInterface
	 */
	public function get($name);

	/**
	 * @param string $name
	 * @return boolean
	 */
	public function remove($name);

	/**
	 * @param string $name
	 * @param string $path
	 */
	public function save($source, $name);
}
