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

/* /sections/topbar.twig */
class __TwigTemplate_53039f7b259e6568e113e218263c8371 extends Template
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
        $context["content"] = null;
        // line 2
        yield "
";
        // line 3
        if ((((($context["view_namespace"] ?? null) == "app") && (($context["environment"] ?? null) == "demo")) && (CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "role", [], "any", false, false, false, 3) == "admin"))) {
            // line 4
            yield "\t";
            $context["content"] = new Markup("\t<p>
\t\tSign up with your email to receive 100 free credits for testing app features.

\t\t<i class=\"ti ti-info-square-rounded-filled ms-2\" x-tooltip.raw=\"This demo account has no credits to use within the app.\"></i>
\t</p>
\t", $this->env->getCharset());
        } elseif ((((        // line 11
($context["view_namespace"] ?? null) == "app") && (CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "is_email_verified", [], "any", false, false, false, 11) != true)) && CoreExtension::inFilter(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "site", [], "any", false, true, false, 11), "email_verification_policy", [], "any", true, true, false, 11)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "site", [], "any", false, false, false, 11), "email_verification_policy", [], "any", false, false, false, 11), null)) : (null)), ["relaxed", "strict"]))) {
            // line 12
            yield "\t";
            $context["content"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 13
                yield "\t<a href=\"app/account/verification\" class=\"font-medium group\">
\t\t<i class=\"ti ti-click text-lg me-2 transition-all group-hover:scale-125 duration-100 inline-block\"></i>
\t\t";
                // line 15
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Your email address is not verified. Click here to verify your email address."), "html", null, true);
                yield "
\t</a>
\t";
                yield from [];
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
        } elseif ((((        // line 18
($context["view_namespace"] ?? null) == "app") &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["workspace"] ?? null), "total_credit_count", [], "any", false, false, false, 18))) && (CoreExtension::getAttribute($this->env, $this->source, ($context["workspace"] ?? null), "total_credit_count", [], "any", false, false, false, 18) <= 0))) {
            // line 19
            yield "\t";
            $context["content"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 20
                yield "\t<a href=\"app/billing\" class=\"font-medium group\">
\t\t<i class=\"ti ti-click text-lg me-2 transition-all group-hover:scale-125 duration-100 inline-block\"></i>
\t\t";
                // line 22
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("You have run out of credits. Purchase more credits to continue using the app."), "html", null, true);
                yield "
\t</a>
\t";
                yield from [];
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
        }
        // line 26
        yield "
";
        // line 27
        if ((($tmp =  !(null === ($context["content"] ?? null))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 28
            yield "\t<div class=\"py-3 bg-rose-600 text-white text-sm text-center relative group/bar\">
\t\t<div class=\"container\">
\t\t\t";
            // line 30
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["content"] ?? null), "html", null, true);
            yield "
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
        return "/sections/topbar.twig";
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
        return array (  99 => 30,  95 => 28,  93 => 27,  90 => 26,  82 => 22,  78 => 20,  75 => 19,  73 => 18,  66 => 15,  62 => 13,  59 => 12,  57 => 11,  49 => 4,  47 => 3,  44 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "/sections/topbar.twig", "/home/appcloud/resources/views/sections/topbar.twig");
    }
}
