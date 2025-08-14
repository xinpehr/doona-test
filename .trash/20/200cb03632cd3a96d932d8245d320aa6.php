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

/* /templates/admin/plugins.twig */
class __TwigTemplate_a69ddcb91b92b876de56887a290ca133 extends Template
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
        $context["active_menu"] = "/admin/plugins";
        // line 5
        $context["strings"] = ["delete_success" => __("Plugin has been deleted successfully.")];
        // line 9
        $context["xdata"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 10
            yield "plugins(";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(json_encode(($context["strings"] ?? null)), "html", null, true);
            yield ")
";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 1
        $this->parent = $this->load("/layouts/main.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 13
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), p__("title", "Plugins")), "html", null, true);
        yield from [];
    }

    // line 15
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_template(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 16
        yield "\t";
        // line 17
        yield "\t<div class=\"flex items-center justify-between\">
\t\t<div>
\t\t\t<h1>";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Plugins"), "html", null, true);
        yield "</h1>

\t\t\t<template x-if=\"total !== null\">
\t\t\t\t<div class=\"text-sm text-content-dimmed md:hidden\">
\t\t\t\t\t";
        // line 23
        yield Twig\Extension\CoreExtension::replace(__("Total :count plugins"), [":count" => "<span x-text=\"total\"></span>"]);
        yield "
\t\t\t\t</div>
\t\t\t</template>
\t\t</div>

\t\t<div class=\"flex items-center gap-2 md:hidden\">
\t\t\t<button type=\"button\" class=\"hidden w-8 h-8 avatar\">
\t\t\t\t<i class=\"text-lg ti ti-adjustments-horizontal\"></i>
\t\t\t</button>

\t\t\t<a href=\"admin/plugins/new\" class=\"w-8 h-8 rounded-full button button-accent button-sm\">
\t\t\t\t<i class=\"text-lg ti ti-plus\"></i>
\t\t\t</a>
\t\t</div>

\t\t<a href=\"admin/plugins/new\" class=\"hidden md:flex button button-accent button-sm\">
\t\t\t<i class=\"text-lg ti ti-square-rounded-plus\"></i>
\t\t\t";
        // line 40
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Install plugin"), "html", null, true);
        yield "
\t\t</a>
\t</div>

\t";
        // line 45
        yield "\t";
        yield from $this->load("/snippets/filters.twig", 45)->unwrap()->yield(CoreExtension::merge($context, ["total" => __("Total :count plugins"), "filters" => [["label" => p__("label", "Status"), "model" => "status", "options" => [["value" => "inactive", "label" => p__("status", "Inactive")], ["value" => "active", "label" => p__("status", "Active")]]]]]));
        // line 64
        yield "
\t";
        // line 66
        yield "\t<div class=\"group/list\" :data-state=\"state\">
\t\t<div class=\"hidden group-data-[state=empty]/list:block\">
\t\t\t";
        // line 68
        yield from $this->load("sections/empty.twig", 68)->unwrap()->yield(CoreExtension::merge($context, ["title" => p__("heading", "Empty result set"), "message" => __("There are no plugins yet."), "reset" => __("There are no plugins matching your search.")]));
        // line 69
        yield "\t\t</div>

\t\t<ul class=\"text-sm flex flex-col gap-1 group-data-[state=empty]:hidden\">
\t\t\t";
        // line 72
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(range(1, 5));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 73
            yield "\t\t\t\t<li class=\"hidden justify-between gap-3 p-8 box group-data-[state=initial]/list:flex\" x-data>
\t\t\t\t\t<div>
\t\t\t\t\t\t<div class=\"flex items-center gap-4\">
\t\t\t\t\t\t\t<div class=\"h-5 my-0.5 w-36 loading\"></div>

\t\t\t\t\t\t\t<span class=\"flex items-center gap-1\">
\t\t\t\t\t\t\t\t<span class=\"relative w-3 h-3 rounded-full text-content-dimmed loading\">
\t\t\t\t\t\t\t\t\t<span class=\"absolute top-0 left-0 w-full h-full bg-current rounded-full opacity-20\"></span>
\t\t\t\t\t\t\t\t\t<span class=\"absolute w-1.5 h-1.5 -translate-x-1/2 -translate-y-1/2 bg-current rounded-full top-1/2 left-1/2\"></span>
\t\t\t\t\t\t\t\t</span>

