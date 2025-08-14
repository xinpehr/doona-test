<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* snippets/icons/video.twig */
class __TwigTemplate_00d636fed2603aaa9001199aeea0d77e extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<svg xmlns='http://www.w3.org/2000/svg' viewbox='0 0 24 24' class=\"w-7/12 drop-shadow-xs\">
\t<g id=\"play_fill\" fill='none' fill-rule='evenodd'>
\t\t<path fill='currentColor' d='M5.669 4.76a1.469 1.469 0 0 1 2.04-1.177c1.062.454 3.442 1.533 6.462 3.276 3.021 1.744 5.146 3.267 6.069 3.958.788.591.79 1.763.001 2.356-.914.687-3.013 2.19-6.07 3.956-3.06 1.766-5.412 2.832-6.464 3.28-.906.387-1.92-.2-2.038-1.177-.138-1.142-.396-3.735-.396-7.237 0-3.5.257-6.092.396-7.235'/>
\t</g>
</svg>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "snippets/icons/video.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "snippets/icons/video.twig", "/home/appcloud/resources/views/snippets/icons/video.twig");
    }
}
