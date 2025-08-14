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

/* /templates/admin/workspace.twig */
class __TwigTemplate_bb7905755fc32af21cde236430c705b6 extends Template
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
        $context["ranges"] = [["range" => "today", "label" => __("Today")], ["range" => "last_7_days", "label" => __("Last 7 days")], ["range" => "last_30_days", "label" => __("Last 30 days")], ["range" => "month_to_date", "label" => __("Month to date")], ["range" => "last_month", "label" => __("Last month")], ["range" => "last_3_months", "label" => __("Last 3 months")]];
        // line 30
        $context["active_menu"] = "/admin/workspaces";
        // line 32
        $context["xdata"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 33
            yield "workspace(";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(json_encode(($context["current_workspace"] ?? null)), "html", null, true);
            yield ",
";
            // line 34
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(json_encode(($context["ranges"] ?? null)), "html", null, true);
            yield ",
\"last_30_days\")
";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 1
        $this->parent = $this->load("/layouts/main.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 38
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), p__("title", "Workspace details")), "html", null, true);
        yield from [];
    }

    // line 40
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_template(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 41
        yield "<div class=\"flex flex-col gap-8\">
\t<div>
\t\t";
        // line 43
        yield from $this->load("snippets/back.twig", 43)->unwrap()->yield(CoreExtension::merge($context, ["link" => "admin/workspaces", "label" => "Workspaces"]));
        // line 44
        yield "
\t\t<h1 class=\"mt-4\">
\t\t\t<span>
\t\t\t\t";
        // line 47
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Workspace"), "html", null, true);
        yield ":
\t\t\t\t<span class=\"font-normal text-intermediate-content\" x-text=\"workspace.name\"></span>
\t\t\t</span>
\t\t</h1>

\t\t<div class=\"mt-2\">
\t\t\t<x-uuid x-text=\"workspace.id\"></x-uuid>
\t\t</div>
\t</div>

\t<div class=\"flex flex-col gap-2\">
\t\t<section class=\"flex flex-col gap-6 box\" data-density=\"comfortable\">
\t\t\t<div>
\t\t\t\t<h2>";
        // line 60
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "General"), "html", null, true);
        yield "</h2>
\t\t\t\t<p class=\"text-sm text-content-dimmed\">
\t\t\t\t\t";
        // line 62
        yield __("Workspace created on %s", "<x-time :datetime=\"workspace.created_at\"></x-time>");
        yield "
\t\t\t\t</p>
\t\t\t</div>

\t\t\t<div class=\"flex flex-col gap-1\">
\t\t\t\t<div class=\"flex gap-3 justify-between items-center p-4 rounded-2xl bg-intermediate text-intermediate-content\">
\t\t\t\t\t<x-avatar class=\"bg-main text-content\" icon=\"building\"></x-avatar>

\t\t\t\t\t<div>
\t\t\t\t\t\t<label>";
        // line 71
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Workspace name"), "html", null, true);
        yield "</label>
\t\t\t\t\t\t<div x-text=\"workspace.name\"></div>
\t\t\t\t\t</div>

\t\t\t\t\t<button type=\"button\" @click=\"modal.open('workspace-name')\" class=\"flex justify-center items-center ms-auto w-8 h-8 rounded-full bg-main outline-1 outline-line hover:outline outline-offset-0\">
\t\t\t\t\t\t<i class=\"text-base ti ti-pencil\"></i>
\t\t\t\t\t</button>
\t\t\t\t</div>

\t\t\t\t<div class=\"flex gap-3 items-center p-4 rounded-2xl bg-intermediate text-intermediate-content\">
\t\t\t\t\t<x-avatar class=\"bg-main text-content\" :title=\"`\${workspace.owner.first_name} \${workspace.owner.last_name}`\" :src=\"workspace.owner.avatar\"></x-avatar>

\t\t\t\t\t<div>
\t\t\t\t\t\t<label x-text=\"`\${workspace.owner.first_name} \${workspace.owner.last_name}`\"></label>
\t\t\t\t\t\t<div class=\"text-sm text-content-dimmed\">";
        // line 85
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("role", "Owner"), "html", null, true);
        yield "
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<a type=\"button\" :href=\"`admin/users/\${workspace.owner.id}`\" class=\"flex justify-center items-center ms-auto w-8 h-8 rounded-full bg-main outline-1 outline-line hover:outline outline-offset-0\">
\t\t\t\t\t\t<i class=\"text-base ti ti-chevron-right\"></i>
\t\t\t\t\t</a>
\t\t\t\t</div>

\t\t\t\t<template x-if=\"workspace.address\">
\t\t\t\t\t<div class=\"flex gap-3 items-center p-4 rounded-2xl bg-intermediate text-intermediate-content\">
\t\t\t\t\t\t<x-avatar class=\"bg-main text-content\" icon=\"map-pin-filled\"></x-avatar>

\t\t\t\t\t\t<div class=\"flex flex-col gap-1\">
\t\t\t\t\t\t\t<div class=\"label\">";
        // line 99
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Billing address"), "html", null, true);
        yield "</div>

\t\t\t\t\t\t\t<address class=\"text-sm not-italic text-content-dimmed\">
\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<span x-text=\"workspace.address.line1\"></span>

