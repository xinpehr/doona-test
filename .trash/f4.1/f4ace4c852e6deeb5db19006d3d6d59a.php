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

/* /sections/mobile-nav.twig */
class __TwigTemplate_d033d0a78fb1bdcb866ddf897547cbdc extends Template
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
        yield "<nav x-data x-ref=\"menu\">
\t<div class=\"flex justify-between items-center p-4\">
\t\t<div class=\"flex gap-4 items-center\">
\t\t\t<a href=\"";
        // line 4
        yield (((($context["view_namespace"] ?? null) == "admin")) ? ("admin") : ("app"));
        yield "\">
\t\t\t\t<img src=\"";
        // line 5
        yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "brand", [], "any", false, true, false, 5), "logo_dark", [], "any", true, true, false, 5) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "brand", [], "any", false, false, false, 5), "logo_dark", [], "any", false, false, false, 5)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "brand", [], "any", false, false, false, 5), "logo_dark", [], "any", false, false, false, 5), "html", null, true)) : ("/assets/logo-light.svg"));
        yield "\" alt=\"";
        yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "site", [], "any", false, true, false, 5), "name", [], "any", true, true, false, 5) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "site", [], "any", false, false, false, 5), "name", [], "any", false, false, false, 5)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "site", [], "any", false, false, false, 5), "name", [], "any", false, false, false, 5), "html", null, true)) : ("Logo"));
        yield "\" class=\"hidden group-data-[mode=dark]/html:block max-w-[120px]\">

\t\t\t\t<img src=\"";
        // line 7
        yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "brand", [], "any", false, true, false, 7), "logo", [], "any", true, true, false, 7) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "brand", [], "any", false, false, false, 7), "logo", [], "any", false, false, false, 7)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "brand", [], "any", false, false, false, 7), "logo", [], "any", false, false, false, 7), "html", null, true)) : ("/assets/logo-dark.svg"));
        yield "\" alt=\"";
        yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "site", [], "any", false, true, false, 7), "name", [], "any", true, true, false, 7) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "site", [], "any", false, false, false, 7), "name", [], "any", false, false, false, 7)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "site", [], "any", false, false, false, 7), "name", [], "any", false, false, false, 7), "html", null, true)) : ("Logo"));
        yield "\" class=\"block group-data-[mode=dark]/html:hidden  max-w-[120px]\">
\t\t\t</a>
\t\t</div>

\t\t<div class=\"flex gap-2 items-center\">
\t\t\t";
        // line 12
        if (array_key_exists("mobile_head_button", $context)) {
            // line 13
            yield "\t\t\t\t<a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["mobile_head_button"] ?? null), "link", [], "any", false, false, false, 13), "html", null, true);
            yield "\" class=\"p-0 w-8 h-8 rounded-full button button-outline md:hidden\">
\t\t\t\t\t<i class=\"text-base ti ti-plus\"></i>
\t\t\t\t</a>
\t\t\t";
        }
        // line 17
        yield "
\t\t\t<button @click=\"document.documentElement.dataset.mobileMenu !== 'account' ? document.documentElement.dataset.mobileMenu='account' : delete document.documentElement.dataset.mobileMenu\">
\t\t\t\t<x-avatar class=\"w-8 h-8 group-data-[mobile-menu=account]/html:outline-offset-2 group-data-[mobile-menu=account]/html:outline-1 group-data-[mobile-menu=account]/html:outline-line\" title=\"";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "first_name", [], "any", false, false, false, 19) . " ") . CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "last_name", [], "any", false, false, false, 19)), "html", null, true);
        yield "\" src=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "avatar", [], "any", false, false, false, 19), "html", null, true);
        yield "\"></x-avatar>
\t\t\t</button>

\t\t\t<button class=\"text-content-dimmed group-data-[mobile-menu=nav]/html:text-content ms-2\" @click=\" document.documentElement.dataset.mobileMenu !=='nav' ? document.documentElement.dataset.mobileMenu='nav' : delete document.documentElement.dataset.mobileMenu\">
\t\t\t\t<i class=\"text-2xl ti ti-menu-deep group-data-[mobile-menu=nav]/html:hidden rotate-180 block\"></i>
\t\t\t\t<i class=\"hidden text-2xl ti ti-x group-data-[mobile-menu=nav]/html:inline\"></i>
\t\t\t</button>
\t\t</div>
\t</div>

\t<hr class=\"-mt-px\"/>

\t<div class=\"hidden group-data-[mobile-menu=nav]/html:block py-4\">
\t\t";
        // line 32
        yield from $this->load("snippets/navigation.twig", 32)->unwrap()->yield($context);
        // line 33
        yield "\t</div>

\t<div class=\"hidden group-data-[mobile-menu=account]/html:flex flex-col gap-4\">
\t\t<div class=\"border-b border-line-dimmed\">
\t\t\t<div class=\"flex gap-4 justify-between items-center px-4\">
\t\t\t\t<a href=\"app/account\" class=\"flex gap-3 items-center py-4 w-full text-start\">
\t\t\t\t\t<x-avatar class=\"bg-accent text-accent-content\" title=\"";
        // line 39
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "first_name", [], "any", false, false, false, 39) . " ") . CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "last_name", [], "any", false, false, false, 39)), "html", null, true);
        yield "\" src=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "avatar", [], "any", false, false, false, 39), "html", null, true);
        yield "\"></x-avatar>

