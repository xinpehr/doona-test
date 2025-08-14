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

/* /templates/admin/plan.twig */
class __TwigTemplate_54460501f039922d0e4bcd8a80176eda extends Template
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
        $context["groups"] = [["heading" => p__("heading", "Text Models"), "type" => "llm"], ["heading" => p__("heading", "Image Models"), "type" => "image"], ["heading" => p__("heading", "Voice Models"), "type" => "tts"], ["heading" => p__("heading", "Video Models"), "type" => "video"]];
        // line 24
        $context["xdata"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 25
            yield "plan(
";
            // line 26
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(json_encode(($context["currency"] ?? null)), "html", null, true);
            yield ",
";
            // line 27
            yield ((array_key_exists("plan", $context)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(json_encode(($context["plan"] ?? null)), "html", null, true)) : (null));
            yield "
)
";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 1
        $this->parent = $this->load("/layouts/main.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 31
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), ((array_key_exists("plan", $context)) ? (p__("title", "Edit plan")) : (p__("title", "New plan")))), "html", null, true);
        yield from [];
    }

    // line 33
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_template(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 34
        yield "\t<x-form>
\t\t<form class=\"flex flex-col gap-8\" @submit.prevent=\"submit\">
\t\t\t<div>
\t\t\t\t";
        // line 37
        yield from $this->load("snippets/back.twig", 37)->unwrap()->yield(CoreExtension::merge($context, ["link" => "admin/plans", "label" => "Plans"]));
        // line 38
        yield "
\t\t\t\t<h1 class=\"mt-4\">
\t\t\t\t\t<span x-show=\"!plan.id\">
\t\t\t\t\t\t";
        // line 41
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Create new plan"), "html", null, true);
        yield "
\t\t\t\t\t</span>
\t\t\t\t\t<span x-show=\"plan.id\">
\t\t\t\t\t\t";
        // line 44
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Edit plan"), "html", null, true);
        yield ":
\t\t\t\t\t\t<span class=\"font-normal text-intermediate-content\" x-text=\"plan.title\"></span>
\t\t\t\t\t</span>
\t\t\t\t</h1>

\t\t\t\t<template x-if=\"plan.id\">
\t\t\t\t\t<div class=\"mt-2\">
\t\t\t\t\t\t<x-uuid x-text=\"plan.id\"></x-uuid>
\t\t\t\t\t</div>
\t\t\t\t</template>
\t\t\t</div>

\t\t\t<div class=\"flex flex-col gap-2\">
\t\t\t\t<section class=\"grid gap-6 box\" data-density=\"comfortable\">
\t\t\t\t\t<h2>";
        // line 58
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Details"), "html", null, true);
        yield "</h2>

\t\t\t\t\t<div>
\t\t\t\t\t\t<label for=\"title\">";
        // line 61
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Title"), "html", null, true);
        yield "</label>

\t\t\t\t\t\t<input type=\"text\" id=\"title\" class=\"mt-2 input\" autocomplete=\"off\" :placeholder=\"plan.title || `";
        // line 63
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Include a title for the plan"), "html_attr");
        yield "`\" x-model=\"model.title\" required/>
\t\t\t\t\t</div>

\t\t\t\t\t<div>
\t\t\t\t\t\t<label for=\"description\">";
        // line 67
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Description"), "html", null, true);
        yield "</label>

\t\t\t\t\t\t<textarea id=\"description\" rows=\"1\" class=\"mt-2 input\" autocomplete=\"off\" :placeholder=\"plan.description || ''\" x-model=\"model.description\"></textarea>
\t\t\t\t\t</div>

\t\t\t\t\t<div>
\t\t\t\t\t\t<label for=\"icon\">";
        // line 73
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Icon"), "html", null, true);
        yield "</label>

\t\t\t\t\t\t<input type=\"text\" id=\"icon\" name=\"icon\" class=\"mt-2 input\" autocomplete=\"off\" :placeholder=\"plan.icon || ''\" x-model=\"model.icon\"/>

\t\t\t\t\t\t<p class=\"mt-2 text-sm text-intermediate-content\">
\t\t\t\t\t\t\t<i class=\"ti ti-info-square-rounded\"></i>

\t\t\t\t\t\t\t";
        // line 80
        $context["link"] = new Markup("\t\t\t\t\t\t\t<a href=\"https://tabler-icons.io/\" target=\"_blank\" class=\"font-semibold text-content\">Tabler Icons</a>
\t\t\t\t\t\t\t", $this->env->getCharset());
        // line 83
        yield "
\t\t\t\t\t\t\t";
        // line 84
        yield __("Include SVG source code or name of the any icon from %s", ($context["link"] ?? null));
        yield "
\t\t\t\t\t\t</p>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"flex justify-between items-center p-3 rounded-lg bg-intermediate\">
\t\t\t\t\t\t";
        // line 89
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Status"), "html", null, true);
        yield "

\t\t\t\t\t\t<label class=\"inline-flex gap-2 items-center cursor-pointer\">
\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"status\" class=\"hidden peer\" x-model=\"model.status\">

\t\t\t\t\t\t\t<span class=\"block relative w-10 h-6 rounded-3xl transition-all bg-line peer-checked:bg-success after:h-5 after:w-5 after:top-0.5 after:absolute after:left-0 after:ms-0.5 after:transition-all after:rounded-full after:bg-white peer-checked:after:left-4\"></span>

\t\t\t\t\t\t\t<span class=\"text-content-dimmed peer-checked:hidden\">
\t\t\t\t\t\t\t\t";
        // line 97
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("input-value", "Inactive"), "html", null, true);
        yield "
\t\t\t\t\t\t\t</span>

\t\t\t\t\t\t\t<span class=\"hidden text-success peer-checked:inline\">
\t\t\t\t\t\t\t\t";
        // line 101
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("input-value", "Active"), "html", null, true);
        yield "
\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t</label>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"flex justify-between items-center p-3 rounded-lg bg-intermediate\">
\t\t\t\t\t\t";
        // line 107
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Featured plan"), "html", null, true);
        yield "

\t\t\t\t\t\t<label class=\"inline-flex gap-2 items-center cursor-pointer\">
\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"is_featured\" class=\"hidden peer\" x-model=\"model.is_featured\">

\t\t\t\t\t\t\t<span class=\"block relative w-10 h-6 rounded-3xl transition-all bg-line peer-checked:bg-success after:h-5 after:w-5 after:top-0.5 after:absolute after:left-0 after:ms-0.5 after:transition-all after:rounded-full after:bg-white peer-checked:after:left-4\"></span>

\t\t\t\t\t\t\t<span class=\"text-content-dimmed peer-checked:hidden\">
\t\t\t\t\t\t\t\t";
        // line 115
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("input-value", "Off"), "html", null, true);
        yield "
\t\t\t\t\t\t\t</span>

\t\t\t\t\t\t\t<span class=\"hidden text-success peer-checked:inline\">
\t\t\t\t\t\t\t\t";
        // line 119
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("input-value", "On"), "html", null, true);
        yield "
\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t</label>
\t\t\t\t\t</div>

\t\t\t\t\t<div>
\t\t\t\t\t\t<label for=\"offers\">";
        // line 125
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Offers"), "html", null, true);
        yield "</label>

\t\t\t\t\t\t<textarea id=\"offers\" rows=\"2\" class=\"mt-2 input\" autocomplete=\"off\" :placeholder=\"plan.features || 'Basic support, -Dedicated account manager'\" x-model=\"model.features\"></textarea>

\t\t\t\t\t\t<ul class=\"info mt-2\">
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t";
        // line 131
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Comma separated list of additional offers. To show the offer as excluded add a dash (-) before the name."), "html", null, true);
        yield "
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t</section>

\t\t\t\t<section class=\"grid gap-6 md:grid-cols-2 box\" data-density=\"comfortable\">
\t\t\t\t\t<h2 class=\"md:col-span-2\">";
        // line 138
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Pricing"), "html", null, true);
        yield "</h2>

\t\t\t\t\t<div class=\"md:col-span-2\">
\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t<label>";
        // line 142
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Plan type"), "html", null, true);
        yield "</label>

\t\t\t\t\t\t\t<select name=\"category\" name=\"billing-cycle\" class=\"mt-2 input\" x-model=\"model.billing_cycle\">
\t\t\t\t\t\t\t\t<option value=\"monthly\" :selected=\"model.billing_cycle == 'monthly'\">
\t\t\t\t\t\t\t\t\t";
        // line 146
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Monthly"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t</option>

\t\t\t\t\t\t\t\t<option value=\"yearly\" :selected=\"model.billing_cycle == 'yearly'\">
\t\t\t\t\t\t\t\t\t";
        // line 150
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Yearly"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t</option>

