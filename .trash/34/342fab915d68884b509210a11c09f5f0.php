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

/* /templates/admin/user.twig */
class __TwigTemplate_7115c4e1b9d8c195b193c3834397e573 extends Template
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
        $context["active_menu"] = "/admin/users";
        // line 5
        $context["xdata"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 6
            yield "user(";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(json_encode(((array_key_exists("current_user", $context)) ? (($context["current_user"] ?? null)) : ([]))), "html", null, true);
            yield ")
";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 1
        $this->parent = $this->load("/layouts/main.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 9
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), ((array_key_exists("current_user", $context)) ? (p__("title", "Edit user")) : (p__("title", "New user")))), "html", null, true);
        yield from [];
    }

    // line 11
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_template(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 12
        yield "\t<x-form>
\t\t<form class=\"flex flex-col gap-8\" @submit.prevent=\"submit\">
\t\t\t<div>
\t\t\t\t";
        // line 15
        yield from $this->load("snippets/back.twig", 15)->unwrap()->yield(CoreExtension::merge($context, ["link" => "admin/users", "label" => "Users"]));
        // line 16
        yield "
\t\t\t\t<h1 class=\"mt-4\">
\t\t\t\t\t<span x-show=\"!user.id\">";
        // line 18
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Add new user"), "html", null, true);
        yield "</span>
\t\t\t\t\t<span x-show=\"user.id\">
\t\t\t\t\t\t";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Edit user"), "html", null, true);
        yield ":
\t\t\t\t\t\t<span class=\"font-normal text-intermediate-content\" x-text=\"`\${user.first_name} \${user.last_name}`\"></span>
\t\t\t\t\t</span>
\t\t\t\t</h1>

\t\t\t\t<template x-if=\"user.id\">
\t\t\t\t\t<div class=\"mt-2\">
\t\t\t\t\t\t<x-uuid x-text=\"user.id\"></x-uuid>
\t\t\t\t\t</div>
\t\t\t\t</template>
\t\t\t</div>

\t\t\t<div class=\"flex flex-col gap-2\">
\t\t\t\t<template x-if=\"user.id\">
\t\t\t\t\t<section class=\"grid relative gap-6 box\" data-density=\"comfortable\">
\t\t\t\t\t\t<template x-if=\"user.longitude && user.latitude\">
\t\t\t\t\t\t\t<div class=\"absolute inset-0 rounded-xl\">
\t\t\t\t\t\t\t\t<iframe :src=\"`https://www.openstreetmap.org/export/embed.html?bbox=\${user.longitude-0.05},\${user.latitude-0.05},\${user.longitude+0.05},\${user.latitude+0.05}&layer=mapnik&show_controls=false`\" class=\"w-full h-full rounded-xl border-none grayscale dark:mix-blend-hard-light\" loading=\"lazy\" scrolling=\"no\" frameborder=\"0\"></iframe>
\t\t\t\t\t\t\t\t<div class=\"absolute inset-0 bg-linear-to-tr to-transparent rounded-xl opacity-50 pointer-events-none from-main\"></div>

\t\t\t\t\t\t\t\t<div class=\"absolute inset-0 bg-linear-to-r to-transparent via-20% rounded-xl rounded-r-none pointer-events-none from-main via-transparent\"></div>
\t\t\t\t\t\t\t\t<div class=\"absolute inset-0 bg-linear-to-r via-80% via-transparent to-transparent rounded-xl from-main pointer-events-none\"></div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</template>

\t\t\t\t\t\t<div class=\"flex relative gap-4 items-center pointer-events-none\" :class=\"{'pt-14': user.longitude && user.latitude}\">
\t\t\t\t\t\t\t<x-avatar :title=\"`\${user.first_name} \${user.last_name}`\" :src=\"user.avatar\" class=\"pointer-events-auto avatar-lg\" x-tooltip.raw=\"";
        // line 46
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Profile images are provided by %s", "Gravatar"), "html", null, true);
        yield "\"></x-avatar>

\t\t\t\t\t\t\t<div class=\"flex flex-col items-start\">
\t\t\t\t\t\t\t\t<div class=\"flex gap-2 items-center\">
\t\t\t\t\t\t\t\t\t<h2 class=\"pointer-events-auto\" x-text=\"`\${user.first_name} \${user.last_name}`\"></h2>
\t\t\t\t\t\t\t\t\t<template x-if=\"user.ip\">
\t\t\t\t\t\t\t\t\t\t<x-copy class=\"pointer-events-auto badge\" x-text=\"`\${user.ip}`\" x-tooltip.raw=\"";
        // line 52
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("The IP address used to register this account"), "html", null, true);
        yield "\"></x-copy>
