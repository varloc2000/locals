<?php

namespace Locals\AppBundle\Cdn\Common;

/**
 *
 * @author Zmicier Aliakseyeu <z.aliakseyeu@gmail.com>
 */
interface ObjectInterface {

	/**
	 * @return strings
	 */
	public function getUrl();

	/**
	 * @return string
	 */
	public function getResource();

	/**
	 * @return string
	 */
	public function getPath();

	/**
	 * @return string
	 */
	public function getName();
}
