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

/* snippets/cards/order.twig */
class __TwigTemplate_8e96b024e544380558aaf3422cc6119e extends Template
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
        if (array_key_exists("placeholder", $context)) {
            // line 2
            yield "\t<div class=\"hidden grid-cols-12 gap-3 items-center md:p-3 box animate-pulse group-data-[state=initial]/list:grid\">
\t\t<div class=\"flex col-span-11 gap-3 items-center\">
\t\t\t<div class=\"avatar loading\"></div>
\t\t\t<div class=\"w-32 h-6 loading\"></div>
\t\t</div>

\t\t<div class=\"col-span-1 justify-self-end\">
\t\t\t<i class=\"text-2xl animate-pulse ti ti-dots-vertical text-content-dimmed\"></i>
\t\t</div>
\t</div>
";
        } else {
            // line 13
            yield "\t";
            $context["ref"] = (((array_key_exists("ref", $context) &&  !(null === $context["ref"]))) ? ($context["ref"]) : ("order"));
            // line 14
            yield "\t";
            $context["type"] = (((array_key_exists("type", $context) &&  !(null === $context["type"]))) ? ($context["type"]) : ("app"));
            // line 15
            yield "
\t<div class=\"grid relative grid-cols-12 gap-3 items-start p-3 box hover:border-line\" x-data>
\t\t<a :href=\"`";
            // line 17
            yield (((($context["type"] ?? null) == "admin")) ? ("admin/orders/") : ("app/billing/orders/"));
            yield "\${ ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["ref"] ?? null), "html", null, true);
            yield ".id}`\" class=\"absolute top-0 left-0 w-full h-full cursor-pointer\"></a>

\t\t<div class=\"flex col-span-11 gap-3 items-center md:col-span-3\">
\t\t\t<div class=\"flex flex-col gap-1\">
\t\t\t\t<div>
\t\t\t\t\t<div class=\"font-bold\" x-text=\"";
            // line 22
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["ref"] ?? null), "html", null, true);
            yield ".plan.title\"></div>

\t\t\t\t\t<template x-if=\"";
            // line 24
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["ref"] ?? null), "html", null, true);
            yield ".plan.billing_cycle == 'monthly'\">
\t\t\t\t\t\t<span class=\"text-content-dimmed text-xs\">";
            // line 25
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("billing-cycle", "Monthly"), "html", null, true);
            yield "</span>
\t\t\t\t\t</template>

\t\t\t\t\t<template x-if=\"";
            // line 28
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["ref"] ?? null), "html", null, true);
            yield ".plan.billing_cycle == 'yearly'\">
\t\t\t\t\t\t<span class=\"text-content-dimmed text-xs\">";
            // line 29
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("billing-cycle", "Yearly"), "html", null, true);
            yield "</span>
\t\t\t\t\t</template>

\t\t\t\t\t<template x-if=\"";
            // line 32
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["ref"] ?? null), "html", null, true);
            yield ".plan.billing_cycle == 'lifetime'\">
\t\t\t\t\t\t<span class=\"text-content-dimmed text-xs\">";
            // line 33
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("billing-cycle", "Lifetime"), "html", null, true);
            yield "</span>
\t\t\t\t\t</template>

\t\t\t\t\t<template x-if=\"";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["ref"] ?? null), "html", null, true);
            yield ".plan.billing_cycle == 'one-time'\">
\t\t\t\t\t\t<span class=\"text-content-dimmed text-xs\">";
            // line 37
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("billing-cycle", "Add-on credit"), "html", null, true);
            yield "</span>
\t\t\t\t\t</template>
\t\t\t\t</div>

\t\t\t\t";
            // line 41
            if ((($context["type"] ?? null) == "admin")) {
                // line 42
                yield "\t\t\t\t\t<div class=\"mt-0.5 text-xs text-content-dimmed\">
\t\t\t\t\t\t";
                // line 43
                $context["name"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                    // line 44
                    yield "\t\t\t\t\t\t<a :href=\"`admin/workspaces/\${ ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["ref"] ?? null), "html", null, true);
                    yield ".workspace.id}`\" x-text=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["ref"] ?? null), "html", null, true);
                    yield ".workspace.name\" class=\"relative hover:underline text-content\"></a>
\t\t\t\t\t\t";
                    yield from [];
                })())) ? '' : new Markup($tmp, $this->env->getCharset());
                // line 46
                yield "
\t\t\t\t\t\t";
                // line 47
                yield Twig\Extension\CoreExtension::replace(__("Workspace: :name"), [":name" => ($context["name"] ?? null)]);
                yield "
\t\t\t\t\t</div>
\t\t\t\t";
            }
            // line 50
            yield "\t\t\t</div>
\t\t</div>

\t\t<div class=\"hidden md:block md:col-span-2\">
\t\t\t<template x-if=\"";
            // line 54
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["ref"] ?? null), "html", null, true);
            yield ".status == 'draft'\">