\t\t\t\t\t\t\t\t\t</template>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<div class=\"flex gap-2 items-center text-sm pointer-events-auto text-content-dimmed\" :class=\"{'bg-main px-1.5 py-0.5 rounded-md': user.longitude && user.latitude}\">
\t\t\t\t\t\t\t\t\t<div class=\"hidden gap-1 items-center md:flex\">
\t\t\t\t\t\t\t\t\t\t<span>";
        // line 58
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("First seen"), "html", null, true);
        yield ":</span>
\t\t\t\t\t\t\t\t\t\t<x-time :datetime=\"user.created_at\"></x-time>
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<x-time class=\"md:hidden\" :datetime=\"user.created_at\" data-type=\"date\"></x-time>

\t\t\t\t\t\t\t\t\t<template x-if=\"user.country\">
\t\t\t\t\t\t\t\t\t\t<i class=\"text-xs ti ti-point-filled\"></i>
\t\t\t\t\t\t\t\t\t</template>

\t\t\t\t\t\t\t\t\t<template x-if=\"user.country\">
\t\t\t\t\t\t\t\t\t\t<span x-text=\"(user.city_name ? user.city_name + (user.country ? ', ' : '') : '') + user.country.name\"></span>
\t\t\t\t\t\t\t\t\t</template>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</section>
\t\t\t\t</template>

\t\t\t\t<section class=\"grid gap-6 md:grid-cols-2 box\" data-density=\"comfortable\">
\t\t\t\t\t<h2 class=\"md:col-span-2\">";
        // line 78
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Profile"), "html", null, true);
        yield "</h2>

\t\t\t\t\t<div>
\t\t\t\t\t\t<label for=\"first_name\">";
        // line 81
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "First name"), "html", null, true);
        yield "</label>

\t\t\t\t\t\t<input type=\"text\" id=\"first_name\" class=\"mt-2 input\" autocomplete=\"off\" :placeholder=\"user.first_name || `";
        // line 83
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("User's first name"), "html", null, true);
        yield "`\" required x-model=\"model.first_name\"/>
\t\t\t\t\t</div>

\t\t\t\t\t<div>
\t\t\t\t\t\t<label for=\"last_name\">";
        // line 87
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Last name"), "html", null, true);
        yield "</label>

\t\t\t\t\t\t<input type=\"text\" id=\"last_name\" class=\"mt-2 input\" autocomplete=\"off\" :placeholder=\"user.last_name || `";
        // line 89
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("User's last name"), "html", null, true);
        yield "`\" x-model=\"model.last_name\" required/>
\t\t\t\t\t</div>

\t\t\t\t\t<div :class=\"user.id ? 'md:col-span-2' : ''\">
\t\t\t\t\t\t<label for=\"email\" class=\"inline-flex gap-2 items-center\">";
        // line 93
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Email"), "html", null, true);
        yield "

\t\t\t\t\t\t\t<template x-if=\"user.is_email_verified\">
\t\t\t\t\t\t\t\t<span class=\"text-xs text-success\">";
        // line 96
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Verified"), "html", null, true);
        yield "</span>
\t\t\t\t\t\t\t</template>
\t\t\t\t\t\t</label>

\t\t\t\t\t\t<input type=\"text\" id=\"email\" class=\"mt-2 input\" autocomplete=\"off\" ";
        // line 100
        if ((($context["environment"] ?? null) != "demo")) {
            yield " :placeholder=\"user.email || `";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("User's email"), "html_attr");
            yield "`\" x-model=\"model.email\" ";
        } else {
            yield " value=\"Email is hidden in demo environment\" ";
        }
        yield " :disabled=\"user.id ? true : false\" required/>
\t\t\t\t\t</div>

\t\t\t\t\t<template x-if=\"!user.id\">
\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t<label for=\"password\">";
        // line 105
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Password"), "html", null, true);
        yield "</label>