\t\t\t\t\t\t\t\t\t<template x-if=\"workspace.address.line2\">
\t\t\t\t\t\t\t\t\t\t<span x-text=\"`, \${workspace.address.line2}`\"></span>
\t\t\t\t\t\t\t\t\t</template>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<span x-text=\"workspace.address.city\"></span>

\t\t\t\t\t\t\t\t\t<template x-if=\"workspace.address.state\">
\t\t\t\t\t\t\t\t\t\t<span x-text=\"`, \${workspace.address.state}`\"></span>
\t\t\t\t\t\t\t\t\t</template>
\t\t\t\t\t\t\t\t\t<span x-text=\"`, \${workspace.address.zip}`\"></span>
\t\t\t\t\t\t\t\t\t,
\t\t\t\t\t\t\t\t\t<span x-text=\"workspace.address.country\"></span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</address>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</template>
\t\t\t</div>
\t\t</section>

\t\t<section class=\"flex flex-col gap-6 box\" data-density=\"comfortable\">
\t\t\t<div class=\"flex gap-2 items-center\">
\t\t\t\t<h2>";
        // line 129
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Credit usage"), "html", null, true);
        yield "</h2>

\t\t\t\t<div class=\"relative ms-auto\" @click.outside=\" \$refs.context.removeAttribute('data-open')\" x-data>
\t\t\t\t\t<button type=\"button\" class=\"button button-sm button-dimmed\" @click=\"\$refs.context.toggleAttribute('data-open')\">
\t\t\t\t\t\t<span x-text=\"range.label\"></span>
\t\t\t\t\t\t<i class=\"ti ti-chevron-down\"></i>
\t\t\t\t\t</button>

\t\t\t\t\t<div class=\"menu\" x-ref=\"context\">
\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t<template x-for=\"r in ranges\">
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<button type=\"button\" class=\"px-4 py-2 w-full text-start blockl hover:bg-intermediate hover:text-intermediate-content\" @click=\"range = r; \$refs.context.removeAttribute('data-open');\">
\t\t\t\t\t\t\t\t\t\t<span x-text=\"r.label\"></span>
\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t</template>
\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"relative\" @click.outside=\"\$refs.context.removeAttribute('data-open')\">

\t\t\t\t\t<button class=\"relative z-10\" @click=\"\$refs.context.toggleAttribute('data-open')\">
\t\t\t\t\t\t<i class=\"text-2xl ti ti-dots-vertical text-content-dimmed hover:text-intermediate-content\"></i>
\t\t\t\t\t</button>

\t\t\t\t\t<div class=\"menu\" x-ref=\"context\">
\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t<li><a :href=\"`admin/workspaces/\${workspace.id}/logs/usage`\" class=\"flex gap-2 items-center px-4 py-2 hover:no-underline hover:bg-intermediate\"><i class=\"ti ti-mist\"></i>";
        // line 158
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Usage log"), "html", null, true);
        yield "</a></li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>

\t\t\t<div class=\"h-64\">
\t\t\t\t<x-chart :set=\"JSON.stringify(datasets.usage)\" class=\"block\">
\t\t\t\t\t<div chart class=\"h-64\"></div>
\t\t\t\t</x-chart>
\t\t\t</div>
\t\t</section>

\t\t<section class=\"flex flex-col gap-6 box\" data-density=\"comfortable\">
\t\t\t<div>
\t\t\t\t<div class=\"flex gap-2 items-center\">
\t\t\t\t\t<h2>";
        // line 174
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Subscription"), "html", null, true);
        yield "</h2>

\t\t\t\t\t<template x-if=\"workspace.subscription\">
\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t<template x-if=\"workspace.subscription.status == 'active'\">
\t\t\t\t\t\t\t\t<span class=\"badge badge-success\">";
        // line 179
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("subscription-status", "Active"), "html", null, true);
        yield "</span>
\t\t\t\t\t\t\t</template>

\t\t\t\t\t\t\t<template x-if=\"workspace.subscription.status == 'trialing'\">
\t\t\t\t\t\t\t\t<span class=\"badge badge-info\">";
        // line 183
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("subscription-status", "Trialing"), "html", null, true);
        yield "</span>
\t\t\t\t\t\t\t</template>

\t\t\t\t\t\t\t<template x-if=\"workspace.subscription.status == 'canceled'\">
\t\t\t\t\t\t\t\t<span class=\"badge\">";
        // line 187
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("subscription-status", "Canceled"), "html", null, true);
        yield "</span>
\t\t\t\t\t\t\t</template>

\t\t\t\t\t\t\t<template x-if=\"workspace.subscription.status == 'ended'\">
\t\t\t\t\t\t\t\t<span class=\"badge badge-failure\">";
        // line 191
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("subscription-status", "Ended"), "html", null, true);
        yield "</span>
\t\t\t\t\t\t\t</template>
\t\t\t\t\t\t</div>
\t\t\t\t\t</template>
\t\t\t\t</div>

