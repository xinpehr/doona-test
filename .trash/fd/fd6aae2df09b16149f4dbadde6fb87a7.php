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

/* /layouts/base.twig */
class __TwigTemplate_1920e4cc038ad4673c66dc6d4d0ba891 extends Template
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
            'title' => [$this, 'block_title'],
            'layout' => [$this, 'block_layout'],
            'scripts' => [$this, 'block_scripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<!doctype html>
<html 
  class=\"group/html\"
  lang=\"";
        // line 4
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["locale"] ?? null), "code", [], "any", true, true, false, 4)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["locale"] ?? null), "code", [], "any", false, false, false, 4), "en-US")) : ("en-US")), "html", null, true);
        yield "\"
  dir=\"";
        // line 5
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["locale"] ?? null), "dir", [], "any", true, true, false, 5)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["locale"] ?? null), "dir", [], "any", false, false, false, 5), "ltr")) : ("ltr")), "html", null, true);
        yield "\"
  data-color-scheme=\"";
        // line 6
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(json_encode((((CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "color_scheme", [], "any", true, true, false, 6) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "color_scheme", [], "any", false, false, false, 6)))) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "color_scheme", [], "any", false, false, false, 6)) : ([]))), "html_attr");
        yield "\">

<head>
  ";
        // line 9
        yield from $this->load("snippets/script-tags/head.twig", 9)->unwrap()->yield($context);
        // line 10
        yield "
  <meta charset=\"utf-8\">
  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
  <meta name=\"viewport\" content=\"width=device-width,initial-scale=1\">
  <meta name=\"theme-color\" content=\"\">

  <base href=\"/\">

  <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 18
        yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "brand", [], "any", false, true, false, 18), "favicon", [], "any", true, true, false, 18) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "brand", [], "any", false, false, false, 18), "favicon", [], "any", false, false, false, 18)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "brand", [], "any", false, false, false, 18), "favicon", [], "any", false, false, false, 18), "html", null, true)) : ("favicon.ico"));
        yield "\">

  ";
        // line 20
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["env"] ?? null), "HMR", [], "any", true, true, false, 20) && CoreExtension::getAttribute($this->env, $this->source, ($context["env"] ?? null), "HMR", [], "any", false, false, false, 20))) {
            // line 21
            yield "  <script type=\"module\" src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFilter('asset')->getCallable()("/@vite/client"), "html", null, true);
            yield "\"></script>
  ";
        }
        // line 23
        yield "
  <link rel=\"stylesheet\" href=\"";
        // line 24
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFilter('asset')->getCallable()("/resources/assets/css/icons.css"), "html", null, true);
        yield "\">
  <link rel=\"stylesheet\" href=\"";
        // line 25
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFilter('asset')->getCallable()("/resources/assets/css/index.css"), "html", null, true);
        yield "\">

  <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
  <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>
  <link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Noto+Serif:wght@100;300;400;500;600;700&display=swap\">

  ";
        // line 31
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "pwa", [], "any", false, true, false, 31), "is_enabled", [], "any", true, true, false, 31) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "pwa", [], "any", false, false, false, 31), "is_enabled", [], "any", false, false, false, 31))) {
            // line 32
            yield "  <link rel=\"manifest\" href=\"app.webmanifest\">
  ";
        }
        // line 34
        yield "
  ";
        // line 35
        yield from $this->load("snippets/css-variables.twig", 35)->unwrap()->yield($context);
        // line 36
        yield "
  <script>
    // Prevent iframe hijacking
    this.top.location !== this.location && (this.top.location = this.location);

    if ('collapsed' in localStorage) {
      document.documentElement.dataset.collapsed = true;
    }
  </script>

  <script>
    let scheme = {
      ...{
        modes: ['light', 'dark'],
        default: 'system',
      },
      ...JSON.parse(document.documentElement.dataset.colorScheme),
    };

    if (scheme.modes.length > 1) {
      if (!('mode' in localStorage) || scheme.modes.indexOf(localStorage.mode) === -1) {
        if (scheme.default === 'system') {
          localStorage.mode = window.matchMedia('(prefers-color-scheme: dark)').matches
            ? 'dark'
            : 'light';
        } else {
          localStorage.mode = scheme.default;
        }
      }
    } else if (scheme.modes.length === 1) {
      localStorage.mode = scheme.modes[0];
    } else {
      localStorage.mode = window.matchMedia('(prefers-color-scheme: dark)').matches
        ? 'dark'
        : 'light';
    }

    document.documentElement.dataset.mode = localStorage.mode;
  </script>

  <script>
    window.locale = {
      messages: {
        'An unexpected error occurred! Please try again later!': '";
        // line 79
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("An unexpected error occurred! Please try again later!"), "js"), "html", null, true);
        yield "',
        'Category has been updated successfully!': '";
        // line 80
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Category has been updated successfully!"), "js"), "html", null, true);
        yield "',
        'Category has been created successfully!': '";
        // line 81
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Category has been created successfully!"), "js"), "html", null, true);
        yield "',
        'Plan has been updated successfully!': '";
        // line 82
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Plan has been updated successfully!"), "js"), "html", null, true);
        yield "',
        'Plan has been created successfully!': '";
        // line 83
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Plan has been created successfully!"), "js"), "html", null, true);
        yield "',
        'Template has been updated successfully!': '";
        // line 84
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Template has been updated successfully!"), "js"), "html", null, true);
        yield "',
        'Template has been created successfully!': '";
        // line 85
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Template has been created successfully!"), "js"), "html", null, true);
        yield "',
        'Changes saved successfully!': '";
        // line 86
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Changes saved successfully!"), "js"), "html", null, true);
        yield "',
        'Cache cleared successfully!': '";
        // line 87
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Cache cleared successfully!"), "js"), "html", null, true);
        yield "',
        'User has been updated successfully!': '";
        // line 88
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("User has been updated successfully!"), "js"), "html", null, true);
        yield "',
        'User has been created successfully!': '";
        // line 89
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("User has been created successfully!"), "js"), "html", null, true);
        yield "',
        'Email sent successfully!': '";
        // line 90
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Email sent successfully!"), "js"), "html", null, true);
        yield "',
        'You have run out of credits. Please purchase more credits to continue using the app.': '";
        // line 91
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("You have run out of credits. Please purchase more credits to continue using the app."), "js"), "html", null, true);
        yield "',
        'Document copied to clipboard!': '";
        // line 92
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Document copied to clipboard!"), "js"), "html", null, true);
        yield "',
        'Document saved successfully!': '";
        // line 93
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Document saved successfully!"), "js"), "html", null, true);
        yield "',
        'Document deleted successfully!': '";
        // line 94
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Document deleted successfully!"), "js"), "html", null, true);
        yield "',
        'Subscription cancelled!': '";
        // line 95
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Subscription cancelled!"), "js"), "html", null, true);
        yield "',
        'Document has been updated successfully!': '";
        // line 96
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Document has been updated successfully!"), "js"), "html", null, true);
        yield "',
        'Image copied to clipboard!': '";
        // line 97
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Image copied to clipboard!"), "js"), "html", null, true);
        yield "',
        'Invalid credentials. Please try again.': '";
        // line 98
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Invalid credentials. Please try again."), "js"), "html", null, true);
        yield "',
        'Click to copy': '";
        // line 99
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Click to copy"), "js"), "html", null, true);
        yield "',
        'Copied to clipboard': '";
        // line 100
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Copied to clipboard"), "js"), "html", null, true);
        yield "',
        'Resource UUID is copied to the clipboard.': '";
        // line 101
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Resource UUID is copied to the clipboard."), "js"), "html", null, true);
        yield "',
        'Workspace name updated!': '";
        // line 102
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Workspace name updated!"), "js"), "html", null, true);
        yield "',
        'You\\'ve been added to the :name workspace!': '";
        // line 103
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("You've been added to the :name workspace!"), "js"), "html", null, true);
        yield "',
        'Your card number is incomplete.': '";
        // line 104
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Your card number is incomplete."), "js"), "html", null, true);
        yield "',
        'Invalid card number': '";
        // line 105
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Invalid card number"), "js"), "html", null, true);
        yield "',
        'Your card\\'s security code is incomplete.': '";
        // line 106
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Your card's security code is incomplete."), "js"), "html", null, true);
        yield "',
        'Your card\\'s security code is invalid.': '";
        // line 107
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Your card's security code is invalid."), "js"), "html", null, true);
        yield "',
        'Your card\\'s expiration date is incomplete.': '";
        // line 108
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Your card's expiration date is incomplete."), "js"), "html", null, true);
        yield "',
        'Your card\\'s expiration date is invalid.': '";
        // line 109
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Your card's expiration date is invalid."), "js"), "html", null, true);
        yield "',
        'Insufficient credits': '";
        // line 110
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Insufficient credits to perform this operation."), "js"), "html", null, true);
        yield "',
        'Copied to clipboard!': '";
        // line 111
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Copied to clipboard!"), "js"), "html", null, true);
        yield "',
        'Conversation has been deleted successfully.': '";
        // line 112
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Conversation has been deleted successfully."), "js"), "html", null, true);
        yield "',
        'Data unit has been deleted successfully.': '";
        // line 113
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Data unit has been deleted successfully."), "js"), "html", null, true);
        yield "',
        'File size must be less than 25MB.': '";
        // line 114
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("File size must be less than 25MB."), "js"), "html", null, true);
        yield "',
        'File must be in a supported audio/video format.': '";
        // line 115
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("File must be in a supported audio/video format."), "js"), "html", null, true);
        yield "',
        'One time': '";
        // line 116
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("One time"), "js"), "html", null, true);
        yield "',
        'Lifetime': '";
        // line 117
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Lifetime"), "js"), "html", null, true);
        yield "',
        'Monthly': '";
        // line 118
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Monthly"), "js"), "html", null, true);
        yield "',
        'Yearly': '";
        // line 119
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Yearly"), "js"), "html", null, true);
        yield "',
        'Deleted successfully!': '";
        // line 120
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Deleted successfully!"), "js"), "html", null, true);
        yield "',
        'Invitation sent!': '";
        // line 121
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Invitation sent!"), "js"), "html", null, true);
        yield "',
        'The email you entered is already taken.': '";
        // line 122
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("The email you entered is already taken."), "js"), "html", null, true);
        yield "',
        'Order has been updated successfully!': '";
        // line 123
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Order has been updated successfully!"), "js"), "html", null, true);
        yield "',
        'Voice has been cloned successfully!': '";
        // line 124
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Voice has been cloned successfully!"), "js"), "html", null, true);
        yield "',
      },
    };

    document.cookie = `locale=";
        // line 128
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["locale"] ?? null), "code", [], "any", false, false, false, 128), "html", null, true);
        yield "; expires=\${new Date(new Date().getTime() + 1000 * 60 * 60 * 24 * 365).toGMTString()}; path=/`
  </script>

  <script type=\"\">
    window.state = {
      user: ";
        // line 133
        yield ((array_key_exists("user", $context)) ? (json_encode(($context["user"] ?? null))) : ("{}"));
        yield ",
      workspace: ";
        // line 134
        yield ((array_key_exists("workspace", $context)) ? (json_encode(($context["workspace"] ?? null))) : ("{}"));
        yield ",
    };
  </script>

  <title>
    ";
        // line 139
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        // line 140
        yield "    ";
        yield (((( !Twig\Extension\CoreExtension::testEmpty(        $this->unwrap()->renderBlock("title", $context, $blocks)) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "site", [], "any", false, true, false, 140), "name", [], "any", true, true, false, 140)) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "site", [], "any", false, false, false, 140), "name", [], "any", false, false, false, 140))) ? (" | ") : (""));
        yield "
    ";
        // line 141
        yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "site", [], "any", false, true, false, 141), "name", [], "any", true, true, false, 141) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "site", [], "any", false, false, false, 141), "name", [], "any", false, false, false, 141)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "site", [], "any", false, false, false, 141), "name", [], "any", false, false, false, 141), "html", null, true)) : (null));
        yield "
  </title>