\t\t\t\t\t\t\t<div class=\"relative mt-2\" x-data=\"{isVisible: false}\">
\t\t\t\t\t\t\t\t<input :type=\"isVisible ? 'text' : 'password'\" id=\"password\" name=\"password\" placeholder=\"";
        // line 108
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Type your password"), "html", null, true);
        yield "\" autocomplete=\"current-password\" class=\"input pe-11\" required x-model=\"model.password\" minlength=\"6\">

\t\t\t\t\t\t\t\t<button type=\"button\" class=\"absolute end-3 top-1/2 text-2xl -translate-y-1/2 text-content-dimmed\" @click=\"isVisible = !isVisible\">
\t\t\t\t\t\t\t\t\t<i class=\"block ti\" :class=\"{'ti-eye-closed' : isVisible, 'ti-eye':!isVisible}\"></i>
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<ul class=\"info mt-2\">
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t";
        // line 117
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Password must be at least 6 characters long."), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</div>
\t\t\t\t\t</template>

\t\t\t\t\t<fieldset>
\t\t\t\t\t\t<label for=\"phone_number\">";
        // line 124
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Phone number"), "html", null, true);
        yield "</label>
\t\t\t\t\t\t<x-phone-input class=\"block relative\" x-ref=\"el\" x-data=\"{country: null}\" @input=\"country = \$refs.el.dataset.country\">
\t\t\t\t\t\t\t<div class=\"flex absolute left-3 top-1/2 justify-center items-center w-6 h-6 text-2xl -translate-y-1/2 text-content-dimmed\">
\t\t\t\t\t\t\t\t<template x-if=\"!country\">
\t\t\t\t\t\t\t\t\t<i class=\"ti ti-world\"></i>
\t\t\t\t\t\t\t\t</template>

\t\t\t\t\t\t\t\t<template x-if=\"country\">
\t\t\t\t\t\t\t\t\t<x-avatar class=\"w-6 h-6\" :title=\"country\" :src=\"`https://flagcdn.com/\${country.toLowerCase()}.svg`\"></x-avatar>
\t\t\t\t\t\t\t\t</template>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<input type=\"tel\" id=\"phone_number\" maxlength=\"30\" name=\"phone_number\" class=\"pl-12 input\" ";
        // line 136
        if ((($context["environment"] ?? null) != "demo")) {
            yield " :placeholder=\"user.phone_number || `";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Type user's phone number"), "html", null, true);
            yield "`\" x-model=\"model.phone_number\" ";
        } else {
            yield " value=\"Phone number is hidden in demo environment\" ";
        }
        yield ">
\t\t\t\t\t\t</x-phone-input>
\t\t\t\t\t</fieldset>

\t\t\t\t\t<div>
\t\t\t\t\t\t<label for=\"workspace-cap\" class=\"flex gap-2 items-center\">
\t\t\t\t\t\t\t";
        // line 142
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Owned workspace cap"), "html", null, true);
        yield "
\t\t\t\t\t\t</label>

\t\t\t\t\t\t<input type=\"number\" id=\"workspace-cap\" class=\"mt-2 input\" autocomplete=\"off\" placeholder=\"";
        // line 145
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Unlimited"), "html", null, true);
        yield "\" min=\"0\" x-model=\"model.workspace_cap\"/>

\t\t\t\t\t\t<ul class=\"info mt-2\">
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t";
        // line 149
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("This setting limits the number of workspaces a user can own."), "html", null, true);
        yield "
\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t";
        // line 153
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Leave blank for unlimited."), "html", null, true);
        // line 155
        $context["global_setting"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 156
            yield "<a href=\"admin/settings/accounts\" target=\"_blank\" class=\"text-content hover:underline\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "global setting"), "html", null, true);
            yield "</a>";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 159
        yield __("Set to 0 to sync with the :global_setting.", [":global_setting" => ($context["global_setting"] ?? null)]);
        yield "
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t</section>

\t\t\t\t<template x-if=\"model.id != '";
        // line 165
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "id", [], "any", false, false, false, 165), "html", null, true);
        yield "'\">
\t\t\t\t\t<section class=\"grid grid-cols-1 gap-6 box\" data-density=\"comfortable\">

\t\t\t\t\t\t<h2>";
        // line 168
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Account details"), "html", null, true);
        yield "</h2>

\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t<label>";
        // line 171
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Role"), "html", null, true);
        yield "</label>

\t\t\t\t\t\t\t<div class=\"flex gap-2 items-center mt-2\">
\t\t\t\t\t\t\t\t<label>
\t\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"role\" value=\"0\" class=\"radio-button\" x-model=\"model.role\" :checked=\"!model.role || model.role == 0\"/>