\t\t\t\t<template x-if=\"workspace.subscription\">
\t\t\t\t\t<p class=\"text-sm text-content-dimmed\">
\t\t\t\t\t\t";
        // line 199
        yield __("Workspace is subscribed to %s plan.", "<a class=\"hover:underline\" :href=\"`admin/plan-snapshots/\${workspace.subscription.plan.id}`\" x-text=\"workspace.subscription.plan.title\"></a>");
        yield "
\t\t\t\t\t</p>
\t\t\t\t</template>

\t\t\t\t<template x-if=\"!workspace.subscription\">
\t\t\t\t\t<p class=\"text-sm text-content-dimmed\">
\t\t\t\t\t\t";
        // line 205
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("This workspace is not subscribed to any plan."), "html", null, true);
        yield "
\t\t\t\t\t</p>
\t\t\t\t</template>
\t\t\t</div>

\t\t\t<template x-if=\"workspace.subscription\">
\t\t\t\t<div class=\"flex flex-col gap-6\">
\t\t\t\t\t<div class=\"flex flex-wrap gap-6 items-center\">
\t\t\t\t\t\t<div class=\"w-40 min-w-min\">
\t\t\t\t\t\t\t<div class=\"label\">";
        // line 214
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Plan"), "html", null, true);
        yield "</div>
\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t<a :href=\"`admin/plan-snapshots/\${workspace.subscription.plan.id}`\" class=\"inline-flex gap-1 items-center group\">
\t\t\t\t\t\t\t\t\t<span class=\"group-hover:underline\" x-text=\"workspace.subscription.plan.title\"></span>
\t\t\t\t\t\t\t\t\t<i class=\"text-base ti ti-corner-right-up text-content-dimmed\"></i>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"w-40 min-w-min\">
\t\t\t\t\t\t\t<div class=\"label\">
\t\t\t\t\t\t\t\t";
        // line 225
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Monthly credits"), "html", null, true);
        yield "
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<x-credit :data-value=\"workspace.subscription.plan.credit_count\"></x-credit>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"w-40 min-w-min\">
\t\t\t\t\t\t\t<div class=\"label\">
\t\t\t\t\t\t\t\t";
        // line 233
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Credits left"), "html", null, true);
        yield "
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<x-credit :data-value=\"workspace.subscription.credit_count\"></x-credit>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"w-40 min-w-min\">
\t\t\t\t\t\t\t<template x-if=\"workspace.subscription.plan.billing_cycle == 'monthly'\">
\t\t\t\t\t\t\t\t<div class=\"label\">";
        // line 241
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Monthly"), "html", null, true);
        yield "</div>
\t\t\t\t\t\t\t</template>

\t\t\t\t\t\t\t<template x-if=\"workspace.subscription.plan.billing_cycle == 'yearly'\">
\t\t\t\t\t\t\t\t<div class=\"label\">";
        // line 245
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Yearly"), "html", null, true);
        yield "</div>
\t\t\t\t\t\t\t</template>

\t\t\t\t\t\t\t<template x-if=\"workspace.subscription.plan.billing_cycle == 'lifetime'\">
\t\t\t\t\t\t\t\t<div class=\"label\">";
        // line 249
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Lifetime"), "html", null, true);
        yield "</div>
\t\t\t\t\t\t\t</template>

\t\t\t\t\t\t\t<div class=\"flex gap-2 items-center\">
\t\t\t\t\t\t\t\t<x-money :data-value=\"workspace.subscription.order ? workspace.subscription.plan.price : 0\" :currency=\"workspace.subscription.order ? workspace.subscription.order.currency.code : `";
        // line 253
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["currency"] ?? null), "code", [], "any", false, false, false, 253), "html", null, true);
        yield "`\" :minor-units=\"workspace.subscription.order ? workspace.subscription.order.currency.fraction_digits : `";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["currency"] ?? null), "fraction_digits", [], "any", false, false, false, 253), "html", null, true);
        yield "`\"></x-money>

\t\t\t\t\t\t\t\t<template x-if=\"!workspace.subscription.order\">
\t\t\t\t\t\t\t\t\t<i class=\"text-lg ti ti-info-square-rounded\" x-tooltip.raw=\"";
        // line 256
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Subscription created with no charge"), "html", null, true);
        yield "\"></i>
\t\t\t\t\t\t\t\t</template>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<hr>

\t\t\t\t\t<template x-if=\"workspace.subscription.cancel_at\">
\t\t\t\t\t\t<p class=\"text-xs text-content-dimmed\">
\t\t\t\t\t\t\t";
        // line 266
        yield __("Subscription will be cancelled at %s", "<x-time :datetime=\"workspace.subscription.cancel_at\"></x-time>");
        yield "
\t\t\t\t\t\t</p>
\t\t\t\t\t</template>

\t\t\t\t\t<template x-if=\"!workspace.subscription.cancel_at && workspace.subscription.renew_at\">
\t\t\t\t\t\t<p class=\"text-xs text-content-dimmed\">
\t\t\t\t\t\t\t";
        // line 272
        yield __("Usage renews at %s", "<x-time :datetime=\"workspace.subscription.renew_at\"></x-time>");
        yield "
\t\t\t\t\t\t</p>
\t\t\t\t\t</template>