\t\t\t\t\t\t\t\t<span class=\"h-4 loading w-14\"></span>
\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"h-5 mt-1 loading w-96\"></div>

\t\t\t\t\t\t<div class=\"flex items-center gap-1 mt-6 text-xs text-content-dimmed\">
\t\t\t\t\t\t\t<span class=\"inline-block h-4 w-14 loading\"></span>
\t\t\t\t\t\t\t<span class=\"inline-block h-4 w-14 loading\"></span>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div>
\t\t\t\t\t\t<i class=\"text-2xl ti ti-dots-vertical text-content-dimmed\"></i>
\t\t\t\t\t</div>
\t\t\t\t</li>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 101
        yield "
\t\t\t<template x-for=\"plugin in resources\" :key=\"plugin.name\">
\t\t\t\t<li class=\"flex justify-between gap-3 p-8 box\" x-data>
\t\t\t\t\t<div>
\t\t\t\t\t\t<div class=\"flex items-center gap-4\">
\t\t\t\t\t\t\t<h2>
\t\t\t\t\t\t\t\t<template x-if=\"plugin.default_url\">
\t\t\t\t\t\t\t\t\t<a :href=\"plugin.default_url\" class=\"font-bold text-content group flex items-center\">
\t\t\t\t\t\t\t\t\t\t<span x-text=\"plugin.title || plugin.name\" class=\"group-hover:underline\"></span>
\t\t\t\t\t\t\t\t\t\t<i class=\"ti ti-chevron-right text-content-dimmed group-hover:text-content group-hover:translate-x-1 transition-all\"></i>
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</template>

\t\t\t\t\t\t\t\t<template x-if=\"!plugin.default_url\">
\t\t\t\t\t\t\t\t\t<span x-text=\"plugin.title || plugin.name\"></span>
\t\t\t\t\t\t\t\t</template>
\t\t\t\t\t\t\t</h2>

\t\t\t\t\t\t\t<button type=\"button\" @click.prevent=\"toggleStatus(plugin)\" class=\"flex items-center bg-transparent badge\" :class=\"plugin.status == 'active' ? 'text-success' : 'text-content-dimmed'\">
\t\t\t\t\t\t\t\t<span class=\"relative w-3 h-3 rounded-full\">
\t\t\t\t\t\t\t\t\t<span class=\"absolute top-0 left-0 w-full h-full bg-current rounded-full opacity-20\"></span>
\t\t\t\t\t\t\t\t\t<span class=\"absolute w-1.5 h-1.5 -translate-x-1/2 -translate-y-1/2 bg-current rounded-full top-1/2 left-1/2\"></span>
\t\t\t\t\t\t\t\t</span>

\t\t\t\t\t\t\t\t<span x-text=\"plugin.status == 'active' ? `";
        // line 125
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("status", "Active"), "html", null, true);
        yield "` : `";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("status", "Inactive"), "html", null, true);
        yield "`\"></span>
\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"mt-1 text-sm text-content-dimmed\" x-text=\"plugin.tagline || plugin.description\"></div>