\t\t\t\t\t\t\t\t\t<span>";
        // line 177
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("input-value", "User"), "html", null, true);
        yield "</span>
\t\t\t\t\t\t\t\t</label>

\t\t\t\t\t\t\t\t<label>
\t\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"role\" value=\"1\" class=\"radio-button\" x-model=\"model.role\" :checked=\"model.role == 1\"/>

\t\t\t\t\t\t\t\t\t<span>";
        // line 183
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("input-value", "Admin"), "html", null, true);
        yield "</span>
\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"flex justify-between items-center p-3 rounded-lg bg-intermediate\">
\t\t\t\t\t\t\t";
        // line 189
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Status"), "html", null, true);
        yield "

\t\t\t\t\t\t\t<label class=\"inline-flex gap-2 items-center cursor-pointer\">
\t\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"status\" class=\"hidden peer\" :checked=\"model.status == 1\" x-model=\"model.status\">

\t\t\t\t\t\t\t\t<span class=\"block relative w-10 h-6 rounded-3xl transition-all bg-line peer-checked:bg-success after:h-5 after:w-5 after:top-0.5 after:absolute after:left-0 after:ms-0.5 after:transition-all after:rounded-full after:bg-white peer-checked:after:left-4\"></span>

\t\t\t\t\t\t\t\t<span class=\"text-content-dimmed peer-checked:hidden\">
\t\t\t\t\t\t\t\t\t";
        // line 197
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("input-value", "Inactive"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t</span>

\t\t\t\t\t\t\t\t<span class=\"hidden text-success peer-checked:inline\">
\t\t\t\t\t\t\t\t\t";
        // line 201
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("input-value", "Active"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</div>
\t\t\t\t\t</section>
\t\t\t\t</template>

\t\t\t\t<template x-if=\"user.id\">
\t\t\t\t\t<section class=\"grid gap-6 md:grid-cols-2 box\" data-density=\"comfortable\">
\t\t\t\t\t\t<h2 class=\"md:col-span-2\">";
        // line 210
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Workspaces"), "html", null, true);
        yield "</h2>

\t\t\t\t\t\t<template x-for=\"(ws, index) in user.owned_workspaces.concat(user.workspaces)\" :key=\"ws.id\">
\t\t\t\t\t\t\t<a :href=\"`admin/workspaces/\${ws.id}`\" class=\"flex gap-3 items-center border box bg-intermediate text-intermediate-content hover:border-line border-intermediate\">

\t\t\t\t\t\t\t\t<x-avatar :title=\"ws.name\" class=\"bg-main text-content\"></x-avatar>

\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<h3 x-text=\"ws.name\"></h3>
\t\t\t\t\t\t\t\t\t<div class=\"text-sm text-content-dimmed\" x-text=\"index<user.owned_workspaces.length ? `";
        // line 219
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("role", "Owner"), "html", null, true);
        yield "` : `";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("role", "Member"), "html", null, true);
        yield "`\"></div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</template>
\t\t\t\t\t</section>
\t\t\t\t</template>

\t\t\t\t<template x-if=\"user.id\">
\t\t\t\t\t<section class=\"flex flex-col gap-6 box\" data-density=\"comfortable\">
\t\t\t\t\t\t<div class=\"flex gap-2 items-center\">
\t\t\t\t\t\t\t<h2>";
        // line 229
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Affiliate"), "html", null, true);
        yield "</h2>

\t\t\t\t\t\t\t<x-copy class=\"badge\" x-text=\"user.affiliate.code\" x-tooltip.raw=\"";
        // line 231
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Affiliate code"), "html", null, true);
        yield "\"></x-copy>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"flex flex-col gap-1\">
\t\t\t\t\t\t\t<div class=\"flex flex-col gap-4 justify-between box md:items-center md:flex-row bg-intermediate text-intermediate-content\">";
        // line 236
        $context["link"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 237
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "site", [], "any", false, false, false, 237), "is_secure", [], "any", false, false, false, 237)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("https://") : ("http://"));
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "site", [], "any", false, false, false, 237), "domain", [], "any", false, false, false, 237), "html", null, true);
            yield "/r/\${user.affiliate.code}";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 240
        yield "<div>
\t\t\t\t\t\t\t\t\t<div class=\"label\">";
        // line 241
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Referral link"), "html", null, true);
        yield "</div>
