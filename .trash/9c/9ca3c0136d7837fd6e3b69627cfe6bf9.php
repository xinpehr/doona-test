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

/* /snippets/workspace/menu.twig */
class __TwigTemplate_bfeeafe19e044c128b7bca26b73b4a80 extends Template
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
        if ((($context["view_namespace"] ?? null) == "app")) {
            // line 2
            yield "\t<div class=\"relative mx-4\" @click.outside=\"\$refs.wsmenu.removeAttribute('data-open')\">
\t\t<div class=\"w-60 text-base menu-bl menu peer\" x-ref=\"wsmenu\" @click=\"\$el.removeAttribute('data-open')\">

\t\t\t<div class=\"flex gap-3 items-center p-4 w-full\">
\t\t\t\t<x-avatar title=\"";
            // line 6
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["workspace"] ?? null), "name", [], "any", false, false, false, 6), "html", null, true);
            yield "\" length=\"1\"></x-avatar>

\t\t\t\t<div class=\"max-w-[120px] whitespace-nowrap\">
\t\t\t\t\t<div class=\"overflow-hidden font-semibold text-ellipsis\" x-text=\"\$store.workspace.name\">
\t\t\t\t\t\t";
            // line 10
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["workspace"] ?? null), "name", [], "any", false, false, false, 10), "html", null, true);
            yield "
\t\t\t\t\t</div>

\t\t\t\t\t";
            // line 13
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["workspace"] ?? null), "subscription", [], "any", false, false, false, 13)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 14
                yield "\t\t\t\t\t\t<div class=\"overflow-hidden text-xs text-content-dimmed text-ellipsis\">
\t\t\t\t\t\t\t";
                // line 15
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["workspace"] ?? null), "subscription", [], "any", false, false, false, 15), "plan", [], "any", false, false, false, 15), "title", [], "any", false, false, false, 15), "html", null, true);
                yield "
\t\t\t\t\t\t</div>
\t\t\t\t\t";
            }
            // line 18
            yield "\t\t\t\t</div>

\t\t\t\t<button class=\"ms-auto text-content-dimmed hover:text-content\" x-tooltip.raw=\"";
            // line 20
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Switch workspace"), "html", null, true);
            yield "\" @click=\"modal.open('workspace-switch')\">
\t\t\t\t\t<i class=\"text-2xl ti ti-switch-horizontal\"></i>
\t\t\t\t</button>
\t\t\t</div>

\t\t\t<hr class=\"border-t border-line-dimmed\">

\t\t\t<ul>
\t\t\t\t<li><a href=\"app/workspace\" class=\"flex gap-2 items-center px-4 py-2 hover:bg-intermediate hover:no-underline\"><i class=\"ti ti-settings-2\"></i>";
            // line 28
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Overview"), "html", null, true);
            yield "</a></li>

\t\t\t\t<li><a href=\"app/billing\" class=\"flex gap-2 items-center px-4 py-2 hover:bg-intermediate hover:no-underline\"><i class=\"ti ti-credit-card\"></i>";
            // line 30
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Billing"), "html", null, true);
            yield "</a></li>

\t\t\t\t<li><a href=\"app/logs/usage\" class=\"flex gap-2 items-center px-4 py-2 hover:bg-intermediate hover:no-underline\"><i class=\"ti ti-mist\"></i>";
            // line 32
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Logs"), "html", null, true);
            yield "</a></li>
\t\t\t</ul>
\t\t</div>

\t\t<button class=\"flex items-center group w-full gap-2 p-2 text-start border rounded-lg border-line hover:bg-main peer-data-open:bg-main\" @click=\"\$refs.wsmenu.toggleAttribute('data-open')\">
\t\t\t<x-avatar icon=\"building\" class=\"w-7 h-7 bg-button text-button-content [&_i]:text-sm\"></x-avatar>

\t\t\t<div class=\"max-w-24 whitespace-nowrap\">
\t\t\t\t";
            // line 40
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["workspace"] ?? null), "subscription", [], "any", false, false, false, 40) == null)) {
                // line 41
                yield "\t\t\t\t\t<div class=\"overflow-hidden text-xs text-intermediate-content-dimmed text-ellipsis\">
\t\t\t\t\t\t";
                // line 42
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Workspace"), "html", null, true);
                yield "
\t\t\t\t\t</div>
\t\t\t\t";
            }
            // line 45
            yield "
\t\t\t\t<div class=\"overflow-hidden font-medium text-ellipsis\" x-text=\"\$store.workspace.name\">
\t\t\t\t\t";
            // line 47
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["workspace"] ?? null), "name", [], "any", false, false, false, 47), "html", null, true);
            yield "
\t\t\t\t</div>

\t\t\t\t";
            // line 50
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["workspace"] ?? null), "subscription", [], "any", false, false, false, 50)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 51
                yield "\t\t\t\t\t<div class=\"overflow-hidden text-xs text-intermediate-content-dimmed text-ellipsis\">
\t\t\t\t\t\t";
                // line 52
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["workspace"] ?? null), "subscription", [], "any", false, false, false, 52), "plan", [], "any", false, false, false, 52), "title", [], "any", false, false, false, 52), "html", null, true);
                yield "
\t\t\t\t\t</div>
\t\t\t\t";
            }
            // line 55
            yield "\t\t\t</div>

\t\t\t<i class=\"ti ti-selector text-xl text-intermediate-content-dimmed ms-auto group-hover:text-intermediate-content\"></i>
\t\t</button>
\t</div>
";
        }
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "/snippets/workspace/menu.twig";
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
        return array (  142 => 55,  136 => 52,  133 => 51,  131 => 50,  125 => 47,  121 => 45,  115 => 42,  112 => 41,  110 => 40,  99 => 32,  94 => 30,  89 => 28,  78 => 20,  74 => 18,  68 => 15,  65 => 14,  63 => 13,  57 => 10,  50 => 6,  44 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "/snippets/workspace/menu.twig", "/home/appcloud/resources/views/snippets/workspace/menu.twig");
    }
}
