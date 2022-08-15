<?php

namespace Engineered\Application\Infrastructure;

final class NativeRenderer implements Renderer
{
    private const DEFAULT_EXT = '.phtml';

    private string $templateDir;
    private string $extension;

    /**
     * @param string $templateDir
     * @param string $extension
     */
    public function __construct(string $templateDir, string $extension = self::DEFAULT_EXT)
    {
        $this->templateDir = $templateDir;
        $this->extension = $extension;
    }

    /**
     * @inheritDoc
     */
    public function render(string $template, array $context = []): string
    {
        // Variables are prefixed to reduce change of name collision with extract
        $__template = $template;
        $__filename = $this->templateDir.'/'.$__template.$this->extension;

        if (!is_file($__filename)) {
            throw new TemplateNotFound("Template $__template does not exist");
        }

        // Start capturing php output buffer
        ob_start();
        // Put the context in the current scope
        extract($context, EXTR_OVERWRITE);

        include $__filename;

        $contents = ob_get_clean();

        if (!is_string($contents)) {
            throw new RenderError("Could not render template $__template");
        }

        return $contents;
    }
}