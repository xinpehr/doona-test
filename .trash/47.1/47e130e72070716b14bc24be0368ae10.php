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

/* /templates/admin/users.twig */
class __TwigTemplate_42f496924d4f4cec2dcc5b23da57d055 extends Template
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
        $context["active_menu"] = "/admin/users";
        // line 5
        $context["strings"] = ["delete_success" => __("User has been deleted successfully.")];
        // line 9
        $context["xdata"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 10
            yield "list(\"users\",
";
            // line 11
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(json_encode(($context["strings"] ?? null)), "html", null, true);
            yield ")
";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 1
        $this->parent = $this->load("/layouts/main.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 14
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), p__("title", "Users")), "html", null, true);
        yield from [];
    }

    // line 16
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_template(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 17
        yield "\t";
        // line 18
        yield "\t<div class=\"flex justify-between items-center\">
\t\t<div>
\t\t\t<h1>";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Users"), "html", null, true);
        yield "</h1>

\t\t\t<template x-if=\"total !== null\">
\t\t\t\t<div class=\"text-sm text-content-dimmed md:hidden\">
\t\t\t\t\t";
        // line 24
        yield Twig\Extension\CoreExtension::replace(__("Total :count users"), [":count" => "<span x-text=\"total\"></span>"]);
        yield "
\t\t\t\t</div>
\t\t\t</template>
\t\t</div>

\t\t<div class=\"flex gap-2 items-center md:hidden\">
\t\t\t<button type=\"button\" class=\"hidden w-8 h-8 avatar\">
\t\t\t\t<i class=\"text-lg ti ti-adjustments-horizontal\"></i>
\t\t\t</button>

\t\t\t<a href=\"admin/users/new\" class=\"w-8 h-8 rounded-full button button-accent button-sm\">
\t\t\t\t<i class=\"text-lg ti ti-plus\"></i>
\t\t\t</a>
\t\t</div>

\t\t<div class=\"hidden gap-2 items-center md:flex\">
\t\t\t<button type=\"button\" class=\"button button-outline button-sm\" @click=\"exportData\" :processing=\"isExporting\">
\t\t\t\t";
        // line 41
        yield from $this->load("/snippets/spinner.twig", 41)->unwrap()->yield($context);
        // line 42
        yield "
\t\t\t\t";
        // line 43
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Export"), "html", null, true);
        yield "
\t\t\t</button>

\t\t\t<a href=\"admin/users/new\" class=\"button button-accent button-sm\">
\t\t\t\t";
        // line 47
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Add user"), "html", null, true);
        yield "
\t\t\t</a>
\t\t</div>
\t</div>

\t";
        // line 53
        yield "\t";
        yield from $this->load("/snippets/filters.twig", 53)->unwrap()->yield(CoreExtension::merge($context, ["total" => __("Total :count users"), "sort" => [["value" => null, "label" => p__("label", "Default")], ["value" => "created_at", "label" => p__("label", "Date")], ["value" => "first_name", "label" => p__("label", "First name")], ["value" => "last_name", "label" => p__("label", "Last name")]], "filters" => [["label" => p__("label", "Role"), "model" => "role", "options" => [["value" => "0", "label" => p__("role", "User")], ["value" => "1", "label" => p__("role", "Admin")]]], ["label" => p__("label", "Status"), "model" => "status", "options" => [["value" => "0", "label" => p__("status", "Inactive")], ["value" => "1", "label" => p__("status", "Active")], ["value" => "2", "label" => p__("status", "Online")], ["value" => "3", "label" => p__("status", "Away")]]], ["label" => p__("label", "Email"), "model" => "is_email_verified", "options" => [["value" => "1", "label" => p__("is_email_verified", "Verified")], ["value" => "0", "label" => p__("is_email_verified", "Unverified")]]], ["label" => p__("label", "Country"), "model" => "country_code", "options" => []], ["label" => p__("label", "Date"), "model" => "created_at", "hidden" => true], ["label" => p__("label", "Affiliate"), "model" => "ref", "hidden" => true]]]));
        // line 144
        yield "
