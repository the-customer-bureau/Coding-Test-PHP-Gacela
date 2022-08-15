<?php

namespace Engineered\Application\Infrastructure;

interface Renderer
{
    /**
     * @param string $template
     * @param array $context
     * @return string
     *
     * @throws TemplateNotFound if the template cannot be found
     * @throws RenderError if there is an error while rendering
     */
    public function render(string $template, array $context = []): string;
}