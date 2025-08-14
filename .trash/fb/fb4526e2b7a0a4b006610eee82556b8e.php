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

/* /templates/admin/plans.twig */
class __TwigTemplate_10cbdbd0552ed99a66de7d38c3c332bc extends Template
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
        $context["active_menu"] = "/admin/plans";
        // line 5
        $context["strings"] = ["delete_success" => __("Plan has been deleted successfully.")];
        // line 9
        $context["xdata"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 10
            yield "list(\"plans\",
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
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), p__("title", "Plans")), "html", null, true);
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
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Plans"), "html", null, true);
        yield "</h1>

\t\t\t<template x-if=\"total !== null\">
\t\t\t\t<div class=\"text-sm text-content-dimmed md:hidden\">
\t\t\t\t\t";
        // line 24
        yield Twig\Extension\CoreExtension::replace(__("Total :count plans"), [":count" => "<span x-text=\"total\"></span>"]);
        yield "
\t\t\t\t</div>
\t\t\t</template>
\t\t</div>

\t\t<div class=\"flex gap-2 items-center md:hidden\">
\t\t\t<button type=\"button\" class=\"hidden w-8 h-8 avatar\">
\t\t\t\t<i class=\"text-lg ti ti-adjustments-horizontal\"></i>
\t\t\t</button>

\t\t\t<a href=\"admin/plans/new\" class=\"w-8 h-8 rounded-full button button-accent button-sm\">
\t\t\t\t<i class=\"text-lg ti ti-plus\"></i>
\t\t\t</a>
\t\t</div>

\t\t<a href=\"admin/plans/new\" class=\"hidden md:flex button button-accent button-sm\">
\t\t\t";
        // line 40
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Create new plan"), "html", null, true);
        yield "
\t\t</a>
\t</div>

\t";
        // line 45
        yield "\t";
        yield from $this->load("/snippets/filters.twig", 45)->unwrap()->yield(CoreExtension::merge($context, ["total" => __("Total :count plans"), "filters" => [["label" => p__("label", "Billing cycle"), "model" => "billing_cycle", "options" => [["value" => "monthly", "label" => p__("billing-cycle", "Monthly")], ["value" => "yearly", "label" => p__("billing-cycle", "Yearly")], ["value" => "one-time", "label" => p__("billing-cycle", "One time pack")], ["value" => "lifetime", "label" => p__("billing-cycle", "Lifetime")]]], ["label" => p__("label", "Status"), "model" => "status", "options" => [["value" => "0", "label" => p__("status", "Inactive")], ["value" => "1", "label" => p__("status", "Active")]]]], "sort" => [["value" => null, "label" => p__("label", "Default")], ["value" => "created_at", "label" => p__("label", "Date")], ["value" => "price", "label" => p__("label", "Price")], ["value" => "superiority", "label" => p__("label", "Superiority")]]]));
        // line 107
        yield "
\t";
        // line 109
        yield "\t<div class=\"group/list\" :data-state=\"state\">
\t\t<div class=\"hidden group-data-[state=empty]/list:block\">
\t\t\t";
        // line 111
        yield from $this->load("sections/empty.twig", 111)->unwrap()->yield(CoreExtension::merge($context, ["title" => p__("heading", "Empty result set"), "message" => __("There are no plans yet."), "reset" => __("TThere are no plans matching your search.")]));
        // line 112
        yield "\t\t</div>

\t\t<div class=\"hidden md:grid grid-cols-12 gap-3 items-center px-3 py-2 text-content-dimmed text-xs group-data-[state=empty]/list:hidden\">
\t\t\t<div class=\"col-span-4\">";
        // line 115
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Name"), "html", null, true);
        yield "</div>
\t\t\t<div class=\"col-span-2\">";
        // line 116
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Billing cycle"), "html", null, true);
        yield "</div>
\t\t\t<div class=\"col-span-2\">";
        // line 117
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Price"), "html", null, true);
        yield "</div>
\t\t\t<div class=\"col-span-2\">";
        // line 118
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Created"), "html", null, true);
        yield "</div>