\t\t\t\t\t<div class=\"max-w-[156px]\">
\t\t\t\t\t\t<div class=\"overflow-hidden font-bold text-ellipsis\">
\t\t\t\t\t\t\t";
        // line 43
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "first_name", [], "any", false, false, false, 43), "html", null, true);
        yield "
\t\t\t\t\t\t\t";
        // line 44
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "last_name", [], "any", false, false, false, 44), "html", null, true);
        yield "
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"overflow-hidden mt-1 text-sm text-content-dimmed text-ellipsis\">
\t\t\t\t\t\t\t";
        // line 48
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "email", [], "any", false, false, false, 48), "html", null, true);
        yield "</div>
\t\t\t\t\t</div>
\t\t\t\t</a>

\t\t\t\t";
        // line 52
        if (( !CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "color_scheme", [], "any", false, true, false, 52), "modes", [], "any", true, true, false, 52) || (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "color_scheme", [], "any", false, false, false, 52), "modes", [], "any", false, false, false, 52)) > 1))) {
            // line 53
            yield "\t\t\t\t\t<mode-switcher>
\t\t\t\t\t\t<button type=\"button\" class=\"w-10 h-10 text-content-dimmed hover:text-content\" @click.stop>
\t\t\t\t\t\t\t<i class=\"text-2xl ti ti-moon group-data-[mode=dark]/html:hidden\"></i>
\t\t\t\t\t\t\t<i class=\"text-2xl ti ti-sun hidden group-data-[mode=dark]/html:block\"></i>
\t\t\t\t\t\t</button>
\t\t\t\t\t</mode-switcher>
\t\t\t\t";
        }
        // line 60
        yield "\t\t\t</div>

\t\t\t";
        // line 62
        if ((($context["view_namespace"] ?? null) == "app")) {
            // line 63
            yield "\t\t\t\t<hr>

\t\t\t\t<div class=\"flex gap-4 justify-between items-center px-4\">
\t\t\t\t\t<a href=\"app/workspace\" class=\"flex gap-3 items-center py-4 w-full\">
\t\t\t\t\t\t<x-avatar :title=\"\$store.workspace.name.substring(0,1)\"></x-avatar>

\t\t\t\t\t\t<div class=\"max-w-[120px] whitespace-nowrap\">
\t\t\t\t\t\t\t<div class=\"overflow-hidden font-semibold text-ellipsis\" x-text=\"\$store.workspace.name\">
\t\t\t\t\t\t\t\t";
            // line 71
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["workspace"] ?? null), "name", [], "any", false, false, false, 71), "html", null, true);
            yield "
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t";
            // line 74
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["workspace"] ?? null), "subscription", [], "any", false, false, false, 74)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 75
                yield "\t\t\t\t\t\t\t\t<div class=\"overflow-hidden text-xs text-content-dimmed text-ellipsis\">
\t\t\t\t\t\t\t\t\t";
                // line 76
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["workspace"] ?? null), "subscription", [], "any", false, false, false, 76), "plan", [], "any", false, false, false, 76), "title", [], "any", false, false, false, 76), "html", null, true);
                yield "
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
            }
            // line 79
            yield "\t\t\t\t\t\t</div>
\t\t\t\t\t</a>

\t\t\t\t\t<button type=\"button\" class=\"w-10 h-10 text-content-dimmed hover:text-content\" x-tooltip.raw=\"";
            // line 82
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Switch workspace"), "html", null, true);
            yield "\" @click=\"modal.open('workspace-switch')\">
\t\t\t\t\t\t<i class=\"text-2xl ti ti-switch-horizontal\"></i>
\t\t\t\t\t</button>
\t\t\t\t</div>

\t\t\t";
        }
        // line 88
        yield "\t\t</div>

\t\t<ul>
\t\t\t";
        // line 91
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "role", [], "any", false, false, false, 91) == "admin")) {
            // line 92
            yield "\t\t\t\t";
            if ((($context["view_namespace"] ?? null) == "admin")) {
                // line 93
                yield "\t\t\t\t\t<li>
\t\t\t\t\t\t<a href=\"app\" class=\"flex gap-2 items-center px-4 py-2 hover:bg-intermediate hover:text-intermediate-content\">
\t\t\t\t\t\t\t<i class=\"text-2xl ti ti-sparkles\"></i>
\t\t\t\t\t\t\t";
                // line 96
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Switch to app"), "html", null, true);
                yield "
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t";
            } else {
                // line 100
                yield "\t\t\t\t\t<li>
\t\t\t\t\t\t<a href=\"admin\" class=\"flex gap-2 items-center px-4 py-2 hover:bg-intermediate hover:text-intermediate-content\">
\t\t\t\t\t\t\t<i class=\"text-2xl ti ti-lock-cog\"></i>
\t\t\t\t\t\t\t";
                // line 103
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Switch to admin"), "html", null, true);
                yield "
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t";
            }
            // line 107
            yield "\t\t\t";
        }
        // line 108
        yield "
