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

/* sections/empty.twig */
class __TwigTemplate_b4989df54d29006a11ead8cffa2308a3 extends Template
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
        yield "<div class=\"pt-32 text-center\">
  <div class=\"relative flex justify-center text-content-dimmed\">
    <i
      class=\"absolute flex items-center justify-center w-16 h-16 -mx-8 -mt-8 text-3xl border-4 top-1/2 left-1/2 ti ti-files-off bg-line-dimmed rounded-2xl border-main rotate-[-20deg] -translate-y-14 -translate-x-5\"></i>

    <i
      class=\"absolute flex items-center justify-center w-16 h-16 -mx-8 -mt-8 text-3xl border-4 top-1/2 left-1/2 ti ti-square-rounded-plus bg-line-dimmed rounded-2xl border-main rotate-[20deg] -translate-y-8 translate-x-6\"></i>

    <i
      class=\"relative flex items-center justify-center w-16 h-16 text-3xl border-4 ti ti-folder-open bg-line-dimmed rounded-2xl border-main\"></i>

  </div>

  <h2 class=\"mt-9\">";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["title"] ?? null), "html", null, true);
        yield "</h2>

  ";
        // line 16
        if (array_key_exists("reset", $context)) {
            // line 17
            yield "  <template x-if=\"typeof isFiltered !== 'undefined' && isFiltered\">
    <p class=\"mt-2 text-sm text-content-dimmed\">
      ";
            // line 19
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["reset"] ?? null), "html", null, true);
            yield " <br>

      ";
            // line 21
            $context["reset_button"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 22
                yield "      <button class=\"text-content hover:underline\"
        @click=\"\$dispatch('lc.reset')\">
        ";
                // line 24
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Reset filters"), "html", null, true);
                yield "
      </button>
      ";
                yield from [];
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 27
            yield "
      ";
            // line 28
            yield Twig\Extension\CoreExtension::replace(__(":reset and and try again."), [":reset" => ($context["reset_button"] ?? null)]);
            yield "
    </p>
  </template>
  ";
        }
        // line 32
        yield "
  <template x-if=\"typeof isFiltered === 'undefined' || !isFiltered\">
    <p class=\"mt-2 text-sm text-content-dimmed\">
      ";
        // line 35
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["message"] ?? null), "html", null, true);
        yield "
    </p>
  </template>

</div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "sections/empty.twig";
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
        return array (  101 => 35,  96 => 32,  89 => 28,  86 => 27,  79 => 24,  75 => 22,  73 => 21,  68 => 19,  64 => 17,  62 => 16,  57 => 14,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "sections/empty.twig", "/home/appcloud/resources/views/sections/empty.twig");
    }
}
