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

/* /sections/footer.twig */
class __TwigTemplate_262a5eb4a54bc22aab96972440ca50e5 extends Template
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
        yield "<footer class=\"py-4 text-xs text-center text-content-dimmed bg-main\">
  ";
        // line 2
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("All rights reserved."), "html", null, true);
        yield "
  ";
        // line 3
        yield __("&copy; %s", $this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y"));
        yield "
  ";
        // line 4
        yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "site", [], "any", false, true, false, 4), "name", [], "any", true, true, false, 4) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "site", [], "any", false, false, false, 4), "name", [], "any", false, false, false, 4)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "site", [], "any", false, false, false, 4), "name", [], "any", false, false, false, 4), "html", null, true)) : (""));
        yield " | ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Version %s", ($context["version"] ?? null)), "html", null, true);
        yield "
</footer>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "/sections/footer.twig";
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
        return array (  53 => 4,  49 => 3,  45 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "/sections/footer.twig", "/home/appcloud/resources/views/sections/footer.twig");
    }
}