\t\t\t";
        // line 109
        if ((($context["view_namespace"] ?? null) == "app")) {
            // line 110
            yield "\t\t\t\t<li>
\t\t\t\t\t<a href=\"app/billing\" class=\"flex gap-2 items-center px-4 py-2 hover:bg-intermediate hover:no-underline\">
\t\t\t\t\t\t<i class=\"text-2xl ti ti-credit-card\"></i>
\t\t\t\t\t\t";
            // line 113
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Billing"), "html", null, true);
            yield "
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t";
        }
        // line 117
        yield "
\t\t\t<li>
\t\t\t\t<a href=\"app/account\" class=\"flex gap-2 items-center px-4 py-2 hover:bg-intermediate hover:text-intermediate-content\">
\t\t\t\t\t<i class=\"text-2xl ti ti-user-circle\"></i>
\t\t\t\t\t";
        // line 121
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Account"), "html", null, true);
        yield "
\t\t\t\t</a>
\t\t\t</li>

\t\t\t";
        // line 125
        if (((CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "affiliates", [], "any", true, true, false, 125) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "affiliates", [], "any", false, false, false, 125), "is_enabled", [], "any", false, false, false, 125)) && (($context["view_namespace"] ?? null) == "app"))) {
            // line 126
            yield "\t\t\t\t<li>
\t\t\t\t\t<a href=\"app/affiliates\" class=\"flex gap-2 items-center px-4 py-2 hover:bg-intermediate hover:text-intermediate-content\">
\t\t\t\t\t\t<i class=\"text-2xl ti ti-coins\"></i>

\t\t\t\t\t\t";
            // line 130
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Affiliates"), "html", null, true);
            yield "
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t";
        }
        // line 134
        yield "
\t\t\t<li>
\t\t\t\t<a href=\"logout\" class=\"flex gap-2 items-center px-4 py-2 hover:bg-intermediate hover:text-intermediate-content\">
\t\t\t\t\t<i class=\"text-2xl ti ti-logout\"></i>
\t\t\t\t\t";
        // line 138
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Logout"), "html", null, true);
        yield "
\t\t\t\t</a>
\t\t\t</li>
\t\t</ul>

\t\t<hr>

\t\t<ul class=\"flex flex-col gap-2 px-4 py-2 text-xs text-content-dimmed\">
\t\t\t";
        // line 146
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "policies", [], "any", false, true, false, 146), "tos", [], "any", true, true, false, 146) &&  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "policies", [], "any", false, false, false, 146), "tos", [], "any", false, false, false, 146)))) {
            // line 147
            yield "\t\t\t\t<li>
\t\t\t\t\t<a href=\"policies/terms\" class=\"hover:text-content hover:underline\">
\t\t\t\t\t\t";
            // line 149
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Terms of services"), "html", null, true);
            yield "
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t";
        }
        // line 153
        yield "
\t\t\t";
        // line 154
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "policies", [], "any", false, true, false, 154), "privacy", [], "any", true, true, false, 154) &&  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "policies", [], "any", false, false, false, 154), "privacy", [], "any", false, false, false, 154)))) {
            // line 155
            yield "\t\t\t\t<li>
\t\t\t\t\t<a href=\"policies/privacy\" class=\"hover:text-content hover:underline\">
\t\t\t\t\t\t";
            // line 157
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Privacy policy"), "html", null, true);
            yield "
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t";
        }
        // line 161
        yield "
\t\t\t";
        // line 162
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "policies", [], "any", false, true, false, 162), "refund", [], "any", true, true, false, 162) &&  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "policies", [], "any", false, false, false, 162), "refund", [], "any", false, false, false, 162)))) {
            // line 163
            yield "\t\t\t\t<li><a href=\"policies/refund\" class=\"hover:text-content hover:underline\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Refund policy"), "html", null, true);
            yield "</a></li>
\t\t\t</ul>
\t\t";
        }
        // line 166
        yield "\t</div>
</nav>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "/sections/mobile-nav.twig";
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
        return array (  335 => 166,  328 => 163,  326 => 162,  323 => 161,  316 => 157,  312 => 155,  310 => 154,  307 => 153,  300 => 149,  296 => 147,  294 => 146,  283 => 138,  277 => 134,  270 => 130,  264 => 126,  262 => 125,  255 => 121,  249 => 117,  242 => 113,  237 => 110,  235 => 109,  232 => 108,  229 => 107,  222 => 103,  217 => 100,  210 => 96,  205 => 93,  202 => 92,  200 => 91,  195 => 88,  186 => 82,  181 => 79,  175 => 76,  172 => 75,  170 => 74,  164 => 71,  154 => 63,  152 => 62,  148 => 60,  139 => 53,  137 => 52,  130 => 48,  123 => 44,  119 => 43,  110 => 39,  102 => 33,  100 => 32,  82 => 19,  78 => 17,  70 => 13,  68 => 12,  58 => 7,  51 => 5,  47 => 4,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "/sections/mobile-nav.twig", "/home/appcloud/resources/views/sections/mobile-nav.twig");
    }
}