\t\t\t\t\t<div class=\"flex gap-1 items-center\">
\t\t\t\t\t\t<button type=\"button\" class=\"button button-accent button-sm\" @click=\"modal.open('workspace-subscription')\">
\t\t\t\t\t\t\t<i class=\"ti ti-click\"></i>

\t\t\t\t\t\t\t";
        // line 280
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Change plan"), "html", null, true);
        yield "
\t\t\t\t\t\t</button>

\t\t\t\t\t\t<a :href=\"`admin/subscriptions/\${workspace.subscription.id}`\" class=\"button button-outline button-sm\">
\t\t\t\t\t\t\t";
        // line 284
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "View details"), "html", null, true);
        yield "
\t\t\t\t\t\t</a>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</template>

\t\t\t<template x-if=\"!workspace.subscription\">
\t\t\t\t<div class=\"flex gap-1 items-center\">
\t\t\t\t\t<button type=\"button\" class=\"button button-accent button-sm\" @click=\"modal.open('workspace-subscription')\">
\t\t\t\t\t\t<i class=\"ti ti-click\"></i>

\t\t\t\t\t\t";
        // line 295
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Create subscription"), "html", null, true);
        yield "
\t\t\t\t\t</button>
\t\t\t\t</div>
\t\t\t</template>

\t\t\t<div class=\"flex\">
\t\t\t\t<a :href=\"`admin/subscriptions/?workspace=\${workspace.id}&sort=created_at:desc`\" class=\"flex gap-1 items-center text-xs text-content-dimmed hover:text-content\">
\t\t\t\t\t<i class=\"text-base ti ti-history\"></i>

\t\t\t\t\t";
        // line 304
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "View subscription history"), "html", null, true);
        yield "
\t\t\t\t</a>
\t\t\t</div>
\t\t</section>

\t\t<section class=\"flex flex-col gap-6 box\" data-density=\"comfortable\">
\t\t\t<div>
\t\t\t\t<h2>";
        // line 311
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Add-on credits"), "html", null, true);
        yield "</h2>

\t\t\t\t<p class=\"text-sm text-content-dimmed\">
\t\t\t\t\t";
        // line 314
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Permanent, non-renewing extras for the subscription, used only after recurring credits run out."), "html", null, true);
        yield "
\t\t\t\t</p>
\t\t\t</div>

\t\t\t<div>
\t\t\t\t<div class=\"label\">";
        // line 319
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Credits left"), "html", null, true);
        yield "</div>

\t\t\t\t<div class=\"flex gap-1 items-center\">
\t\t\t\t\t<x-credit :data-value=\"workspace.credit_count === null ? 'null' : workspace.credit_count\"></x-credit>
\t\t\t\t\t<button type=\"button\" class=\"text-lg ti ti-square-rounded-plus text-content-dimmed hover:text-content\" @click=\"modal.open('workspace-addon-credits')\" x-tooltip.raw=\"";
        // line 323
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Add add-on credits"), "html", null, true);
        yield "\"></button>
\t\t\t\t</div>

\t\t\t\t<template x-if=\"workspace.credits_adjusted_at\">
\t\t\t\t\t<div class=\"mt-2 text-sm text-content-dimmed\">
\t\t\t\t\t\t";
        // line 328
        yield __("Credits last adjusted at %s", "<x-time :datetime=\"workspace.credits_adjusted_at\"></x-time>");
        yield "
\t\t\t\t\t</div>
\t\t\t\t</template>
\t\t\t</div>

\t\t\t<hr>

\t\t\t<p class=\"text-xs text-content-dimmed\">
\t\t\t\t";
        // line 336
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Add-on credits are valid with a subscription and transferable between plan changes."), "html", null, true);
        yield "
\t\t\t</p>

\t\t\t<div class=\"flex\">
\t\t\t\t<a :href=\"`admin/orders?billing_cycle=one-time&workspace=\${workspace.id}`\" class=\"button button-sm\">
\t\t\t\t\t<i class=\"ti ti-history\"></i>

\t\t\t\t\t";
        // line 343
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "View addon credit orders"), "html", null, true);
        yield "
\t\t\t\t</a>
\t\t\t</div>
\t\t</section>

\t\t<section class=\"grid gap-6 box\" data-density=\"comfortable\">
\t\t\t<div>
\t\t\t\t<h2>";
        // line 350
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Team"), "html", null, true);
        yield "</h2>
\t\t\t\t<template x-if=\"workspace.users.concat(workspace.invitations).length == 0\">
\t\t\t\t\t<p class=\"text-sm text-content-dimmed\">
\t\t\t\t\t\t";
        // line 353
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("This workspace has no members yet."), "html", null, true);
        yield "
\t\t\t\t\t</p>
\t\t\t\t</template>
\t\t\t</div>

\t\t\t<template x-if=\"workspace.users.concat(workspace.invitations).length > 0\">
\t\t\t\t<ul class=\"flex flex-col gap-1\">
\t\t\t\t\t<template x-for=\"u in workspace.users\" :key=\"u.id\">
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a :href=\"`admin/users/\${u.id}`\" class=\"grid relative grid-cols-2 gap-3 items-center p-3 box hover:border-line\">
\t\t\t\t\t\t\t\t<div class=\"flex gap-3 items-center\">
\t\t\t\t\t\t\t\t\t<div class=\"avatar\">
\t\t\t\t\t\t\t\t\t\t<span x-text=\"`\${u.first_name} \${u.last_name}`.match(/(\\b\\S)?/g).join('').slice(0, 2)\"></span>

