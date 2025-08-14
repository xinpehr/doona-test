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

/* sections/dashboard/usage.twig */
class __TwigTemplate_c3c0408abf41bfb698efe0b32c05635f extends Template
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
        yield "<section class=\"flex flex-col gap-6 box\" data-density=\"comfortable\">
\t<div class=\"flex gap-2 justify-between items-center\">
\t\t<h2 class=\"me-auto\">
\t\t\t";
        // line 4
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Credit usage"), "html", null, true);
        yield "
\t\t</h2>

\t\t<span class=\"badge\">
\t\t\t";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Last 30 days"), "html", null, true);
        yield "
\t\t</span>

\t\t<div class=\"relative\" @click.outside=\"\$refs.context.removeAttribute('data-open')\">
\t\t\t<button class=\"relative z-10\" @click=\"\$refs.context.toggleAttribute('data-open')\">
\t\t\t\t<i class=\"text-2xl ti ti-dots-vertical text-content-dimmed hover:text-intermediate-content\"></i>
\t\t\t</button>

\t\t\t<div class=\"menu\" x-ref=\"context\">
\t\t\t\t<ul>
\t\t\t\t\t<li><a href=\"app/logs/usage\" class=\"flex gap-2 items-center px-4 py-2 hover:no-underline hover:bg-intermediate\"><i class=\"ti ti-mist\"></i>";
        // line 18
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Usage log"), "html", null, true);
        yield "</a></li>
\t\t\t\t</ul>
\t\t\t</div>
\t\t</div>
\t</div>

\t<x-chart :set=\"JSON.stringify(usageDataset)\" class=\"block\">
\t\t<div chart class=\"h-64\"></div>
\t</x-chart>
</section>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "sections/dashboard/usage.twig";
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
        return array (  67 => 18,  54 => 8,  47 => 4,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "sections/dashboard/usage.twig", "/home/appcloud/resources/views/sections/dashboard/usage.twig");
    }
}