</head>

<body
  class=\"bg-main text-content max-h-screen font-primary data-modal:overflow-hidden data-modal:pr-(--scrollbar-width) group/body relative\"
  x-data='";
        // line 147
        yield ((array_key_exists("xdata", $context)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["xdata"] ?? null), "html", null, true)) : (""));
        yield "'>
  ";
        // line 148
        yield from $this->load("snippets/script-tags/body.twig", 148)->unwrap()->yield($context);
        // line 149
        yield "
  <toast-message
    class=\"";
        // line 151
        yield ((CoreExtension::inFilter(($context["view_namespace"] ?? null), ["app", "admin"])) ? ("lg:ms-[7.5rem]") : (""));
        yield " fixed start-1/2 z-50 -bottom-20 opacity-0 invisible data-open:bottom-4 md:data-open:bottom-12 mb-1 data-open:opacity-100 data-open:visible flex items-center gap-3 rounded-lg -translate-x-1/2 rtl:translate-x-1/2 px-4 py-3 bg-content text-main transition-all group/toast md:max-w-[28rem] max-w-max w-[90%] md:w-auto\">
  </toast-message>

  ";
        // line 154
        yield from $this->unwrap()->yieldBlock('layout', $context, $blocks);
        // line 155
        yield "
  <script type=\"module\" src=\"";
        // line 156
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFilter('asset')->getCallable()("/resources/assets/js/base/index.js"), "html", null, true);
        yield "\"></script>
  ";
        // line 157
        yield from $this->unwrap()->yieldBlock('scripts', $context, $blocks);
        // line 158
        yield "
  ";
        // line 159
        yield from $this->load("snippets/script-tags/end.twig", 159)->unwrap()->yield($context);
        // line 160
        yield "</body>