\t\t\t<div class=\"col-span-1\">";
        // line 119
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Status"), "html", null, true);
        yield "</div>
\t\t\t<div class=\"col-span-1\"></div>
\t\t</div>

\t\t<ul class=\"text-sm group-data-[state=empty]/list:hidden flex flex-col gap-1\">
\t\t\t";
        // line 124
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(range(1, 5));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 125
            yield "\t\t\t\t<li class=\"hidden md:grid-cols-12 gap-3 items-center justify-between p-3 box group-data-[state=initial]/list:flex md:group-data-[state=initial]/list:grid\">
\t\t\t\t\t<div class=\"flex col-span-4 gap-3 items-center\">
\t\t\t\t\t\t<div class=\"avatar loading\"></div>

\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t<div class=\"flex gap-2 items-center\">
\t\t\t\t\t\t\t\t<span class=\"w-28 h-5 loading\"></span>
\t\t\t\t\t\t\t\t<span class=\"hidden w-16 h-6 loading md:block\"></span>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div class=\"md:hidden\">
\t\t\t\t\t\t\t\t<span class=\"inline-block my-0.5 w-20 h-5 loading\"></span>
\t\t\t\t\t\t\t\t<span class=\"inline-block my-0.5 w-20 h-5 loading\"></span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"hidden md:block md:col-span-2\">
\t\t\t\t\t\t<span class=\"inline-block my-0.5 w-20 h-5 loading\"></span>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"hidden md:block md:col-span-2\">
\t\t\t\t\t\t<span class=\"inline-block my-0.5 w-20 h-5 loading\"></span>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"hidden md:block md:col-span-2\">
\t\t\t\t\t\t<span class=\"inline-block my-0.5 w-20 h-5 loading\"></span>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"hidden md:block md:col-span-1\"></div>

\t\t\t\t\t<div class=\"justify-self-end md:col-span-1\">
\t\t\t\t\t\t<i class=\"text-2xl ti ti-dots-vertical text-content-dimmed\"></i>
\t\t\t\t\t</div>
\t\t\t\t</li>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 161
        yield "
\t\t\t<template x-for=\"plan in resources\" :key=\"plan.id\">
\t\t\t\t<li class=\"flex relative grid-cols-12 gap-3 justify-between items-center p-3 md:grid box hover:border-line\" x-data>
\t\t\t\t\t<a :href=\"`admin/plans/\${plan.id}`\" class=\"absolute top-0 left-0 w-full h-full cursor-pointer\"></a>

\t\t\t\t\t<div class=\"flex col-span-4 gap-3 items-center\">
\t\t\t\t\t\t<x-avatar :title=\"plan.title\"></x-avatar>

\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t<div class=\"flex gap-2 items-center\">
\t\t\t\t\t\t\t\t<div class=\"font-bold\" x-text=\"`\${plan.title}`\"></div>

\t\t\t\t\t\t\t\t<div class=\"hidden md:block\">
\t\t\t\t\t\t\t\t\t<template x-if=\"plan.is_featured\">
\t\t\t\t\t\t\t\t\t\t<span class=\"badge badge-success\">";
        // line 175
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Featured"), "html", null, true);
        yield "</span>
\t\t\t\t\t\t\t\t\t</template>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div class=\"text-content-dimmed md:hidden\">
\t\t\t\t\t\t\t\t<x-money :data-value=\"plan.price\" currency=\"";
        // line 181
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["currency"] ?? null), "code", [], "any", false, false, false, 181), "html", null, true);
        yield "\" minor-units=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["currency"] ?? null), "fraction_digits", [], "any", false, false, false, 181), "html", null, true);
        yield "\"></x-money>
\t\t\t\t\t\t\t\t/
\t\t\t\t\t\t\t\t<span x-text=\"getBillingCycleLabel(plan.billing_cycle)\"></span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"hidden md:block md:col-span-2\" x-text=\"getBillingCycleLabel(plan.billing_cycle)\"></div>

