<?php

namespace TemplateerPHP\Helper;

use TemplateerPHP\TemplateerPHP;

/**
 * Class Base
 *
 * @package TemplateerPHP\Helper
 */
abstract class Base
{

	/**
	 * @var TemplateerPHP
	 */
	private $templateer;

	/**
	 * Base constructor.
	 *
	 * @param TemplateerPHP $templateerPHP
	 */
	public final function __construct(TemplateerPHP $templateerPHP)
	{
		$this->setTemplateer($templateerPHP);
	}

	/**
	 * @return TemplateerPHP
	 */
	public function getTemplateer()
	{
		return $this->templateer;
	}

	/**
	 * @param TemplateerPHP $templateer
	 *
	 * @return $this
	 */
	public function setTemplateer(TemplateerPHP $templateer)
	{
		$this->templateer = $templateer;
		return $this;
	}
}
