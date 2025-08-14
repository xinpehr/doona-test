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

/* /snippets/navigation.twig */
class __TwigTemplate_11efd6b219a672e5f8a8aef966a41847 extends Template
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
        $context["active_menu"] = (((array_key_exists("active_menu", $context) &&  !(null === $context["active_menu"]))) ? ($context["active_menu"]) : (null));
        // line 2
        yield "
<nav class=\"flex overflow-y-auto overflow-x-hidden flex-col gap-4 px-4 group-data-collapsed/html:overflow-visible\">
\t";
        // line 4
        $context["cls"] = "flex items-center gap-2 p-2 rounded-lg transition hover:bg-intermediate lg:hover:bg-main hover:text-intermediate-content lg:hover:text-content lg:dark:hover:bg-[#040505]";
        // line 5
        yield "\t";
        $context["active"] = "bg-main no-underline text-content dark:bg-[#040505]";
        // line 6
        yield "
\t";
        // line 7
        if ((($context["view_namespace"] ?? null) == "admin")) {
            // line 8
            yield "\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::filter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["nav"] ?? null), "admin", [], "any", false, false, false, 8), function ($__section__, $__key__) use ($context, $macros) { $context["section"] = $__section__; $context["key"] = $__key__; return !CoreExtension::inFilter($context["key"], ["account", "settings"]); }));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["key"] => $context["section"]) {
                // line 9
                yield "\t\t\t";
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, $context["section"], "items", [], "any", true, true, false, 9)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["section"], "items", [], "any", false, false, false, 9), [])) : ([]))) > 0)) {
                    // line 10
                    yield "\t\t\t\t<div>
\t\t\t\t\t";
                    // line 11
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["section"], "label", [], "any", false, false, false, 11)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 12
                        yield "\t\t\t\t\t\t<h4 class=\"p-2 font-bold\">";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("nav", CoreExtension::getAttribute($this->env, $this->source, $context["section"], "label", [], "any", false, false, false, 12)), "html", null, true);
                        yield "</h4>
\t\t\t\t\t";
                    }
                    // line 14
                    yield "
\t\t\t\t\t<ul class=\"flex flex-col gap-0.5\">
\t\t\t\t\t\t";
                    // line 16
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["section"], "items", [], "any", false, false, false, 16));
                    $context['loop'] = [
                      'parent' => $context['_parent'],
                      'index0' => 0,
                      'index'  => 1,
                      'first'  => true,
                    ];
                    if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                        $length = count($context['_seq']);
                        $context['loop']['revindex0'] = $length - 1;
                        $context['loop']['revindex'] = $length;
                        $context['loop']['length'] = $length;
                        $context['loop']['last'] = 1 === $length;
                    }
                    foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                        // line 17
                        yield "\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"";
                        // line 18
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, false, 18), "html", null, true);
                        yield "\" class=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["cls"] ?? null), "html", null, true);
                        yield " ";
                        yield (((($context["active_menu"] ?? null) == CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, false, 18))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["active"] ?? null), "html", null, true)) : (""));
                        yield "\">
\t\t\t\t\t\t\t\t\t";
                        // line 19
                        $context["iconcls"] = "flex items-center justify-center w-7 h-7 rounded-[45%] ";
                        // line 20
                        yield "
\t\t\t\t\t\t\t\t\t";
                        // line 21
                        if ((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "from", [], "any", false, false, false, 21) || CoreExtension::getAttribute($this->env, $this->source, $context["item"], "to", [], "any", false, false, false, 21))) {
                            // line 22
                            yield "\t\t\t\t\t\t\t\t\t\t";
                            $context["iconcls"] = (($context["iconcls"] ?? null) . "text-white bg-black from-black to-black bg-linear-to-br");
                            // line 23
                            yield "\t\t\t\t\t\t\t\t\t";
                        }
                        // line 24
                        yield "