\t\t\t\t\t\t\t\t<option value=\"one-time\" :selected=\"model.billing_cycle == 'one-time'\">
\t\t\t\t\t\t\t\t\t";
        // line 154
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Addon credits"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t</option>

\t\t\t\t\t\t\t\t<option value=\"lifetime\" :selected=\"model.billing_cycle == 'lifetime'\">
\t\t\t\t\t\t\t\t\t";
        // line 158
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Lifetime"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t</option>
\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<template x-if=\"model.billing_cycle == 'one-time'\">
\t\t\t\t\t\t\t<ul class=\"info mt-2\">
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t";
        // line 166
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Add-on credits are non-recurring, permanent extras that can be purchased at any time to enhance the current subscription of a workspace. These credits are used only after the workspace's regular, recurring credits are depleted."), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t";
        // line 170
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Add-on credits can be applied to any active subscription, whether free or paid. However, they require an active subscription to be usable."), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</template>

\t\t\t\t\t\t<template x-if=\"model.billing_cycle == 'lifetime'\">
\t\t\t\t\t\t\t<ul class=\"info mt-2\">
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t";
        // line 178
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("The Lifetime Plan is a one-time payment option that grants users access to your service indefinitely."), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t";
        // line 182
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Workspaces receive monthly recurring usage credits as part of their Lifetime Plan. These credits reset each month, providing consistent access to your service's features."), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</template>

\t\t\t\t\t\t<template x-if=\"model.billing_cycle == 'monthly'\">
\t\t\t\t\t\t\t<ul class=\"info mt-2\">
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t";
        // line 190
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("The Monthly Plan requires users to pay (automatically) a set fee every month to maintain access to your service."), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t";
        // line 194
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Workspaces on the Monthly Plan receive monthly recurring usage credits. These credits are reset once in 30 days."), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</template>

\t\t\t\t\t\t<template x-if=\"model.billing_cycle == 'yearly'\">
\t\t\t\t\t\t\t<ul class=\"info mt-2\">
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t";
        // line 202
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Users opting for the Yearly Plan make a single payment for a year's worth of access to your service."), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t";
        // line 206
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Despite the yearly payment, workspaces still receive monthly recurring usage credits. This ensures that users have regular access to your service throughout their subscription period."), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</template>
\t\t\t\t\t</div>

\t\t\t\t\t<div>
\t\t\t\t\t\t<label for=\"price\" class=\"flex gap-2 items-center\">
\t\t\t\t\t\t\t<span>";
        // line 214
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Price"), "html", null, true);
        yield "</span>

\t\t\t\t\t\t\t<template x-if=\"model.billing_cycle == 'one-time' || model.billing_cycle == 'lifetime'\">
\t\t\t\t\t\t\t\t<span class=\"badge\">
\t\t\t\t\t\t\t\t\t";
        // line 218
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("One-time"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t</template>

\t\t\t\t\t\t\t<template x-if=\"model.billing_cycle == 'monthly'\">
\t\t\t\t\t\t\t\t<span class=\"flex gap-1 items-center\">
\t\t\t\t\t\t\t\t\t<span class=\"badge\">
\t\t\t\t\t\t\t\t\t\t";
        // line 225
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Recurring"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t\t</span>

\t\t\t\t\t\t\t\t\t<span class=\"badge\">
\t\t\t\t\t\t\t\t\t\t";
        // line 229
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("30 days"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t</template>

\t\t\t\t\t\t\t<template x-if=\"model.billing_cycle == 'yearly'\">
\t\t\t\t\t\t\t\t<span class=\"flex gap-1 items-center\">
\t\t\t\t\t\t\t\t\t<span class=\"badge\">
\t\t\t\t\t\t\t\t\t\t";
        // line 237
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Recurring"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t\t</span>

\t\t\t\t\t\t\t\t\t<span class=\"badge\">
\t\t\t\t\t\t\t\t\t\t";
        // line 241
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("365 days"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t</template>
\t\t\t\t\t\t</label>

\t\t\t\t\t\t<div class=\"relative\">
\t\t\t\t\t\t\t<input type=\"text\" id=\"price\" name=\"title\" class=\"pe-11 mt-2 input\" autocomplete=\"off\" placeholder=\"";
        // line 248
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Include price"), "html", null, true);
        yield "\" required x-model=\"model.price\" x-mask:dynamic=\"\$money(\$input, '.', ' ', ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["currency"] ?? null), "fraction_digits", [], "any", false, false, false, 248), "html", null, true);
        yield ")\" x-ref=\"price\"/>

\t\t\t\t\t\t\t<code class=\"absolute end-3 top-1/2 text-sm font-medium -translate-y-1/2 pointer-events-none text-content-dimmed\">";
        // line 250
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["currency"] ?? null), "code", [], "any", false, false, false, 250), "html", null, true);
        yield "</code>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div>
\t\t\t\t\t\t<label for=\"credit-count\" class=\"flex gap-2 items-center\">
\t\t\t\t\t\t\t<span>
\t\t\t\t\t\t\t\t";
        // line 257
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Credit limit"), "html", null, true);
        yield "
\t\t\t\t\t\t\t</span>

\t\t\t\t\t\t\t<template x-if=\"model.billing_cycle == 'one-time'\">
\t\t\t\t\t\t\t\t<span class=\"badge\">
\t\t\t\t\t\t\t\t\t";
        // line 262
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Non-expiring"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t</template>

\t\t\t\t\t\t\t<template x-if=\"['lifetime', 'monthly', 'yearly'].includes(model.billing_cycle)\">
\t\t\t\t\t\t\t\t<span class=\"flex gap-1 items-center\">
\t\t\t\t\t\t\t\t\t<span class=\"badge\">
\t\t\t\t\t\t\t\t\t\t";
        // line 269
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Renewing"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t\t</span>

\t\t\t\t\t\t\t\t\t<span class=\"badge\">
\t\t\t\t\t\t\t\t\t\t";
        // line 273
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("30 days"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t</template>
\t\t\t\t\t\t</label>

\t\t\t\t\t\t<input type=\"number\" id=\"credit-count\" name=\"title\" class=\"mt-2 input\" autocomplete=\"off\" :placeholder=\"plan.credit_count || `";
        // line 279
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Unlimited"), "html", null, true);
        yield "`\" x-model=\"model.credit_count\"/>
\t\t\t\t\t</div>

\t\t\t\t\t<template x-if=\"model.billing_cycle != 'one-time'\">
\t\t\t\t\t\t<div class=\"md:col-span-2\">
\t\t\t\t\t\t\t<label for=\"member-cap\" class=\"flex gap-2 items-center\">
\t\t\t\t\t\t\t\t";
        // line 285
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Member cap"), "html", null, true);
        yield "
\t\t\t\t\t\t\t</label>

\t\t\t\t\t\t\t<input type=\"number\" id=\"member-cap\" class=\"mt-2 input\" autocomplete=\"off\" placeholder=\"";
        // line 288
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Unlimited"), "html", null, true);
        yield "\" min=\"0\" x-model=\"model.member_cap\"/>

\t\t\t\t\t\t\t<ul class=\"info mt-2\">
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t";
        // line 292
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("This setting limits the number of members a workspace can have."), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t\t";
        // line 293
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("This includes users and pending invitations, but excludes the owner."), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t";
        // line 297
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Leave blank for unlimited."), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</div>
\t\t\t\t\t</template>
\t\t\t\t</section>

\t\t\t\t<template x-if=\"model.billing_cycle != 'one-time'\">
\t\t\t\t\t<section class=\"flex flex-col gap-6 box\" data-density=\"comfortable\">
\t\t\t\t\t\t<h2>";
        // line 306
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Tools"), "html", null, true);
        yield "</h2>

\t\t\t\t\t\t<div class=\"grid gap-6 md:grid-cols-2\">
\t\t\t\t\t\t\t<label class=\"flex gap-4 items-center cursor-pointer box hover:border-line\">
\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<div class=\"flex gap-2 items-center label\">
\t\t\t\t\t\t\t\t\t\t";
        // line 312
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Writer"), "html", null, true);
        yield "

\t\t\t\t\t\t\t\t\t\t";
        // line 314
        if (( !CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, true, false, 314), "writer", [], "any", false, true, false, 314), "is_enabled", [], "any", true, true, false, 314) || (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, false, false, 314), "writer", [], "any", false, false, false, 314), "is_enabled", [], "any", false, false, false, 314) == false))) {
            // line 315
            yield "\t\t\t\t\t\t\t\t\t\t\t<i class=\"text-base ti ti-alert-square-rounded-filled text-failure\" x-tooltip.raw=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Disabled globally"), "html", null, true);
            yield "\"></i>