\t\t\t\t<span>";
            // line 55
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("order-status", "Draft"), "html", null, true);
            yield "</span>
\t\t\t</template>

\t\t\t<template x-if=\"";
            // line 58
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["ref"] ?? null), "html", null, true);
            yield ".status == 'pending'\">
\t\t\t\t<span>";
            // line 59
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("order-status", "Pending"), "html", null, true);
            yield "</span>
\t\t\t</template>

\t\t\t<template x-if=\"";
            // line 62
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["ref"] ?? null), "html", null, true);
            yield ".status == 'failed'\">
\t\t\t\t<span>";
            // line 63
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("order-status", "Failed"), "html", null, true);
            yield "</span>
\t\t\t</template>

\t\t\t<template x-if=\"";
            // line 66
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["ref"] ?? null), "html", null, true);
            yield ".status == 'processing'\">
\t\t\t\t<span>";
            // line 67
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("order-status", "Processing"), "html", null, true);
            yield "</span>
\t\t\t</template>

\t\t\t<template x-if=\"";
            // line 70
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["ref"] ?? null), "html", null, true);
            yield ".status == 'completed'\">
\t\t\t\t<span>";
            // line 71
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("order-status", "Completed"), "html", null, true);
            yield "</span>
\t\t\t</template>

\t\t\t<template x-if=\"";
            // line 74
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["ref"] ?? null), "html", null, true);
            yield ".status == 'cancelled'\">
\t\t\t\t<span>";
            // line 75
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("order-status", "Cancelled"), "html", null, true);
            yield "</span>
\t\t\t</template>
\t\t</div>

\t\t<div class=\"hidden md:block md:col-span-2\">
\t\t\t<x-credit :data-value=\"";
            // line 80
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["ref"] ?? null), "html", null, true);
            yield ".plan.credit_count\"></x-credit>
\t\t</div>

\t\t<div class=\"hidden md:block md:col-span-2\">
\t\t\t<div class=\"font-bold\">
\t\t\t\t<x-money :data-value=\"";
            // line 85
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["ref"] ?? null), "html", null, true);
            yield ".total\" :currency=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["ref"] ?? null), "html", null, true);
            yield ".currency.code\" :minor-units=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["ref"] ?? null), "html", null, true);
            yield ".currency.fraction_digits\"></x-money>
\t\t\t</div>

\t\t\t<div class=\"mt-0.5 text-xs text-content-dimmed\" x-text=\"";
            // line 88
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["ref"] ?? null), "html", null, true);
            yield ".plan.billing_cycle == 'monthly' ? `";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("per month"), "html", null, true);
            yield "` : ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["ref"] ?? null), "html", null, true);
            yield ".plan.billing_cycle == 'yearly' ? `";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("per year"), "html", null, true);
            yield "` : `";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("one-time"), "html", null, true);
            yield "`\"></div>
\t\t</div>

\t\t<div class=\"hidden md:block md:col-span-2\">
\t\t\t<x-time :datetime=\"";
            // line 92
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["ref"] ?? null), "html", null, true);
            yield ".created_at\" data-type=\"date\"></x-time>
\t\t</div>

\t\t<div class=\"col-span-1 justify-self-end\">
\t\t\t<div class=\"relative\" @click.outside=\"\$refs.context.removeAttribute('data-open')\">

\t\t\t\t<button class=\"relative z-10\" @click=\"\$refs.context.toggleAttribute('data-open')\">
\t\t\t\t\t<i class=\"text-2xl ti ti-dots-vertical text-content-dimmed hover:text-intermediate-content\"></i>
\t\t\t\t</button>

\t\t\t\t<div class=\"menu\" x-ref=\"context\">
\t\t\t\t\t<ul>
\t\t\t\t\t\t<li><a :href=\"`";
            // line 104
            yield (((($context["type"] ?? null) == "admin")) ? ("admin/orders/") : ("app/billing/orders/"));
            yield "\${ ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["ref"] ?? null), "html", null, true);
            yield ".id}`\" class=\"flex gap-2 items-center px-4 py-2 hover:no-underline hover:bg-intermediate\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Details"), "html", null, true);
            yield "</a></li>
\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
";
        }
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "snippets/cards/order.twig";
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
        return array (  264 => 104,  249 => 92,  234 => 88,  224 => 85,  216 => 80,  208 => 75,  204 => 74,  198 => 71,  194 => 70,  188 => 67,  184 => 66,  178 => 63,  174 => 62,  168 => 59,  164 => 58,  158 => 55,  154 => 54,  148 => 50,  142 => 47,  139 => 46,  130 => 44,  128 => 43,  125 => 42,  123 => 41,  116 => 37,  112 => 36,  106 => 33,  102 => 32,  96 => 29,  92 => 28,  86 => 25,  82 => 24,  77 => 22,  67 => 17,  63 => 15,  60 => 14,  57 => 13,  44 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "snippets/cards/order.twig", "/home/appcloud/resources/views/snippets/cards/order.twig");
    }
}
