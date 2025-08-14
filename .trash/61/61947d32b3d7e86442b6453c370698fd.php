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

/* /templates/app/dashboard.twig */
class __TwigTemplate_88c672dfbc2f64d3b6bcfa37ff638dcf extends Template
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

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'template' => [$this, 'block_template'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "/layouts/main.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 3
        $context["active_menu"] = "/app";
        // line 4
        $context["xdata"] = "dashboard";
        // line 1
        $this->parent = $this->load("/layouts/main.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), p__("title", "Dashboard")), "html", null, true);
        yield from [];
    }

    // line 7
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_template(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 8
        yield "\t";
        yield from $this->load("sections/dashboard/quick-access.twig", 8)->unwrap()->yield($context);
        // line 9
        yield "
\t<div class=\"flex flex-col gap-1\">
\t\t";
        // line 11
        yield from $this->load("sections/dashboard/billing.twig", 11)->unwrap()->yield($context);
        // line 12
        yield "\t\t";
        yield from $this->load("sections/dashboard/usage.twig", 12)->unwrap()->yield($context);
        // line 13
        yield "\t</div>

\t";
        // line 15
        yield from $this->load("sections/dashboard/tools.twig", 15)->unwrap()->yield($context);
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "/templates/app/dashboard.twig";
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
        return array (  91 => 15,  87 => 13,  84 => 12,  82 => 11,  78 => 9,  75 => 8,  68 => 7,  57 => 5,  52 => 1,  50 => 4,  48 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "/templates/app/dashboard.twig", "/home/appcloud/resources/views/templates/app/dashboard.twig");
    }
}