\t\t\t\t\t\t\t\t\t<div class=\"";
                        // line 25
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["iconcls"] ?? null), "html", null, true);
                        yield "\" style=\"--tw-gradient-from: ";
                        yield (((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "from", [], "any", true, true, false, 25) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["item"], "from", [], "any", false, false, false, 25)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "from", [], "any", false, false, false, 25), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "to", [], "any", false, false, false, 25), "html", null, true)));
                        yield "; --tw-gradient-to: ";
                        yield (((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "to", [], "any", true, true, false, 25) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["item"], "to", [], "any", false, false, false, 25)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "to", [], "any", false, false, false, 25), "html", null, true)) : ((((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "from", [], "any", true, true, false, 25) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["item"], "from", [], "any", false, false, false, 25)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "from", [], "any", false, false, false, 25), "html", null, true)) : ("#006ABF"))));
                        yield "\">
\t\t\t\t\t\t\t\t\t\t";
                        // line 26
                        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "iconType", [], "any", false, false, false, 26), "value", [], "any", false, false, false, 26) == "ti")) {
                            // line 27
                            yield "\t\t\t\t\t\t\t\t\t\t\t<i class=\"text-2xl ti ti-";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "icon", [], "any", false, false, false, 27), "html", null, true);
                            yield "\"></i>
\t\t\t\t\t\t\t\t\t\t";
                        } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                         // line 28
$context["item"], "iconType", [], "any", false, false, false, 28), "value", [], "any", false, false, false, 28) == "svg")) {
                            // line 29
                            yield "\t\t\t\t\t\t\t\t\t\t\t";
                            yield CoreExtension::getAttribute($this->env, $this->source, $context["item"], "icon", [], "any", false, false, false, 29);
                            yield "
\t\t\t\t\t\t\t\t\t\t";
                        } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                         // line 30
$context["item"], "iconType", [], "any", false, false, false, 30), "value", [], "any", false, false, false, 30) == "src")) {
                            // line 31
                            yield "\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "icon", [], "any", false, false, false, 31), "html", null, true);
                            yield "\" alt=\"";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "label", [], "any", false, false, false, 31), "html", null, true);
                            yield "\">
\t\t\t\t\t\t\t\t\t\t";
                        } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                         // line 32
$context["item"], "iconType", [], "any", false, false, false, 32), "value", [], "any", false, false, false, 32) == "include")) {
                            // line 33
                            yield "\t\t\t\t\t\t\t\t\t\t\t";
                            yield from $this->load(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "icon", [], "any", false, false, false, 33), 33)->unwrap()->yield($context);
                            // line 34
                            yield "\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 35
                        yield "\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t";
                        // line 37
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("nav", CoreExtension::getAttribute($this->env, $this->source, $context["item"], "label", [], "any", false, false, false, 37)), "html", null, true);
                        yield "
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t";
                        ++$context['loop']['index0'];
                        ++$context['loop']['index'];
                        $context['loop']['first'] = false;
                        if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                            --$context['loop']['revindex0'];
                            --$context['loop']['revindex'];
                            $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                        }
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 41
                    yield "\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t";
                }
                // line 44
                yield "\t\t";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['key'], $context['section'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 45
            yield "\t";
        } else {
            // line 46
            yield "\t\t";
            if ((((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "is_email_verified", [], "any", false, false, false, 46) == false) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "site", [], "any", false, true, false, 46), "email_verification_policy", [], "any", true, true, false, 46)) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "site", [], "any", false, false, false, 46), "email_verification_policy", [], "any", false, false, false, 46) == "strict"))) {
                // line 47
                yield "\t\t\t";
                $context["cls"] = (($context["cls"] ?? null) . " opacity-50 hover:opacity-100 group grayscale hover:grayscale-0");
                // line 48
                yield "\t\t\t";
                $context["lock"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                    // line 49
                    yield "\t\t\t<i class=\"hidden ms-auto text-base ti ti-lock group-hover:block\" x-tooltip.raw.placement.right=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Email verification required"), "html", null, true);
                    yield "\"></i>
