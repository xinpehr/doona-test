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

/* /sections/aside.twig */
class __TwigTemplate_3f37eb7921b8427a9b5206b8db0b523b extends Template
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
        yield "<aside class=\"sticky z-10 py-4 top-0 hidden lg:flex flex-col gap-4 h-screen shrink-0 w-64 bg-intermediate text-intermediate-content group-data-collapsed/html:-ms-64 border-e border-line dark:border-line-dimmed transition-[margin] ease-in\" x-data>
\t<div class=\"relative flex items-center justify-between px-4\">
\t\t<a href=\"";
        // line 3
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["view_namespace"] ?? null), "html", null, true);
        yield "\">
\t\t\t<img src=\"";
        // line 4
        yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "brand", [], "any", false, true, false, 4), "logo_dark", [], "any", true, true, false, 4) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "brand", [], "any", false, false, false, 4), "logo_dark", [], "any", false, false, false, 4)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "brand", [], "any", false, false, false, 4), "logo_dark", [], "any", false, false, false, 4), "html", null, true)) : ("/assets/logo-light.svg"));
        yield "\" alt=\"";
        yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "site", [], "any", false, true, false, 4), "name", [], "any", true, true, false, 4) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "site", [], "any", false, false, false, 4), "name", [], "any", false, false, false, 4)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "site", [], "any", false, false, false, 4), "name", [], "any", false, false, false, 4), "html", null, true)) : ("Logo"));
        yield "\" class=\"hidden dark:block max-w-[140px] h-6 object-contain object-left\">
\t\t\t<img src=\"";
        // line 5
        yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "brand", [], "any", false, true, false, 5), "logo", [], "any", true, true, false, 5) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "brand", [], "any", false, false, false, 5), "logo", [], "any", false, false, false, 5)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "brand", [], "any", false, false, false, 5), "logo", [], "any", false, false, false, 5), "html", null, true)) : ("/assets/logo-dark.svg"));
        yield "\" alt=\"";
        yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "site", [], "any", false, true, false, 5), "name", [], "any", true, true, false, 5) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "site", [], "any", false, false, false, 5), "name", [], "any", false, false, false, 5)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "site", [], "any", false, false, false, 5), "name", [], "any", false, false, false, 5), "html", null, true)) : ("Logo"));
        yield "\" class=\"block dark:hidden max-w-[140px] h-6 object-contain object-left\">
\t\t</a>

\t\t";
        // line 8
        if (( !CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "color_scheme", [], "any", false, true, false, 8), "modes", [], "any", true, true, false, 8) || (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "color_scheme", [], "any", false, false, false, 8), "modes", [], "any", false, false, false, 8)) > 1))) {
            // line 9
            yield "\t\t\t<mode-switcher>
\t\t\t\t<button type=\"button\" @click.stop>
\t\t\t\t\t<i class=\"text-xl ti ti-moon dark:hidden\" x-tooltip.placement.right.raw=\"";
            // line 11
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Toggle theme"), "html", null, true);
            yield "\"></i>
\t\t\t\t\t<i class=\"text-xl ti ti-sun hidden dark:block\" x-tooltip.placement.right.raw=\"";
            // line 12
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Toggle theme"), "html", null, true);
            yield "\"></i>
\t\t\t\t</button>
\t\t\t</mode-switcher>
\t\t";
        }
        // line 16
        yield "\t</div>

\t";
        // line 18
        yield from $this->load("/snippets/workspace/menu.twig", 18)->unwrap()->yield($context);
        // line 19
        yield "\t";
        yield from $this->load("/snippets/navigation.twig", 19)->unwrap()->yield($context);
        // line 20
        yield "
\t<div class=\"flex flex-col gap-4 px-4 mt-auto\">
\t\t";
        // line 22
        if ((($context["view_namespace"] ?? null) == "admin")) {
            // line 23
            yield "\t\t\t<a href=\"app\" class=\"button\">
\t\t\t\t";
            // line 24
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "View app"), "html", null, true);
            yield "
\t\t\t</a>
\t\t";
        } elseif (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 26
($context["workspace"] ?? null), "owner", [], "any", false, false, false, 26), "id", [], "any", false, false, false, 26) == CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "id", [], "any", false, false, false, 26)) && ((CoreExtension::getAttribute($this->env, $this->source, ($context["workspace"] ?? null), "subscription", [], "any", false, false, false, 26) == null) || (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["workspace"] ?? null), "subscription", [], "any", false, false, false, 26), "plan", [], "any", false, false, false, 26), "price", [], "any", false, false, false, 26) <= 0)))) {
            // line 27
            yield "\t\t\t<a href=\"app/billing/plans\" class=\"button\">
\t\t\t\t<i class=\"ti ti-click\"></i>
\t\t\t\t";
            // line 29
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Upgrade plan"), "html", null, true);
            yield "
\t\t\t</a>
\t\t";
        }
        // line 32
        yield "
\t\t";
        // line 33
        yield from $this->load("/snippets/account-menu.twig", 33)->unwrap()->yield($context);
        // line 34
        yield "\t</div>

\t<template x-ref=\"sidebarTooltip\">
\t\t<p x-text=\"document.documentElement.dataset.collapsed ? `";
        // line 37
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Open sidebar"), "html", null, true);
        yield "` : `";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Close sidebar"), "html", null, true);
        yield "`\"></p>
\t</template>

\t<button type=\"button\" class=\"absolute top-1/2 start-full ms-4 w-1.5 h-12 bg-line-dimmed rounded-sm -translate-y-1/2 transition-all hover:scale-125 hover:bg-line group-data-collapsed/html:bg-line\" x-tooltip.placement.right=\"{ content: () => \$refs.sidebarTooltip.innerHTML, allowHTML: true }\" @click=\"document.documentElement.dataset.collapsed ? (delete document.documentElement.dataset.collapsed, delete localStorage.collapsed) : (document.documentElement.dataset.collapsed = localStorage.collapsed = true)\"></button>
</aside>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "/sections/aside.twig";
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
        return array (  126 => 37,  121 => 34,  119 => 33,  116 => 32,  110 => 29,  106 => 27,  104 => 26,  99 => 24,  96 => 23,  94 => 22,  90 => 20,  87 => 19,  85 => 18,  81 => 16,  74 => 12,  70 => 11,  66 => 9,  64 => 8,  56 => 5,  50 => 4,  46 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "/sections/aside.twig", "/home/appcloud/resources/views/sections/aside.twig");
    }
}
