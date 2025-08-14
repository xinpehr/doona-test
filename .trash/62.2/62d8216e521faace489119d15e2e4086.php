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

/* /layouts/main.twig */
class __TwigTemplate_f34178af961da28401c053ab9e8dc64d extends Template
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
            'toolbar' => [$this, 'block_toolbar'],
            'template' => [$this, 'block_template'],
            'footer' => [$this, 'block_footer'],
            'sidebar' => [$this, 'block_sidebar'],
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
        yield "\t<div class=\"lg:flex lg:items-start lg:min-h-screen overflow-hidden\">
\t\t";
        // line 5
        yield from $this->load("/sections/aside.twig", 5)->unwrap()->yield($context);
        // line 6
        yield "
\t\t<div class=\"sticky top-0 z-30 block lg:hidden bg-main group-data-mobile-menu/html:border-0\">
\t\t\t<div class=\"mx-auto w-full max-w-4xl\">
\t\t\t\t";
        // line 9
        yield from $this->load("/sections/mobile-nav.twig", 9)->unwrap()->yield($context);
        // line 10
        yield "\t\t\t</div>
\t\t</div>

\t\t<div class=\"w-full h-[calc(100vh-4rem)] lg:h-screen flex flex-col overflow-y-auto\" id=\"content\">
\t\t\t";
        // line 14
        yield from $this->load("/sections/topbar.twig", 14)->unwrap()->yield($context);
        // line 15
        yield "
\t\t\t<div class=\"relative\">
\t\t\t\t";
        // line 17
        yield from $this->unwrap()->yieldBlock('toolbar', $context, $blocks);
        // line 18
        yield "\t\t\t</div>

\t\t\t<div class=\"container mt-4 lg:mt-0 grow flex flex-col\">
\t\t\t\t<div class=\"flex flex-col lg:pt-10 grow group-data-mobile-menu/html:hidden lg:group-data-mobile-menu/html:flex w-full mx-auto max-w-4xl\">
\t\t\t\t\t<main class=\"flex flex-col gap-5 pb-5 grow md:gap-8 md:pb-8\">
\t\t\t\t\t\t";
        // line 23
        yield from $this->unwrap()->yieldBlock('template', $context, $blocks);
        // line 24
        yield "\t\t\t\t\t</main>

\t\t\t\t\t";
        // line 26
        yield from $this->unwrap()->yieldBlock('footer', $context, $blocks);
        // line 29
        yield "\t\t\t\t</div>
\t\t\t</div>
\t\t</div>

\t\t<aside id=\"sidebar\" class=\"bg-main overflow-y-auto group/sidebar sticky z-10 top-0 hidden lg:flex flex-col gap-4 h-screen shrink-0 w-96 border-s border-line dark:border-line-dimmed -me-96 group-data-sidebar/html:me-0 transition-all ease-in\">
\t\t\t";
        // line 34
        yield from $this->unwrap()->yieldBlock('sidebar', $context, $blocks);
        // line 35
        yield "\t\t</aside>
\t</div>

\t";
        // line 38
        yield from $this->load("/snippets/workspace/switcher.twig", 38)->unwrap()->yield($context);
        yield from [];
    }

    // line 17
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_toolbar(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 23
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_template(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 26
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_footer(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 27
        yield "\t\t\t\t\t\t";
        yield from $this->load("/sections/footer.twig", 27)->unwrap()->yield($context);
        // line 28
        yield "\t\t\t\t\t";
        yield from [];
    }

    // line 34
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_sidebar(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 41
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_scripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 42
        yield "\t";
        if (CoreExtension::inFilter(($context["view_namespace"] ?? null), ["app", "admin"])) {
            // line 43
            yield "\t\t<script type=\"module\" src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFilter('asset')->getCallable()((("/resources/assets/js/" . ($context["view_namespace"] ?? null)) . "/index.js")), "html", null, true);
            yield "\"></script>
\t";
        }
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "/layouts/main.twig";
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
        return array (  178 => 43,  175 => 42,  168 => 41,  158 => 34,  153 => 28,  150 => 27,  143 => 26,  133 => 23,  123 => 17,  118 => 38,  113 => 35,  111 => 34,  104 => 29,  102 => 26,  98 => 24,  96 => 23,  89 => 18,  87 => 17,  83 => 15,  81 => 14,  75 => 10,  73 => 9,  68 => 6,  66 => 5,  63 => 4,  56 => 3,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "/layouts/main.twig", "/home/appcloud/resources/views/layouts/main.twig");
    }
}