\t\t\t\t\t\t\t\t\t\t";
        }
        // line 317
        yield "\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<p class=\"font-normal text-content-dimmed\">
\t\t\t\t\t\t\t\t\t\t";
        // line 320
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("writer-tool-description", "Write SEO optimized blogs, sales emails and more..."), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<div class=\"ms-auto\">
\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" class=\"hidden peer\" x-model=\"model.config.writer.is_enabled\">

\t\t\t\t\t\t\t\t\t<span class=\"block relative w-10 h-6 rounded-3xl transition-all bg-line peer-checked:bg-success after:h-5 after:w-5 after:top-0.5 after:absolute after:left-0 after:ms-0.5 after:transition-all after:rounded-full after:bg-white peer-checked:after:left-4\"></span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</label>

\t\t\t\t\t\t\t<label class=\"flex gap-4 items-center cursor-pointer box hover:border-line\">
\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<div class=\"flex gap-2 items-center label\">
\t\t\t\t\t\t\t\t\t\t";
        // line 334
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Coder"), "html", null, true);
        yield "

\t\t\t\t\t\t\t\t\t\t";
        // line 336
        if (( !CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, true, false, 336), "coder", [], "any", false, true, false, 336), "is_enabled", [], "any", true, true, false, 336) || (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, false, false, 336), "coder", [], "any", false, false, false, 336), "is_enabled", [], "any", false, false, false, 336) == false))) {
            // line 337
            yield "\t\t\t\t\t\t\t\t\t\t\t<i class=\"text-base ti ti-alert-square-rounded-filled text-failure\" x-tooltip.raw=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Disabled globally"), "html", null, true);
            yield "\"></i>
\t\t\t\t\t\t\t\t\t\t";
        }
        // line 339
        yield "\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<p class=\"font-normal text-content-dimmed\">
\t\t\t\t\t\t\t\t\t\t";
        // line 341
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("coder-tool-description", "Ready to write code at the speed of light?"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<div class=\"ms-auto\">
\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" class=\"hidden peer\" x-model=\"model.config.coder.is_enabled\">

\t\t\t\t\t\t\t\t\t<span class=\"block relative w-10 h-6 rounded-3xl transition-all bg-line peer-checked:bg-success after:h-5 after:w-5 after:top-0.5 after:absolute after:left-0 after:ms-0.5 after:transition-all after:rounded-full after:bg-white peer-checked:after:left-4\"></span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</label>

\t\t\t\t\t\t\t<label class=\"flex gap-4 items-center cursor-pointer box hover:border-line\">
\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<div class=\"flex gap-2 items-center label\">
\t\t\t\t\t\t\t\t\t\t";
        // line 355
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Video"), "html", null, true);
        yield "

\t\t\t\t\t\t\t\t\t\t";
        // line 357
        if (( !CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, true, false, 357), "video", [], "any", false, true, false, 357), "is_enabled", [], "any", true, true, false, 357) || (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, false, false, 357), "video", [], "any", false, false, false, 357), "is_enabled", [], "any", false, false, false, 357) == false))) {
            // line 358
            yield "\t\t\t\t\t\t\t\t\t\t\t<i class=\"text-base ti ti-alert-square-rounded-filled text-failure\" x-tooltip.raw=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Disabled globally"), "html", null, true);
            yield "\"></i>
\t\t\t\t\t\t\t\t\t\t";
        }
        // line 360
        yield "\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<p class=\"font-normal text-content-dimmed\">
\t\t\t\t\t\t\t\t\t\t";
        // line 362
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("video-tool-description", "Create videos from text and images."), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<div class=\"ms-auto\">
\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" class=\"hidden peer\" x-model=\"model.config.video.is_enabled\">

\t\t\t\t\t\t\t\t\t<span class=\"block relative w-10 h-6 rounded-3xl transition-all bg-line peer-checked:bg-success after:h-5 after:w-5 after:top-0.5 after:absolute after:left-0 after:ms-0.5 after:transition-all after:rounded-full after:bg-white peer-checked:after:left-4\"></span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</label>

\t\t\t\t\t\t\t<label class=\"flex gap-4 items-center cursor-pointer box hover:border-line\">
\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<div class=\"flex gap-2 items-center label\">
\t\t\t\t\t\t\t\t\t\t";
        // line 376
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Imagine"), "html", null, true);
        yield "

\t\t\t\t\t\t\t\t\t\t";
        // line 378
        if (( !CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, true, false, 378), "imagine", [], "any", false, true, false, 378), "is_enabled", [], "any", true, true, false, 378) || (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, false, false, 378), "imagine", [], "any", false, false, false, 378), "is_enabled", [], "any", false, false, false, 378) == false))) {
            // line 379
            yield "\t\t\t\t\t\t\t\t\t\t\t<i class=\"text-base ti ti-alert-square-rounded-filled text-failure\" x-tooltip.raw=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Disabled globally"), "html", null, true);
            yield "\"></i>
\t\t\t\t\t\t\t\t\t\t";
        }
        // line 381
        yield "\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<p class=\"font-normal text-content-dimmed\">
\t\t\t\t\t\t\t\t\t\t";
        // line 383
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("imagine-tool-description", "Visualize what you dream of. Create images from text."), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<div class=\"ms-auto\">
\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" class=\"hidden peer\" x-model=\"model.config.imagine.is_enabled\">

\t\t\t\t\t\t\t\t\t<span class=\"block relative w-10 h-6 rounded-3xl transition-all bg-line peer-checked:bg-success after:h-5 after:w-5 after:top-0.5 after:absolute after:left-0 after:ms-0.5 after:transition-all after:rounded-full after:bg-white peer-checked:after:left-4\"></span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</label>

\t\t\t\t\t\t\t<label class=\"flex gap-4 items-center cursor-pointer box hover:border-line\">
\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<div class=\"flex gap-2 items-center label\">
\t\t\t\t\t\t\t\t\t\t";
        // line 397
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Transcriber"), "html", null, true);
        yield "

\t\t\t\t\t\t\t\t\t\t";
        // line 399
        if (( !CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, true, false, 399), "transcriber", [], "any", false, true, false, 399), "is_enabled", [], "any", true, true, false, 399) || (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, false, false, 399), "transcriber", [], "any", false, false, false, 399), "is_enabled", [], "any", false, false, false, 399) == false))) {
            // line 400
            yield "\t\t\t\t\t\t\t\t\t\t\t<i class=\"text-base ti ti-alert-square-rounded-filled text-failure\" x-tooltip.raw=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Disabled globally"), "html", null, true);
            yield "\"></i>
\t\t\t\t\t\t\t\t\t\t";
        }
        // line 402
        yield "\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<p class=\"font-normal text-content-dimmed\">
\t\t\t\t\t\t\t\t\t\t";
        // line 404
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("transcriber-tool-description", "Instantly transcribe spoken words into text."), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<div class=\"ms-auto\">
\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" class=\"hidden peer\" x-model=\"model.config.transcriber.is_enabled\">

\t\t\t\t\t\t\t\t\t<span class=\"block relative w-10 h-6 rounded-3xl transition-all bg-line peer-checked:bg-success after:h-5 after:w-5 after:top-0.5 after:absolute after:left-0 after:ms-0.5 after:transition-all after:rounded-full after:bg-white peer-checked:after:left-4\"></span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</label>

\t\t\t\t\t\t\t<label class=\"flex gap-4 items-center cursor-pointer box hover:border-line\">
\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<div class=\"flex gap-2 items-center label\">
\t\t\t\t\t\t\t\t\t\t";
        // line 418
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Voiceover"), "html", null, true);
        yield "

\t\t\t\t\t\t\t\t\t\t";
        // line 420
        if (( !CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, true, false, 420), "voiceover", [], "any", false, true, false, 420), "is_enabled", [], "any", true, true, false, 420) || (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, false, false, 420), "voiceover", [], "any", false, false, false, 420), "is_enabled", [], "any", false, false, false, 420) == false))) {
            // line 421
            yield "\t\t\t\t\t\t\t\t\t\t\t<i class=\"text-base ti ti-alert-square-rounded-filled text-failure\" x-tooltip.raw=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Disabled globally"), "html", null, true);
            yield "\"></i>
\t\t\t\t\t\t\t\t\t\t";
        }
        // line 423
        yield "\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<p class=\"font-normal text-content-dimmed\">
