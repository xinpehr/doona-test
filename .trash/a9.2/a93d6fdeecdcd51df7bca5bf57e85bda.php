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

/* snippets/back.twig */
class __TwigTemplate_cc42e4e7d1d84f9f9258dd6ee52744d4 extends Template
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
        yield "<a href=\"";
        yield (((array_key_exists("link", $context) &&  !(null === $context["link"]))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["link"], "html", null, true)) : ("#"));
        yield "\"
  class=\"inline-flex items-center gap-1 text-sm text-content-dimmed hover:text-content\">
  <i class=\"text-lg ti ti-";
        // line 3
        yield (((array_key_exists("icon", $context) &&  !(null === $context["icon"]))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["icon"], "html", null, true)) : ("square-rounded-arrow-left-filled"));
        yield "\"></i>
  ";
        // line 4
        yield ((array_key_exists("label", $context)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["label"] ?? null), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Back"), "html", null, true)));
        yield "
</a>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "snippets/back.twig";
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
        return array (  52 => 4,  48 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "snippets/back.twig", "/home/appcloud/resources/views/snippets/back.twig");
    }
}
