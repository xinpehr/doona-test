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

/* /templates/admin/update.twig */
class __TwigTemplate_3da36f6fe27bdb86b488aaa655edb572 extends Template
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
        // line 3
        $context["active_menu"] = "/admin/update";
        // line 4
        $context["xdata"] = "update";
        // line 1
        $this->parent = $this->load("/layouts/main.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), p__("title", "Update")), "html", null, true);
        yield from [];
    }

    // line 7
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_template(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 8
        yield "\t<div class=\"flex flex-col gap-8\" @submit.prevent=\"\">
\t\t<div>
\t\t\t";
        // line 10
        yield from $this->load("snippets/back.twig", 10)->unwrap()->yield(CoreExtension::merge($context, ["link" => "admin", "label" => "Dashboard"]));
        // line 11
        yield "
\t\t\t<h1 class=\"mt-4\">
\t\t\t\t";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("title", "Update"), "html", null, true);
        yield "
\t\t\t</h1>
\t\t</div>

\t\t<div class=\"flex flex-col gap-2\">
\t\t\t<section class=\"flex flex-col gap-6 box \" data-density=\"comfortable\">
\t\t\t\t<h2>";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "About"), "html", null, true);
        yield "</h2>

\t\t\t\t<div class=\"flex gap-6\">
\t\t\t\t\t<div>
\t\t\t\t\t\t<div class=\"label\">";
        // line 23
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "License"), "html", null, true);
        yield "</div>
\t\t\t\t\t\t<div class=\"flex mt-1\">
\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t";
        // line 26
        if ((($tmp = ($context["license"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 27
            yield "\t\t\t\t\t\t\t\t\t<x-copy class=\"flex items-center badge\" data-copy=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["license"] ?? null), "html", null, true);
            yield "\">

\t\t\t\t\t\t\t\t\t\t<span class=\"font-bold capitalize\">
\t\t\t\t\t\t\t\t\t\t\t";
            // line 30
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Key"), "html", null, true);
            yield "
\t\t\t\t\t\t\t\t\t\t</span>

\t\t\t\t\t\t\t\t\t\t<span x-text=\"'";
            // line 33
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["license"] ?? null), "html", null, true);
            yield "'.slice(0,4) + '*'.repeat(10) + '";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["license"] ?? null), "html", null, true);
            yield "'.slice(-4)\"></span>
\t\t\t\t\t\t\t\t\t</x-copy>
\t\t\t\t\t\t\t\t";
        } else {
            // line 36
            yield "\t\t\t\t\t\t\t\t\t<span class=\"text-xs\">
\t\t\t\t\t\t\t\t\t\t";
            // line 37
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Couldn’t identify the license"), "html", null, true);
            yield "
\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t";
        }
        // line 40
        yield "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div>
\t\t\t\t\t\t<div class=\"label\">";
        // line 45
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Installed"), "html", null, true);
        yield "</div>
\t\t\t\t\t\t<div class=\"flex mt-1\">
\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t<x-copy class=\"flex items-center badge\" data-copy=\"";
        // line 48
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["version"] ?? null), "html", null, true);
        yield "\">

\t\t\t\t\t\t\t\t\t<span class=\"font-bold capitalize\">
\t\t\t\t\t\t\t\t\t\t";
        // line 51
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Version"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t\t</span>

\t\t\t\t\t\t\t\t\t<span>";
        // line 54
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["version"] ?? null), "html", null, true);
        yield "</span>
\t\t\t\t\t\t\t\t</x-copy>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</section>

\t\t\t<section class=\"p-8 box\">
\t\t\t\t<div class=\"flex items-center gap-4\">
\t\t\t\t\t<span class=\"flex items-center justify-center w-10 h-10 bg-intermediate text-intermediate-content\" :class=\"file ? 'rounded-lg' : 'rounded-full'\">
\t\t\t\t\t\t<i class=\"ti\" :class=\"file ? 'ti-file-zip' : 'ti-paperclip'\"></i>
\t\t\t\t\t</span>

\t\t\t\t\t<template x-if=\"file\">
\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t<div class=\"font-medium\" x-text=\"file.name\"></div>

\t\t\t\t\t\t\t<template x-if=\"error\">
\t\t\t\t\t\t\t\t<div class=\"text-sm text-failure\" x-text=\"error\"></div>
\t\t\t\t\t\t\t</template>

\t\t\t\t\t\t\t<template x-if=\"!error\">
\t\t\t\t\t\t\t\t<div class=\"text-sm text-content-dimmed\" x-text=\"filesize\"></div>
\t\t\t\t\t\t\t</template>
\t\t\t\t\t\t</div>
\t\t\t\t\t</template>

\t\t\t\t\t<template x-if=\"!file\">
\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t<div class=\"font-medium\">
\t\t\t\t\t\t\t\t";
        // line 85
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Choose a file of the updated version"), "html", null, true);
        yield "
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<template x-if=\"error\">
\t\t\t\t\t\t\t\t<div class=\"text-sm text-failure\" x-text=\"error\"></div>
\t\t\t\t\t\t\t</template>

