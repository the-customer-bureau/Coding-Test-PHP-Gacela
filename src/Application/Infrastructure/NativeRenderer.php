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

final class NativeRenderer implements Renderer
{
    private const DEFAULT_EXT = '.phtml';

    private string $templateDir;
    private string $extension;

    public function __construct(string $templateDir, string $extension = self::DEFAULT_EXT)
    {
        $this->templateDir = $templateDir;
        $this->extension = $extension;
    }

    /**
     * {@inheritDoc}
     */
    public function render(string $template, array $context = []): string
    {
        // Variables are prefixed to reduce change of name collision with extract
        $__template = $template;
        $__filename = $this->templateDir.'/'.$__template.$this->extension;

        if (!is_file($__filename)) {
            throw new TemplateNotFound("Template {$__template} does not exist");
        }

        // Start capturing php output buffer
        ob_start();
        // Put the context in the current scope
        extract($context, EXTR_OVERWRITE);

        include $__filename;

        $contents = ob_get_clean();

        if (!is_string($contents)) {
            throw new RenderError("Could not render template {$__template}");
        }

        return $contents;
    }
}
