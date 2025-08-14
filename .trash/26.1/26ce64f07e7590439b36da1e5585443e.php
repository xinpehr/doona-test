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

/* /snippets/account-menu.twig */
class __TwigTemplate_33ade44a64a91b8543f86bff90b9aa30 extends Template
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
        yield "<div class=\"relative\" @click.outside=\"\$refs.usermenu.removeAttribute('data-open')\">

\t<div class=\"start-0 top-auto end-auto bottom-full mb-1 w-60 text-base menu max-h-max peer\" x-ref=\"usermenu\" @click=\"\$el.removeAttribute('data-open')\">
\t\t<a href=\"app/account\" class=\"flex gap-3 items-center p-4 w-full text-start hover:bg-intermediate hover:text-intermediate-content\">
\t\t\t<x-avatar class=\"bg-accent text-accent-content\" title=\"";
        // line 5
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "first_name", [], "any", false, false, false, 5) . " ") . CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "last_name", [], "any", false, false, false, 5)), "html", null, true);
        yield "\" src=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "avatar", [], "any", false, false, false, 5), "html", null, true);
        yield "\"></x-avatar>

\t\t\t<div class=\"max-w-[156px]\">
\t\t\t\t<div class=\"overflow-hidden font-bold text-ellipsis\">
\t\t\t\t\t";
        // line 9
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "first_name", [], "any", false, false, false, 9), "html", null, true);
        yield "
\t\t\t\t\t";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "last_name", [], "any", false, false, false, 10), "html", null, true);
        yield "
\t\t\t\t</div>

\t\t\t\t<div class=\"overflow-hidden mt-1 text-sm text-content-dimmed text-ellipsis\">
\t\t\t\t\t";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "email", [], "any", false, false, false, 14), "html", null, true);
        yield "</div>
\t\t\t</div>
\t\t</a>

\t\t<hr class=\"border-t border-line-dimmed\">
\t\t<ul>
\t\t\t";
        // line 20
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "role", [], "any", false, false, false, 20) == "admin")) {
            // line 21
            yield "\t\t\t\t";
            if ((($context["view_namespace"] ?? null) == "admin")) {
                // line 22
                yield "\t\t\t\t\t<li>
\t\t\t\t\t\t<a href=\"app\" class=\"flex gap-2 items-center px-4 py-2 hover:bg-intermediate hover:text-intermediate-content\">
\t\t\t\t\t\t\t<i class=\"ti ti-sparkles\"></i>
\t\t\t\t\t\t\t";
                // line 25
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Switch to app"), "html", null, true);
                yield "
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t";
            } else {
                // line 29
                yield "\t\t\t\t\t<li>
\t\t\t\t\t\t<a href=\"admin\" class=\"flex gap-2 items-center px-4 py-2 hover:bg-intermediate hover:text-intermediate-content\">
\t\t\t\t\t\t\t<i class=\"ti ti-lock-cog\"></i>
\t\t\t\t\t\t\t";
                // line 32
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Switch to admin"), "html", null, true);
                yield "
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t";
            }
            // line 36
            yield "\t\t\t";
        }
        // line 37
        yield "\t\t</ul>

\t\t<hr class=\"border-t border-line-dimmed\">

\t\t<ul>
\t\t\t<li>
\t\t\t\t<a href=\"app/account\" class=\"flex gap-2 items-center px-4 py-2 hover:bg-intermediate hover:text-intermediate-content\">
\t\t\t\t\t<i class=\"ti ti-user-circle\"></i>

\t\t\t\t\t";
        // line 46
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Account"), "html", null, true);
        yield "
\t\t\t\t</a>
\t\t\t</li>

\t\t\t";
        // line 50
        if (((CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "affiliates", [], "any", true, true, false, 50) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "affiliates", [], "any", false, false, false, 50), "is_enabled", [], "any", false, false, false, 50)) && (($context["view_namespace"] ?? null) == "app"))) {
            // line 51
            yield "\t\t\t\t<li>
\t\t\t\t\t<a href=\"app/affiliates\" class=\"flex gap-2 items-center px-4 py-2 hover:bg-intermediate hover:text-intermediate-content\">
\t\t\t\t\t\t<i class=\"ti ti-coins\"></i>

\t\t\t\t\t\t";
            // line 55
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Affiliates"), "html", null, true);
            yield "
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t";
        }
        // line 59
        yield "
\t\t\t<li>
\t\t\t\t<a href=\"logout\" class=\"flex gap-2 items-center px-4 py-2 hover:bg-intermediate hover:text-intermediate-content\">
\t\t\t\t\t<i class=\"ti ti-logout\"></i>

\t\t\t\t\t";
        // line 64
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Logout"), "html", null, true);
        yield "
\t\t\t\t</a>
\t\t\t</li>
\t\t</ul>

\t\t<hr class=\"border-t border-line-dimmed\">