\t\t\t\t\t\t\t\t\t\t";
        // line 425
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("voiceover-tool-description", "Convert your texts into lifelike speech"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<div class=\"ms-auto\">
\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" class=\"hidden peer\" x-model=\"model.config.voiceover.is_enabled\">

\t\t\t\t\t\t\t\t\t<span class=\"block relative w-10 h-6 rounded-3xl transition-all bg-line peer-checked:bg-success after:h-5 after:w-5 after:top-0.5 after:absolute after:left-0 after:ms-0.5 after:transition-all after:rounded-full after:bg-white peer-checked:after:left-4\"></span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</label>

\t\t\t\t\t\t\t<label class=\"flex gap-4 items-center cursor-pointer box hover:border-line\">
\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<div class=\"flex gap-2 items-center label\">
\t\t\t\t\t\t\t\t\t\t";
        // line 439
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Chat"), "html", null, true);
        yield "

\t\t\t\t\t\t\t\t\t\t";
        // line 441
        if (( !CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, true, false, 441), "chat", [], "any", false, true, false, 441), "is_enabled", [], "any", true, true, false, 441) || (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, false, false, 441), "chat", [], "any", false, false, false, 441), "is_enabled", [], "any", false, false, false, 441) == false))) {
            // line 442
            yield "\t\t\t\t\t\t\t\t\t\t\t<i class=\"text-base ti ti-alert-square-rounded-filled text-failure\" x-tooltip.raw=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Disabled globally"), "html", null, true);
            yield "\"></i>
\t\t\t\t\t\t\t\t\t\t";
        }
        // line 444
        yield "\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<p class=\"font-normal text-content-dimmed\">
\t\t\t\t\t\t\t\t\t\t";
        // line 446
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("chat-tool-description", "Chat with AI assistants"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<div class=\"ms-auto\">
\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" class=\"hidden peer\" x-model=\"model.config.chat.is_enabled\">

\t\t\t\t\t\t\t\t\t<span class=\"block relative w-10 h-6 rounded-3xl transition-all bg-line peer-checked:bg-success after:h-5 after:w-5 after:top-0.5 after:absolute after:left-0 after:ms-0.5 after:transition-all after:rounded-full after:bg-white peer-checked:after:left-4\"></span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</label>

\t\t\t\t\t\t\t<label class=\"flex gap-4 items-center cursor-pointer box hover:border-line\">
\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<div class=\"flex gap-2 items-center label\">
\t\t\t\t\t\t\t\t\t\t";
        // line 460
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Voice isolator"), "html", null, true);
        yield "

\t\t\t\t\t\t\t\t\t\t";
        // line 462
        if (( !CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, true, false, 462), "voice_isolator", [], "any", false, true, false, 462), "is_enabled", [], "any", true, true, false, 462) || (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, false, false, 462), "voice_isolator", [], "any", false, false, false, 462), "is_enabled", [], "any", false, false, false, 462) == false))) {
            // line 463
            yield "\t\t\t\t\t\t\t\t\t\t\t<i class=\"text-base ti ti-alert-square-rounded-filled text-failure\" x-tooltip.raw=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Disabled globally"), "html", null, true);
            yield "\"></i>
\t\t\t\t\t\t\t\t\t\t";
        }
        // line 465
        yield "\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<p class=\"font-normal text-content-dimmed\">
\t\t\t\t\t\t\t\t\t\t";
        // line 467
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("voice-isolator-tool-description", "Isolate voice from background noise."), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<div class=\"ms-auto\">
\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" class=\"hidden peer\" x-model=\"model.config.voice_isolator.is_enabled\">

\t\t\t\t\t\t\t\t\t<span class=\"block relative w-10 h-6 rounded-3xl transition-all bg-line peer-checked:bg-success after:h-5 after:w-5 after:top-0.5 after:absolute after:left-0 after:ms-0.5 after:transition-all after:rounded-full after:bg-white peer-checked:after:left-4\"></span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</label>

\t\t\t\t\t\t\t<label class=\"flex gap-4 items-center cursor-pointer box hover:border-line\">
\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<div class=\"flex gap-2 items-center label\">
\t\t\t\t\t\t\t\t\t\t";
        // line 481
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Classifier"), "html", null, true);
        yield "

\t\t\t\t\t\t\t\t\t\t";
        // line 483
        if (( !CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, true, false, 483), "classifier", [], "any", false, true, false, 483), "is_enabled", [], "any", true, true, false, 483) || (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, false, false, 483), "classifier", [], "any", false, false, false, 483), "is_enabled", [], "any", false, false, false, 483) == false))) {
            // line 484
            yield "\t\t\t\t\t\t\t\t\t\t\t<i class=\"text-base ti ti-alert-square-rounded-filled text-failure\" x-tooltip.raw=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Disabled globally"), "html", null, true);
            yield "\"></i>
\t\t\t\t\t\t\t\t\t\t";
        }
        // line 486
        yield "\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<p class=\"font-normal text-content-dimmed\">
\t\t\t\t\t\t\t\t\t\t";
        // line 488
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("classifier-tool-description", "Classify content as potentially harmful across several categories."), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<div class=\"ms-auto\">
\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" class=\"hidden peer\" x-model=\"model.config.classifier.is_enabled\">

\t\t\t\t\t\t\t\t\t<span class=\"block relative w-10 h-6 rounded-3xl transition-all bg-line peer-checked:bg-success after:h-5 after:w-5 after:top-0.5 after:absolute after:left-0 after:ms-0.5 after:transition-all after:rounded-full after:bg-white peer-checked:after:left-4\"></span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</label>

\t\t\t\t\t\t\t<label class=\"flex gap-4 items-center cursor-pointer box hover:border-line\">
\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<div class=\"flex gap-2 items-center label\">
\t\t\t\t\t\t\t\t\t\t";
        // line 502
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Composer"), "html", null, true);
        yield "

\t\t\t\t\t\t\t\t\t\t";
        // line 504
        if (( !CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, true, false, 504), "composer", [], "any", false, true, false, 504), "is_enabled", [], "any", true, true, false, 504) || (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, false, false, 504), "composer", [], "any", false, false, false, 504), "is_enabled", [], "any", false, false, false, 504) == false))) {
            // line 505
            yield "\t\t\t\t\t\t\t\t\t\t\t<i class=\"text-base ti ti-alert-square-rounded-filled text-failure\" x-tooltip.raw=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Disabled globally"), "html", null, true);
            yield "\"></i>
\t\t\t\t\t\t\t\t\t\t";
        }
        // line 507
        yield "\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<p class=\"font-normal text-content-dimmed\">
\t\t\t\t\t\t\t\t\t\t";
        // line 509
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("composer-tool-description", "Create music and sounds."), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<div class=\"ms-auto\">
\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" class=\"hidden peer\" x-model=\"model.config.composer.is_enabled\">

\t\t\t\t\t\t\t\t\t<span class=\"block relative w-10 h-6 rounded-3xl transition-all bg-line peer-checked:bg-success after:h-5 after:w-5 after:top-0.5 after:absolute after:left-0 after:ms-0.5 after:transition-all after:rounded-full after:bg-white peer-checked:after:left-4\"></span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"[&>div:first-of-type]:pt-6 [&>div:first-of-type]:border-t [&>div:first-of-type]:border-line-dimmed\">
\t\t\t\t\t\t\t<template x-if=\"model.config.voiceover.is_enabled\">
\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<label for=\"cloned-voice-cap\">";
        // line 524
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Cloned voice cap"), "html", null, true);
        yield "</label>
\t\t\t\t\t\t\t\t\t<input type=\"number\" id=\"cloned-voice-cap\" class=\"mt-2 input\" autocomplete=\"off\" placeholder=\"";
        // line 525
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Unlimited"), "html", null, true);
        yield "\" min=\"0\" x-model=\"model.config.voiceover.clone_cap\"/>

\t\t\t\t\t\t\t\t\t<ul class=\"info mt-2\">
\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t";
        // line 529
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Leave blank for unlimited. Set to zero to disable voice cloning."), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</template>
\t\t\t\t\t\t</div>
\t\t\t\t\t</section>
\t\t\t\t</template>

\t\t\t\t<template x-if=\"model.billing_cycle != 'one-time'\">
\t\t\t\t\t<section class=\"flex flex-col gap-6 box\" data-density=\"comfortable\">
\t\t\t\t\t\t<h2>";
        // line 540
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Capabilities"), "html", null, true);
        yield "</h2>

\t\t\t\t\t\t<div class=\"grid gap-2\">
\t\t\t\t\t\t\t<label class=\"flex gap-4 items-center cursor-pointer box hover:border-line\">
\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<div class=\"flex gap-2 items-center text-sm\">
\t\t\t\t\t\t\t\t\t\t";
        // line 546
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("File analysis"), "html", null, true);
        yield "

