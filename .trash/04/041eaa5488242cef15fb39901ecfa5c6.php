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

/* sections/dashboard/quick-access.twig */
class __TwigTemplate_cc04d074fffc1dec288a3d942f4cfb13 extends Template
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
        yield "<div>
\t<div id=\"quick-access\" class=\"relative group\" data-collapsed x-init=\"\$el.removeAttribute('data-collapsed')\" x-data=\"quickAccess\">
\t\t<div class=\"flex flex-col gap-6\">
\t\t\t<div class=\"flex flex-col items-center\">
\t\t\t\t<div class=\"text-content-dimmed transition-all flex items-center gap-2 duration-1000 delay-250 group-[[data-collapsed]]:opacity-0 group-[[data-collapsed]]:invisible group-[[data-collapsed]]:translate-y-3\">
\t\t\t\t\t<span>👋</span>
\t\t\t\t\t";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("greeting", "Hello, %s!", CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "first_name", [], "any", false, false, false, 7)), "html", null, true);
        yield "
\t\t\t\t</div>

\t\t\t\t<h1 class=\"text-2xl font-bold transition-all duration-500 group-[[data-collapsed]]:opacity-0 group-[[data-collapsed]]:invisible group-[[data-collapsed]]:translate-y-1\">
\t\t\t\t\t";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("greeting", "How can I assist you?"), "html", null, true);
        yield "
\t\t\t\t</h1>
\t\t\t</div>

\t\t\t<div class=\"flex flex-col gap-4\">
\t\t\t\t<form action=\"app/chat\" method=\"GET\" class=\"relative\">
\t\t\t\t\t<div class=\"relative p-1 rounded-3xl bg-line-dimmed focus-within:bg-gradient-from focus-within:bg-linear-to-br focus-within:from-gradient-from focus-within:to-gradient-to\">
\t\t\t\t\t\t<input type=\"text\" name=\"q\" placeholder=\"";
        // line 18
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Ask anything..."), "html", null, true);
        yield "\" autocomplete=\"off\" class=\"w-full block border-none h-14 text-base p-4 bg-main rounded-[1.25rem] text-content placeholder:text-content-dimmed focus:ring-0 focus:outline-hidden peer\" x-ref=\"input\">

\t\t\t\t\t\t";
        // line 20
        $context["kybdcls"] = "absolute text-content-dimmed items-center justify-center gap-1 px-4 text-sm transition-all rounded-lg pointer-events-none h-11 font-primary top-1/2 -translate-y-1/2 end-2";
        // line 21
        yield "
\t\t\t\t\t\t<kbd class=\"";
        // line 22
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["kybdcls"] ?? null), "html", null, true);
        yield " font-medium peer-focus:invisible peer-focus:opacity-0 hidden md:flex rtl:start-2 rtl:end-auto\" dir=\"ltr\">
\t\t\t\t\t\t\t<span class=\"-mr-0.5\">⌘</span>K
\t\t\t\t\t\t</kbd>

\t\t\t\t\t\t<kbd class=\"";
        // line 26
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["kybdcls"] ?? null), "html", null, true);
        yield " font-medium invisible opacity-0 peer-focus:peer-placeholder-shown:visible peer-focus:peer-placeholder-shown:opacity-100 hidden md:flex\">
\t\t\t\t\t\t\t";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("keyboard", "ESC"), "html", null, true);
        yield "
\t\t\t\t\t\t</kbd>

\t\t\t\t\t\t<button type=\"submit\" class=\"absolute top-1/2 -translate-y-1/2 end-3 button button-accent bg-linear-to-br from-gradient-from to-gradient-to rounded-2xl p-0 w-10 h-10 peer-placeholder-shown:pointer-events-none peer-placeholder-shown:invisible peer-placeholder-shown:opacity-0\">
\t\t\t\t\t\t\t<i class=\"ti ti-arrow-right text-2xl\"></i>
\t\t\t\t\t\t</button>
\t\t\t\t\t</div>
\t\t\t\t</form>
\t\t\t\t
\t\t\t\t";
        // line 36
        $context["links"] = [];
        // line 37
        yield "
\t\t\t\t";
        // line 38
        if ((($tmp = ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, true, false, 38), "transcriber", [], "any", false, true, false, 38), "is_enabled", [], "any", true, true, false, 38)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, false, false, 38), "transcriber", [], "any", false, false, false, 38), "is_enabled", [], "any", false, false, false, 38), false)) : (false))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 39
            yield "\t\t\t\t\t";
            $context["links"] = Twig\Extension\CoreExtension::merge(($context["links"] ?? null), [["url" => "/app/transcriber", "label" => __("Transcribe audio"), "icon" => "transcriber.twig"]]);
            // line 46
            yield "\t\t\t\t";
        }
        // line 47
        yield "