\t\t\t";
                    yield from [];
                })())) ? '' : new Markup($tmp, $this->env->getCharset());
                // line 51
                yield "\t\t";
            } else {
                // line 52
                yield "\t\t\t";
                $context["lock"] = "";
                // line 53
                yield "\t\t";
            }
            // line 54
            yield "
\t\t";
            // line 55
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::filter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["nav"] ?? null), "app", [], "any", false, false, false, 55), function ($__section__, $__key__) use ($context, $macros) { $context["section"] = $__section__; $context["key"] = $__key__; return !CoreExtension::inFilter($context["key"], ["secondary", "account", "workspace"]); }));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["key"] => $context["section"]) {
                // line 56
                yield "\t\t\t";
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["section"], "items", [], "any", false, false, false, 56)) > 0)) {
                    // line 57
                    yield "\t\t\t\t<div>
\t\t\t\t\t";
                    // line 58
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["section"], "label", [], "any", false, false, false, 58)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 59
                        yield "\t\t\t\t\t\t<h4 class=\"p-2 text-xs font-medium text-intermediate-content-dimmed\">";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("nav", CoreExtension::getAttribute($this->env, $this->source, $context["section"], "label", [], "any", false, false, false, 59)), "html", null, true);
                        yield "</h4>
\t\t\t\t\t";
                    }
                    // line 61
                    yield "
\t\t\t\t\t<ul class=\"flex flex-col gap-0.5\">
\t\t\t\t\t\t";
                    // line 63
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["section"], "items", [], "any", false, false, false, 63));
                    $context['loop'] = [
                      'parent' => $context['_parent'],
                      'index0' => 0,
                      'index'  => 1,
                      'first'  => true,
                    ];
                    if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                        $length = count($context['_seq']);
                        $context['loop']['revindex0'] = $length - 1;
                        $context['loop']['revindex'] = $length;
                        $context['loop']['length'] = $length;
                        $context['loop']['last'] = 1 === $length;
                    }
                    foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                        // line 64
                        yield "\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"";
                        // line 65
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, false, 65), "html", null, true);
                        yield "\" class=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["cls"] ?? null), "html", null, true);
                        yield " ";
                        yield (((($context["active_menu"] ?? null) == CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, false, 65))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["active"] ?? null), "html", null, true)) : (""));
                        yield "\">
\t\t\t\t\t\t\t\t\t";
                        // line 66
                        $context["iconcls"] = "flex items-center justify-center w-7 h-7 rounded-[45%] ";
                        // line 67
                        yield "
\t\t\t\t\t\t\t\t\t";
                        // line 68
                        if ((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "from", [], "any", false, false, false, 68) || CoreExtension::getAttribute($this->env, $this->source, $context["item"], "to", [], "any", false, false, false, 68))) {
                            // line 69
                            yield "\t\t\t\t\t\t\t\t\t\t";
                            $context["iconcls"] = (($context["iconcls"] ?? null) . "text-white bg-black from-black to-black bg-linear-to-br");
                            // line 70
                            yield "\t\t\t\t\t\t\t\t\t";
                        }
                        // line 71
                        yield "
\t\t\t\t\t\t\t\t\t<div class=\"";
                        // line 72
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["iconcls"] ?? null), "html", null, true);
                        yield "\" style=\"--tw-gradient-from: ";
                        yield (((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "from", [], "any", true, true, false, 72) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["item"], "from", [], "any", false, false, false, 72)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "from", [], "any", false, false, false, 72), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "to", [], "any", false, false, false, 72), "html", null, true)));
                        yield "; --tw-gradient-to: ";
                        yield (((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "to", [], "any", true, true, false, 72) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["item"], "to", [], "any", false, false, false, 72)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "to", [], "any", false, false, false, 72), "html", null, true)) : ((((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "from", [], "any", true, true, false, 72) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["item"], "from", [], "any", false, false, false, 72)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "from", [], "any", false, false, false, 72), "html", null, true)) : ("#006ABF"))));
                        yield "\">
