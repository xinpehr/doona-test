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

/* /snippets/workspace/switcher.twig */
class __TwigTemplate_38b24e25a794a7c0cb6f8d01c52dd333 extends Template
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
            yield "\t<modal-element name=\"workspace-switch\" x-data=\"workspace\">
\t\t<div class=\"modal\">
\t\t\t<div class=\"flex justify-between items-center\">
\t\t\t\t<h2 class=\"text-xl\">";
            // line 5
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Your workspaces"), "html", null, true);
            yield "</h2>

\t\t\t\t<button class=\"flex justify-center items-center w-8 h-8 rounded-full border border-transparent bg-line-dimmed hover:border-line\" @click=\"modal.close()\" type=\"button\">
\t\t\t\t\t<i class=\"text-xl ti ti-x\"></i>
\t\t\t\t</button>
\t\t\t</div>

\t\t\t<div class=\"-mx-4 mt-4\">
\t\t\t\t<div class=\"flex gap-3 items-center p-4 w-full\">
\t\t\t\t\t<x-avatar title=\"";
            // line 14
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["workspace"] ?? null), "name", [], "any", false, false, false, 14), "html", null, true);
            yield "\" length=\"1\"></x-avatar>

\t\t\t\t\t<div class=\"max-w-[180px] whitespace-nowrap\">
\t\t\t\t\t\t<div class=\"overflow-hidden font-semibold text-ellipsis\">
\t\t\t\t\t\t\t";
            // line 18
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["workspace"] ?? null), "name", [], "any", false, false, false, 18), "html", null, true);
            yield "
\t\t\t\t\t\t</div>

\t\t\t\t\t\t";
            // line 21
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "subscription", [], "any", false, false, false, 21)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 22
                yield "\t\t\t\t\t\t\t<div class=\"overflow-hidden text-xs text-content-dimmed text-ellipsis\">
\t\t\t\t\t\t\t\t";
                // line 23
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "subscription", [], "any", false, false, false, 23), "plan", [], "any", false, false, false, 23), "title", [], "any", false, false, false, 23), "html", null, true);
                yield "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
            }
            // line 26
            yield "\t\t\t\t\t</div>

\t\t\t\t\t<span class=\"ms-auto badge badge-success\">
\t\t\t\t\t\t";
            // line 29
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("badge", "Selected"), "html", null, true);
            yield "
\t\t\t\t\t</span>
\t\t\t\t</div>

\t\t\t\t";
            // line 33
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::merge(CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "owned_workspaces", [], "any", false, false, false, 33), CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "workspaces", [], "any", false, false, false, 33)));
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
            foreach ($context['_seq'] as $context["_key"] => $context["ws"]) {
                // line 34
                yield "\t\t\t\t\t";
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["ws"], "id", [], "any", false, false, false, 34) != CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "workspace", [], "any", false, false, false, 34), "id", [], "any", false, false, false, 34))) {
                    // line 35
                    yield "\t\t\t\t\t\t<button class=\"flex gap-3 items-center p-4 w-full text-start rounded-xl border border-transparent group hover:border-line-dimmed disabled:pointer-events-none disabled:opacity-50\" @click=\"switchWorkspace(`";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["ws"], "id", [], "any", false, false, false, 35), "html", null, true);
                    yield "`)\" type=\"button\" :disabled=\"isSwithcing != null\">
\t\t\t\t\t\t\t<x-avatar title=\"";
                    // line 36
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["ws"], "name", [], "any", false, false, false, 36), "html", null, true);
                    yield "\" length=\"1\"></x-avatar>

\t\t\t\t\t\t\t<div class=\"max-w-[180px] whitespace-nowrap\">
\t\t\t\t\t\t\t\t<div class=\"overflow-hidden font-semibold text-ellipsis\">
\t\t\t\t\t\t\t\t\t";
                    // line 40
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["ws"], "name", [], "any", false, false, false, 40), "html", null, true);
                    yield "
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t";
                    // line 43
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "subscription", [], "any", false, false, false, 43)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 44
                        yield "\t\t\t\t\t\t\t\t\t<div class=\"overflow-hidden text-xs text-content-dimmed text-ellipsis\">
\t\t\t\t\t\t\t\t\t\t";
                        // line 45
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "subscription", [], "any", false, false, false, 45), "plan", [], "any", false, false, false, 45), "title", [], "any", false, false, false, 45), "html", null, true);
                        yield "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
                    }
                    // line 48
                    yield "\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<template x-if=\"isSwithcing == null\">
\t\t\t\t\t\t\t\t<span class=\"hidden ms-auto badge group-hover:flex\">
\t\t\t\t\t\t\t\t\t<i class=\"ti ti-switch-horizontal\"></i>

\t\t\t\t\t\t\t\t\t";
                    // line 54
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Switch"), "html", null, true);
                    yield "
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t</template>

