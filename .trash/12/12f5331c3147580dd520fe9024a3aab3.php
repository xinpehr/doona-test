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

/* sections/header.twig */
class __TwigTemplate_08cd58534342d0dee3a0a121e81f2ecd extends Template
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
        yield "<header class=\"flex justify-between items-center py-4 md:py-6\">
\t<div>
\t\t<a href=\"app\">
\t\t\t<img src=\"";
        // line 4
        yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "brand", [], "any", false, true, false, 4), "logo_dark", [], "any", true, true, false, 4) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "brand", [], "any", false, false, false, 4), "logo_dark", [], "any", false, false, false, 4)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "brand", [], "any", false, false, false, 4), "logo_dark", [], "any", false, false, false, 4), "html", null, true)) : ("/assets/logo-light.svg"));
        yield "\" alt=\"";
        yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "site", [], "any", false, true, false, 4), "name", [], "any", true, true, false, 4) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "site", [], "any", false, false, false, 4), "name", [], "any", false, false, false, 4)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "site", [], "any", false, false, false, 4), "name", [], "any", false, false, false, 4), "html", null, true)) : ("Logo"));
        yield "\" class=\"hidden group-data-[mode=dark]/html:block max-w-[140px]\">

\t\t\t<img src=\"";
        // line 6
        yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "brand", [], "any", false, true, false, 6), "logo", [], "any", true, true, false, 6) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "brand", [], "any", false, false, false, 6), "logo", [], "any", false, false, false, 6)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "brand", [], "any", false, false, false, 6), "logo", [], "any", false, false, false, 6), "html", null, true)) : ("/assets/logo-dark.svg"));
        yield "\" alt=\"";
        yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "site", [], "any", false, true, false, 6), "name", [], "any", true, true, false, 6) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "site", [], "any", false, false, false, 6), "name", [], "any", false, false, false, 6)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "site", [], "any", false, false, false, 6), "name", [], "any", false, false, false, 6), "html", null, true)) : ("Logo"));
        yield "\" class=\"block group-data-[mode=dark]/html:hidden  max-w-[140px]\">
\t\t</a>
\t</div>

\t<div class=\"flex gap-2 items-center\">
\t\t";
        // line 11
        if (( !CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "color_scheme", [], "any", false, true, false, 11), "modes", [], "any", true, true, false, 11) || (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "color_scheme", [], "any", false, false, false, 11), "modes", [], "any", false, false, false, 11)) > 1))) {
            // line 12
            yield "\t\t\t<mode-switcher>
\t\t\t\t<button class=\"flex justify-center items-center w-10 h-10 text-2xl rounded-full bg-intermediate hover:bg-accent hover:text-accent-content\">
\t\t\t\t\t<i class=\"ti ti-moon group-data-[mode=dark]/html:hidden\"></i>
\t\t\t\t\t<i class=\"ti ti-sun hidden group-data-[mode=dark]/html:block\"></i>
\t\t\t\t</button>
\t\t\t</mode-switcher>
\t\t";
        }
        // line 19
        yield "
\t\t";
        // line 20
        if (array_key_exists("user", $context)) {
            // line 21
            yield "\t\t\t<div class=\"flex relative items-center group\" @click.outside=\"\$refs.usermenu.removeAttribute('data-open')\">

\t\t\t\t<div class=\"h-6 w-px bg-line-dimmed group-hover:opacity-0 group-data-open:opacity-0\"></div>

\t\t\t\t<button class=\"flex items-center gap-2 px-4 py-2 rounded-lg hover:bg-intermediate group-data-open:bg-intermediate\" @click=\"\$refs.usermenu.toggleAttribute('data-open')\">
\t\t\t\t\t<x-avatar class=\"bg-accent text-accent-content\" title=\"";
            // line 26
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "first_name", [], "any", false, false, false, 26) . " ") . CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "last_name", [], "any", false, false, false, 26)), "html", null, true);
            yield "\" src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "avatar", [], "any", false, false, false, 26), "html", null, true);
            yield "\"></x-avatar>
\t\t\t\t\t<i class=\"text-xl ti ti-chevron-down\"></i>
\t\t\t\t</button>

\t\t\t\t<div class=\"w-60 menu\" @click=\"\$el.removeAttribute('data-open')\" x-ref=\"usermenu\">

\t\t\t\t\t<a href=\"app/account\" class=\"flex gap-3 items-center p-4 w-full text-start hover:bg-intermediate hover:no-underline\">
\t\t\t\t\t\t<x-avatar class=\"bg-accent text-accent-content\" title=\"";
            // line 33
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "first_name", [], "any", false, false, false, 33) . " ") . CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "last_name", [], "any", false, false, false, 33)), "html", null, true);
            yield "\" src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "avatar", [], "any", false, false, false, 33), "html", null, true);
            yield "\"></x-avatar>

\t\t\t\t\t\t<div class=\"max-w-[156px]\">
\t\t\t\t\t\t\t<div class=\"overflow-hidden font-bold text-ellipsis\">
\t\t\t\t\t\t\t\t";
            // line 37
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "first_name", [], "any", false, false, false, 37), "html", null, true);
            yield "
\t\t\t\t\t\t\t\t";
            // line 38
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "last_name", [], "any", false, false, false, 38), "html", null, true);
            yield "
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div class=\"overflow-hidden mt-1 text-sm text-content-dimmed text-ellipsis\">
\t\t\t\t\t\t\t\t";
            // line 42
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "email", [], "any", false, false, false, 42), "html", null, true);
            yield "</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</a>