\t\t\t\t\t\t\t\t\t<div class=\"text-sm truncate\">
\t\t\t\t\t\t\t\t\t\t<x-copy class=\"text-content-dimmed hover:text-content\" x-text=\"`";
        // line 243
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["link"] ?? null), "html", null, true);
        yield "`\"></x-copy>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<x-copy :data-copy=\"`";
        // line 247
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["link"] ?? null), "html", null, true);
        yield "`\" class=\"button button-sm\">
\t\t\t\t\t\t\t\t\t<i class=\"ti ti-copy\"></i>
\t\t\t\t\t\t\t\t\t";
        // line 249
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Copy link"), "html", null, true);
        yield "
\t\t\t\t\t\t\t\t</x-copy>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div class=\"flex gap-y-4 md:gap-4 box flex-wrap md:flex-nowrap\">
\t\t\t\t\t\t\t\t<div class=\"flex flex-col gap-1 w-1/2 md:w-auto\">
\t\t\t\t\t\t\t\t\t<div class=\"text-xs text-content-dimmed\">";
        // line 255
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Balance"), "html", null, true);
        yield "</div>
\t\t\t\t\t\t\t\t\t<x-money class=\"text-2xl font-bold\" :data-value=\"user.affiliate.balance\" :currency=\"user.affiliate.currency.code\" :minor-units=\"user.affiliate.currency.fraction_digits\"></x-money>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<div class=\"w-px bg-line-dimmed hidden md:block\"></div>

\t\t\t\t\t\t\t\t<div class=\"flex flex-col gap-1 w-1/2 md:w-auto\">
\t\t\t\t\t\t\t\t\t<div class=\"text-xs text-content-dimmed\">";
        // line 262
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Pending"), "html", null, true);
        yield "</div>

\t\t\t\t\t\t\t\t\t<div class=\"flex gap-1 items-center\">
\t\t\t\t\t\t\t\t\t\t<x-money class=\"text-2xl font-bold\" :data-value=\"user.affiliate.pending\" :currency=\"user.affiliate.currency.code\" :minor-units=\"user.affiliate.currency.fraction_digits\"></x-money>

\t\t\t\t\t\t\t\t\t\t<template x-if=\"user.affiliate.pending > 0\">
\t\t\t\t\t\t\t\t\t\t\t<a :href=\"`admin/affiliates/payouts?status=pending&user=\${user.id}`\" class=\"text-content-super-dimmed hover:text-content\">
\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"text-base ti ti-link\"></i>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</template>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<div class=\"w-px bg-line-dimmed hidden md:block\"></div>

\t\t\t\t\t\t\t\t<div class=\"flex flex-col gap-1 w-1/2 md:w-auto\">
\t\t\t\t\t\t\t\t\t<div class=\"text-xs text-content-dimmed\">";
        // line 278
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Paid"), "html", null, true);
        yield "</div>

\t\t\t\t\t\t\t\t\t<div class=\"flex gap-1 items-center\">
\t\t\t\t\t\t\t\t\t\t<x-money class=\"text-2xl font-bold\" :data-value=\"user.affiliate.withdrawn\" :currency=\"user.affiliate.currency.code\" :minor-units=\"user.affiliate.currency.fraction_digits\"></x-money>

\t\t\t\t\t\t\t\t\t\t<template x-if=\"user.affiliate.withdrawn > 0\">
\t\t\t\t\t\t\t\t\t\t\t<a :href=\"`admin/affiliates/payouts?status=approved&user=\${user.id}`\" class=\"text-content-super-dimmed hover:text-content\">
\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"text-base ti ti-link\"></i>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</template>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<div class=\"w-px bg-line-dimmed hidden md:block\"></div>

\t\t\t\t\t\t\t\t<div class=\"flex flex-col gap-1 w-1/2 md:w-auto\">
\t\t\t\t\t\t\t\t\t<div class=\"text-xs text-content-dimmed\">";
        // line 294
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Clicks"), "html", null, true);
        yield "</div>
\t\t\t\t\t\t\t\t\t<x-credit class=\"text-2xl font-bold\" :data-value=\"user.affiliate.clicks\"></x-credit>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<div class=\"w-px bg-line-dimmed hidden md:block\"></div>

