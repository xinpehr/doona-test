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

/* /templates/admin/settings/models.twig */
class __TwigTemplate_b82afd27687454ed789a195c2fedc07b extends Template
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

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'template' => [$this, 'block_template'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "/layouts/main.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 2
        $context["active_menu"] = "/admin/settings";
        // line 4
        $context["directory"] = Twig\Extension\CoreExtension::map($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "model", [], "any", false, false, false, 4), "registry", [], "any", false, false, false, 4), "directory", [], "any", false, false, false, 4), function ($__service__) use ($context, $macros) { $context["service"] = $__service__; return Twig\Extension\CoreExtension::merge(($context["service"] ?? null), ["is_available" => (( !Twig\Extension\CoreExtension::testEmpty(((CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), CoreExtension::getAttribute($this->env, $this->source, ($context["service"] ?? null), "key", [], "any", false, false, false, 4), [], "array", true, true, false, 4)) ? (Twig\Extension\CoreExtension::default((($_v0 = ($context["option"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0[CoreExtension::getAttribute($this->env, $this->source, ($context["service"] ?? null), "key", [], "any", false, false, false, 4)] ?? null) : null), null)) : (null))) || (CoreExtension::getAttribute($this->env, $this->source, ($context["service"] ?? null), "key", [], "any", false, false, false, 4) == "ollama")) || ((CoreExtension::getAttribute($this->env, $this->source, ($context["service"] ?? null), "custom", [], "any", true, true, false, 4)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["service"] ?? null), "custom", [], "any", false, false, false, 4), false)) : (false)))]); });
        // line 5
        $context["types"] = ["llm" => __("Text model"), "image" => __("Image model"), "transcription" => __("Audio model"), "embedding" => __("Embedding model"), "tts" => __("Text-to-speech model"), "video" => __("Video model"), "voice-isolation" => __("Voice isolation model"), "composition" => __("Composition model")];
        // line 16
        $context["xdata"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 17
            yield "\tmodels(";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(json_encode(($context["directory"] ?? null)), "html", null, true);
            yield ", ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(json_encode(((CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "models", [], "any", true, true, false, 17)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "models", [], "any", false, false, false, 17), [])) : ([]))), "html", null, true);
            yield ", ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(json_encode(($context["types"] ?? null)), "html", null, true);
            yield ")
";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 1
        $this->parent = $this->load("/layouts/main.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 20
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("title", "Models"), "html", null, true);
        yield from [];
    }

    // line 21
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_template(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 22
        yield "\t<div>
\t\t";
        // line 23
        yield from $this->load("snippets/back.twig", 23)->unwrap()->yield(CoreExtension::merge($context, ["link" => "admin/settings", "label" => "Settings"]));
        // line 24
        yield "\t\t<h1 class=\"mt-4\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Models"), "html", null, true);
        yield "</h1>
\t</div>

\t<div class=\"flex flex-col gap-8\">
\t\t<div class=\"flex flex-col gap-2\">
\t\t\t<template x-for=\"service in directory\">
\t\t\t\t<section class=\"flex flex-col gap-6 box\" data-density=\"comfortable\">
\t\t\t\t\t<div class=\"flex flex-col gap-1\">
\t\t\t\t\t\t<h2 x-text=\"service.name\"></h2>

\t\t\t\t\t\t<template x-if=\"service.is_available\">
\t\t\t\t\t\t\t<div class=\"text-sm text-content-dimmed\">
\t\t\t\t\t\t\t\t";
        // line 36
        $context["link"] = new Markup("\t\t\t\t\t\t\t\t\t<a :href=\"`/admin/settings/\${service.key}`\" class=\"text-content group font-medium\" target=\"_blank\">
\t\t\t\t\t\t\t\t\t\t<span class=\"group-hover:underline\" x-text=\"service.name\"></span>

\t\t\t\t\t\t\t\t\t\t<i class=\"ti ti-external-link\"></i>
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t", $this->env->getCharset());
        // line 43
        yield "
\t\t\t\t\t\t\t\t";
        // line 44
        yield __("Following models are provided by %s integration.", ($context["link"] ?? null));
        yield "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</template>

\t\t\t\t\t\t<template x-if=\"!service.is_available\">
\t\t\t\t\t\t\t<div class=\"flex gap-1 items-center text-sm text-content-dimmed\">
\t\t\t\t\t\t\t\t<i class=\"text-base ti ti-alert-square-rounded-filled text-failure\"></i>
\t\t\t\t\t\t\t\t";
        // line 51
        $context["service"] = new Markup("\t\t\t\t\t\t\t\t\t<span x-text=\"service.name\"></span>
\t\t\t\t\t\t\t\t", $this->env->getCharset());
        // line 54
        yield "
\t\t\t\t\t\t\t\t";
        // line 55
        yield __("%s integration is not configured.", ($context["service"] ?? null));
        yield "

\t\t\t\t\t\t\t\t<a :href=\"`/admin/settings/\${service.key}`\" class=\"text-content group font-medium flex items-center gap-1\" target=\"_blank\">
\t\t\t\t\t\t\t\t\t<span class=\"group-hover:underline\" x-text=\"service.name\"></span>

\t\t\t\t\t\t\t\t\t<i class=\"ti ti-external-link\"></i>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</template>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"grid gap-1 md:grid-cols-2\">
\t\t\t\t\t\t<template x-for=\"model in service.models\">
\t\t\t\t\t\t\t<label class=\"flex gap-4 items-center cursor-pointer box hover:border-line\">
\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<div class=\"flex gap-2 items-center text-sm\" x-text=\"model.name\"></div>
\t\t\t\t\t\t\t\t\t<div class=\"font-normal text-content-dimmed capitalize\" x-text=\"types[model.type] ?? model.type\"></div>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<div class=\"ms-auto\">
\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" class=\"hidden peer\" name=\"models[]\" :value=\"model.key\" :checked=\"model.enabled\" @change=\"update(service, model, {'enabled': \$event.target.checked})\">
\t\t\t\t\t\t\t\t\t<span class=\"block relative w-10 h-6 rounded-3xl transition-all bg-line peer-checked:bg-success after:h-5 after:w-5 after:top-0.5 after:absolute after:left-0 after:ms-0.5 after:transition-all after:rounded-full after:bg-white peer-checked:after:left-4\"></span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</template>
\t\t\t\t\t</div>
\t\t\t\t</section>
\t\t\t</template>
\t\t</div>
\t</div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "/templates/admin/settings/models.twig";
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
        return array (  137 => 55,  134 => 54,  131 => 51,  121 => 44,  118 => 43,  111 => 36,  95 => 24,  93 => 23,  90 => 22,  83 => 21,  72 => 20,  67 => 1,  56 => 17,  54 => 16,  52 => 5,  50 => 4,  48 => 2,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "/templates/admin/settings/models.twig", "/home/appcloud/resources/views/templates/admin/settings/models.twig");
    }
}
