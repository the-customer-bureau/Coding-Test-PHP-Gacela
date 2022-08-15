<?php

declare(strict_types=1);

/**
 * @project TCB Coding Test
 * @link https://github.com/the-customer-bureau/Coding-Test-PHP-Gacela
 * @project engineered/coding_test_php_gacela
 * @author The Customer Bureau
 * @license GPL-3.0
 * @copyright 2022 The Customer Bureau
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Engineered\Application\Infrastructure;

interface Renderer
{
    /**
     * @throws TemplateNotFound if the template cannot be found
     * @throws RenderError      if there is an error while rendering
     */
    public function render(string $template, array $context = []): string;
}