</html>";
        yield from [];
    }

    // line 139
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 154
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_layout(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 157
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_scripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "/layouts/base.twig";
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
        return array (  443 => 157,  433 => 154,  423 => 139,  416 => 160,  414 => 159,  411 => 158,  409 => 157,  405 => 156,  402 => 155,  400 => 154,  394 => 151,  390 => 149,  388 => 148,  384 => 147,  375 => 141,  370 => 140,  368 => 139,  360 => 134,  356 => 133,  348 => 128,  341 => 124,  337 => 123,  333 => 122,  329 => 121,  325 => 120,  321 => 119,  317 => 118,  313 => 117,  309 => 116,  305 => 115,  301 => 114,  297 => 113,  293 => 112,  289 => 111,  285 => 110,  281 => 109,  277 => 108,  273 => 107,  269 => 106,  265 => 105,  261 => 104,  257 => 103,  253 => 102,  249 => 101,  245 => 100,  241 => 99,  237 => 98,  233 => 97,  229 => 96,  225 => 95,  221 => 94,  217 => 93,  213 => 92,  209 => 91,  205 => 90,  201 => 89,  197 => 88,  193 => 87,  189 => 86,  185 => 85,  181 => 84,  177 => 83,  173 => 82,  169 => 81,  165 => 80,  161 => 79,  116 => 36,  114 => 35,  111 => 34,  107 => 32,  105 => 31,  96 => 25,  92 => 24,  89 => 23,  83 => 21,  81 => 20,  76 => 18,  66 => 10,  64 => 9,  58 => 6,  54 => 5,  50 => 4,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "/layouts/base.twig", "/home/appcloud/resources/views/layouts/base.twig");
    }
}
