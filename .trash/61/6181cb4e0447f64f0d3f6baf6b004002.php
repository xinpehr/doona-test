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

/* templates/404.twig */
class __TwigTemplate_9b209d4726caf6703313ecccfd53e8e9 extends Template
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
        return "/layouts/minimal.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->load("/layouts/minimal.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), p__("title", "Not found")), "html", null, true);
        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_template(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 6
        yield "<section class=\"xs:p-8 box md:px-14\">
  ";
        // line 7
        if (array_key_exists("user", $context)) {
            // line 8
            yield "  ";
            yield from $this->load("snippets/back.twig", 8)->unwrap()->yield(CoreExtension::merge($context, ["link" => "app", "label" => p__("button", "Go to app")]));
            // line 9
            yield "  ";
        } else {
            // line 10
            yield "  ";
            yield from $this->load("snippets/back.twig", 10)->unwrap()->yield(CoreExtension::merge($context, ["link" => "/", "label" => p__("button", "Go to home page")]));
            // line 11
            yield "  ";
        }
        // line 12
        yield "
  <h1 class=\"mt-4 text-xl font-bold md:text-2xl\">
    ";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Page not found"), "html", null, true);
        yield "
  </h1>

  <p class=\"mt-2\">";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("The page you are looking for does not exist."), "html", null, true);
        yield "</p>
</section>

";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "templates/404.twig";
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
        return array (  97 => 17,  91 => 14,  87 => 12,  84 => 11,  81 => 10,  78 => 9,  75 => 8,  73 => 7,  70 => 6,  63 => 5,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "templates/404.twig", "/home/appcloud/resources/views/templates/404.twig");
    }
}