\t";
        // line 146
        yield "\t<div class=\"group/list\" :data-state=\"state\">
\t\t<div class=\"hidden group-data-[state=empty]/list:block\">
\t\t\t";
        // line 148
        yield from $this->load("sections/empty.twig", 148)->unwrap()->yield(CoreExtension::merge($context, ["title" => p__("heading", "Empty result set"), "message" => __("There are no users yet."), "reset" => __("There are no users matching your search.")]));
        // line 149
        yield "\t\t</div>

\t\t<div class=\"hidden md:grid grid-cols-12 gap-3 items-center px-3 py-2 text-content-dimmed text-xs group-data-[state=empty]/list:hidden\">
\t\t\t<div class=\"col-span-5\">";
        // line 152
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "User"), "html", null, true);
        yield "</div>
\t\t\t<div class=\"col-span-2\">";
        // line 153
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Role"), "html", null, true);
        yield "</div>
\t\t\t<div class=\"col-span-3\">";
        // line 154
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Created"), "html", null, true);
        yield "</div>
\t\t\t<div class=\"col-span-1\">";
        // line 155
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Status"), "html", null, true);
        yield "</div>
\t\t\t<div class=\"col-span-1\"></div>
\t\t</div>

\t\t<ul class=\"text-sm flex flex-col gap-1 group-data-[state=empty]:hidden\">
\t\t\t";
        // line 160
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(range(1, 5));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 161
            yield "\t\t\t\t<li class=\"hidden grid-cols-12 gap-3 items-center md:p-3 box hover:border-line animate-pulse group-data-[state=initial]/list:grid\">
\t\t\t\t\t<div class=\"flex col-span-5 gap-3 items-center\">

\t\t\t\t\t\t<div class=\"avatar\"></div>

\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t<span class=\"inline-block w-32 h-6 rounded-lg bg-line-dimmed\"></span>
\t\t\t\t\t\t\t\t<span class=\"inline-block w-32 h-6 rounded-lg bg-line-dimmed\"></span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"col-span-2\">
\t\t\t\t\t\t<span class=\"inline-block w-20 h-6 rounded-lg bg-line-dimmed\"></span>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"col-span-3\">
\t\t\t\t\t\t<span class=\"inline-block w-20 h-6 rounded-lg bg-line-dimmed\"></span>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"col-span-1\"></div>

\t\t\t\t\t<div class=\"col-span-1 justify-self-end\">
\t\t\t\t\t\t<div class=\"relative group\">
\t\t\t\t\t\t\t<button>
\t\t\t\t\t\t\t\t<i class=\"text-2xl ti ti-dots-vertical text-content-dimmed\"></i>
\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</li>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 193
        yield "
\t\t\t<template x-for=\"user in resources\" :key=\"user.id\">
\t\t\t\t<li class=\"grid relative grid-cols-12 gap-3 items-center p-3 box hover:border-line\" x-data>
\t\t\t\t\t<a :href=\"`admin/users/\${user.id}`\" class=\"absolute top-0 left-0 w-full h-full cursor-pointer\"></a>

\t\t\t\t\t<div class=\"flex col-span-11 gap-3 items-center md:col-span-5\">
\t\t\t\t\t\t<x-avatar :title=\"`\${user.first_name} \${user.last_name}`\" :src=\"user.avatar\" :status=\"user.is_online ? 'online' : 'offline'\"></x-avatar>

\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t<div class=\"font-bold\" x-text=\"`\${user.first_name} \${user.last_name}`\"></div>

\t\t\t\t\t\t\t<div class=\"text-content-dimmed md:hidden\" x-text=\"user.role==1 ? `";
        // line 204
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("role", "Admin"), "html", null, true);
        yield "` : `";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("role", "User"), "html", null, true);
        yield "`\"></div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"hidden md:block md:col-span-2\" x-text=\"user.role==1 ? `";
        // line 208
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("role", "Admin"), "html", null, true);
        yield "` : `";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("role", "User"), "html", null, true);
        yield "`\"></div>

