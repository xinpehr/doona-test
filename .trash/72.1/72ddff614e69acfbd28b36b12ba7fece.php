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

/* snippets/script-tags/end.twig */
class __TwigTemplate_e74d4ebfdabbbcb0e21b2f1ec855f3b7 extends Template
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
        if ((((($context["view_namespace"] ?? null) != "admin") && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "script_tags", [], "any", false, true, false, 1), "custom", [], "any", false, true, false, 1), "end", [], "any", true, true, false, 1)) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "script_tags", [], "any", false, false, false, 1), "custom", [], "any", false, false, false, 1), "end", [], "any", false, false, false, 1))) {
            // line 2
            yield Twig\Extension\CoreExtension::include($this->env, $context, $this->env->getFunction('template')->getCallable()($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "script_tags", [], "any", false, false, false, 2), "custom", [], "any", false, false, false, 2), "end", [], "any", false, false, false, 2)));
            yield "
";
        }
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "snippets/script-tags/end.twig";
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
        return array (  44 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "snippets/script-tags/end.twig", "/home/appcloud/resources/views/snippets/script-tags/end.twig");
    }
}
