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

/* sections/dashboard/tools.twig */
class __TwigTemplate_a616c30026112e8101d5ef186130a070 extends Template
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
        $context["section"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["nav"] ?? null), "app", [], "any", false, false, false, 1), "apps", [], "any", false, false, false, 1);
        // line 2
        yield "
";
        // line 3
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["section"] ?? null), "items", [], "any", false, false, false, 3)) > 0)) {
            // line 4
            yield "<div>
  <h2>";
            // line 5
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("nav", CoreExtension::getAttribute($this->env, $this->source, ($context["section"] ?? null), "label", [], "any", false, false, false, 5)), "html", null, true);
            yield "</h2>

  <div class=\"grid gap-1 mt-4 xs:grid-cols-2 md:grid-cols-3\">
    ";
            // line 8
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["section"] ?? null), "items", [], "any", false, false, false, 8));
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
                // line 9
                yield "      <div class=\"flex relative flex-col gap-4 justify-start box hover:border-line\">
        ";
                // line 10
                $context["iconcls"] = "flex items-center justify-center w-10 h-10 rounded-[45%] ";
                // line 11
                yield "
        ";
                // line 12
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "from", [], "any", false, false, false, 12) || CoreExtension::getAttribute($this->env, $this->source, $context["item"], "to", [], "any", false, false, false, 12))) {
                    // line 13
                    yield "          ";
                    $context["iconcls"] = (($context["iconcls"] ?? null) . "text-white bg-black from-black to-black bg-linear-to-br");
                    // line 14
                    yield "        ";
                } else {
                    // line 15
                    yield "          ";
                    $context["iconcls"] = (($context["iconcls"] ?? null) . "bg-intermediate text-intermediate-content");
                    // line 16
                    yield "        ";
                }
                // line 17
                yield "
        <div class=\"";
                // line 18
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["iconcls"] ?? null), "html", null, true);
                yield "\" style=\"--tw-gradient-from: ";
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "from", [], "any", true, true, false, 18) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["item"], "from", [], "any", false, false, false, 18)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "from", [], "any", false, false, false, 18), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "to", [], "any", false, false, false, 18), "html", null, true)));
                yield "; --tw-gradient-to: ";
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "to", [], "any", true, true, false, 18) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["item"], "to", [], "any", false, false, false, 18)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "to", [], "any", false, false, false, 18), "html", null, true)) : ((((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "from", [], "any", true, true, false, 18) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["item"], "from", [], "any", false, false, false, 18)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "from", [], "any", false, false, false, 18), "html", null, true)) : ("#006ABF"))));
                yield "\">
          ";
                // line 19
                if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "iconType", [], "any", false, false, false, 19), "value", [], "any", false, false, false, 19) == "ti")) {
                    // line 20
                    yield "            <i class=\"text-2xl ti ti-";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "icon", [], "any", false, false, false, 20), "html", null, true);
                    yield "\"></i>
          ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 21
$context["item"], "iconType", [], "any", false, false, false, 21), "value", [], "any", false, false, false, 21) == "svg")) {
                    // line 22
                    yield "            ";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["item"], "icon", [], "any", false, false, false, 22);
                    yield "
          ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 23
$context["item"], "iconType", [], "any", false, false, false, 23), "value", [], "any", false, false, false, 23) == "src")) {
                    // line 24
                    yield "            <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "icon", [], "any", false, false, false, 24), "html", null, true);
                    yield "\" alt=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "label", [], "any", false, false, false, 24), "html", null, true);
                    yield "\">
          ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 25
$context["item"], "iconType", [], "any", false, false, false, 25), "value", [], "any", false, false, false, 25) == "include")) {
                    // line 26
                    yield "            ";
                    yield from $this->load(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "icon", [], "any", false, false, false, 26), 26)->unwrap()->yield($context);
                    // line 27
                    yield "          ";
                }
                // line 28
                yield "        </div>

        <div>
          <h3 class=\"font-bold\">";
                // line 31
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("nav", CoreExtension::getAttribute($this->env, $this->source, $context["item"], "label", [], "any", false, false, false, 31)), "html", null, true);
                yield "</h3>

          ";
                // line 33
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "description", [], "any", false, false, false, 33)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 34
                    yield "            <p class=\"text-sm text-content-dimmed mt-1 min-h-[3.75rem]\">
              ";
                    // line 35
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("nav", CoreExtension::getAttribute($this->env, $this->source, $context["item"], "description", [], "any", false, false, false, 35)), "html", null, true);
                    yield "
            </p>
          ";
                }
                // line 38
                yield "          </p>
        </div>

        <div class=\"mt-auto\">
          ";
                // line 42
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "tags", [], "any", false, false, false, 42));
                foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
                    // line 43
                    yield "            <span
              class=\"px-2 py-1 text-xs bg-transparent rounded-lg border border-line text-content\">
              ";
                    // line 45
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("nav", $context["tag"]), "html", null, true);
                    yield "
            </span>
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['tag'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 48
                yield "        </div>

        <a href=\"";
                // line 50
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, false, 50), "html", null, true);
                yield "\" class=\"absolute top-0 left-0 z-10 w-full h-full\"></a>
      </div>
    ";
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
            // line 53
            yield "  </div>
</div>
";
        }
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "sections/dashboard/tools.twig";
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
        return array (  204 => 53,  187 => 50,  183 => 48,  174 => 45,  170 => 43,  166 => 42,  160 => 38,  154 => 35,  151 => 34,  149 => 33,  144 => 31,  139 => 28,  136 => 27,  133 => 26,  131 => 25,  124 => 24,  122 => 23,  117 => 22,  115 => 21,  110 => 20,  108 => 19,  100 => 18,  97 => 17,  94 => 16,  91 => 15,  88 => 14,  85 => 13,  83 => 12,  80 => 11,  78 => 10,  75 => 9,  58 => 8,  52 => 5,  49 => 4,  47 => 3,  44 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "sections/dashboard/tools.twig", "/home/appcloud/resources/views/sections/dashboard/tools.twig");
    }
}
