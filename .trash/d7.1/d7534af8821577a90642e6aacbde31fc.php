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

/* snippets/css-variables.twig */
class __TwigTemplate_d8905f8d8565337e666ff0b1eaba4cd4 extends Template
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
        yield "<style>
  :root {
    /* Typography */
    --font-family-primary: 'Inter', sans-serif;
    --font-family-secondary: 'Inter', sans-serif;
    --font-family-editor: 'Inter', sans-serif;
    --font-family-editor-heading: 'Noto Serif';

    /* Theme colors */
    --color-accent: rgb(";
        // line 10
        yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "color_scheme", [], "any", false, true, false, 10), "accent", [], "any", false, true, false, 10), "rgb", [], "any", true, true, false, 10) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "color_scheme", [], "any", false, false, false, 10), "accent", [], "any", false, false, false, 10), "rgb", [], "any", false, false, false, 10)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "color_scheme", [], "any", false, false, false, 10), "accent", [], "any", false, false, false, 10), "rgb", [], "any", false, false, false, 10), "html", null, true)) : ("211 243 107"));
        yield ");
    --color-accent-content: rgb(";
        // line 11
        yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "color_scheme", [], "any", false, true, false, 11), "accent_content", [], "any", false, true, false, 11), "rgb", [], "any", true, true, false, 11) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "color_scheme", [], "any", false, false, false, 11), "accent_content", [], "any", false, false, false, 11), "rgb", [], "any", false, false, false, 11)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "color_scheme", [], "any", false, false, false, 11), "accent_content", [], "any", false, false, false, 11), "rgb", [], "any", false, false, false, 11), "html", null, true)) : ("63 66 70"));
        yield ");

    --color-main: rgb(255, 255, 255);

    --color-content: rgb(63, 66, 70);
    --color-content-dimmed: rgb(172, 174, 175);
    --color-content-super-dimmed: rgb(207, 208, 208);

    --color-line: rgb(227, 228, 228);
    --color-line-dimmed: rgb(245, 246, 246);
    --color-line-super-dimmed: rgb(250, 251, 251);

    --color-intermediate: rgb(245, 246, 246);
    --color-intermediate-content: rgb(63, 66, 70);
    --color-intermediate-content-dimmed: rgb(172, 174, 175);

    --color-button: rgb(63, 66, 70);
    --color-button-content: rgb(255, 255, 255);

    --color-button-dimmed: rgb(245, 246, 246);
    --color-button-dimmed-content: rgb(63, 66, 70);

    --color-button-accent: var(--color-accent);
    --color-button-accent-content: var(--color-accent-content);

    --color-gradient-from: rgb(231, 255, 155);
    --color-gradient-to: rgb(207, 230, 255);
    --color-gradient-content: rgb(63, 66, 70);

    /* --------------- */
    --color-info: rgb(0, 166, 251);
    --color-success: rgb(48, 200, 98);
    --color-failure: rgb(254, 81, 87);
    --color-alert: rgb(254, 212, 73);

    --color-test: rgb(255, 200, 255);
  }

  :root[data-mode=\"dark\"] {
    /* Theme colors */
    --color-main: rgb(38, 40, 43);

    --color-content: rgb(245, 246, 246);
    --color-content-dimmed: rgb(172, 174, 175);
    --color-content-super-dimmed: rgb(144, 145, 148);

    --color-line: rgb(96, 98, 101);
    --color-line-dimmed: rgb(63, 66, 70);
    --color-line-super-dimmed: rgb(44, 46, 49);

    --color-intermediate: rgb(25, 26, 28);
    --color-intermediate-content: rgb(245, 246, 246);
    --color-intermediate-content-dimmed: rgb(172, 174, 175);

    --color-button: rgb(245, 246, 246);
    --color-button-content: rgb(38, 40, 43);

    --color-button-dimmed: rgb(96, 98, 101);
    --color-button-dimmed-content: rgb(255, 255, 255);
  }
</style>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "snippets/css-variables.twig";
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
        return array (  57 => 11,  53 => 10,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "snippets/css-variables.twig", "/home/appcloud/resources/views/snippets/css-variables.twig");
    }
}