\t\t\t\t\t\t<div class=\"mt-6 text-xs text-content-dimmed\">
\t\t\t\t\t\t\t";
        // line 132
        $context["version"] = new Markup("<span x-text=\"plugin.version || 'dev'\"></span>
\t\t\t\t\t\t\t", $this->env->getCharset());
        // line 134
        yield "\t\t\t\t\t\t\t";
        yield Twig\Extension\CoreExtension::replace(__("Version :version"), [":version" => ($context["version"] ?? null)]);
        yield "

\t\t\t\t\t\t\t<template x-if=\"plugin.authors.length > 0\">
\t\t\t\t\t\t\t\t<span>
\t\t\t\t\t\t\t\t\t|

\t\t\t\t\t\t\t\t\t<template x-if=\"plugin.authors[0].homepage\">
\t\t\t\t\t\t\t\t\t\t";
        // line 141
        $context["author"] = new Markup("<a :href=\"plugin.authors[0].homepage\" target=\"_blank\" class=\"font-bold text-content hover:underline\" x-text=\"plugin.authors[0].name\"></a>
\t\t\t\t\t\t\t\t\t\t", $this->env->getCharset());
        // line 143
        yield "\t\t\t\t\t\t\t\t\t\t<span>";
        yield Twig\Extension\CoreExtension::replace(__("By :author"), [":author" => ($context["author"] ?? null)]);
        yield "</span>
\t\t\t\t\t\t\t\t\t</template>

\t\t\t\t\t\t\t\t\t<template x-if=\"!plugin.authors[0].homepage && plugin.authors[0].email\">
\t\t\t\t\t\t\t\t\t\t";
        // line 147
        $context["author"] = new Markup("<a :href=\"`mailto:\${plugin.authors[0].email}`\" target=\"_blank\" class=\"font-bold text-content hover:underline\" x-text=\"plugin.authors[0].name\"></a>
\t\t\t\t\t\t\t\t\t\t", $this->env->getCharset());
        // line 149
        yield "\t\t\t\t\t\t\t\t\t\t<span>";
        yield Twig\Extension\CoreExtension::replace(__("By :author"), [":author" => ($context["author"] ?? null)]);
        yield "</span>
\t\t\t\t\t\t\t\t\t</template>

\t\t\t\t\t\t\t\t\t<template x-if=\"!plugin.authors[0].homepage && !plugin.authors[0].email\">
\t\t\t\t\t\t\t\t\t\t";
        // line 153
        $context["author"] = new Markup("<strong class=\"font-bold text-content\" x-text=\"plugin.authors[0].name\"></strong>
\t\t\t\t\t\t\t\t\t\t", $this->env->getCharset());
        // line 155
        yield "\t\t\t\t\t\t\t\t\t\t<span>";
        yield Twig\Extension\CoreExtension::replace(__("By :author"), [":author" => ($context["author"] ?? null)]);
        yield "</span>
\t\t\t\t\t\t\t\t\t</template>
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t</template>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div>
\t\t\t\t\t\t<div class=\"relative\" @click.outside=\"\$refs.context.removeAttribute('data-open')\">

\t\t\t\t\t\t\t<button class=\"relative z-10\" @click=\"\$refs.context.toggleAttribute('data-open')\">
\t\t\t\t\t\t\t\t<i class=\"text-2xl ti ti-dots-vertical text-content-dimmed hover:text-intermediate-content\"></i>
\t\t\t\t\t\t\t</button>

\t\t\t\t\t\t\t<div class=\"menu\" x-ref=\"context\">
\t\t\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t\t\t<template x-if=\"plugin.default_url\">
\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t<a class=\"flex items-center w-full gap-2 px-4 py-2 hover:no-underline hover:bg-intermediate\" :href=\"plugin.default_url\">
\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"ti ti-settings\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 175
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Manage"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t</template>

\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<button class=\"flex items-center w-full gap-2 px-4 py-2 hover:no-underline hover:bg-intermediate\" @click.prevent=\"currentResource = plugin; modal.open('delete-modal')\">
\t\t\t\t\t\t\t\t\t\t\t<i class=\"ti ti-trash\"></i>

\t\t\t\t\t\t\t\t\t\t\t";
        // line 184
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Delete"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</li>
\t\t\t</template>
\t\t</ul>
\t</div>

\t";
        // line 196
        yield from $this->load("sections/delete-modal.twig", 196)->unwrap()->yield(CoreExtension::merge($context, ["message" => __("Do you really want to delete :title plugin?"), "title" => "`\${currentResource.title}`"]));
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "/templates/admin/plugins.twig";
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
        return array (  306 => 196,  291 => 184,  279 => 175,  255 => 155,  252 => 153,  244 => 149,  241 => 147,  233 => 143,  230 => 141,  219 => 134,  216 => 132,  204 => 125,  178 => 101,  145 => 73,  141 => 72,  136 => 69,  134 => 68,  130 => 66,  127 => 64,  124 => 45,  117 => 40,  97 => 23,  90 => 19,  86 => 17,  84 => 16,  77 => 15,  66 => 13,  61 => 1,  54 => 10,  52 => 9,  50 => 5,  48 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "/templates/admin/plugins.twig", "/home/appcloud/resources/views/templates/admin/plugins.twig");
    }
}