\t\t\t\t\t";
            // line 46
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "role", [], "any", false, false, false, 46) == "admin")) {
                // line 47
                yield "\t\t\t\t\t\t<hr class=\"border-t border-line-dimmed\">
\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t";
                // line 49
                if ((($context["view_namespace"] ?? null) == "admin")) {
                    // line 50
                    yield "\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a href=\"app\" class=\"flex gap-2 items-center px-4 py-2 hover:bg-intermediate hover:no-underline\">
\t\t\t\t\t\t\t\t\t\t<i class=\"text-2xl ti ti-sparkles\"></i>
\t\t\t\t\t\t\t\t\t\t";
                    // line 53
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Switch to app"), "html", null, true);
                    yield "
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t";
                } else {
                    // line 57
                    yield "\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a href=\"admin/presets\" class=\"flex gap-2 items-center px-4 py-2 hover:bg-intermediate hover:no-underline\">
\t\t\t\t\t\t\t\t\t\t<i class=\"text-2xl ti ti-lock-cog\"></i>
\t\t\t\t\t\t\t\t\t\t";
                    // line 60
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Switch to admin"), "html", null, true);
                    yield "
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t";
                }
                // line 64
                yield "\t\t\t\t\t\t</ul>
\t\t\t\t\t";
            }
            // line 66
            yield "
\t\t\t\t\t";
            // line 67
            if ((($context["view_namespace"] ?? null) == "app")) {
                // line 68
                yield "\t\t\t\t\t\t<hr class=\"border-t border-line-dimmed\">

\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t<li><a href=\"app/documents\" class=\"flex gap-2 items-center px-4 py-2 hover:bg-intermediate hover:no-underline\"><i class=\"text-2xl ti ti-files\"></i>";
                // line 71
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Documents"), "html", null, true);
                yield "</a></li>

\t\t\t\t\t\t\t<li><a href=\"app/billing\" class=\"flex gap-2 items-center px-4 py-2 hover:bg-intermediate hover:no-underline\"><i class=\"text-2xl ti ti-credit-card\"></i>";
                // line 73
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Billing"), "html", null, true);
                yield "</a></li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t";
            }
            // line 76
            yield "
\t\t\t\t\t<hr class=\"border-t border-line-dimmed\">

\t\t\t\t\t<ul>
\t\t\t\t\t\t<li><a href=\"app/account\" class=\"flex gap-2 items-center px-4 py-2 hover:bg-intermediate hover:no-underline\"><i class=\"text-2xl ti ti-user-circle\"></i>";
            // line 80
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Account"), "html", null, true);
            yield "</a></li>

\t\t\t\t\t\t<li><a href=\"logout\" class=\"flex gap-2 items-center px-4 py-2 hover:bg-intermediate hover:no-underline\"><i class=\"text-2xl ti ti-logout\"></i>";
            // line 82
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Logout"), "html", null, true);
            yield "</a></li>
\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t</div>
\t\t";
        } else {
            // line 87
            yield "\t\t\t<div class=\"flex relative items-center group\" @click.outside=\"\$refs.locale.removeAttribute('data-open')\">

\t\t\t\t<button class=\"flex justify-center items-center w-10 h-10 text-2xl rounded-full bg-intermediate hover:bg-accent hover:text-accent-content\" @click=\"\$refs.locale.hasAttribute('data-open') ? \$refs.locale.removeAttribute('data-open') : \$refs.locale.setAttribute('data-open', '')\" aria-label=\"Language selector\">
\t\t\t\t\t<i class=\"ti ti-world\"></i>
\t\t\t\t</button>

\t\t\t\t<div class=\"w-auto menu\" @click=\"\$refs.locale.removeAttribute('data-open')\" x-ref=\"locale\">

\t\t\t\t\t<ul>
\t\t\t\t\t\t";
            // line 96
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["locales"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["locale"]) {
                // line 97
                yield "\t\t\t\t\t\t\t";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["locale"], "enabled", [], "any", false, false, false, 97)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 98
                    yield "\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a href=\"/";
                    // line 99
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["locale"], "code", [], "any", false, false, false, 99), "html", null, true);
                    yield "\" class=\"block px-4 py-2 w-full hover:bg-intermediate hover:no-underline\" @click.prevent=\"document.cookie = `locale=";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["locale"], "code", [], "any", false, false, false, 99), "html", null, true);
                    yield "; expires=\${new Date(new Date().getTime()+1000*60*60*24*365).toGMTString()}; path=/`; window.location.reload();\">
\t\t\t\t\t\t\t\t\t\t";
                    // line 100
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["locale"], "label", [], "any", false, false, false, 100), "html", null, true);
                    yield "
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t";
                }
                // line 104
                yield "\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['locale'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 105
            yield "\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t</div>
\t\t";
        }
        // line 109
        yield "\t</div>
</header>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "sections/header.twig";
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
        return array (  248 => 109,  242 => 105,  236 => 104,  229 => 100,  223 => 99,  220 => 98,  217 => 97,  213 => 96,  202 => 87,  194 => 82,  189 => 80,  183 => 76,  177 => 73,  172 => 71,  167 => 68,  165 => 67,  162 => 66,  158 => 64,  151 => 60,  146 => 57,  139 => 53,  134 => 50,  132 => 49,  128 => 47,  126 => 46,  119 => 42,  112 => 38,  108 => 37,  99 => 33,  87 => 26,  80 => 21,  78 => 20,  75 => 19,  66 => 12,  64 => 11,  54 => 6,  47 => 4,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "sections/header.twig", "/home/appcloud/resources/views/sections/header.twig");
    }
}