\t\t\t\t\t\t\t\t\t\t";
        // line 548
        if (( !CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, true, false, 548), "tools", [], "any", false, true, false, 548), "embedding_search", [], "any", false, true, false, 548), "is_enabled", [], "any", true, true, false, 548) || (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, false, false, 548), "tools", [], "any", false, false, false, 548), "embedding_search", [], "any", false, false, false, 548), "is_enabled", [], "any", false, false, false, 548) == false))) {
            // line 549
            yield "\t\t\t\t\t\t\t\t\t\t\t<i class=\"text-base ti ti-alert-square-rounded-filled text-failure\" x-tooltip.raw=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Feature is disabled globally"), "html", null, true);
            yield "\"></i>
\t\t\t\t\t\t\t\t\t\t";
        }
        // line 551
        yield "\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<div class=\"font-normal text-content-dimmed\">
\t\t\t\t\t\t\t\t\t\t";
        // line 554
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Chat with PDF, Doc and other text based documents"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<div class=\"ms-auto\">
\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" class=\"hidden peer\" value=\"embedding_search\" x-model=\"model.config.tools['embedding_search']\">

\t\t\t\t\t\t\t\t\t<span class=\"block relative w-10 h-6 rounded-3xl transition-all bg-line peer-checked:bg-success after:h-5 after:w-5 after:top-0.5 after:absolute after:left-0 after:ms-0.5 after:transition-all after:rounded-full after:bg-white peer-checked:after:left-4\"></span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</label>

\t\t\t\t\t\t\t<label class=\"flex gap-4 items-center cursor-pointer box hover:border-line\">
\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<div class=\"flex gap-2 items-center text-sm\">
\t\t\t\t\t\t\t\t\t\t";
        // line 568
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Google search"), "html", null, true);
        yield "

\t\t\t\t\t\t\t\t\t\t";
        // line 570
        if (( !CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "serper", [], "any", false, true, false, 570), "api_key", [], "any", true, true, false, 570) || Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "serper", [], "any", false, false, false, 570), "api_key", [], "any", false, false, false, 570)))) {
            // line 571
            yield "\t\t\t\t\t\t\t\t\t\t\t<i class=\"text-base ti ti-alert-square-rounded-filled text-failure\" x-tooltip.raw=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Missing Serper API key"), "html", null, true);
            yield "\"></i>
\t\t\t\t\t\t\t\t\t\t";
        } elseif (( !CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 572
($context["option"] ?? null), "features", [], "any", false, true, false, 572), "tools", [], "any", false, true, false, 572), "google_search", [], "any", false, true, false, 572), "is_enabled", [], "any", true, true, false, 572) || (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, false, false, 572), "tools", [], "any", false, false, false, 572), "google_search", [], "any", false, false, false, 572), "is_enabled", [], "any", false, false, false, 572) == false))) {
            // line 573
            yield "\t\t\t\t\t\t\t\t\t\t\t<i class=\"text-base ti ti-alert-square-rounded-filled text-failure\" x-tooltip.raw=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Feature is disabled globally"), "html", null, true);
            yield "\"></i>
\t\t\t\t\t\t\t\t\t\t";
        }
        // line 575
        yield "\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<div class=\"font-normal text-content-dimmed\">
\t\t\t\t\t\t\t\t\t\t";
        // line 578
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Search with Serper API"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<div class=\"ms-auto\">
\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" class=\"hidden peer\" value=\"google_search\" x-model=\"model.config.tools['google_search']\">

\t\t\t\t\t\t\t\t\t<span class=\"block relative w-10 h-6 rounded-3xl transition-all bg-line peer-checked:bg-success after:h-5 after:w-5 after:top-0.5 after:absolute after:left-0 after:ms-0.5 after:transition-all after:rounded-full after:bg-white peer-checked:after:left-4\"></span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</label>

\t\t\t\t\t\t\t<label class=\"flex gap-4 items-center cursor-pointer box hover:border-line\">
\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<div class=\"flex gap-2 items-center text-sm\">
\t\t\t\t\t\t\t\t\t\t";
        // line 592
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Youtube"), "html", null, true);
        yield "

\t\t\t\t\t\t\t\t\t\t";
        // line 594
        if (( !CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "searchapi", [], "any", false, true, false, 594), "api_key", [], "any", true, true, false, 594) || Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "searchapi", [], "any", false, false, false, 594), "api_key", [], "any", false, false, false, 594)))) {
            // line 595
            yield "\t\t\t\t\t\t\t\t\t\t\t<i class=\"text-base ti ti-alert-square-rounded-filled text-failure\" x-tooltip.raw=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Missing Search API key"), "html", null, true);
            yield "\"></i>
\t\t\t\t\t\t\t\t\t\t";
        } elseif (( !CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 596
($context["option"] ?? null), "features", [], "any", false, true, false, 596), "tools", [], "any", false, true, false, 596), "youtube", [], "any", false, true, false, 596), "is_enabled", [], "any", true, true, false, 596) || (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, false, false, 596), "tools", [], "any", false, false, false, 596), "youtube", [], "any", false, false, false, 596), "is_enabled", [], "any", false, false, false, 596) == false))) {
            // line 597
            yield "\t\t\t\t\t\t\t\t\t\t\t<i class=\"text-base ti ti-alert-square-rounded-filled text-failure\" x-tooltip.raw=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Feature is disabled globally"), "html", null, true);
            yield "\"></i>
\t\t\t\t\t\t\t\t\t\t";
        }
        // line 599
        yield "\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<div class=\"font-normal text-content-dimmed\">
\t\t\t\t\t\t\t\t\t\t";
        // line 602
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Get meta data from Youtube"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<div class=\"ms-auto\">
\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" class=\"hidden peer\" value=\"youtube\" x-model=\"model.config.tools['youtube']\">

\t\t\t\t\t\t\t\t\t<span class=\"block relative w-10 h-6 rounded-3xl transition-all bg-line peer-checked:bg-success after:h-5 after:w-5 after:top-0.5 after:absolute after:left-0 after:ms-0.5 after:transition-all after:rounded-full after:bg-white peer-checked:after:left-4\"></span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</label>

\t\t\t\t\t\t\t<label class=\"flex gap-4 items-center cursor-pointer box hover:border-line\">
\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<div class=\"flex gap-2 items-center text-sm\">
\t\t\t\t\t\t\t\t\t\t";
        // line 616
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Web browsing"), "html", null, true);
        yield "

\t\t\t\t\t\t\t\t\t\t";
        // line 618
        if (( !CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, true, false, 618), "tools", [], "any", false, true, false, 618), "web_scrap", [], "any", false, true, false, 618), "is_enabled", [], "any", true, true, false, 618) || (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, false, false, 618), "tools", [], "any", false, false, false, 618), "web_scrap", [], "any", false, false, false, 618), "is_enabled", [], "any", false, false, false, 618) == false))) {
            // line 619
            yield "\t\t\t\t\t\t\t\t\t\t\t<i class=\"text-base ti ti-alert-square-rounded-filled text-failure\" x-tooltip.raw=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Feature is disabled globally"), "html", null, true);
            yield "\"></i>
\t\t\t\t\t\t\t\t\t\t";
        }
        // line 621
        yield "\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<div class=\"font-normal text-content-dimmed\">
\t\t\t\t\t\t\t\t\t\t";
        // line 624
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Scrap web pages for information"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<div class=\"ms-auto\">
\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" class=\"hidden peer\" value=\"web_scrap\" x-model=\"model.config.tools['web_scrap']\">

\t\t\t\t\t\t\t\t\t<span class=\"block relative w-10 h-6 rounded-3xl transition-all bg-line peer-checked:bg-success after:h-5 after:w-5 after:top-0.5 after:absolute after:left-0 after:ms-0.5 after:transition-all after:rounded-full after:bg-white peer-checked:after:left-4\"></span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</label>

\t\t\t\t\t\t\t<label class=\"flex gap-4 items-center cursor-pointer box hover:border-line\">
\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<div class=\"flex gap-2 items-center text-sm\">
\t\t\t\t\t\t\t\t\t\t";
        // line 638
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Image generation"), "html", null, true);
        yield "

\t\t\t\t\t\t\t\t\t\t";
        // line 640
        if (( !CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, true, false, 640), "tools", [], "any", false, true, false, 640), "generate_image", [], "any", false, true, false, 640), "is_enabled", [], "any", true, true, false, 640) || (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, false, false, 640), "tools", [], "any", false, false, false, 640), "generate_image", [], "any", false, false, false, 640), "is_enabled", [], "any", false, false, false, 640) == false))) {
            // line 641
            yield "\t\t\t\t\t\t\t\t\t\t\t<i class=\"text-base ti ti-alert-square-rounded-filled text-failure\" x-tooltip.raw=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Feature is disabled globally"), "html", null, true);
            yield "\"></i>
