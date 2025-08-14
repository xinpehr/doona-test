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

/* sections/dashboard/billing.twig */
class __TwigTemplate_0741ec76ff0890b76533071fc470b408 extends Template
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
        yield "<div class=\"grid gap-1 md:grid-cols-3\">
\t<div class=\"flex gap-4 md:flex-col box md:col-span-2\">
\t\t<i class=\"text-2xl flex items-center justify-center w-10 h-10 rounded-full ti ti-credit-card bg-button text-button-content shrink-0\"></i>

\t\t<div class=\"flex flex-col gap-4\">
\t\t\t<div class=\"flex flex-col gap-1\">
\t\t\t\t";
        // line 7
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["workspace"] ?? null), "subscription", [], "any", false, false, false, 7)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 8
            yield "\t\t\t\t\t<p>
\t\t\t\t\t\t";
            // line 9
            yield Twig\Extension\CoreExtension::sprintf(__("Your workspace is currently subscribed to %s."), (("<strong>" . CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["workspace"] ?? null), "subscription", [], "any", false, false, false, 9), "plan", [], "any", false, false, false, 9), "title", [], "any", false, false, false, 9)) . "</strong>"));
            yield "
\t\t\t\t\t</p>

\t\t\t\t\t";
            // line 12
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["workspace"] ?? null), "subscription", [], "any", false, false, false, 12), "cancel_at", [], "any", false, false, false, 12)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 13
                yield "\t\t\t\t\t\t<p class=\"text-sm text-content-dimmed\">
\t\t\t\t\t\t\t";
                // line 14
                yield __("Subscription will be cancelled at %s", (("<x-time datetime=\"" . CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["workspace"] ?? null), "subscription", [], "any", false, false, false, 14), "cancel_at", [], "any", false, false, false, 14)) . "\"></x-time>"));
                yield "
\t\t\t\t\t\t</p>
\t\t\t\t\t";
            } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,             // line 16
($context["workspace"] ?? null), "subscription", [], "any", false, false, false, 16), "renew_at", [], "any", false, false, false, 16)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 17
                yield "\t\t\t\t\t\t<p class=\"text-sm text-content-dimmed\">
\t\t\t\t\t\t\t";
                // line 18
                yield __("Usage renews at %s", (("<x-time datetime=\"" . CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["workspace"] ?? null), "subscription", [], "any", false, false, false, 18), "renew_at", [], "any", false, false, false, 18)) . "\"></x-time>"));
                yield "
\t\t\t\t\t\t</p>
\t\t\t\t\t";
            }
            // line 21
            yield "\t\t\t\t";
        } else {
            // line 22
            yield "\t\t\t\t\t<p>
\t\t\t\t\t\t";
            // line 23
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Currently you don't have any active subscription."), "html", null, true);
            yield "
\t\t\t\t\t</p>

\t\t\t\t\t<p class=\"text-sm text-content-dimmed\">
\t\t\t\t\t\t";
            // line 27
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Subscribe to one of the our plans to get access to all features and benefits."), "html", null, true);
            yield "
\t\t\t\t\t</p>
\t\t\t\t";
        }
        // line 30
        yield "\t\t\t</div>

\t\t\t<div class=\"mt-auto\">
\t\t\t\t<a href=\"app/billing\" class=\"button button-sm\">
\t\t\t\t\t";
        // line 34
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Billing overview"), "html", null, true);
        yield "
\t\t\t\t</a>
\t\t\t</div>
\t\t</div>
\t</div>

\t<div class=\"flex gap-4 md:flex-col box\">
\t\t<i class=\"text-2xl flex items-center justify-center w-10 h-10 rounded-full ti ti-square-rounded-letter-t text-gradient-content from-gradient-from to-gradient-to bg-linear-to-br shrink-0\"></i>

\t\t<div class=\"flex flex-col gap-4\">
\t\t\t<div>
\t\t\t\t<div class=\"text-xl font-bold\">
\t\t\t\t\t<x-credit data-value=\"";
        // line 46
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["workspace"] ?? null), "total_credit_count", [], "any", false, false, false, 46), "html", null, true);
        yield "\"></x-credit>
\t\t\t\t</div>

\t\t\t\t<div class=\"text-sm text-content-dimmed\">
\t\t\t\t\t";
        // line 50
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Total credits left"), "html", null, true);
        yield "
\t\t\t\t</div>
\t\t\t</div>

\t\t\t";
        // line 54
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["workspace"] ?? null), "subscription", [], "any", false, false, false, 54)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 55
            yield "\t\t\t\t<div class=\"mt-auto\">
\t\t\t\t\t<a href=\"app/billing/packs\" class=\"button button-outline button-sm\">
\t\t\t\t\t\t<i class=\"ti ti-click\"></i>
\t\t\t\t\t\t";
            // line 58
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Buy additional credits"), "html", null, true);
            yield "
\t\t\t\t\t</a>
\t\t\t\t</div>
\t\t\t";
        }
        // line 62
        yield "\t\t</div>
\t</div>
</div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "sections/dashboard/billing.twig";
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
        return array (  150 => 62,  143 => 58,  138 => 55,  136 => 54,  129 => 50,  122 => 46,  107 => 34,  101 => 30,  95 => 27,  88 => 23,  85 => 22,  82 => 21,  76 => 18,  73 => 17,  71 => 16,  66 => 14,  63 => 13,  61 => 12,  55 => 9,  52 => 8,  50 => 7,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "sections/dashboard/billing.twig", "/home/appcloud/resources/views/sections/dashboard/billing.twig");
    }
}