\t\t\t\t\t\t\t\t\t\t<template x-if=\"u.avatar\">
\t\t\t\t\t\t\t\t\t\t\t<img :src=\"u.avatar\" :alt=\"`\${u.first_name} \${u.last_name}`\">
\t\t\t\t\t\t\t\t\t\t</template>
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t\t<div class=\"flex gap-2 items-center\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"font-bold\" x-text=\"`\${u.first_name} \${u.last_name}`\"></div>

\t\t\t\t\t\t\t\t\t\t\t<template x-if=\"u.id == `";
        // line 376
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "id", [], "any", false, false, false, 376), "html", null, true);
        yield "`\">
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"badge badge-success\">";
        // line 377
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("You"), "html", null, true);
        yield "</span>
\t\t\t\t\t\t\t\t\t\t\t</template>
\t\t\t\t\t\t\t\t\t\t</div>


\t\t\t\t\t\t\t\t\t\t<div class=\"text-xs text-content-dimmed\" x-text=\"u.email\"></div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<div class=\"justify-self-start\">
\t\t\t\t\t\t\t\t\t<div class=\"badge\">
\t\t\t\t\t\t\t\t\t\t";
        // line 388
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("input-value", "Member"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t</template>

\t\t\t\t\t<template x-for=\"u in workspace.invitations\" :key=\"u.id\">
\t\t\t\t\t\t<li class=\"grid relative grid-cols-4 gap-3 items-center p-3 box\" x-data>
\t\t\t\t\t\t\t<div class=\"flex col-span-2 gap-3 items-center\">
\t\t\t\t\t\t\t\t<x-avatar :title=\"u.email\"></x-avatar>

\t\t\t\t\t\t\t\t<div class=\"text-xs text-content-dimmed\" x-text=\"u.email\"></div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div class=\"justify-self-start\">
\t\t\t\t\t\t\t\t<div class=\"flex gap-2 items-center\">
\t\t\t\t\t\t\t\t\t<div class=\"opacity-50 badge\">
\t\t\t\t\t\t\t\t\t\t";
        // line 406
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("input-value", "Invited"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<x-copy class=\"button button-xs button-dimmed\" x-tooltip.raw=\"";
        // line 409
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Click to copy invitation link"), "html", null, true);
        yield "\" class=\"flex gap-1 items-center\" :data-copy=\"`\${window.location.origin}/app/workspace/\${ workspace.id }/invitations/\${ u.id}`\">
\t\t\t\t\t\t\t\t\t\t<i class=\"ti ti-link\"></i>
\t\t\t\t\t\t\t\t\t</x-copy>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</li>
\t\t\t\t\t</template>
\t\t\t\t</ul>
\t\t\t</template>
\t\t</section>

\t\t<template x-if=\"voices.length > 0\">
\t\t\t<section class=\"grid grid-cols-1 gap-6 box\" data-density=\"comfortable\">
\t\t\t\t<div class=\"flex gap-2 items-center\">
\t\t\t\t\t<h2>";
        // line 423
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Cloned voices"), "html", null, true);
        yield "</h2>

\t\t\t\t\t<a class=\"badge\" :href=\"`admin/voices?workspace=\${workspace.id}`\">
\t\t\t\t\t\t";
        // line 426
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "View all"), "html", null, true);
        yield "
\t\t\t\t\t</a>
\t\t\t\t</div>

\t\t\t\t<ul class=\"flex flex-col gap-1\">
\t\t\t\t\t<template x-for=\"voice in voices\" :key=\"voice.id\">
\t\t\t\t\t\t<li class=\"grid relative grid-cols-4 gap-3 items-center p-3 box\" x-data>
\t\t\t\t\t\t\t<div class=\"flex col-span-3 gap-3 items-start md:col-span-2\">
\t\t\t\t\t\t\t\t<x-avatar :title=\"`\${voice.name}`\"></x-avatar>

\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<div class=\"font-bold\" x-text=\"`\${voice.name}`\"></div>