\t\t\t\t\t\t\t\t\t\t";
        }
        // line 643
        yield "\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<div class=\"font-normal text-content-dimmed\">
\t\t\t\t\t\t\t\t\t\t";
        // line 646
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Generate images based on prompts"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<div class=\"ms-auto\">
\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" class=\"hidden peer\" value=\"generate_image\" x-model=\"model.config.tools['generate_image']\">

\t\t\t\t\t\t\t\t\t<span class=\"block relative w-10 h-6 rounded-3xl transition-all bg-line peer-checked:bg-success after:h-5 after:w-5 after:top-0.5 after:absolute after:left-0 after:ms-0.5 after:transition-all after:rounded-full after:bg-white peer-checked:after:left-4\"></span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</label>

\t\t\t\t\t\t\t<label class=\"flex gap-4 items-center cursor-pointer box hover:border-line\">
\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<div class=\"flex gap-2 items-center text-sm\">
\t\t\t\t\t\t\t\t\t\t";
        // line 660
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Memory"), "html", null, true);
        yield "

\t\t\t\t\t\t\t\t\t\t";
        // line 662
        if ((((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, true, false, 662), "tools", [], "any", false, true, false, 662), "memory", [], "any", false, true, false, 662), "is_enabled", [], "any", true, true, false, 662)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, false, false, 662), "tools", [], "any", false, false, false, 662), "memory", [], "any", false, false, false, 662), "is_enabled", [], "any", false, false, false, 662), false)) : (false)) == false)) {
            // line 663
            yield "\t\t\t\t\t\t\t\t\t\t\t<i class=\"text-base ti ti-alert-square-rounded-filled text-failure\" x-tooltip.raw=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Feature is disabled globally"), "html", null, true);
            yield "\"></i>
\t\t\t\t\t\t\t\t\t\t";
        }
        // line 665
        yield "\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<div class=\"font-normal text-content-dimmed\">
\t\t\t\t\t\t\t\t\t\t";
        // line 668
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Get and save user's memory"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<div class=\"ms-auto\">
\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" class=\"hidden peer\" value=\"memory\" x-model=\"model.config.tools['memory']\">

\t\t\t\t\t\t\t\t\t<span class=\"block relative w-10 h-6 rounded-3xl transition-all bg-line peer-checked:bg-success after:h-5 after:w-5 after:top-0.5 after:absolute after:left-0 after:ms-0.5 after:transition-all after:rounded-full after:bg-white peer-checked:after:left-4\"></span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</div>
\t\t\t\t\t</section>
\t\t\t\t</template>

\t\t\t\t<template x-if=\"model.billing_cycle != 'one-time'\">
\t\t\t\t\t<section class=\"flex flex-col gap-6 box\" data-density=\"comfortable\">
\t\t\t\t\t\t<h2>";
        // line 684
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Models"), "html", null, true);
        yield "</h2>
\t\t\t\t\t\t";
        // line 686
        yield "
\t\t\t\t\t\t<div class=\"grid gap-6 md:grid-cols-2\">
\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t<label class=\"flex gap-2 items-center\">
\t\t\t\t\t\t\t\t\t";
        // line 690
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Writer model"), "html", null, true);
        yield "

\t\t\t\t\t\t\t\t\t<i class=\"text-base leading-5 ti ti-alert-square-rounded-filled text-failure\" x-show=\"!model.config.writer.is_enabled\" x-cloak x-tooltip.raw=\"";
        // line 692
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Writer tool is disabled"), "html", null, true);
        yield "\"></i>
\t\t\t\t\t\t\t\t</label>

\t\t\t\t\t\t\t\t<select class=\"mt-2 input\" x-model=\"model.config.writer.model\">
\t\t\t\t\t\t\t\t\t";
        // line 696
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "model", [], "any", false, false, false, 696), "registry", [], "any", false, false, false, 696), "directory", [], "any", false, false, false, 696));
        foreach ($context['_seq'] as $context["_key"] => $context["service"]) {
            // line 697
            yield "\t\t\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["service"], "models", [], "any", false, false, false, 697));
            foreach ($context['_seq'] as $context["_key"] => $context["model"]) {
                // line 698
                yield "\t\t\t\t\t\t\t\t\t\t\t";
                if (((CoreExtension::getAttribute($this->env, $this->source, $context["model"], "type", [], "any", false, false, false, 698) == "llm") && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["model"], "config", [], "any", false, false, false, 698), "writer", [], "any", false, false, false, 698))) {
                    // line 699
                    yield "\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["model"], "key", [], "any", false, false, false, 699), "html", null, true);
                    yield "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 700
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["service"], "name", [], "any", false, false, false, 700), "html", null, true);
                    yield "
\t\t\t\t\t\t\t\t\t\t\t\t\t/
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 702
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["model"], "name", [], "any", false, false, false, 702), "html", null, true);
                    yield "
\t\t\t\t\t\t\t\t\t\t\t\t</option>
\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 705
                yield "\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['model'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 706
            yield "\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['service'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 707
        yield "\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t<label class=\"flex gap-2 items-center\">
\t\t\t\t\t\t\t\t\t";
        // line 712
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Coder model"), "html", null, true);
        yield "

\t\t\t\t\t\t\t\t\t<i class=\"text-base leading-5 ti ti-alert-square-rounded-filled text-failure\" x-show=\"!model.config.coder.is_enabled\" x-cloak x-tooltip.raw=\"";
        // line 714
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Coder tool is disabled"), "html", null, true);
        yield "\"></i>
\t\t\t\t\t\t\t\t</label>

\t\t\t\t\t\t\t\t<select class=\"mt-2 input\" x-model=\"model.config.coder.model\">
\t\t\t\t\t\t\t\t\t";
        // line 718
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "model", [], "any", false, false, false, 718), "registry", [], "any", false, false, false, 718), "directory", [], "any", false, false, false, 718));
        foreach ($context['_seq'] as $context["_key"] => $context["service"]) {
            // line 719
            yield "\t\t\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["service"], "models", [], "any", false, false, false, 719));
            foreach ($context['_seq'] as $context["_key"] => $context["model"]) {
                // line 720
                yield "\t\t\t\t\t\t\t\t\t\t\t";
                if (((CoreExtension::getAttribute($this->env, $this->source, $context["model"], "type", [], "any", false, false, false, 720) == "llm") && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["model"], "config", [], "any", false, false, false, 720), "coder", [], "any", false, false, false, 720))) {
                    // line 721
                    yield "\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["model"], "key", [], "any", false, false, false, 721), "html", null, true);
                    yield "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 722
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["service"], "name", [], "any", false, false, false, 722), "html", null, true);
                    yield "
\t\t\t\t\t\t\t\t\t\t\t\t\t/
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 724
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["model"], "name", [], "any", false, false, false, 724), "html", null, true);
                    yield "
\t\t\t\t\t\t\t\t\t\t\t\t</option>
\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 727
                yield "\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['model'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 728
            yield "\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['service'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 729
        yield "\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t<label>";
        // line 733
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Title generator model"), "html", null, true);
        yield "</label>

\t\t\t\t\t\t\t\t<select class=\"mt-2 input\" x-model=\"model.config.titler.model\">
\t\t\t\t\t\t\t\t\t";
        // line 736
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "model", [], "any", false, false, false, 736), "registry", [], "any", false, false, false, 736), "directory", [], "any", false, false, false, 736));
        foreach ($context['_seq'] as $context["_key"] => $context["service"]) {
            // line 737
            yield "\t\t\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["service"], "models", [], "any", false, false, false, 737));
            foreach ($context['_seq'] as $context["_key"] => $context["model"]) {
                // line 738
                yield "\t\t\t\t\t\t\t\t\t\t\t";
                if (((CoreExtension::getAttribute($this->env, $this->source, $context["model"], "type", [], "any", false, false, false, 738) == "llm") && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["model"], "config", [], "any", false, false, false, 738), "titler", [], "any", false, false, false, 738))) {
                    // line 739
                    yield "\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["model"], "key", [], "any", false, false, false, 739), "html", null, true);
                    yield "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 740
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["service"], "name", [], "any", false, false, false, 740), "html", null, true);
                    yield "
\t\t\t\t\t\t\t\t\t\t\t\t\t/
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 742
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["model"], "name", [], "any", false, false, false, 742), "html", null, true);
                    yield "
\t\t\t\t\t\t\t\t\t\t\t\t</option>
\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 745
                yield "\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['model'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 746
            yield "\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['service'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 747
        yield "\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t<label>";
        // line 751
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Embeddings model"), "html", null, true);
        yield "</label>