\t\t\t\t\t\t\t\t<div class=\"flex flex-col gap-1 w-1/2 md:w-auto\">
\t\t\t\t\t\t\t\t\t<div class=\"text-xs text-content-dimmed\">";
        // line 301
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Referrals"), "html", null, true);
        yield "</div>

\t\t\t\t\t\t\t\t\t<div class=\"flex gap-1 items-center\">
\t\t\t\t\t\t\t\t\t\t<x-credit class=\"text-2xl font-bold\" :data-value=\"user.affiliate.referrals\"></x-credit>

\t\t\t\t\t\t\t\t\t\t<template x-if=\"user.affiliate.referrals > 0\">
\t\t\t\t\t\t\t\t\t\t\t<a :href=\"`admin/users?ref=\${user.id}`\" class=\"text-content-super-dimmed hover:text-content\">
\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"text-base ti ti-link\"></i>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</template>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t<a :href=\"`admin/affiliates/payouts?user=\${user.id}`\" class=\"button button-outline button-sm\">
\t\t\t\t\t\t\t\t<i class=\"ti ti-credit-card\"></i>
\t\t\t\t\t\t\t\t";
        // line 319
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "View payouts"), "html", null, true);
        yield "
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<template x-if=\"user.referred_by\">
\t\t\t\t\t\t\t<hr/>
\t\t\t\t\t\t</template>

\t\t\t\t\t\t<template x-if=\"user.referred_by\">
\t\t\t\t\t\t\t<p class=\"text-sm text-content-dimmed\">
\t\t\t\t\t\t\t\t";
        // line 329
        $context["ref"] = new Markup("\t\t\t\t\t\t\t\t<a class=\"font-medium text-content hover:underline\" :href=\"`admin/users/\${user.referred_by.id}`\" x-text=\"`\${user.referred_by.first_name} \${user.referred_by.last_name}`\"></a>
\t\t\t\t\t\t\t\t", $this->env->getCharset());
        // line 332
        yield "
\t\t\t\t\t\t\t\t";
        // line 333
        yield __("This user was referred by :ref", [":ref" => ($context["ref"] ?? null)]);
        yield "
\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t</template>
\t\t\t\t\t</section>
\t\t\t\t</template>
\t\t\t</div>

\t\t\t<div class=\"flex gap-4 justify-end\">
\t\t\t\t<a href=\"admin/users\" class=\"button button-outline\">
\t\t\t\t\t";
        // line 342
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Cancel"), "html", null, true);
        yield "
\t\t\t\t</a>

\t\t\t\t<button type=\"submit\" class=\"button button-accent\" :processing=\"isProcessing\">

\t\t\t\t\t";
        // line 347
        yield from $this->load("/snippets/spinner.twig", 347)->unwrap()->yield($context);
        // line 348
        yield "
\t\t\t\t\t<span x-show=\"!user.id\">";
        // line 349
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Create user"), "html", null, true);
        yield "</span>
\t\t\t\t\t<span x-show=\"user.id\">";
        // line 350
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Update user"), "html", null, true);
        yield "</span>
\t\t\t\t</button>
\t\t\t</div>
\t\t</form>
\t</x-form>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "/templates/admin/user.twig";
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
        return array (  594 => 350,  590 => 349,  587 => 348,  585 => 347,  577 => 342,  565 => 333,  562 => 332,  559 => 329,  546 => 319,  525 => 301,  515 => 294,  496 => 278,  477 => 262,  467 => 255,  458 => 249,  453 => 247,  446 => 243,  441 => 241,  438 => 240,  432 => 237,  430 => 236,  423 => 231,  418 => 229,  403 => 219,  391 => 210,  379 => 201,  372 => 197,  361 => 189,  352 => 183,  343 => 177,  334 => 171,  328 => 168,  322 => 165,  313 => 159,  307 => 156,  305 => 155,  303 => 153,  296 => 149,  289 => 145,  283 => 142,  268 => 136,  253 => 124,  243 => 117,  231 => 108,  225 => 105,  211 => 100,  204 => 96,  198 => 93,  191 => 89,  186 => 87,  179 => 83,  174 => 81,  168 => 78,  145 => 58,  136 => 52,  127 => 46,  98 => 20,  93 => 18,  89 => 16,  87 => 15,  82 => 12,  75 => 11,  64 => 9,  59 => 1,  52 => 6,  50 => 5,  48 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "/templates/admin/user.twig", "/home/appcloud/resources/views/templates/admin/user.twig");
    }
}
