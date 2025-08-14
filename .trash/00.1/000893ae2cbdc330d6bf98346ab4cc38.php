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

/* sections/delete-modal.twig */
class __TwigTemplate_cbbae8f0fc3166365f252b0c00243b82 extends Template
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
        yield "<modal-element name=\"delete-modal\">
\t<template x-if=\"currentResource\">
\t\t<form class=\"modal flex flex-col items-center gap-6\" @submit.prevent=\"deleteResource(currentResource);\">
\t\t\t<div class=\"relative flex items-center justify-center w-24 h-24 mx-auto rounded-full text-failure/25\">
\t\t\t\t<svg class=\"absolute top-0 left-0 w-full h-full\" width=\"112\" height=\"112\" viewbox=\"0 0 112 112\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
\t\t\t\t\t<circle cx=\"56\" cy=\"56\" r=\"55.5\" stroke=\"currentColor\" stroke-dasharray=\"8 8\"/>
\t\t\t\t</svg>

\t\t\t\t<div class=\"flex items-center justify-center w-20 h-20 text-4xl transition-all rounded-full bg-failure/25 text-failure\">
\t\t\t\t\t<i class=\"text-4xl ti ti-trash\"></i>
\t\t\t\t</div>
\t\t\t</div>

\t\t\t<div class=\"flex flex-col gap-2 items-center text-center\">
\t\t\t\t<div class=\"text-lg text-center\">
\t\t\t\t\t";
        // line 16
        $context["title_html"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 17
            yield "\t\t\t\t\t<strong x-text=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("title", $context)) ? (Twig\Extension\CoreExtension::default(($context["title"] ?? null), "")) : ("")), "html_attr");
            yield "\"></strong>
\t\t\t\t\t";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 19
        yield "
\t\t\t\t\t";
        // line 20
        yield Twig\Extension\CoreExtension::replace(($context["message"] ?? null), [":title" => ($context["title_html"] ?? null)]);
        yield "
\t\t\t\t</div>

\t\t\t\t";
        // line 23
        if (array_key_exists("details", $context)) {
            // line 24
            yield "\t\t\t\t\t<p class=\"text-sm text-content-dimmed\">
\t\t\t\t\t\t";
            // line 25
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["details"] ?? null), "html", null, true);
            yield "
\t\t\t\t\t</p>
\t\t\t\t";
        }
        // line 28
        yield "
\t\t\t</div>

\t\t\t<div class=\"flex gap-4 justify-center items-center\">
\t\t\t\t<button class=\"button button-outline\" @click=\"modal.close()\" type=\"button\">
\t\t\t\t\t";
        // line 33
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "No, cancel"), "html", null, true);
        yield "
\t\t\t\t</button>

\t\t\t\t<button class=\"button button-failure\" type=\"submit\" :processing=\"isDeleting\">
\t\t\t\t\t";
        // line 37
        yield from $this->load("/snippets/spinner.twig", 37)->unwrap()->yield($context);
        // line 38
        yield "
\t\t\t\t\t";
        // line 39
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Yes, delete"), "html", null, true);
        yield "
\t\t\t\t</button>
\t\t\t</div>
\t\t</form>
\t</template>
</modal-element>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "sections/delete-modal.twig";
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
        return array (  107 => 39,  104 => 38,  102 => 37,  95 => 33,  88 => 28,  82 => 25,  79 => 24,  77 => 23,  71 => 20,  68 => 19,  61 => 17,  59 => 16,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "sections/delete-modal.twig", "/home/appcloud/resources/views/sections/delete-modal.twig");
    }
}