\t\t\t\t\t\t\t\t<select class=\"mt-2 input\" x-model=\"model.config.embedding_model\">
\t\t\t\t\t\t\t\t\t";
        // line 754
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "model", [], "any", false, false, false, 754), "registry", [], "any", false, false, false, 754), "directory", [], "any", false, false, false, 754));
        foreach ($context['_seq'] as $context["_key"] => $context["service"]) {
            // line 755
            yield "\t\t\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["service"], "models", [], "any", false, false, false, 755));
            foreach ($context['_seq'] as $context["_key"] => $context["model"]) {
                // line 756
                yield "\t\t\t\t\t\t\t\t\t\t\t";
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["model"], "type", [], "any", false, false, false, 756) == "embedding")) {
                    // line 757
                    yield "\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["model"], "key", [], "any", false, false, false, 757), "html", null, true);
                    yield "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 758
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["service"], "name", [], "any", false, false, false, 758), "html", null, true);
                    yield "
\t\t\t\t\t\t\t\t\t\t\t\t\t/
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 760
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["model"], "name", [], "any", false, false, false, 760), "html", null, true);
                    yield "
\t\t\t\t\t\t\t\t\t\t\t\t</option>
\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 763
                yield "\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['model'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 764
            yield "\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['service'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 765
        yield "\t\t\t\t\t\t\t\t</select>

\t\t\t\t\t\t\t\t<ul class=\"info mt-2\">
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t";
        // line 769
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Selected model will be used for File Insight capability"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t";
        // line 775
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 776
            yield "\t\t\t\t\t\t\t<hr class=\"my-2\">

\t\t\t\t\t\t\t<h3 class=\"flex gap-2 items-center\">";
            // line 778
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["group"], "heading", [], "any", false, false, false, 778), "html", null, true);
            yield "</h3>

\t\t\t\t\t\t\t<div class=\"grid gap-6 md:grid-cols-2\">
\t\t\t\t\t\t\t\t";
            // line 781
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "model", [], "any", false, false, false, 781), "registry", [], "any", false, false, false, 781), "directory", [], "any", false, false, false, 781));
            foreach ($context['_seq'] as $context["_key"] => $context["service"]) {
                // line 782
                yield "\t\t\t\t\t\t\t\t\t";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::filter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["service"], "models", [], "any", false, false, false, 782), function ($__model__) use ($context, $macros) { $context["model"] = $__model__; return (CoreExtension::getAttribute($this->env, $this->source, $context["model"], "type", [], "any", false, false, false, 782) == CoreExtension::getAttribute($this->env, $this->source, $context["group"], "type", [], "any", false, false, false, 782)); }));
                foreach ($context['_seq'] as $context["_key"] => $context["model"]) {
                    // line 783
                    yield "\t\t\t\t\t\t\t\t\t\t<label class=\"flex gap-4 items-center cursor-pointer box hover:border-line\">
\t\t\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"flex gap-2 items-center text-sm\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 786
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["model"], "name", [], "any", false, false, false, 786), "html", null, true);
                    yield "

\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 788
                    if (((Twig\Extension\CoreExtension::testEmpty(((CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["service"], "key", [], "any", false, false, false, 788), [], "array", true, true, false, 788)) ? (Twig\Extension\CoreExtension::default((($_v0 = ($context["option"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0[CoreExtension::getAttribute($this->env, $this->source, $context["service"], "key", [], "any", false, false, false, 788)] ?? null) : null), null)) : (null))) && (CoreExtension::getAttribute($this->env, $this->source, $context["service"], "key", [], "any", false, false, false, 788) != "ollama")) &&  !((CoreExtension::getAttribute($this->env, $this->source, $context["service"], "custom", [], "any", true, true, false, 788)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["service"], "custom", [], "any", false, false, false, 788), false)) : (false)))) {
                        // line 789
                        yield "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"text-base ti ti-alert-square-rounded-filled text-failure\" x-tooltip.raw=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("%s integration is not configured", CoreExtension::getAttribute($this->env, $this->source, $context["service"], "name", [], "any", false, false, false, 789)), "html", null, true);
                        yield "\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 791
                    yield "\t\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"font-normal text-content-dimmed\">";
                    // line 793
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["service"], "name", [], "any", false, false, false, 793), "html", null, true);
                    yield "</div>
\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t<div class=\"ms-auto\">
\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" class=\"hidden peer\" value=\"";
                    // line 797
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["model"], "key", [], "any", false, false, false, 797), "html", null, true);
                    yield "\" x-model=\"model.config.models['";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["model"], "key", [], "any", false, false, false, 797), "html", null, true);
                    yield "']\">
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"block relative w-10 h-6 rounded-3xl transition-all bg-line peer-checked:bg-success after:h-5 after:w-5 after:top-0.5 after:absolute after:left-0 after:ms-0.5 after:transition-all after:rounded-full after:bg-white peer-checked:after:left-4\"></span>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['model'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 802
                yield "\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['service'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 803
            yield "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['group'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 805
        yield "\t\t\t\t\t</section>
\t\t\t\t</template>

\t\t\t\t<template x-if=\"model.billing_cycle != 'one-time'\">
\t\t\t\t\t<section class=\"flex flex-col gap-6 box\" data-density=\"comfortable\" x-init=\"model.config.assistants !== null ? fetchAssistants() : null\">
\t\t\t\t\t\t<h2 class=\"md:col-span-2\">";
        // line 810
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Assistants"), "html", null, true);
        yield "</h2>

\t\t\t\t\t\t<div class=\"flex gap-2 items-center p-3 rounded-lg bg-intermediate\">
\t\t\t\t\t\t\t";
        // line 813
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "All assistants"), "html", null, true);
        yield "

\t\t\t\t\t\t\t<template x-if=\"model.config.assistants !== null && assistants == null\">
\t\t\t\t\t\t\t\t";
        // line 816
        yield from $this->load("snippets/spinner.twig", 816)->unwrap()->yield($context);
        // line 817
        yield "\t\t\t\t\t\t\t</template>

\t\t\t\t\t\t\t<label class=\"inline-flex gap-2 items-center ms-auto cursor-pointer\">
\t\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"status\" class=\"hidden peer\" :checked=\"model.config.assistants === null\" @change=\"fetchAssistants(); model.config.assistants = \$el.checked ? null : []\">

\t\t\t\t\t\t\t\t<span class=\"block relative w-10 h-6 rounded-3xl transition-all bg-line peer-checked:bg-success after:h-5 after:w-5 after:top-0.5 after:absolute after:left-0 after:ms-0.5 after:transition-all after:rounded-full after:bg-white peer-checked:after:left-4\"></span>
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<template x-if=\"model.config.assistants != null && assistants != null\">
\t\t\t\t\t\t\t<div class=\"grid gap-6 md:grid-cols-2\">
\t\t\t\t\t\t\t\t<template x-for=\"assistant in assistants\" :key=\"assistant.id\">
\t\t\t\t\t\t\t\t\t<label class=\"flex gap-3 items-center text-sm box\">
\t\t\t\t\t\t\t\t\t\t<x-avatar :title=\"assistant.name\" :src=\"assistant.avatar\"></x-avatar>

\t\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"font-bold\" x-text=\"assistant.name\"></div>
\t\t\t\t\t\t\t\t\t\t\t<template x-if=\"assistant.expertise\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"text-content-dimmed\" x-text=\"assistant.expertise\"></div>
\t\t\t\t\t\t\t\t\t\t\t</template>
\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" class=\"hidden peer\" :value=\"assistant.id\" x-model=\"model.config.assistants\" :checked=\"model.config.assistants != null && model.config.assistants.includes(assistant.id)\">

\t\t\t\t\t\t\t\t\t\t<i class=\"text-2xl hidden ms-auto ti ti-square-rounded-check-filled peer-checked:inline\"></i>
\t\t\t\t\t\t\t\t\t\t<i class=\"text-2xl ms-auto ti ti-square-rounded peer-checked:hidden\"></i>
\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t</template>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</template>
\t\t\t\t\t</section>
\t\t\t\t</template>

\t\t\t\t<template x-if=\"model.billing_cycle != 'one-time'\">
\t\t\t\t\t<section class=\"flex flex-col gap-6 box\" data-density=\"comfortable\" x-init=\"model.config.presets !== null ? fetchPresets() : null\">
\t\t\t\t\t\t<h2 class=\"md:col-span-2\">";
        // line 852
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Templates"), "html", null, true);
        yield "</h2>

\t\t\t\t\t\t<div class=\"flex gap-2 items-center p-3 rounded-lg bg-intermediate\">
\t\t\t\t\t\t\t";
        // line 855
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "All templates"), "html", null, true);
        yield "

\t\t\t\t\t\t\t<template x-if=\"model.config.presets !== null && presets == null\">
\t\t\t\t\t\t\t\t";
        // line 858
        yield from $this->load("snippets/spinner.twig", 858)->unwrap()->yield($context);
        // line 859
        yield "\t\t\t\t\t\t\t</template>