\t\t\t\t\t<div class=\"hidden md:block md:col-span-3\">
\t\t\t\t\t\t<x-time :datetime=\"user.created_at\" data-type=\"date\"></x-time>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"hidden md:block md:col-span-1\">
\t\t\t\t\t\t<template x-if=\"user.id != '";
        // line 215
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "id", [], "any", false, false, false, 215), "html", null, true);
        yield "'\">
\t\t\t\t\t\t\t<label class=\"inline-flex relative z-10 gap-2 items-center cursor-pointer\">
\t\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"status\" class=\"hidden peer\" :checked=\"user.status == 1\" @click=\"toggleStatus(user)\">

\t\t\t\t\t\t\t\t<span class=\"block relative w-10 h-6 rounded-3xl transition-all bg-line peer-checked:bg-success after:h-5 after:w-5 after:top-0.5 after:absolute after:left-0 after:ms-0.5 after:transition-all after:rounded-full after:bg-white peer-checked:after:left-4\"></span>

\t\t\t\t\t\t\t\t<span class=\"text-content-dimmed peer-checked:hidden\">
\t\t\t\t\t\t\t\t\t";
        // line 222
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("status", "Inactive"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t</span>

\t\t\t\t\t\t\t\t<span class=\"hidden text-success peer-checked:inline\">
\t\t\t\t\t\t\t\t\t";
        // line 226
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("status", "Active"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</template>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"col-span-1 justify-self-end\">
\t\t\t\t\t\t<div class=\"relative\" @click.outside=\"\$refs.context.removeAttribute('data-open')\">

\t\t\t\t\t\t\t<button class=\"relative z-10\" @click=\"\$refs.context.toggleAttribute('data-open')\">
\t\t\t\t\t\t\t\t<i class=\"text-2xl ti ti-dots-vertical text-content-dimmed hover:text-intermediate-content\"></i>
\t\t\t\t\t\t\t</button>

\t\t\t\t\t\t\t<div class=\"menu\" x-ref=\"context\">
\t\t\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a :href=\"`admin/users/\${user.id}`\" class=\"flex gap-2 items-center px-4 py-2 hover:no-underline hover:bg-intermediate\">
\t\t\t\t\t\t\t\t\t\t\t<i class=\"ti ti-pencil\"></i>

\t\t\t\t\t\t\t\t\t\t\t";
        // line 245
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Edit"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t\t\t<template x-if=\"user.id != '";
        // line 249
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "id", [], "any", false, false, false, 249), "html", null, true);
        yield "'\">
\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t<button class=\"flex gap-2 items-center px-4 py-2 w-full hover:no-underline hover:bg-intermediate\" @click.prevent=\"currentResource = user; modal.open('delete-modal')\">
\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"ti ti-trash\"></i>

\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 254
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Delete"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t</template>
\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</li>
\t\t\t</template>
\t\t</ul>
\t</div>

\t";
        // line 267
        yield from $this->load("sections/delete-modal.twig", 267)->unwrap()->yield(CoreExtension::merge($context, ["message" => __("Do you really want to delete :title?"), "title" => "`\${currentResource.first_name} \${currentResource.last_name}`"]));
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "/templates/admin/users.twig";
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
        return array (  321 => 267,  305 => 254,  297 => 249,  290 => 245,  268 => 226,  261 => 222,  251 => 215,  239 => 208,  230 => 204,  217 => 193,  180 => 161,  176 => 160,  168 => 155,  164 => 154,  160 => 153,  156 => 152,  151 => 149,  149 => 148,  145 => 146,  142 => 144,  139 => 53,  131 => 47,  124 => 43,  121 => 42,  119 => 41,  99 => 24,  92 => 20,  88 => 18,  86 => 17,  79 => 16,  68 => 14,  63 => 1,  57 => 11,  54 => 10,  52 => 9,  50 => 5,  48 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "/templates/admin/users.twig", "/home/appcloud/resources/views/templates/admin/users.twig");
    }
}