\t\t\t\t\t\t\t\t\t\t";
                        // line 73
                        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "iconType", [], "any", false, false, false, 73), "value", [], "any", false, false, false, 73) == "ti")) {
                            // line 74
                            yield "\t\t\t\t\t\t\t\t\t\t\t<i class=\"text-2xl ti ti-";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "icon", [], "any", false, false, false, 74), "html", null, true);
                            yield "\"></i>
\t\t\t\t\t\t\t\t\t\t";
                        } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                         // line 75
$context["item"], "iconType", [], "any", false, false, false, 75), "value", [], "any", false, false, false, 75) == "svg")) {
                            // line 76
                            yield "\t\t\t\t\t\t\t\t\t\t\t";
                            yield CoreExtension::getAttribute($this->env, $this->source, $context["item"], "icon", [], "any", false, false, false, 76);
                            yield "
\t\t\t\t\t\t\t\t\t\t";
                        } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                         // line 77
$context["item"], "iconType", [], "any", false, false, false, 77), "value", [], "any", false, false, false, 77) == "src")) {
                            // line 78
                            yield "\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "icon", [], "any", false, false, false, 78), "html", null, true);
                            yield "\" alt=\"";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "label", [], "any", false, false, false, 78), "html", null, true);
                            yield "\">
\t\t\t\t\t\t\t\t\t\t";
                        } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                         // line 79
$context["item"], "iconType", [], "any", false, false, false, 79), "value", [], "any", false, false, false, 79) == "include")) {
                            // line 80
                            yield "\t\t\t\t\t\t\t\t\t\t\t";
                            yield from $this->load(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "icon", [], "any", false, false, false, 80), 80)->unwrap()->yield($context);
                            // line 81
                            yield "\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 82
                        yield "\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t";
                        // line 84
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("nav", CoreExtension::getAttribute($this->env, $this->source, $context["item"], "label", [], "any", false, false, false, 84)), "html", null, true);
                        yield "
\t\t\t\t\t\t\t\t\t";
                        // line 85
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["lock"] ?? null), "html", null, true);
                        yield "
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t";
                        ++$context['loop']['index0'];
                        ++$context['loop']['index'];
                        $context['loop']['first'] = false;
                        if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                            --$context['loop']['revindex0'];
                            --$context['loop']['revindex'];
                            $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                        }
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 89
                    yield "\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t";
                }
                // line 92
                yield "\t\t";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['key'], $context['section'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 93
            yield "\t";
        }
        // line 94
        yield "</nav>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "/snippets/navigation.twig";
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
        return array (  415 => 94,  412 => 93,  398 => 92,  393 => 89,  375 => 85,  371 => 84,  367 => 82,  364 => 81,  361 => 80,  359 => 79,  352 => 78,  350 => 77,  345 => 76,  343 => 75,  338 => 74,  336 => 73,  328 => 72,  325 => 71,  322 => 70,  319 => 69,  317 => 68,  314 => 67,  312 => 66,  304 => 65,  301 => 64,  284 => 63,  280 => 61,  274 => 59,  272 => 58,  269 => 57,  266 => 56,  249 => 55,  246 => 54,  243 => 53,  240 => 52,  237 => 51,  230 => 49,  227 => 48,  224 => 47,  221 => 46,  218 => 45,  204 => 44,  199 => 41,  181 => 37,  177 => 35,  174 => 34,  171 => 33,  169 => 32,  162 => 31,  160 => 30,  155 => 29,  153 => 28,  148 => 27,  146 => 26,  138 => 25,  135 => 24,  132 => 23,  129 => 22,  127 => 21,  124 => 20,  122 => 19,  114 => 18,  111 => 17,  94 => 16,  90 => 14,  84 => 12,  82 => 11,  79 => 10,  76 => 9,  58 => 8,  56 => 7,  53 => 6,  50 => 5,  48 => 4,  44 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "/snippets/navigation.twig", "/home/appcloud/resources/views/snippets/navigation.twig");
    }
}