\t\t<ul class=\"flex flex-col gap-2 px-4 py-2 text-xs text-content-dimmed\">
\t\t\t";
        // line 72
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "role", [], "any", false, false, false, 72) == "admin")) {
            // line 73
            yield "\t\t\t\t<li>
\t\t\t\t\t<a href=\"admin/api-docs\" class=\"flex gap-1 items-center hover:text-content group\" target=\"_blank\">
\t\t\t\t\t\t<span class=\"group-hover:underline\">
\t\t\t\t\t\t\t";
            // line 76
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Admin API Docs"), "html", null, true);
            yield "
\t\t\t\t\t\t</span>

\t\t\t\t\t\t<i class=\"text-xs ti ti-external-link\"></i>
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t";
        }
        // line 83
        yield "
\t\t\t";
        // line 84
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "policies", [], "any", false, true, false, 84), "tos", [], "any", true, true, false, 84) &&  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "policies", [], "any", false, false, false, 84), "tos", [], "any", false, false, false, 84)))) {
            // line 85
            yield "\t\t\t\t<li>
\t\t\t\t\t<a href=\"policies/terms\" class=\"hover:text-content hover:underline\">
\t\t\t\t\t\t";
            // line 87
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Terms of services"), "html", null, true);
            yield "
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t";
        }
        // line 91
        yield "
\t\t\t";
        // line 92
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "policies", [], "any", false, true, false, 92), "privacy", [], "any", true, true, false, 92) &&  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "policies", [], "any", false, false, false, 92), "privacy", [], "any", false, false, false, 92)))) {
            // line 93
            yield "\t\t\t\t<li>
\t\t\t\t\t<a href=\"policies/privacy\" class=\"hover:text-content hover:underline\">
\t\t\t\t\t\t";
            // line 95
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Privacy policy"), "html", null, true);
            yield "
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t";
        }
        // line 99
        yield "
\t\t\t";
        // line 100
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "policies", [], "any", false, true, false, 100), "refund", [], "any", true, true, false, 100) &&  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "policies", [], "any", false, false, false, 100), "refund", [], "any", false, false, false, 100)))) {
            // line 101
            yield "\t\t\t\t<li>
\t\t\t\t\t<a href=\"policies/refund\" class=\"hover:text-content hover:underline\">
\t\t\t\t\t\t";
            // line 103
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Refund policy"), "html", null, true);
            yield "
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t";
        }
        // line 107
        yield "\t\t</ul>
\t</div>

\t<button class=\"flex items-center w-full gap-2 rounded-lg text-intermediate-content-dimmed hover:text-content peer-data-open:text-intermediate-content text-start\" @click=\"\$refs.usermenu.toggleAttribute('data-open')\">
\t\t<x-avatar class=\"bg-accent text-accent-content\" title=\"";
        // line 111
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "first_name", [], "any", false, false, false, 111) . " ") . CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "last_name", [], "any", false, false, false, 111)), "html", null, true);
        yield "\" src=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "avatar", [], "any", false, false, false, 111), "html", null, true);
        yield "\"></x-avatar>

\t\t<div class=\"max-w-[128px] whitespace-nowrap\">
\t\t\t<div class=\"overflow-hidden font-bold text-intermediate-content text-ellipsis\">
\t\t\t\t";
        // line 115
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "first_name", [], "any", false, false, false, 115), "html", null, true);
        yield "
\t\t\t\t";
        // line 116
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "last_name", [], "any", false, false, false, 116), "html", null, true);
        yield "
\t\t\t</div>

\t\t\t<div class=\"overflow-hidden text-xs text-intermediate-content-dimmed text-ellipsis\">
\t\t\t\t";
        // line 120
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "subscription", [], "any", false, false, false, 120)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "subscription", [], "any", false, false, false, 120), "plan", [], "any", false, false, false, 120), "title", [], "any", false, false, false, 120), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "email", [], "any", false, false, false, 120), "html", null, true)));
        yield "
\t\t\t</div>
\t\t</div>

\t\t<i class=\"text-2xl ms-auto ti ti-dots-vertical\"></i>
\t</button>
</div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "/snippets/account-menu.twig";
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
        return array (  251 => 120,  244 => 116,  240 => 115,  231 => 111,  225 => 107,  218 => 103,  214 => 101,  212 => 100,  209 => 99,  202 => 95,  198 => 93,  196 => 92,  193 => 91,  186 => 87,  182 => 85,  180 => 84,  177 => 83,  167 => 76,  162 => 73,  160 => 72,  149 => 64,  142 => 59,  135 => 55,  129 => 51,  127 => 50,  120 => 46,  109 => 37,  106 => 36,  99 => 32,  94 => 29,  87 => 25,  82 => 22,  79 => 21,  77 => 20,  68 => 14,  61 => 10,  57 => 9,  48 => 5,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "/snippets/account-menu.twig", "/home/appcloud/resources/views/snippets/account-menu.twig");
    }
}
