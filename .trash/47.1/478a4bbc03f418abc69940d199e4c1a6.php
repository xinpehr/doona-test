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

/* snippets/script-tags/body.twig */
class __TwigTemplate_0a88463748e2018a74e5de68cca4ec1b extends Template
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
        if ((((($context["view_namespace"] ?? null) != "admin") && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "script_tags", [], "any", false, true, false, 1), "custom", [], "any", false, true, false, 1), "body", [], "any", true, true, false, 1)) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "script_tags", [], "any", false, false, false, 1), "custom", [], "any", false, false, false, 1), "body", [], "any", false, false, false, 1))) {
            // line 2
            yield Twig\Extension\CoreExtension::include($this->env, $context, $this->env->getFunction('template')->getCallable()($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "script_tags", [], "any", false, false, false, 2), "custom", [], "any", false, false, false, 2), "body", [], "any", false, false, false, 2)));
            yield "
";
        }
        // line 4
        yield "
";
        // line 5
        if ((((((($context["view_namespace"] ?? null) != "admin") && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "script_tags", [], "any", false, true, false, 5), "gtm", [], "any", true, true, false, 5)) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "script_tags", [], "any", false, false, false, 5), "gtm", [], "any", false, false, false, 5), "is_enabled", [], "any", false, false, false, 5)) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "script_tags", [], "any", false, true, false, 5), "gtm", [], "any", false, true, false, 5), "container_id", [], "any", true, true, false, 5)) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "script_tags", [], "any", false, false, false, 5), "gtm", [], "any", false, false, false, 5), "container_id", [], "any", false, false, false, 5))) {
            // line 6
            yield "<!-- Google Tag Manager (noscript) -->
<noscript><iframe src=\"https://www.googletagmanager.com/ns.html?id=";
            // line 7
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "script_tags", [], "any", false, false, false, 7), "gtm", [], "any", false, false, false, 7), "container_id", [], "any", false, false, false, 7), "html", null, true);
            yield "\"
  height=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
";
        }
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "snippets/script-tags/body.twig";
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
        return array (  57 => 7,  54 => 6,  52 => 5,  49 => 4,  44 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "snippets/script-tags/body.twig", "/home/appcloud/resources/views/snippets/script-tags/body.twig");
    }
}