\t\t\t\t\t\t\t\t\t<div class=\"flex gap-1 items-center text-xs text-content-dimmed\">
\t\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t\t\t";
        // line 441
        $context["by"] = new Markup("\t\t\t\t\t\t\t\t\t\t\t<span x-text=\"`\${voice.user.first_name} \${voice.user.last_name}`\"></span>
\t\t\t\t\t\t\t\t\t\t\t", $this->env->getCharset());
        // line 444
        yield "
\t\t\t\t\t\t\t\t\t\t\t";
        // line 445
        yield Twig\Extension\CoreExtension::replace(__("By :owner"), [":owner" => ($context["by"] ?? null)]);
        yield "
\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t<i class=\"text-xs text-content-success ti ti-point-filled\"></i>

\t\t\t\t\t\t\t\t\t\t<x-time :datetime=\"voice.created_at\" data-type=\"datetime\"></x-time>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div class=\"hidden justify-self-start md:block\"></div>

\t\t\t\t\t\t\t<div class=\"justify-self-end\">
\t\t\t\t\t\t\t\t<template x-if=\"voice.visibility === 0\">
\t\t\t\t\t\t\t\t\t<i class=\"text-2xl ti ti-lock\" x-tooltip.placement.left.raw=\"";
        // line 459
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Accessible to owner only"), "html", null, true);
        yield "\"></i>
\t\t\t\t\t\t\t\t</template>

\t\t\t\t\t\t\t\t<template x-if=\"voice.visibility === 1\">
\t\t\t\t\t\t\t\t\t<i class=\"text-2xl ti ti-building\" x-tooltip.placement.left.raw=\"";
        // line 463
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Accessible to all workspace members"), "html", null, true);
        yield "\"></i>
\t\t\t\t\t\t\t\t</template>

\t\t\t\t\t\t\t\t<template x-if=\"voice.visibility === 2\">
\t\t\t\t\t\t\t\t\t<i class=\"text-2xl ti ti-world\" x-tooltip.placement.left.raw=\"";
        // line 467
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Accessible to all users"), "html", null, true);
        yield "\"></i>
\t\t\t\t\t\t\t\t</template>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</li>
\t\t\t\t\t</template>
\t\t\t\t</ul>

\t\t\t\t<div>
\t\t\t\t\t<div class=\"label\">";
        // line 475
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Important notes:"), "html", null, true);
        yield "</div>

\t\t\t\t\t<ul class=\"info mt-2\">
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t";
        // line 479
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Workspace owner can view and delete all cloned voices created by other members."), "html", null, true);
        yield "
\t\t\t\t\t\t</li>

\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t";
        // line 483
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Only owner of the cloned voice can manage it."), "html", null, true);
        yield "
\t\t\t\t\t\t</li>

\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t";
        // line 487
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Cloned voices are not accessible to other workspace members unless shared."), "html", null, true);
        yield "
\t\t\t\t\t\t</li>
\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t</section>
\t\t</template>

\t\t<template x-if=\"orders.length > 0\">
\t\t\t<section class=\"flex flex-col gap-6 box\" data-density=\"comfortable\">
\t\t\t\t<div class=\"flex gap-2 items-center\">
\t\t\t\t\t<h2>";
        // line 497
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Latest orders"), "html", null, true);
        yield "</h2>

\t\t\t\t\t<a class=\"badge\" :href=\"`admin/orders?workspace=\${workspace.id}&sort=created_at:desc`\">
\t\t\t\t\t\t";
        // line 500
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "View all"), "html", null, true);
        yield "
\t\t\t\t\t</a>
\t\t\t\t</div>

\t\t\t\t<div>
\t\t\t\t\t<div class=\"hidden md:grid grid-cols-12 gap-3 items-center px-3 py-2 text-content-dimmed text-xs group-data-[state=empty]/list:hidden\">
\t\t\t\t\t\t<div class=\"col-span-3\">";
        // line 506
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Order"), "html", null, true);
        yield "</div>
\t\t\t\t\t\t<div class=\"col-span-2\">";
        // line 507
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Status"), "html", null, true);
        yield "</div>
\t\t\t\t\t\t<div class=\"col-span-2\">";
        // line 508
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Credits"), "html", null, true);
        yield "</div>
\t\t\t\t\t\t<div class=\"col-span-2\">";
        // line 509
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Total"), "html", null, true);
        yield "</div>
\t\t\t\t\t\t<div class=\"col-span-2\">";
        // line 510
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Created"), "html", null, true);
        yield "</div>
\t\t\t\t\t\t<div class=\"col-span-1\"></div>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"text-sm flex flex-col gap-1 group-data-[state=empty]:hidden\">
\t\t\t\t\t\t<template x-for=\"order in orders\" :key=\"order.id\">
\t\t\t\t\t\t\t";
        // line 516
        yield from $this->load("snippets/cards/order.twig", 516)->unwrap()->yield(CoreExtension::merge($context, ["ref" => "order", "type" => "admin"]));
        // line 517
        yield "\t\t\t\t\t\t</template>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</section>
\t\t</template>
\t</div>
</div>

<modal-element name=\"workspace-name\">
\t<x-form>
\t\t<form class=\"flex flex-col gap-8 modal\" @submit.prevent=\"rename(\$refs.name.value)\">
\t\t\t<div class=\"flex justify-between items-center\">
\t\t\t\t<h2 class=\"text-xl\">";
        // line 529
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Rename workspace"), "html", null, true);
        yield "</h2>

\t\t\t\t<button class=\"flex justify-center items-center w-8 h-8 rounded-full border border-transparent bg-line-dimmed hover:border-line\" @click=\"modal.close()\" type=\"button\">
\t\t\t\t\t<i class=\"text-xl ti ti-x\"></i>
\t\t\t\t</button>
\t\t\t</div>

\t\t\t<div>
\t\t\t\t<label for=\"workspace-name\">";
        // line 537
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Workspace name"), "html", null, true);
        yield "</label>
\t\t\t\t<input type=\"text\" class=\"mt-2 input\" id=\"workspace-name\" required x-ref=\"name\" :value.trim=\"workspace.name\">
\t\t\t</div>

