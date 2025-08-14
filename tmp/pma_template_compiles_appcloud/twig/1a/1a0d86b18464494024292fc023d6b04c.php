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

/* navigation/main.twig */
class __TwigTemplate_1781280445a2ac865041080b11ed2a12 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        if ( !($context["is_ajax"] ?? null)) {
            // line 2
            yield "  <div id=\"pma_navigation\" class=\"d-print-none\" data-config-navigation-width=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["config_navigation_width"] ?? null), "html", null, true);
            yield "\">
    <div id=\"pma_navigation_resizer\"></div>
    <div id=\"pma_navigation_collapser\"></div>
    <div id=\"pma_navigation_content\">
      <div id=\"pma_navigation_header\">

        ";
            // line 8
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["logo"] ?? null), "is_displayed", [], "any", false, false, false, 8)) {
                // line 9
                yield "          <div id=\"pmalogo\">
            ";
                // line 10
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["logo"] ?? null), "has_link", [], "any", false, false, false, 10)) {
                    // line 11
                    yield "              <a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["logo"] ?? null), "link", [], "any", true, true, false, 11)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["logo"] ?? null), "link", [], "any", false, false, false, 11), "#")) : ("#")), "html", null, true);
                    yield "\"";
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["logo"] ?? null), "attributes", [], "any", false, false, false, 11);
                    yield ">
            ";
                }
                // line 13
                yield "            ";
                if ( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["logo"] ?? null), "source", [], "any", false, false, false, 13))) {
                    // line 14
                    yield "              <img id=\"imgpmalogo\" src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["logo"] ?? null), "source", [], "any", false, false, false, 14), "html", null, true);
                    yield "\" alt=\"phpMyAdmin\">
            ";
                } else {
                    // line 16
                    yield "              <h1>phpMyAdmin</h1>
            ";
                }
                // line 18
                yield "            ";
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["logo"] ?? null), "has_link", [], "any", false, false, false, 18)) {
                    // line 19
                    yield "              </a>
            ";
                }
                // line 21
                yield "          </div>
        ";
            }
            // line 23
            yield "
        <div id=\"navipanellinks\">
          <a href=\"";
            // line 25
            yield PhpMyAdmin\Url::getFromRoute("/");
            yield "\" title=\"";
yield _gettext("Home");
            yield "\">";
            // line 26
            yield PhpMyAdmin\Html\Generator::getImage("b_home", _gettext("Home"));
            // line 27
            yield "</a>

          <a href=\"";
            // line 29
            yield PhpMyAdmin\Html\MySQLDocumentation::getDocumentationLink("index");
            yield "\" title=\"";
yield _gettext("phpMyAdmin documentation");
            yield "\" target=\"_blank\" rel=\"noopener noreferrer\">";
            // line 30
            yield PhpMyAdmin\Html\Generator::getImage("b_docs", _gettext("phpMyAdmin documentation"));
            // line 31
            yield "</a>

          <a href=\"";
            // line 33
            yield PhpMyAdmin\Util::getdocuURL(($context["is_mariadb"] ?? null));
            yield "\" title=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((($context["is_mariadb"] ?? null)) ? (_gettext("MariaDB Documentation")) : (_gettext("MySQL Documentation"))), "html", null, true);
            yield "\" target=\"_blank\" rel=\"noopener noreferrer\">";
            // line 34
            yield PhpMyAdmin\Html\Generator::getImage("b_sqlhelp", ((($context["is_mariadb"] ?? null)) ? (_gettext("MariaDB Documentation")) : (_gettext("MySQL Documentation"))));
            // line 35
            yield "</a>

          <a id=\"pma_navigation_settings_icon\"";
            // line 37
            yield (( !($context["is_navigation_settings_enabled"] ?? null)) ? (" class=\"hide\"") : (""));
            yield " href=\"#\" title=\"";
yield _gettext("Navigation panel settings");
            yield "\">";
            // line 38
            yield PhpMyAdmin\Html\Generator::getImage("s_cog", _gettext("Navigation panel settings"));
            // line 39
            yield "</a>

          <a id=\"pma_navigation_reload\" href=\"#\" title=\"";
