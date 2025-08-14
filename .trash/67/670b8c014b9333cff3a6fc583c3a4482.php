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

/* /snippets/spinner.twig */
class __TwigTemplate_4f7d7b1a370a5c06b2cacad8b563aa18 extends Template
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
        $context["size"] = (((array_key_exists("size", $context) &&  !(null === $context["size"]))) ? ($context["size"]) : ("24px"));
        // line 2
        $context["duration"] = (((array_key_exists("duration", $context) &&  !(null === $context["duration"]))) ? ($context["duration"]) : ("0.6s"));
        // line 3
        $context["thickness"] = (((array_key_exists("thickness", $context) &&  !(null === $context["thickness"]))) ? ($context["thickness"]) : (4));
        // line 4
        yield "
<svg version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\" width=\"";
        // line 5
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["size"] ?? null), "html", null, true);
        yield "\" height=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["size"] ?? null), "html", null, true);
        yield "\" viewbox=\"0 0 50 50\" style=\"enable-background:new 0 0 50 50;\" class=\"spinner\" xml:space=\"preserve\">
\t<circle cx=\"25\" cy=\"25\" r=\"20\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"";
        // line 6
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["thickness"] ?? null), "html", null, true);
        yield "\" stroke-linecap=\"round\" stroke-dasharray=\"31.4 94.2\">
\t\t<animateTransform attributename=\"transform\" type=\"rotate\" from=\"0 25 25\" to=\"360 25 25\" dur=\"";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["duration"] ?? null), "html", null, true);
        yield "\" repeatcount=\"indefinite\"/>
\t</circle>
</svg>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "/snippets/spinner.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  61 => 7,  57 => 6,  51 => 5,  48 => 4,  46 => 3,  44 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "/snippets/spinner.twig", "/home/appcloud/resources/views/snippets/spinner.twig");
    }
}