\t\t\t<div class=\"flex gap-4 justify-end\">
\t\t\t\t<button type=\"button\" class=\"button button-outline\" @click=\"modal.close()\" type=\"button\">
\t\t\t\t\t";
        // line 543
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Cancel"), "html", null, true);
        yield "
\t\t\t\t</button>

\t\t\t\t<button type=\"submit\" class=\"button button-accent\" :processing=\"isProcessing\" :disabled=\"isProcessing\">
\t\t\t\t\t";
        // line 547
        yield from $this->load("/snippets/spinner.twig", 547)->unwrap()->yield($context);
        // line 548
        yield "
\t\t\t\t\t";
        // line 549
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Save changes"), "html", null, true);
        yield "
\t\t\t\t</button>
\t\t\t</div>
\t\t</form>
\t</x-form>
</modal-element>

<modal-element name=\"workspace-subscription\">
\t<x-form>
\t\t<form class=\"flex flex-col gap-8 modal\" @submit.prevent=\"subscribe(\$refs.plan.value)\">
\t\t\t<div class=\"flex justify-between items-center\">
\t\t\t\t<h2 class=\"text-xl\">";
        // line 560
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "New subscription"), "html", null, true);
        yield "</h2>

\t\t\t\t<button class=\"flex justify-center items-center w-8 h-8 rounded-full border border-transparent bg-line-dimmed hover:border-line\" @click=\"modal.close()\" type=\"button\">
\t\t\t\t\t<i class=\"text-xl ti ti-x\"></i>
\t\t\t\t</button>
\t\t\t</div>

\t\t\t<div>
\t\t\t\t<label for=\"plan\">";
        // line 568
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Plan"), "html", null, true);
        yield "</label>
\t\t\t\t<select name=\"plan\" id=\"plan\" class=\"mt-2 input\" :disabled=\"plans.length == 0\" x-ref=\"plan\" required>
\t\t\t\t\t<option value=\"\">";
        // line 570
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("input-value", "Select a plan"), "html", null, true);
        yield "</option>

\t\t\t\t\t<template x-for=\"plan in plans\" :key=\"plan.id\">
\t\t\t\t\t\t<option :value=\"plan.id\" x-text=\"`\${plan.title} / \${plan.billing_cycle}`\"></option>
\t\t\t\t\t</template>
\t\t\t\t</select>
\t\t\t</div>

\t\t\t<div>
\t\t\t\t<div class=\"flex gap-1 items-center text-sm font-bold\">
\t\t\t\t\t<i class=\"text-lg ti ti-info-square-rounded\"></i>
\t\t\t\t\t";
        // line 581
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Important"), "html", null, true);
        yield "
\t\t\t\t</div>

\t\t\t\t<p class=\"mt-2 text-sm\">
\t\t\t\t\t";
        // line 585
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("This action creates a new subscription with the selected plan for the workspace, ending the current one."), "html", null, true);
        yield "
\t\t\t\t\t<strong>";
        // line 586
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("No charges apply, even if the plan isn't free."), "html", null, true);
        yield "</strong>
        </p>
      </div>

      <div class=\"flex gap-4 justify-end\">
        <button type=\"button\" class=\"button button-outline\"
          @click=\"modal.close()\" type=\"button\">
          ";
        // line 593
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Cancel"), "html", null, true);
        yield "
        </button>

        <button type=\"submit\" class=\"button button-accent\"
          :processing=\"isProcessing\">
          ";
        // line 598
        yield from $this->load("/snippets/spinner.twig", 598)->unwrap()->yield($context);
        // line 599
        yield "
          ";
        // line 600
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Create subscription"), "html", null, true);
        yield "
        </button>
      </div>
    </form>
  </x-form>
</modal-element>

