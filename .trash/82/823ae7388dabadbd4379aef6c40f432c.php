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

/* snippets/audience.twig */
class __TwigTemplate_ffcceefed94736bf6a2f8098caee0eee extends Template
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
        yield "<div x-data=\"audience(";
        yield (((array_key_exists("ref", $context) &&  !(null === $context["ref"]))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["ref"], "html", null, true)) : ("preview"));
        yield ")\" x-model=\"";
        yield (((array_key_exists("ref", $context) &&  !(null === $context["ref"]))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["ref"], "html", null, true)) : ("preview"));
        yield "\" x-modelable=\"item\">

\t<template x-if=\"item\">
\t\t<button type=\"button\" class=\"button button-dimmed button-xs\" @click=\"modal.open('audience-modal')\">
\t\t\t<template x-if=\"item.visibility === 0\">
\t\t\t\t<span class=\"flex gap-1 items-center\">
\t\t\t\t\t<i class=\"ti ti-lock\"></i>
\t\t\t\t\t";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("audience", "Only me"), "html", null, true);
        yield "
\t\t\t\t</span>
\t\t\t</template>

\t\t\t<template x-if=\"item.visibility === 1\">
\t\t\t\t<span class=\"flex gap-1 items-center\">
\t\t\t\t\t<i class=\"ti ti-building\"></i>
\t\t\t\t\t";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("audience", "Workspace"), "html", null, true);
        yield "
\t\t\t\t</span>
\t\t\t</template>
\t\t</button>
\t</template>

\t<template x-if=\"item\">
\t\t<modal-element name=\"audience-modal\">
\t\t\t<div class=\"flex flex-col gap-6 modal\">
\t\t\t\t<div class=\"flex justify-between items-center\">
\t\t\t\t\t<h2 class=\"text-xl\">";
        // line 25
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Select audience"), "html", null, true);
        yield "</h2>

\t\t\t\t\t<button class=\"flex justify-center items-center w-8 h-8 rounded-full border border-transparent bg-line-dimmed hover:border-line\" @click=\"modal.close()\" type=\"button\">
\t\t\t\t\t\t<i class=\"text-xl ti ti-x\"></i>
\t\t\t\t\t</button>
\t\t\t\t</div>

\t\t\t\t<div class=\"flex flex-col gap-1\">
\t\t\t\t\t<template x-if=\"item.user && item.user.id != \$store.user.id\">
\t\t\t\t\t\t<div class=\"flex gap-4 items-center box group\">
\t\t\t\t\t\t\t<x-avatar :title=\"`\${item.user.first_name} \${item.user.last_name}`\" :src=\"item.user.avatar\"></x-avatar>

\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t<div class=\"font-bold\" x-text=\"`\${item.user.first_name} \${item.user.last_name}`\"></div>
\t\t\t\t\t\t\t\t<div class=\"text-xs text-content-dimmed\">
\t\t\t\t\t\t\t\t\t";
        // line 40
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Item will be accessible only by owner."), "html", null, true);
        yield "</div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<template x-if=\"item.visibility === 0\">
\t\t\t\t\t\t\t\t<button type=\"button\" disabled class=\"ms-auto button button-xs button-dimmed\">
\t\t\t\t\t\t\t\t\t";
        // line 45
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("badge", "Selected"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t</template>

\t\t\t\t\t\t\t<template x-if=\"item.visibility !== 0\">
\t\t\t\t\t\t\t\t<button type=\"button\" :processing=\"isProcessing===0\" class=\"invisible ms-auto button button-xs button-dimmed group-hover:visible\" @click=\"changeAudience(0)\">
\t\t\t\t\t\t\t\t\t";
        // line 51
        yield from $this->load("/snippets/spinner.twig", 51)->unwrap()->yield($context);
        // line 52
        yield "\t\t\t\t\t\t\t\t\t";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("badge", "Select"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t</template>
\t\t\t\t\t\t</div>
\t\t\t\t\t</template>

\t\t\t\t\t<template x-if=\"item.user && item.user.id == \$store.user.id\">
\t\t\t\t\t\t<div class=\"flex gap-4 items-center box group\">
\t\t\t\t\t\t\t<x-avatar icon=\"lock\"></x-avatar>

\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t<div class=\"font-bold\">";
        // line 63
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("audience", "Only me"), "html", null, true);
        yield "</div>
\t\t\t\t\t\t\t\t<div class=\"text-xs text-content-dimmed\">
\t\t\t\t\t\t\t\t\t";
        // line 65
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Item is only accessible by you."), "html", null, true);
        yield "</div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<template x-if=\"item.visibility === 0\">
\t\t\t\t\t\t\t\t<button type=\"button\" disabled class=\"ms-auto button button-xs button-dimmed\">
\t\t\t\t\t\t\t\t\t";
        // line 70
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("badge", "Selected"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t</template>

\t\t\t\t\t\t\t<template x-if=\"item.visibility !== 0\">
\t\t\t\t\t\t\t\t<button type=\"button\" :processing=\"isProcessing===0\" class=\"invisible ms-auto button button-xs button-dimmed group-hover:visible\" @click=\"changeAudience(0)\">
\t\t\t\t\t\t\t\t\t";
        // line 76
        yield from $this->load("/snippets/spinner.twig", 76)->unwrap()->yield($context);
        // line 77
        yield "\t\t\t\t\t\t\t\t\t";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("badge", "Select"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t</template>
\t\t\t\t\t\t</div>
\t\t\t\t\t</template>

\t\t\t\t\t<div class=\"flex gap-4 items-center box group\">
\t\t\t\t\t\t<x-avatar icon=\"building\"></x-avatar>

\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t<div class=\"font-bold\">";
        // line 87
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("audience", "Workspace"), "html", null, true);
        yield "</div>
\t\t\t\t\t\t\t<div class=\"text-xs text-content-dimmed\">
\t\t\t\t\t\t\t\t";
        // line 89
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Accesible by team members. Can be managed by workspace owner."), "html", null, true);
        yield "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<template x-if=\"item.visibility === 1\">
\t\t\t\t\t\t\t<button type=\"button\" disabled class=\"ms-auto button button-xs button-dimmed\">
\t\t\t\t\t\t\t\t";
        // line 95
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("badge", "Selected"), "html", null, true);
        yield "
\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t</template>

\t\t\t\t\t\t<template x-if=\"item.visibility !== 1\">
\t\t\t\t\t\t\t<button type=\"button\" :processing=\"isProcessing===1\" class=\"invisible ms-auto button button-xs button-dimmed group-hover:visible\" @click=\"changeAudience(1)\">
\t\t\t\t\t\t\t\t";
        // line 101
        yield from $this->load("/snippets/spinner.twig", 101)->unwrap()->yield($context);
        // line 102
        yield "\t\t\t\t\t\t\t\t";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("badge", "Select"), "html", null, true);
        yield "
\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t</template>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</modal-element>
\t</template>
</div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "snippets/audience.twig";
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
        return array (  193 => 102,  191 => 101,  182 => 95,  173 => 89,  168 => 87,  154 => 77,  152 => 76,  143 => 70,  135 => 65,  130 => 63,  115 => 52,  113 => 51,  104 => 45,  96 => 40,  78 => 25,  65 => 15,  55 => 8,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "snippets/audience.twig", "/home/appcloud/resources/views/snippets/audience.twig");
    }
}