\t\t\t\t\t\t\t<template x-if=\"!error\">
\t\t\t\t\t\t\t\t<div class=\"text-sm text-content-dimmed\">
\t\t\t\t\t\t\t\t\t";
        // line 94
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("ZIP archive file only"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</template>
\t\t\t\t\t\t</div>
\t\t\t\t\t</template>

\t\t\t\t\t<button type=\"button\" class=\"ms-auto button button-outline button-sm\" @click=\"\$refs.file.click()\" :disabled=\"isProcessing\" x-text=\"file ? `";
        // line 100
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Change file"), "html", null, true);
        yield "` : `";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Choose file"), "html", null, true);
        yield "`\"></button>

\t\t\t\t\t<template x-if=\"file\">
\t\t\t\t\t\t<button type=\"button\" class=\"button button-sm button-accent\" :processing=\"isProcessing\" :disabled=\"isProcessing\" @click=\"modal.open('confirm-modal')\">

\t\t\t\t\t\t\t";
        // line 105
        yield from $this->load("/snippets/spinner.twig", 105)->unwrap()->yield($context);
        // line 106
        yield "\t\t\t\t\t\t\t<span x-text=\"isProcessing ? `";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Installing..."), "html", null, true);
        yield "` : `";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Install"), "html", null, true);
        yield "`\"></span>

\t\t\t\t\t\t</button>
\t\t\t\t\t</template>

\t\t\t\t\t<input type=\"file\" @change=\"file = \$refs.file.files[0]; error = null;\" class=\"hidden\" accept=\"application/zip, application/x-zip-compressed, multipart/x-zip\" x-ref=\"file\">
\t\t\t\t</div>
\t\t\t</section>
\t\t</div>
\t</div>

\t<modal-element name=\"confirm-modal\">
\t\t<form class=\"flex flex-col gap-8 modal\" @submit.prevent=\"submit\">
\t\t\t<div class=\"flex items-center justify-between\">
\t\t\t\t<h2 class=\"text-xl\">";
        // line 120
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Confirmation"), "html", null, true);
        yield "</h2>

\t\t\t\t<button class=\"flex items-center justify-center w-8 h-8 border border-transparent rounded-full bg-line-dimmed hover:border-line\" @click=\"modal.close()\" type=\"button\">
\t\t\t\t\t<i class=\"text-xl ti ti-x\"></i>
\t\t\t\t</button>
\t\t\t</div>

\t\t\t<div>
\t\t\t\t<div class=\"font-bold\">";
        // line 128
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("audience", "Backup"), "html", null, true);
        yield "</div>
\t\t\t\t<div class=\"mt-2 text-sm underline\">
\t\t\t\t\t";
        // line 130
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("It is recommended to backup your data before updating."), "html", null, true);
        yield "
\t\t\t\t</div>
\t\t\t</div>

\t\t\t<div>
\t\t\t\t<div class=\"flex items-center gap-1 text-sm font-bold\">
\t\t\t\t\t<i class=\"text-lg ti ti-info-square-rounded \"></i>
\t\t\t\t\t";
        // line 137
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Important"), "html", null, true);
        yield "
\t\t\t\t</div>

\t\t\t\t<p class=\"mt-2 text-sm\">
\t\t\t\t\t";
        // line 141
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Update might take some time. During this time, the application will be unavailable. Don't close the browser tab or navigate away from this page."), "html", null, true);
        yield "
\t\t\t\t</p>
\t\t\t</div>

\t\t\t<div class=\"flex items-center\">
\t\t\t\t<button class=\"w-full button\" type=\"submit\" :processing=\"isProcessing\">
\t\t\t\t\t";
        // line 147
        yield from $this->load("/snippets/spinner.twig", 147)->unwrap()->yield($context);
        // line 148
        yield "
\t\t\t\t\t";
        // line 149
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "I took a backup, proceed to update"), "html", null, true);
        yield "
\t\t\t\t</button>
\t\t\t</div>
\t\t</form>
\t</modal-element>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "/templates/admin/update.twig";
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
        return array (  298 => 149,  295 => 148,  293 => 147,  284 => 141,  277 => 137,  267 => 130,  262 => 128,  251 => 120,  231 => 106,  229 => 105,  219 => 100,  210 => 94,  198 => 85,  164 => 54,  158 => 51,  152 => 48,  146 => 45,  139 => 40,  133 => 37,  130 => 36,  122 => 33,  116 => 30,  109 => 27,  107 => 26,  101 => 23,  94 => 19,  85 => 13,  81 => 11,  79 => 10,  75 => 8,  68 => 7,  57 => 5,  52 => 1,  50 => 4,  48 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "/templates/admin/update.twig", "/home/appcloud/resources/views/templates/admin/update.twig");
    }
}