\t\t\t\t\t\t\t<label class=\"inline-flex gap-2 items-center ms-auto cursor-pointer\">
\t\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"status\" class=\"hidden peer\" :checked=\"model.config.presets === null\" @change=\"fetchPresets(); model.config.presets = \$el.checked ? null : []\">

\t\t\t\t\t\t\t\t<span class=\"block relative w-10 h-6 rounded-3xl transition-all bg-line peer-checked:bg-success after:h-5 after:w-5 after:top-0.5 after:absolute after:left-0 after:ms-0.5 after:transition-all after:rounded-full after:bg-white peer-checked:after:left-4\"></span>
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<template x-if=\"model.config.presets != null && presets != null\">
\t\t\t\t\t\t\t<div class=\"grid gap-6 md:grid-cols-2\">
\t\t\t\t\t\t\t\t<template x-for=\"preset in presets\" :key=\"preset.id\">
\t\t\t\t\t\t\t\t\t<label class=\"flex gap-3 items-center text-sm box\">
\t\t\t\t\t\t\t\t\t\t<x-avatar :style=\"{backgroundColor: preset.color, color: '#fff'}\" :title=\"preset.title\" :icon=\"preset.image\"></x-avatar>

\t\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"font-bold\" x-text=\"preset.title\"></div>
\t\t\t\t\t\t\t\t\t\t\t<template x-if=\"preset.expertise\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"text-content-dimmed\" x-text=\"preset.category?.title\"></div>
\t\t\t\t\t\t\t\t\t\t\t</template>
\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" class=\"hidden peer\" :value=\"preset.id\" x-model=\"model.config.presets\" :checked=\"model.config.presets != null && model.config.presets.includes(preset.id)\">

\t\t\t\t\t\t\t\t\t\t<i class=\"text-2xl hidden ms-auto ti ti-square-rounded-check-filled peer-checked:inline\"></i>
\t\t\t\t\t\t\t\t\t\t<i class=\"text-2xl ms-auto ti ti-square-rounded peer-checked:hidden\"></i>
\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t</template>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</template>
\t\t\t\t\t</section>
\t\t\t\t</template>

\t\t\t\t<template x-if=\"model.billing_cycle != 'one-time' && plan.id\">
\t\t\t\t\t<section class=\"flex flex-col gap-6 box\" data-density=\"comfortable\">

\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t<label class=\"inline-flex gap-1 items-center\">
\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" class=\"hidden peer\" x-model=\"model.update_snapshots\">

\t\t\t\t\t\t\t\t\t<i class=\"text-2xl ti ti-square-rounded text-content-dimmed peer-checked:hidden\"></i>
\t\t\t\t\t\t\t\t\t<i class=\"text-2xl hidden ti ti-square-rounded-check-filled text-success peer-checked:block\"></i>

\t\t\t\t\t\t\t\t\t<span class=\"select-none\">";
        // line 903
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Update snapshots"), "html", null, true);
        yield "</span>
\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<ul class=\"info mt-2\">
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t";
        // line 909
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("If checked and saved, all subscriptions on this plan will have their plan configuration updated to the latest configuration. Price and billing cycle changes will not be applied."), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</div>
\t\t\t\t\t</section>
\t\t\t\t</template>
\t\t\t</div>

\t\t\t<div class=\"flex gap-4 justify-end\">
\t\t\t\t<a href=\"admin/plans\" class=\"button button-outline\">
\t\t\t\t\t";
        // line 919
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Cancel"), "html", null, true);
        yield "
\t\t\t\t</a>

\t\t\t\t<button type=\"submit\" class=\"button button-accent\" :processing=\"isProcessing\">
\t\t\t\t\t";
        // line 923
        yield from $this->load("/snippets/spinner.twig", 923)->unwrap()->yield($context);
        // line 924
        yield "
\t\t\t\t\t<span x-show=\"!plan.id\">
\t\t\t\t\t\t";
        // line 926
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Create plan"), "html", null, true);
        yield "
\t\t\t\t\t</span>

\t\t\t\t\t<span x-show=\"plan.id\">
\t\t\t\t\t\t";
        // line 930
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Update plan"), "html", null, true);
        yield "
\t\t\t\t\t</span>
\t\t\t\t</button>
\t\t\t</div>
\t\t</form>
\t</x-form>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "/templates/admin/plan.twig";
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
        return array (  1605 => 930,  1598 => 926,  1594 => 924,  1592 => 923,  1585 => 919,  1572 => 909,  1563 => 903,  1517 => 859,  1515 => 858,  1509 => 855,  1503 => 852,  1466 => 817,  1464 => 816,  1458 => 813,  1452 => 810,  1445 => 805,  1438 => 803,  1432 => 802,  1419 => 797,  1412 => 793,  1408 => 791,  1402 => 789,  1400 => 788,  1395 => 786,  1390 => 783,  1385 => 782,  1381 => 781,  1375 => 778,  1371 => 776,  1367 => 775,  1358 => 769,  1352 => 765,  1346 => 764,  1340 => 763,  1334 => 760,  1329 => 758,  1324 => 757,  1321 => 756,  1316 => 755,  1312 => 754,  1306 => 751,  1300 => 747,  1294 => 746,  1288 => 745,  1282 => 742,  1277 => 740,  1272 => 739,  1269 => 738,  1264 => 737,  1260 => 736,  1254 => 733,  1248 => 729,  1242 => 728,  1236 => 727,  1230 => 724,  1225 => 722,  1220 => 721,  1217 => 720,  1212 => 719,  1208 => 718,  1201 => 714,  1196 => 712,  1189 => 707,  1183 => 706,  1177 => 705,  1171 => 702,  1166 => 700,  1161 => 699,  1158 => 698,  1153 => 697,  1149 => 696,  1142 => 692,  1137 => 690,  1131 => 686,  1127 => 684,  1108 => 668,  1103 => 665,  1097 => 663,  1095 => 662,  1090 => 660,  1073 => 646,  1068 => 643,  1062 => 641,  1060 => 640,  1055 => 638,  1038 => 624,  1033 => 621,  1027 => 619,  1025 => 618,  1020 => 616,  1003 => 602,  998 => 599,  992 => 597,  990 => 596,  985 => 595,  983 => 594,  978 => 592,  961 => 578,  956 => 575,  950 => 573,  948 => 572,  943 => 571,  941 => 570,  936 => 568,  919 => 554,  914 => 551,  908 => 549,  906 => 548,  901 => 546,  892 => 540,  878 => 529,  871 => 525,  867 => 524,  849 => 509,  845 => 507,  839 => 505,  837 => 504,  832 => 502,  815 => 488,  811 => 486,  805 => 484,  803 => 483,  798 => 481,  781 => 467,  777 => 465,  771 => 463,  769 => 462,  764 => 460,  747 => 446,  743 => 444,  737 => 442,  735 => 441,  730 => 439,  713 => 425,  709 => 423,  703 => 421,  701 => 420,  696 => 418,  679 => 404,  675 => 402,  669 => 400,  667 => 399,  662 => 397,  645 => 383,  641 => 381,  635 => 379,  633 => 378,  628 => 376,  611 => 362,  607 => 360,  601 => 358,  599 => 357,  594 => 355,  577 => 341,  573 => 339,  567 => 337,  565 => 336,  560 => 334,  543 => 320,  538 => 317,  532 => 315,  530 => 314,  525 => 312,  516 => 306,  504 => 297,  497 => 293,  493 => 292,  486 => 288,  480 => 285,  471 => 279,  462 => 273,  455 => 269,  445 => 262,  437 => 257,  427 => 250,  420 => 248,  410 => 241,  403 => 237,  392 => 229,  385 => 225,  375 => 218,  368 => 214,  357 => 206,  350 => 202,  339 => 194,  332 => 190,  321 => 182,  314 => 178,  303 => 170,  296 => 166,  285 => 158,  278 => 154,  271 => 150,  264 => 146,  257 => 142,  250 => 138,  240 => 131,  231 => 125,  222 => 119,  215 => 115,  204 => 107,  195 => 101,  188 => 97,  177 => 89,  169 => 84,  166 => 83,  163 => 80,  153 => 73,  144 => 67,  137 => 63,  132 => 61,  126 => 58,  109 => 44,  103 => 41,  98 => 38,  96 => 37,  91 => 34,  84 => 33,  73 => 31,  68 => 1,  61 => 27,  57 => 26,  54 => 25,  52 => 24,  50 => 5,  48 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "/templates/admin/plan.twig", "/home/appcloud/resources/views/templates/admin/plan.twig");
    }
}
