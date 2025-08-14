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

/* /layouts/minimal.twig */
class __TwigTemplate_73d6f80a1cbcbe3f88feea64339a1465 extends Template
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
            'layout' => [$this, 'block_layout'],
            'template' => [$this, 'block_template'],
            'scripts' => [$this, 'block_scripts'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "/layouts/base.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->load("/layouts/base.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_layout(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 4
        yield "<div>
  <div class=\"container\">
    <div class=\"flex flex-col mx-auto max-w-xl md:gap-4\">
      ";
        // line 7
        yield from $this->load("sections/header.twig", 7)->unwrap()->yield($context);
        // line 8
        yield "
      <div>
        ";
        // line 10
        yield from $this->unwrap()->yieldBlock('template', $context, $blocks);
        // line 11
        yield "        ";
        yield from $this->load("/sections/footer.twig", 11)->unwrap()->yield($context);
        // line 12
        yield "      </div>
    </div>
  </div>
</div>
";
        yield from [];
    }

    // line 10
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_template(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 18
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_scripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 19
        yield "  <script type=\"module\" src=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFilter('asset')->getCallable()("/resources/assets/js/app/index.js"), "html", null, true);
        yield "\"></script>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "/layouts/minimal.twig";
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
        return array (  102 => 19,  95 => 18,  85 => 10,  76 => 12,  73 => 11,  71 => 10,  67 => 8,  65 => 7,  60 => 4,  53 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "/layouts/minimal.twig", "/home/appcloud/resources/views/layouts/minimal.twig");
    }
}
