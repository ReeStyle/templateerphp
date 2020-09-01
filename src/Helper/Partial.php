<?php

namespace TemplateerPHP\Helper;

use TemplateerPHP\TemplateerPHP;

class Partial extends Base
{

	/**
	 * @brief Use as <?=$templateer->partial('resource') ?> OR <?=$templateer->partial('resource', ['data' => ['hello', 'world']) ?>
	 *
	 * @param string $template
	 * @param array $params
	 *
	 * @return null
	 * @throws \Exception
	 */
	public function __invoke($template, array $params = null)
	{
		$template = new TemplateerPHP();

		$master = $this->getTemplateer();
		$baseDir = $master->getBaseDir();
		$template
			->setBaseDir($baseDir)
			->setResource($template);

		// Copy from parent, otherwise only use provided data
		if (count($params) === 0) {
			$params = $master->getData();
		}
		$template->assign($params);

		return $template->render();
	}
}