yield _gettext("Reload navigation panel");
            // line 41
            yield "\">";
            // line 42
            yield PhpMyAdmin\Html\Generator::getImage("s_reload", _gettext("Reload navigation panel"));
            // line 43
            yield "</a>
        </div>

        ";
            // line 46
            if ((($context["is_servers_displayed"] ?? null) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["servers"] ?? null)) > 1))) {
                // line 47
                yield "          <div id=\"serverChoice\">
            ";
                // line 48
                yield ($context["server_select"] ?? null);
                yield "
          </div>
        ";
            }
            // line 51
            yield "
        ";
            // line 52
            yield PhpMyAdmin\Html\Generator::getImage("ajax_clock_small", _gettext("Loading…"), ["style" => "visibility: hidden; display:none", "class" => "throbber"]);
            // line 55
            yield "
      </div>
      <div id=\"pma_navigation_tree\" class=\"list_container";
            // line 57
            yield ((($context["is_synced"] ?? null)) ? (" synced") : (""));
            yield ((($context["is_highlighted"] ?? null)) ? (" highlight") : (""));
            yield ((($context["is_autoexpanded"] ?? null)) ? (" autoexpand") : (""));
            yield "\">
";
        }
        // line 59
        yield "
";
        // line 60
        if ( !($context["navigation_tree"] ?? null)) {
            // line 61
            yield "  ";
            yield $this->env->getFilter('error')->getCallable()(_gettext("An error has occurred while loading the navigation display"));
            yield "
";
        } else {
            // line 63
            yield "  ";
            yield ($context["navigation_tree"] ?? null);
            yield "
";
        }
        // line 65
        yield "
";
        // line 66
        if ( !($context["is_ajax"] ?? null)) {
            // line 67
            yield "      </div>

      <div id=\"pma_navi_settings_container\">
        ";
            // line 70
            if (($context["is_navigation_settings_enabled"] ?? null)) {
                // line 71
                yield "          ";
                yield ($context["navigation_settings"] ?? null);
                yield "
        ";
            }
            // line 73
            yield "      </div>
    </div>

    ";
            // line 76
            if (($context["is_drag_drop_import_enabled"] ?? null)) {
                // line 77
                yield "      <div class=\"pma_drop_handler\">
        ";
yield _gettext("Drop files here");
                // line 79
                yield "      </div>
      <div class=\"pma_sql_import_status\">
        <h2>
          ";
yield _gettext("SQL upload");
                // line 83
                yield "          ( <span class=\"pma_import_count\">0</span> )
          <span class=\"close\">x</span>
          <span class=\"minimize\">-</span>
        </h2>
        <div></div>
      </div>
    ";
            }
            // line 90
            yield "  </div>
  ";
            // line 91
            yield Twig\Extension\CoreExtension::include($this->env, $context, "modals/unhide_nav_item.twig");
            yield "
  ";
            // line 92
            yield Twig\Extension\CoreExtension::include($this->env, $context, "modals/create_view.twig");
            yield "
";
        }
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "navigation/main.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  242 => 92,  238 => 91,  235 => 90,  226 => 83,  220 => 79,  216 => 77,  214 => 76,  209 => 73,  203 => 71,  201 => 70,  196 => 67,  194 => 66,  191 => 65,  185 => 63,  179 => 61,  177 => 60,  174 => 59,  167 => 57,  163 => 55,  161 => 52,  158 => 51,  152 => 48,  149 => 47,  147 => 46,  142 => 43,  140 => 42,  138 => 41,  133 => 39,  131 => 38,  126 => 37,  122 => 35,  120 => 34,  115 => 33,  111 => 31,  109 => 30,  104 => 29,  100 => 27,  98 => 26,  93 => 25,  89 => 23,  85 => 21,  81 => 19,  78 => 18,  74 => 16,  68 => 14,  65 => 13,  57 => 11,  55 => 10,  52 => 9,  50 => 8,  40 => 2,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "navigation/main.twig", "/usr/local/cpanel/base/3rdparty/phpMyAdmin/templates/navigation/main.twig");
    }
}