<modal-element name=\"workspace-addon-credits\" x-data=\"{ 
    total: workspace.credit_count === null ? true : false,
    value: workspace.credit_count === null ? workspace.credit_count : ''
}\">
  <x-form>
    <form class=\"flex flex-col gap-8 modal\"
      @submit.prevent=\"adjustCredits(value, total)\">
      <div class=\"flex justify-between items-center\"> 
        <h2 class=\"text-xl\">";
        // line 615
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Adjust add-on credits"), "html", null, true);
        yield "</h2>

        <button
          class=\"flex justify-center items-center w-8 h-8 rounded-full border border-transparent bg-line-dimmed hover:border-line\"
          @click=\"modal.close()\" type=\"button\">
          <i class=\"text-xl ti ti-x\"></i>
        </button>
      </div>

      <div>
        <label for=\"addon-credits\" x-text=\"total ? `";
        // line 625
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Total add-on credits"), "html", null, true);
        yield "` : `";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Add-on credits"), "html", null, true);
        yield "`\"></label>
        <input type=\"number\" class=\"mt-2 input\" id=\"addon-credits\" :placeholder=\"total ? workspace.credit_count : `";
        // line 626
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Include a number of new add-on credits"), "html", null, true);
        yield "`\"
          x-model=\"value\"  min=\"0\" step=\"0.00000000001\" maxlength=\"23\" max=\"99999999999.99999999999\"
          :required=\"!total\">

        <ul class=\"info mt-2\" x-show=\"total\">
          <li>
            ";
        // line 632
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Leave blank for unlimited."), "html", null, true);
        yield "
          </li>
        </ul>
      </div>

      <div class=\"flex justify-between items-center p-3 rounded-lg bg-intermediate\">
        ";
        // line 638
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Set as total"), "html", null, true);
        yield "

        <label class=\"inline-flex gap-2 items-center cursor-pointer\">
          <input type=\"checkbox\" name=\"total\" class=\"hidden peer\" x-model=\"total\" :disabled=\"workspace.credit_count == null\">

          <span class=\"block relative w-10 h-6 rounded-3xl transition-all bg-line peer-disabled:opacity-50 peer-checked:bg-success after:h-5 after:w-5 after:top-0.5 after:absolute after:left-0 after:ms-0.5 after:transition-all after:rounded-full after:bg-white peer-checked:after:left-4\"></span>

          <span class=\"text-content-dimmed peer-checked:hidden peer-disabled:opacity-50\">
            ";
        // line 646
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("input-value", "No"), "html", null, true);
        yield "
          </span>

          <span class=\"hidden text-success peer-checked:inline peer-disabled:opacity-50\">
            ";
        // line 650
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("input-value", "Yes"), "html", null, true);
        yield "
          </span>
        </label>
      </div>

      <div class=\"grid grid-cols-2 gap-8\">
        <div>
          <div class=\"label\">";
        // line 657
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Current value"), "html", null, true);
        yield "</div>
          <x-credit :data-value=\"workspace.credit_count === null ? 'null' : workspace.credit_count\"></x-credit>
        </div>

        <div>
          <div class=\"label\">";
        // line 662
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "New value"), "html", null, true);
        yield "</div>
          <x-credit :data-value=\"total ? value : 1 * value + workspace.credit_count\"></x-credit>
        </div>
      </div>

      <div>
        <div class=\"flex gap-1 items-center text-sm font-bold\">
          <i class=\"text-lg ti ti-info-square-rounded\"></i>
          ";
        // line 670
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Important"), "html", null, true);
        yield "
        </div>

        <p class=\"mt-2 text-sm\">
          ";
        // line 674
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("This action adjusts the add-on credits for the workspace. No transactional data will be generated. This action is irreversible, use with caution."), "html", null, true);
        yield "
        </p>
      </div>

      <div class=\"flex gap-4 justify-end\">
        <button type=\"button\" class=\"button button-outline\"
          @click=\"modal.close()\" type=\"button\">
          ";
        // line 681
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Cancel"), "html", null, true);
        yield "
        </button>

        <button type=\"submit\" class=\"button button-accent\"
          :processing=\"isProcessing\">
          ";
        // line 686
        yield from $this->load("/snippets/spinner.twig", 686)->unwrap()->yield($context);
        // line 687
        yield "
          <span x-text=\"total ? `";
        // line 688
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Set total"), "html", null, true);
        yield "` : `";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Adjust credits"), "html", null, true);
        yield "`\"></span>
        </button>
      </div>
    </form>
  </x-form>
</modal-element>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "/templates/admin/workspace.twig";
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
        return array (  1011 => 688,  1008 => 687,  1006 => 686,  998 => 681,  988 => 674,  981 => 670,  970 => 662,  962 => 657,  952 => 650,  945 => 646,  934 => 638,  925 => 632,  916 => 626,  910 => 625,  897 => 615,  879 => 600,  876 => 599,  874 => 598,  866 => 593,  856 => 586,  852 => 585,  845 => 581,  831 => 570,  826 => 568,  815 => 560,  801 => 549,  798 => 548,  796 => 547,  789 => 543,  780 => 537,  769 => 529,  755 => 517,  753 => 516,  744 => 510,  740 => 509,  736 => 508,  732 => 507,  728 => 506,  719 => 500,  713 => 497,  700 => 487,  693 => 483,  686 => 479,  679 => 475,  668 => 467,  661 => 463,  654 => 459,  637 => 445,  634 => 444,  631 => 441,  613 => 426,  607 => 423,  590 => 409,  584 => 406,  563 => 388,  549 => 377,  545 => 376,  519 => 353,  513 => 350,  503 => 343,  493 => 336,  482 => 328,  474 => 323,  467 => 319,  459 => 314,  453 => 311,  443 => 304,  431 => 295,  417 => 284,  410 => 280,  399 => 272,  390 => 266,  377 => 256,  369 => 253,  362 => 249,  355 => 245,  348 => 241,  337 => 233,  326 => 225,  312 => 214,  300 => 205,  291 => 199,  280 => 191,  273 => 187,  266 => 183,  259 => 179,  251 => 174,  232 => 158,  200 => 129,  167 => 99,  150 => 85,  133 => 71,  121 => 62,  116 => 60,  100 => 47,  95 => 44,  93 => 43,  89 => 41,  82 => 40,  71 => 38,  66 => 1,  59 => 34,  54 => 33,  52 => 32,  50 => 30,  48 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "/templates/admin/workspace.twig", "/home/appcloud/resources/views/templates/admin/workspace.twig");
    }
}