\t\t\t\t";
        // line 48
        if ((($tmp = ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, true, false, 48), "voice_isolator", [], "any", false, true, false, 48), "is_enabled", [], "any", true, true, false, 48)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, false, false, 48), "voice_isolator", [], "any", false, false, false, 48), "is_enabled", [], "any", false, false, false, 48), false)) : (false))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 49
            yield "\t\t\t\t\t";
            $context["links"] = Twig\Extension\CoreExtension::merge(($context["links"] ?? null), [["url" => "/app/voice-isolator", "label" => __("Isolate sounds"), "icon" => "voice-isolator.twig"]]);
            // line 56
            yield "\t\t\t\t";
        }
        // line 57
        yield "\t\t\t\t
\t\t\t\t";
        // line 58
        if ((($tmp = ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, true, false, 58), "video", [], "any", false, true, false, 58), "is_enabled", [], "any", true, true, false, 58)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, false, false, 58), "video", [], "any", false, false, false, 58), "is_enabled", [], "any", false, false, false, 58), false)) : (false))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 59
            yield "\t\t\t\t\t";
            $context["links"] = Twig\Extension\CoreExtension::merge(($context["links"] ?? null), [["url" => "/app/video", "label" => __("Create videos"), "icon" => "video.twig"]]);
            // line 66
            yield "\t\t\t\t";
        }
        // line 67
        yield "\t\t\t\t
\t\t\t\t";
        // line 68
        if ((($tmp = ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, true, false, 68), "imagine", [], "any", false, true, false, 68), "is_enabled", [], "any", true, true, false, 68)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, false, false, 68), "imagine", [], "any", false, false, false, 68), "is_enabled", [], "any", false, false, false, 68), false)) : (false))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 69
            yield "\t\t\t\t\t";
            $context["links"] = Twig\Extension\CoreExtension::merge(($context["links"] ?? null), [["url" => "/app/imagine", "label" => __("Create images"), "icon" => "imagine.twig"]]);
            // line 76
            yield "\t\t\t\t";
        }
        // line 77
        yield "
\t\t\t\t";
        // line 78
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["links"] ?? null)) > 0)) {
            // line 79
            yield "\t\t\t\t\t<div class=\"links hidden md:flex items-center justify-center gap-2\">
\t\t\t\t\t\t";
            // line 80
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["links"] ?? null));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["link"]) {
                // line 81
                yield "\t\t\t\t\t\t\t<a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["link"], "url", [], "any", false, false, false, 81), "html", null, true);
                yield "\" class=\"button button-sm button-outline rounded-full\">
\t\t\t\t\t\t\t\t";
                // line 82
                yield from $this->load(("snippets/icons/" . CoreExtension::getAttribute($this->env, $this->source, $context["link"], "icon", [], "any", false, false, false, 82)), 82)->unwrap()->yield($context);
                // line 83
                yield "
\t\t\t\t\t\t\t\t";
                // line 84
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["link"], "label", [], "any", false, false, false, 84), "html", null, true);
                yield "
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['link'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 87
            yield "\t\t\t\t\t</div>
\t\t\t\t";
        }
        // line 89
        yield "\t\t\t</div>
\t\t</div>
\t</div>

\t<div class=\"scroll pt-1\" x-ref=\"explore\">
\t\t<button type=\"button\" class=\"text-xs text-content-dimmed hover:text-content inline-flex items-center gap-1\" @click=\"\$refs.explore.scrollIntoView({ behavior: 'smooth' });\">
\t\t\t<i class=\"ti ti-arrow-down\"></i>

\t\t\t";
        // line 97
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Scroll to explore"), "html", null, true);
        yield "
\t\t</button>
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
        return "sections/dashboard/quick-access.twig";
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
        return array (  212 => 97,  202 => 89,  198 => 87,  181 => 84,  178 => 83,  176 => 82,  171 => 81,  154 => 80,  151 => 79,  149 => 78,  146 => 77,  143 => 76,  140 => 69,  138 => 68,  135 => 67,  132 => 66,  129 => 59,  127 => 58,  124 => 57,  121 => 56,  118 => 49,  116 => 48,  113 => 47,  110 => 46,  107 => 39,  105 => 38,  102 => 37,  100 => 36,  88 => 27,  84 => 26,  77 => 22,  74 => 21,  72 => 20,  67 => 18,  57 => 11,  50 => 7,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "sections/dashboard/quick-access.twig", "/home/appcloud/resources/views/sections/dashboard/quick-access.twig");
    }
}