\t\t\t\t\t\t\t<template x-if=\"isSwithcing == `";
                    // line 58
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["ws"], "id", [], "any", false, false, false, 58), "html", null, true);
                    yield "`\">
\t\t\t\t\t\t\t\t<span class=\"ms-auto\">
\t\t\t\t\t\t\t\t\t";
                    // line 60
                    yield from $this->load("/snippets/spinner.twig", 60)->unwrap()->yield($context);
                    // line 61
                    yield "\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t</template>
\t\t\t\t\t\t</button>
\t\t\t\t\t";
                }
                // line 65
                yield "\t\t\t\t";
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
            unset($context['_seq'], $context['_key'], $context['ws'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 66
            yield "\t\t\t</div>

\t\t\t<div class=\"mt-8\">
\t\t\t\t";
            // line 69
            if (((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "workspace_cap", [], "any", false, false, false, 69) == null) || (CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "workspace_cap", [], "any", false, false, false, 69) > Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "owned_workspaces", [], "any", false, false, false, 69))))) {
                // line 70
                yield "\t\t\t\t\t<button class=\"w-full button button-accent\" type=\"button\" @click=\"modal.open('new-workspace')\">
\t\t\t\t\t\t<i class=\"ti ti-plus\"></i>

\t\t\t\t\t\t";
                // line 73
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Add new workspace"), "html", null, true);
                yield "
\t\t\t\t\t</button>
\t\t\t\t";
            } else {
                // line 76
                yield "\t\t\t\t\t<div x-tooltip.raw=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("You have reached the maximum number of workspaces"), "html", null, true);
                yield "\">
\t\t\t\t\t\t<button class=\"w-full button button-accent\" type=\"button\" disabled>
\t\t\t\t\t\t\t";
                // line 78
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Add new workspace"), "html", null, true);
                yield "
\t\t\t\t\t\t\t<i class=\"ti ti-lock\"></i>
\t\t\t\t\t\t</button>
\t\t\t\t\t</div>
\t\t\t\t";
            }
            // line 83
            yield "\t\t\t</div>
\t\t</div>
\t</modal-element>

\t<modal-element name=\"new-workspace\" x-data=\"workspace\">
\t\t<x-form>
\t\t\t<form class=\"flex flex-col gap-8 modal\" @submit.prevent=\"create(\$refs.name.value)\">
\t\t\t\t<div class=\"flex justify-between items-center\">
\t\t\t\t\t<h2 class=\"text-xl\">";
            // line 91
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "New workspace"), "html", null, true);
            yield "</h2>

\t\t\t\t\t<button class=\"flex justify-center items-center w-8 h-8 rounded-full border border-transparent bg-line-dimmed hover:border-line\" @click=\"modal.close()\" type=\"button\">
\t\t\t\t\t\t<i class=\"text-xl ti ti-x\"></i>
\t\t\t\t\t</button>
\t\t\t\t</div>

\t\t\t\t<div>
\t\t\t\t\t<label for=\"new-workspace-name\">";
            // line 99
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Workspace name"), "html", null, true);
            yield "</label>
\t\t\t\t\t<input type=\"text\" class=\"mt-2 input\" id=\"new-workspace-name\" required x-ref=\"name\">
\t\t\t\t</div>

\t\t\t\t<div class=\"flex gap-4 justify-end\">
\t\t\t\t\t<button type=\"button\" class=\"button button-outline\" @click=\"modal.close()\" type=\"button\">
\t\t\t\t\t\t";
            // line 105
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Cancel"), "html", null, true);
            yield "
\t\t\t\t\t</button>

\t\t\t\t\t<button type=\"submit\" class=\"button button-accent\" :processing=\"isProcessing\">
\t\t\t\t\t\t";
            // line 109
            yield from $this->load("/snippets/spinner.twig", 109)->unwrap()->yield($context);
            // line 110
            yield "
\t\t\t\t\t\t";
            // line 111
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Create workspace"), "html", null, true);
            yield "
\t\t\t\t\t</button>
\t\t\t\t</div>
\t\t\t</form>
\t\t</x-form>
\t</modal-element>
";
        }
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "/snippets/workspace/switcher.twig";
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
        return array (  262 => 111,  259 => 110,  257 => 109,  250 => 105,  241 => 99,  230 => 91,  220 => 83,  212 => 78,  206 => 76,  200 => 73,  195 => 70,  193 => 69,  188 => 66,  174 => 65,  168 => 61,  166 => 60,  161 => 58,  154 => 54,  146 => 48,  140 => 45,  137 => 44,  135 => 43,  129 => 40,  122 => 36,  117 => 35,  114 => 34,  97 => 33,  90 => 29,  85 => 26,  79 => 23,  76 => 22,  74 => 21,  68 => 18,  61 => 14,  49 => 5,  44 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "/snippets/workspace/switcher.twig", "/home/appcloud/resources/views/snippets/workspace/switcher.twig");
    }
}