\t\t\t\t\t<div class=\"hidden md:block md:col-span-2\">
\t\t\t\t\t\t<x-money :data-value=\"plan.price\" currency=\"";
        // line 191
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["currency"] ?? null), "code", [], "any", false, false, false, 191), "html", null, true);
        yield "\" minor-units=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["currency"] ?? null), "fraction_digits", [], "any", false, false, false, 191), "html", null, true);
        yield "\"></x-money>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"hidden md:block md:col-span-2\">
\t\t\t\t\t\t<x-time :datetime=\"plan.created_at\" data-type=\"date\"></x-time>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"hidden md:block md:col-span-1\">
\t\t\t\t\t\t<label class=\"inline-flex relative z-10 gap-2 items-center cursor-pointer\">
\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"status\" class=\"hidden peer\" :checked=\"plan.status == 1\" @click=\"toggleStatus(plan)\">

\t\t\t\t\t\t\t<span class=\"block relative w-10 h-6 rounded-3xl transition-all bg-line peer-checked:bg-success after:h-5 after:w-5 after:top-0.5 after:absolute after:left-0 after:ms-0.5 after:transition-all after:rounded-full after:bg-white peer-checked:after:left-4\"></span>

\t\t\t\t\t\t\t<span class=\"text-content-dimmed peer-checked:hidden\">
\t\t\t\t\t\t\t\t";
        // line 205
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("status", "Inactive"), "html", null, true);
        yield "
\t\t\t\t\t\t\t</span>

\t\t\t\t\t\t\t<span class=\"hidden text-success peer-checked:inline\">
\t\t\t\t\t\t\t\t";
        // line 209
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("status", "Active"), "html", null, true);
        yield "
\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t</label>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"justify-self-end md:col-span-1\">
\t\t\t\t\t\t<div class=\"relative\" @click.outside=\"\$refs.context.removeAttribute('data-open')\">

\t\t\t\t\t\t\t<button class=\"relative z-10\" @click=\"\$refs.context.toggleAttribute('data-open')\">
\t\t\t\t\t\t\t\t<i class=\"text-2xl ti ti-dots-vertical text-content-dimmed hover:text-intermediate-content\"></i>
\t\t\t\t\t\t\t</button>

\t\t\t\t\t\t\t<div class=\"menu\" x-ref=\"context\">
\t\t\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a :href=\"`admin/plans/\${plan.id}`\" class=\"flex gap-2 items-center px-4 py-2 hover:no-underline hover:bg-intermediate\">
\t\t\t\t\t\t\t\t\t\t\t<i class=\"ti ti-pencil\"></i>
\t\t\t\t\t\t\t\t\t\t\t";
        // line 226
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Edit"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<button class=\"flex gap-2 items-center px-4 py-2 w-full hover:no-underline hover:bg-intermediate\" @click.prevent=\"currentResource = plan; modal.open('delete-modal')\">
\t\t\t\t\t\t\t\t\t\t\t<i class=\"ti ti-trash\"></i>
\t\t\t\t\t\t\t\t\t\t\t";
        // line 233
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
        // line 245
        yield from $this->load("sections/delete-modal.twig", 245)->unwrap()->yield(CoreExtension::merge($context, ["message" => __("Do you really want to delete :title from membership plans?"), "title" => "currentResource.title"]));
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "/templates/admin/plans.twig";
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
        return array (  322 => 245,  307 => 233,  297 => 226,  277 => 209,  270 => 205,  251 => 191,  236 => 181,  227 => 175,  211 => 161,  170 => 125,  166 => 124,  158 => 119,  154 => 118,  150 => 117,  146 => 116,  142 => 115,  137 => 112,  135 => 111,  131 => 109,  128 => 107,  125 => 45,  118 => 40,  99 => 24,  92 => 20,  88 => 18,  86 => 17,  79 => 16,  68 => 14,  63 => 1,  57 => 11,  54 => 10,  52 => 9,  50 => 5,  48 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "/templates/admin/plans.twig", "/home/appcloud/resources/views/templates/admin/plans.twig");
    }
}
