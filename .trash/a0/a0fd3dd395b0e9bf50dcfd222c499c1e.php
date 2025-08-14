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

/* /templates/app/imagine.twig */
class __TwigTemplate_ad0eb9222a13a98f8be67ed9a2db6786 extends Template
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
            'sidebar' => [$this, 'block_sidebar'],
            'toolbar' => [$this, 'block_toolbar'],
            'template' => [$this, 'block_template'],
            'footer' => [$this, 'block_footer'],
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
        // line 2
        $context["mobile_head_button"] = ["link" => "app/imagine"];
        // line 4
        $context["samples"] = ["With a surreal mix of elegance and eeriness, a kitsune with a glistening golden fur coat stands amidst a dusky forest in a high fashion photograph. The image captures the mystical creature's piercing amber eyes and sleek, shimmering tails, as it exudes an aura of ancient power and enigmatic allure. Every detail, from the intricate patterns on its fur to the hauntingly beautiful surroundings, is rendered with impeccable precision and depth, creating a mesmerizing and unforgettable visual experience.", "A magnificently garish sorcerer, their ostentatious costume adorned with gaudy jewels and shimmering fabrics, exudes an air of opulent tackiness mixed with undeniable power. Picture a surreal photograph capturing the sorcerer in a dramatic pose, bathed in ethereal lighting that highlights every intricate detail of their over-the-top ensemble. The image radiates with a vividness that practically leaps off the page, showcasing the intricate craftsmanship and extravagance of the subject with dazzling clarity.", "In the misty embrace of a moonlit forest, a bewildering bizarre centaur emerges: half man, half equine, adorned in vibrant bohemian attire. This enigmatic being is captured in a hauntingly beautiful photograph, where every detail is sharp and mesmerizing. The centaur's human-like torso is covered in intricate tattoos that seem to come alive in the dim light, while its equine half boasts a luxurious mane and tail that shimmer with otherworldly colors. The background is a dreamlike blur of ancient trees and ethereal wisps of fog, adding to the mystical atmosphere of the scene. Its eyes hold a spark of wild magic, inviting viewers into a world of enchantment and wonder.", "A mystifying and ethereal mauve-tinted dimensional drifter, appearing as a translucent entity traversing multiple planes of existence. This mesmerizing figure is captured in a stunningly detailed digital painting, showcasing intricate patterns and swirls of energy that seem to dance around the enigmatic being. The artist's masterful use of light and shadow creates a sense of depth and movement, making the drifter appear both otherworldly and strangely familiar. The overall composition is a breathtaking display of imagination and skill, drawing the viewer into a realm of wonder and possibility.", "Ethereally gliding through a celestial realm, the elysian timeless void voyager floats serenely amidst swirling nebulae and shimmering star clusters. This concept art painting captures the awe-inspiring beauty of an otherworldly being in a state of graceful motion. The colors are vivid and luminescent, creating a sense of transcendence and wonder. The intricate details of the voyager's celestial robes and radiant aura are rendered with exquisite precision, making the viewer feel as though they are witnessing a truly divine being. The overall atmosphere is one of pure, celestial tranquility, inviting the viewer to contemplate the mysteries of the universe.", "A watercolor illustration of a magical forest with glowing fireflies", "A sketch of a wizard riding a unicorn through a rainbow", "A surrealistic oil painting of a flying fish with butterfly wings", "A collage of vintage photographs forming the shape of a heart", "A charcoal drawing of a haunted house on a foggy hill", "A digital illustration of a cybernetic mermaid swimming among neon jellyfish", "A sculpture of a tree made entirely of recycled plastic bottles", "A graffiti mural of a phoenix rising from the ashes on a city wall", "A mosaic portrait of Albert Einstein made from computer keys", "A cartoon drawing of a superhero squirrel saving the day in a city park", "A pop art style painting of Marilyn Monroe using Rubik's cubes as pixels", "A steampunk-inspired illustration of a mechanical octopus guarding a sunken treasure chest", "A minimalist ink sketch of a teacup floating in mid-air", "A clay sculpture of a family of penguins sledding down an icy hill", "An abstract digital artwork of swirling galaxies merging together", "A mixed media piece featuring origami cranes flying over a city skyline at dusk", "A caricature drawing of famous historical figures playing poker", "A mural of a cosmic elephant spraying galaxies from its trunk onto a starry sky", "A digital painting of a futuristic cityscape with flying cars and holographic billboards", "A stained glass window depicting scenes from classic fairy tales", "A paper-cut silhouette of a jungle scene with wild animals and lush foliage", "A chalk drawing of a smiling sun wearing sunglasses on a chalkboard", "A mixed media collage of vintage postage stamps forming a map of the world", "A sculpture of a phoenix made entirely of melted candle wax", "A surrealistic painting of a clock melting over a desert landscape", "A watercolor portrait of a cat wearing a crown and holding a scepter", "An abstract sculpture representing the concept of time using clock parts", "A digital illustration of a cyberpunk city with towering skyscrapers and flying drones", "A mosaic of colorful tiles depicting a scene from under the sea", "A painting of a dreamy landscape with floating islands and waterfalls made of clouds", "A cartoon drawing of a group of animals having a picnic in the park", "A sculpture of a dragon made entirely of recycled metal scraps", "A digital artwork of a magical library where books come to life at night", "A graffiti mural of a giant robot battling a sea monster in the streets", "A surrealistic oil painting of a forest where the trees have eyes and the flowers have mouths", "A mosaic portrait of a famous musician made entirely of broken vinyl records", "A sketch of a futuristic city on Mars with domed habitats and space elevators", "A clay sculpture of a whimsical creature with the body of a cat and the wings of a butterfly", "An abstract digital artwork of geometric shapes dancing in a kaleidoscope of colors", "A paper-cut silhouette of a carnival scene with carousel horses and ferris wheels", "A chalk drawing of a magical doorway leading to a secret garden", "A mixed media collage of vintage comic book panels forming a city skyline", "A sculpture of a phoenix rising from the ashes made entirely of glass shards", "A surrealistic painting of a giant teapot floating in a stormy sea", "A watercolor portrait of a panda wearing a top hat and monocle", "An abstract sculpture representing the chaos of the universe using tangled wires"];
        // line 59
        $context["active_menu"] = "/app/imagine";
        // line 60
        $context["xdata"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield "imagine(
  `";
            // line 61
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, true, false, 61), "imagine", [], "any", false, true, false, 61), "default_model", [], "any", true, true, false, 61)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["option"] ?? null), "features", [], "any", false, false, false, 61), "imagine", [], "any", false, false, false, 61), "default_model", [], "any", false, false, false, 61), null)) : (null)), "html", null, true);
            yield "`,
  ";
            // line 62
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(json_encode(($context["services"] ?? null)), "html", null, true);
            yield ",
  ";
            // line 63
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(json_encode(($context["samples"] ?? null)), "html", null, true);
            yield ",
  ";
            // line 64
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(json_encode((((array_key_exists("image", $context) &&  !(null === $context["image"]))) ? ($context["image"]) : (null))), "html", null, true);
            yield "
)
";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 1
        $this->parent = $this->load("/layouts/main.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 67
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), p__("title", "Imagine")), "html", null, true);
        yield from [];
    }

    // line 69
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_sidebar(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 70
        yield "\t<div class=\"hidden group-data-[key=history]/sidebar:block\">
\t\t<div class=\"flex items-center justify-between p-4 border-b border-line sticky top-0 bg-main z-10\">
\t\t\t<h2>";
        // line 72
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "History"), "html", null, true);
        yield "</h2>

\t\t\t<button type=\"button\" class=\"text-content-dimmed hover:text-content\" @click=\"sidebar.close()\" x-tooltip.raw.placement.left=\"";
        // line 74
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Close"), "html", null, true);
        yield "\">
\t\t\t\t<i class=\"text-2xl ti ti-x\"></i>
\t\t\t</button>
\t\t</div>

\t\t<div>
      <template x-for=\"i in history\" :key=\"i.id\">
        <a :href=\"`app/imagine/\${i.id}`\" class=\"flex gap-2 items-center p-4 border-b border-line-dimmed hover:bg-line-dimmed/50\" :class=\"preview?.id == i.id ? 'bg-line-dimmed/50' : ''\" @click.prevent=\"select(i)\">
\t\t\t\t\t<x-avatar :title=\"i.title\" class=\"shrink-0\" :src=\"i.output_file?.url\" :hash=\"i.output_file?.blur_hash\"></x-avatar>

\t\t\t\t\t<div class=\"overflow-hidden\">
\t\t\t\t\t\t<div x-text=\"i.title || `";
        // line 85
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Untitled resource"), "html", null, true);
        yield "`\" class=\"overflow-hidden text-sm text-ellipsis text-nowrap max-w-full\" :class=\"i.params.prompt ? '' : 'text-content-dimmed'\"></div>

\t\t\t\t\t\t<div class=\"flex\">
\t\t\t\t\t\t\t<x-time :datetime=\"i.created_at\" data-type=\"date\" class=\"text-xs text-content-dimmed\"></x-time>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</a>
      </template>

\t\t\t<template x-if=\"!historyLoaded\">
\t\t\t\t<div class=\"my-8 flex justify-center\">
\t\t\t\t\t<button type=\"button\" @click=\"fetchHistory()\" class=\"font-semibold hover:underline text-sm\">
\t\t\t\t\t\t";
        // line 97
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Load more"), "html", null, true);
        yield "
\t\t\t\t\t</button>
\t\t\t\t</div>
\t\t\t</template>

\t\t\t<template x-if=\"historyLoaded && history.length === 0\">
\t\t\t\t<div class=\"p-4 text-content-dimmed\">
\t\t\t\t\t";
        // line 104
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("No images yet"), "html", null, true);
        yield "
\t\t\t\t</div>
\t\t\t</template>
\t\t</div>
\t</div>
";
        yield from [];
    }

    // line 111
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_toolbar(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 112
        yield "<div class=\"absolute z-10 top-4 end-10 hidden md:flex gap-2 transition-all ease-in\">
  <a href=\"app/imagine\" class=\"text-content-dimmed hover:text-content\" x-tooltip.raw=\"";
        // line 113
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("New image"), "html", null, true);
        yield "\">
    <i class=\"text-2xl ti ti-square-rounded-plus\"></i>
  </a>

  <a href=\"app/library/images\" class=\"text-content-dimmed hover:text-content\" x-tooltip.raw=\"";
        // line 117
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("History"), "html", null, true);
        yield "\" @click.prevent=\"sidebar.open('history')\">
    <i class=\"text-2xl ti ti-file-stack\"></i>
  </a>
</div>
";
        yield from [];
    }

    // line 123
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_template(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 124
        yield "<div class=\"flex flex-col gap-4 grow\">
  <div :class=\"preview && [3, 4].includes(preview.state) ? '' : 'flex justify-center my-auto'\">
    <template x-if=\"!preview && !isProcessing\">
      <div class=\"my-10 text-center md:my-0\">
        <div
          class=\"mx-auto w-16 h-16 bg-linear-to-br from-[#E6C0FE] to-[#984CF8] tool-icon\">
          <div class=\"bg-linear-to-br from-[#E6C0FE] to-[#984CF8]\"></div>

          ";
        // line 132
        yield from $this->load("snippets/icons/imagine.twig", 132)->unwrap()->yield($context);
        // line 133
        yield "        </div>

        <h1 class=\"mt-6\">";
        // line 135
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Imagine"), "html", null, true);
        yield "</h1>
        <p class=\"mt-1 text-lg font-light text-content-dimmed\">
          ";
        // line 137
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Use your imagination to create awesome images."), "html", null, true);
        yield "</p>
      </div>
    </template>

    <template x-if=\"isProcessing\">
      <div class=\"my-10 text-center md:my-0\">
        <div class=\"flex justify-center text-content-dimmed\">
          ";
        // line 144
        yield from $this->load("snippets/spinner.twig", 144)->unwrap()->yield(CoreExtension::merge($context, ["size" => "4rem"]));
        // line 145
        yield "        </div>

        <h1 class=\"mt-6\">";
        // line 147
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Generating image..."), "html", null, true);
        yield "</h1>
        <p class=\"mt-1 text-lg font-light text-content-dimmed\">
          ";
        // line 149
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("This may take a while. Please wait."), "html", null, true);
        yield "</p>
      </div>
    </template>

    <template x-if=\"preview && !isProcessing && preview.state < 3\">
\t\t\t\t<div class=\"my-10 text-center md:my-0 flex flex-col gap-6\">
\t\t\t\t\t<div class=\"flex justify-center text-content-dimmed\">
\t\t\t\t\t\t";
        // line 156
        yield from $this->load("snippets/spinner.twig", 156)->unwrap()->yield(CoreExtension::merge($context, ["size" => "4rem"]));
        // line 157
        yield "\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"flex flex-col gap-1\">
\t\t\t\t\t\t<h1>";
        // line 160
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Generating image..."), "html", null, true);
        yield "</h1>

\t\t\t\t\t\t<template x-if=\"!preview.progress\">
\t\t\t\t\t\t\t<p class=\"text-lg font-light text-content-dimmed\">
\t\t\t\t\t\t\t\t";
        // line 164
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("This may take a while. You can leave this page."), "html", null, true);
        yield "</p>
\t\t\t\t\t\t</template>

\t\t\t\t\t\t<template x-if=\"preview.progress\">
\t\t\t\t\t\t\t";
        // line 168
        $context["progress"] = new Markup("\t\t\t\t\t\t\t<span x-text=\"`\${preview.progress}%`\"></span>
\t\t\t\t\t\t\t", $this->env->getCharset());
        // line 171
        yield "
\t\t\t\t\t\t\t<p class=\"text-lg font-light text-content-dimmed\">
\t\t\t\t\t\t\t\t";
        // line 173
        yield __("Lights, camera, :progress there! Your image is on its way", [":progress" => ($context["progress"] ?? null)]);
        yield "
\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t</template>

\t\t\t\t\t\t<template x-if=\"preview.progress\">
\t\t\t\t\t\t\t<div class=\"mt-4 flex justify-center\">
\t\t\t\t\t\t\t\t<div class=\"w-full max-w-2xs h-2 bg-line-dimmed rounded-sm\">
\t\t\t\t\t\t\t\t\t<div :style=\"`width: \${preview.progress}%`\" class=\"h-full bg-content rounded-sm transition-all\"></div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</template>
\t\t\t\t\t</div>

\t\t\t\t\t<hr class=\"border-none h-px bg-line-dimmed bg-linear-to-r from-main via-line-dimmed to-main\">

          <div class=\"flex flex-col items-center gap-2 group\">
            <span class=\"text-xs font-medium text-content-super-dimmed\">";
        // line 189
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("What would you like to do?"), "html", null, true);
        yield "</span>

            <div class=\"flex items-center gap-2 text-xl px-2 py-1.5 rounded-lg border border-line-dimmed group-hover:border-line\">
              <button type=\"button\" class=\"flex items-center font-bold text-content-dimmed hover:text-content transition-all\" x-tooltip.raw.html=\"";
        // line 192
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Generate a new image from scratch"), "html", null, true);
        yield "\" @click=\"actionNew\">
                <i class=\"ti ti-square-rounded-plus\"></i>
                <span class=\"block text-xs max-w-0 overflow-hidden transition-all group-hover:ms-1 group-hover:max-w-md group-hover:opacity-100 opacity-0 whitespace-nowrap\">";
        // line 194
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("New"), "html", null, true);
        yield "</span>
              </button>

              <button type=\"button\" class=\"flex items-center font-bold text-content-dimmed hover:text-content transition-all\" x-tooltip.raw.html=\"";
        // line 197
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Revise parameters and generate a new image"), "html", null, true);
        yield "\" @click=\"actionEdit\">
                <i class=\"ti ti-versions\"></i>
                <span class=\"block text-xs max-w-0 overflow-hidden transition-all group-hover:ms-1 group-hover:max-w-md group-hover:opacity-100 opacity-0 whitespace-nowrap\">";
        // line 199
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Edit"), "html", null, true);
        yield "</span>
              </button>
            </div>
          </div>
\t\t\t\t</div>
\t\t\t</template>

    <template x-if=\"preview && !isProcessing && [3, 4].includes(preview.state)\">
      <div class=\"flex flex-col gap-10\">
        <div class=\"flex flex-col gap-4\">
          <div>
            <div class=\"text-xl autogrow-textarea font-editor-heading\" :data-replicated-value=\"preview.title\">
              <textarea placeholder=\"";
        // line 211
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Untitled resource"), "html", null, true);
        yield "\" autocomplete=\"off\" x-model=\"preview.title\" rows=\"1\" @input.debounce.750ms=\"save(preview)\" class=\"block px-0 py-0 w-full bg-transparent border-0 ring-0 transition-colors appearance-none outline-none resize-none placeholder:text-content-dimmed placeholder:opacity-50 read-only:text-content-dimmed\"></textarea>
            </div>

            <div class=\"mt-1\">
              <x-uuid x-text=\"preview.id\"></x-uuid>
            </div>
          </div>

          <div class=\"flex gap-4 items-center\">
            ";
        // line 220
        yield from $this->load("snippets/audience.twig", 220)->unwrap()->yield(CoreExtension::merge($context, ["ref" => "preview"]));
        // line 221
        yield "
            <span
              class=\"hidden gap-1 items-center text-sm whitespace-nowrap text-content-dimmed md:flex\">
              <i class=\"text-base ti ti-cpu-2\"></i>
              <span x-text=\"preview.model\" class=\"uppercase\"></span>
            </span>

            <span
              class=\"hidden gap-1 items-center text-sm whitespace-nowrap md:flex text-content-dimmed\">
              <i class=\"text-base ti ti-maximize\"></i>

              <span>
                <span x-text=\"preview.output_file.width\"></span>
                x
                <span x-text=\"preview.output_file.height\"></span>
              </span>
            </span>

            <span
              class=\"flex gap-1 items-center text-sm whitespace-nowrap text-content-dimmed\">
              <i class=\"text-base ti ti-coins\"></i>
              <x-credit :data-value=\"preview.cost\"
                format=\"";
        // line 243
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__(":count credits"), "html", null, true);
        yield "\"></x-credit>
            </span>

            <a :href=\"preview.output_file.url\" type=\"button\"
              download=\"image.png\" target=\"_blank\"
              class=\"ms-auto transition-all text-content-dimmed hover:text-content\">
              <i class=\"text-xl ti ti-download\"></i>
            </a>

            <button type=\"button\" @click=\"copyImgToClipboard(preview)\"
              class=\"transition-all text-content-dimmed hover:text-content\">
              <i class=\"text-xl ti ti-copy\"></i>
            </button>

            <button type=\"button\" @click=\"modal.open('delete-modal');\"
              class=\"transition-all text-content-dimmed hover:text-failure\">
              <i class=\"text-xl ti ti-trash\"></i>
            </button>
          </div>
        </div>

        <div class=\"flex flex-col gap-4\">
          <template x-if=\"preview.state === 4\">
            <div class=\"flex flex-col gap-4 rounded-lg bg-line-super-dimmed text-center box items-center\" data-density=\"comfortable\">
              <div class=\"flex flex-col gap-1\">
                <h1>";
        // line 268
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Image generation failed"), "html", null, true);
        yield "</h1>
                <p class=\"text-lg font-light text-content-dimmed\">
                  ";
        // line 270
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Failed to generate image."), "html", null, true);
        yield "
                </p>
              </div>

              <template x-if=\"preview.meta.failure_reason\">
                <p class=\"text-sm text-failure font-medium\">
                  <span x-text=\"preview.meta.failure_reason\"></span>
                </p>
              </template>
            </div>
          </template>

          <template x-if=\"preview.output_file\">
            <div class=\"p-1 rounded-3xl border group border-line\">
              <div class=\"relative rounded-[20px] bg-line-dimmed\">
                <template x-if=\"preview.output_file.blur_hash\">
                  <canvas is=\"x-blurhash\"
                    class=\"absolute top-0 left-0 w-full h-full rounded-[20px] loading\"
                    :width=\"16\" :height=\"9\"
                    :hash=\"preview.output_file.blur_hash\"></canvas>
                </template>

                <img :src=\"preview.output_file.url\"
                  :alt=\"preview.params.prompt || ''\"
                  class=\"object-cover relative rounded-[20px] w-full\"
                  :width=\"preview.output_file.width\"
                  :height=\"preview.output_file.height\">

                <div
                  class=\"absolute top-0 left-0 w-full h-full via-transparent to-transparent opacity-0 transition-all bg-linear-to-bl from-main group-hover:opacity-50\">
                </div>

                <a :href=\"preview.output_file.url\" target=\"_blank\"
                  x-tooltip.raw=\"";
        // line 303
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Open in full size"), "html", null, true);
        yield "\"
                  class=\"absolute top-0 right-0 opacity-0 transition-all scale-90 text-content group-hover:opacity-100 group-hover:scale-100 group-hover:top-2 group-hover:right-2\">
                  <i class=\"text-4xl ti ti-arrow-up-right\"></i>
                </a>
              </div>
            </div>
          </template>

          <template x-if=\"preview.params.prompt\">
            <div class=\"text-xs text-center\">
              <x-copy class=\"text-content-dimmed hover:text-content\" data-msg=\"";
        // line 313
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Prompt copied to clipboard"), "html", null, true);
        yield "\" x-text=\"preview.params.prompt\" :data-copy=\"preview.params.prompt\">
              </x-copy>
            </div>
          </template>
          
          <template x-if=\"preview.params.prompt\">
            <hr class=\"border-none h-px bg-line-dimmed bg-linear-to-r from-main via-line-dimmed to-main\">
          </template>

          <div class=\"flex flex-col items-center gap-2 group\">
            <span class=\"text-xs font-medium text-content-super-dimmed\">";
        // line 323
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("What would you like to do?"), "html", null, true);
        yield "</span>

            <div class=\"flex items-center gap-2 text-xl px-2 py-1.5 rounded-lg border border-line-dimmed group-hover:border-line\">
              <button type=\"button\" class=\"flex items-center font-bold text-content-dimmed hover:text-content transition-all\" x-tooltip.raw.html=\"";
        // line 326
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Generate a new image from scratch"), "html", null, true);
        yield "\" @click=\"actionNew\">
                <i class=\"ti ti-square-rounded-plus\"></i>
                <span class=\"block text-xs max-w-0 overflow-hidden transition-all group-hover:ms-1 group-hover:max-w-md group-hover:opacity-100 opacity-0 whitespace-nowrap\">";
        // line 328
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("New"), "html", null, true);
        yield "</span>
              </button>

              <button type=\"button\" class=\"flex items-center font-bold text-content-dimmed hover:text-content transition-all\" x-tooltip.raw.html=\"";
        // line 331
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Revise parameters and generate a new image"), "html", null, true);
        yield "\" @click=\"actionEdit\">
                <i class=\"ti ti-versions\"></i>
                <span class=\"block text-xs max-w-0 overflow-hidden transition-all group-hover:ms-1 group-hover:max-w-md group-hover:opacity-100 opacity-0 whitespace-nowrap\">";
        // line 333
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Edit"), "html", null, true);
        yield "</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </template>
  </div>
</div>

<modal-element name=\"models\">
  <form @submit.prevent=\"modal.close()\" class=\"flex flex-col gap-6 modal\">
    <div class=\"flex justify-between items-center\">
      <h2 class=\"text-xl\">";
        // line 346
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Models"), "html", null, true);
        yield "</h2>

      <button class=\"flex justify-center items-center w-8 h-8 rounded-full border border-transparent bg-line-dimmed hover:border-line\" @click=\"modal.close()\" type=\"button\">
        <i class=\"text-xl ti ti-x\"></i>
      </button>
    </div>

    <div class=\"grid grid-cols-2 gap-1 scroll-area\">
      <template x-for=\"m in services.flatMap(service => service.models.map(m => ({...m, service})))\" :key=\"m.service.key + '-' + m.key\">
        <div class=\"relative flex\" :class=\"m.granted ? null : 'opacity-50 hover:opacity-100'\">
          <button type=\"button\" @click=\"selectModel(m.key); modal.open('options')\" class=\"box w-full flex flex-col text-start gap-4\">
            <div class=\"flex items-center gap-2\">
              <x-avatar :mask=\"m.icon || m.provider?.icon || m.service.icon\" :icon=\"!m.icon && !m.provider?.icon && !m.service.icon ? 'cpu' : null\" class=\"contain avatar-outline\"></x-avatar>

              <div class=\"flex flex-col\">
                <h3 class=\"text-sm\" x-text=\"m.name\"></h3>
                <span class=\"text-xs text-content-dimmed\" x-text=\"m.provider?.name || m.service.name\"></span>
              </div>
            </div>

            <template x-if=\"m.description\">
              <p x-text=\"m.description\" class=\"text-xs text-content-dimmed line-clamp-3\"></p>
            </template>

            <template x-if=\"!m.granted\">
              <span class=\"flex items-center w-full gap-1\">
                <i class=\"ti ti-lock-up\"></i>
                <span class=\"text-xs\">";
        // line 373
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Upgrade plan"), "html", null, true);
        yield "</span>
              </span>
            </template>
          </button>

          <template x-if=\"!m.granted\">
            <a href=\"app/billing\" class=\"full\"></a>
          </template>
        </div>
      </template>
    </div>

    <div>
      <button type=\"submit\" class=\"w-full button\">
        ";
        // line 387
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Confirm"), "html", null, true);
        yield "
      </button>
    </div>
  </form>
</modal-element>

<modal-element name=\"options\">
  <form @submit.prevent=\"modal.close()\" class=\"flex flex-col gap-6 modal\">
    <div class=\"flex justify-between items-center\">
      <div class=\"flex items-center gap-2\">
        <h2 class=\"text-xl\">";
        // line 397
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("heading", "Options"), "html", null, true);
        yield "</h2>

        <template x-if=\"JSON.stringify(original) != JSON.stringify(params)\">
          <button type=\"button\" class=\"button button-xs button-dimmed\" @click=\"reset\">
            ";
        // line 401
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Reset"), "html", null, true);
        yield "
          </button>
        </template>
      </div>

      <button class=\"flex justify-center items-center w-8 h-8 rounded-full border border-transparent bg-line-dimmed hover:border-line\" @click=\"modal.close()\" type=\"button\">
        <i class=\"text-xl ti ti-x\"></i>
      </button>
    </div>

    <button type=\"button\" class=\"box w-full flex items-center gap-2 text-start\" @click=\"modal.open('models')\">
      <x-avatar :mask=\"model.icon || model.provider?.icon || model.service.icon\" :icon=\"!model.icon && !model.provider?.icon && !model.service.icon ? 'cpu' : null\" class=\"contain avatar-outline\"></x-avatar>

      <div>
        <div class=\"font-bold\" x-text=\"model.name\"></div>
        <div class=\"text-xs text-content-dimmed\" x-text=\"model.provider?.name || model.service.name\"></div>
      </div>

      <i class=\"ti ti-caret-up-down-filled text-base ms-auto\"></i>
    </button>

    <template x-for=\"f in model.config.params\">
      <div class=\"flex flex-col gap-2\">
        <template x-if=\"f.key === 'quality'\">
          <label>
            <i class=\"text-xl ti ti-grid-dots\"></i>
            <span>";
        // line 427
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Quality"), "html", null, true);
        yield "</span>
          </label>
        </template>

        <template x-if=\"f.key === 'aspect_ratio'\">
          <label>
            <i class=\"text-xl ti ti-crop-portrait\"></i>
            <span>";
        // line 434
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Aspect ratio"), "html", null, true);
        yield "</span>
          </label>
        </template>

        <template x-if=\"f.key === 'size'\">
          <label>
            <i class=\"text-xl ti ti-maximize\"></i>
            <span>";
        // line 441
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Size"), "html", null, true);
        yield "</span>
          </label>
        </template>

        <template x-if=\"f.key === 'background'\">
          <label>
            <i class=\"text-xl ti ti-background\"></i>
            <span>";
        // line 448
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Background"), "html", null, true);
        yield "</span>
          </label>
        </template>

        <template x-if=\"f.key === 'style'\">
          <label>
            <i class=\"text-xl ti ti-palette\"></i>
            <span>";
        // line 455
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Style"), "html", null, true);
        yield "</span>
          </label>
        </template>

        <template x-if=\"!['quality', 'aspect_ratio', 'size', 'background', 'style'].includes(f.key)\">
          <label x-text=\"f.label\"></label>
        </template>

        <div class=\"flex items-center flex-wrap gap-1\">
          <template x-for=\"option in f.options\">
            <button type=\"button\" class=\"text-base flex items-center gap-2 px-3 py-1 rounded-lg\" @click=\"params[f.key]==option.value ? delete params[f.key] : params[f.key]=option.value;\" :class=\"params[f.key] !== undefined && params[f.key] == option.value ? 'bg-button text-button-content' : 'bg-transparent hover:bg-intermediate border border-line'\">
              <span x-text=\"option.label\"></span>
            </button>
          </template>
        </div>
      </div>
    </template>

    <template x-if=\"model.config.negative_prompt\">
      <div>
        <label for=\"negative_prompt\">
          ";
        // line 476
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Negative prompt"), "html", null, true);
        yield "
        </label>

        <input type=\"text\" id=\"negative_prompt\" class=\"mt-2 input\" autocomplete=\"off\" placeholder=\"";
        // line 479
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Type negative prompt here"), "html", null, true);
        yield "\" x-model=\"negativePrompt\"/>
      </div>
    </template>

    <template x-if=\"model.config.images\">
      <div class=\"flex flex-col gap-2\">
        <label>
          <i class=\"text-xl ti ti-photo\"></i>
          <span>";
        // line 487
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Image"), "html", null, true);
        yield "</span>
        </label>

        <input type=\"file\" @change=\"addImage(\$event)\" name=\"file\" :accept=\"(model.config.images.mime || []).join(',')\" class=\"hidden\" :multiple=\"model.config.images.limit > 1\" x-ref=\"file\">

        <div class=\"flex flex-wrap gap-1\">
          <template x-for=\"image in images\">
            <div class=\"w-28 h-36 border border-line bg-line-dimmed rounded-lg relative overflow-hidden group\">
              <img :src=\"URL.createObjectURL(image)\" class=\"w-full h-full object-cover rounded-lg transition-all group-hover:scale-105 duration-1000\">

              <button type=\"button\" class=\"hidden group-hover:flex absolute top-2 end-2 size-6 items-center justify-center rounded-full bg-button text-button-content\" @click=\"removeImage(image)\">
                <i class=\"ti ti-x\"></i>
              </button>
            </div>
          </template>

          <template x-if=\"images.length < model.config.images.limit\">
            <button type=\"button\" class=\"w-28 h-36 flex flex-col justify-between text-start border-dashed items-start gap-2 border border-line hover:bg-intermediate hover:text-intermediate-content rounded-lg p-4\" @click=\"\$refs.file.click()\">
              <i class=\"ti ti-plus\"></i>
                <span>
                  ";
        // line 507
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Add image"), "html", null, true);
        yield "
                </span>
              </span>
            </button>
          </template>
        </div>
      </div>
    </template>

    <div>
      <button type=\"submit\" class=\"w-full button\">
        ";
        // line 518
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Confirm"), "html", null, true);
        yield "
      </button>
    </div>
  </form>
</modal-element>

<modal-element name=\"delete-modal\">
  <template x-if=\"preview\">
    <form class=\"modal flex flex-col items-center gap-6\" @submit.prevent=\"remove(preview);\">
      <div class=\"flex relative justify-center items-center mx-auto w-24 h-24 rounded-full text-failure/25\">
        <svg class=\"absolute top-0 left-0 w-full h-full\" width=\"112\"
          height=\"112\" viewBox=\"0 0 112 112\" fill=\"none\"
          xmlns=\"http://www.w3.org/2000/svg\">
          <circle cx=\"56\" cy=\"56\" r=\"55.5\" stroke=\"currentColor\"
            stroke-dasharray=\"8 8\" />
        </svg>

        <div
          class=\"flex justify-center items-center w-20 h-20 text-4xl rounded-full transition-all bg-failure/25 text-failure\">
          <i class=\"text-4xl ti ti-trash\"></i>
        </div>
      </div>

      <div class=\"flex flex-col gap-2 items-center text-center\">
        <div class=\"text-lg text-center\">
          ";
        // line 543
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Do you really want to delete the image?"), "html", null, true);
        yield "
        </div>

        <p class=\"text-sm text-content-dimmed\">
          ";
        // line 547
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("All associated content and files will be permanently removed. This action cannot be reverted once confirmed."), "html", null, true);
        yield "
        </p>
      </div>

      <div class=\"flex gap-4 justify-center items-center\">
        <button class=\"button button-outline\" @click=\"modal.close()\"
          type=\"button\">
          ";
        // line 554
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "No, cancel"), "html", null, true);
        yield "
        </button>

        <button class=\"button button-failure\" type=\"submit\"
          :processing=\"isDeleting\">
          ";
        // line 559
        yield from $this->load("/snippets/spinner.twig", 559)->unwrap()->yield($context);
        // line 560
        yield "
          ";
        // line 561
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Yes, delete"), "html", null, true);
        yield "
        </button>
      </div>
    </form>
  </template>
</modal-element>
";
        yield from [];
    }

    // line 569
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_footer(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 570
        yield "<div class=\"sticky bottom-0 z-40 mt-auto\">
  <div class=\"h-8 to-transparent bg-linear-to-t from-main\"></div>

  <div class=\"bg-main\">
    <template x-if=\"form\">
      <form @submit.prevent=\"";
        // line 575
        yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["workspace"] ?? null), "subscription", [], "any", false, true, false, 575), "plan", [], "any", false, true, false, 575), "config", [], "any", false, true, false, 575), "imagine", [], "any", false, true, false, 575), "is_enabled", [], "any", true, true, false, 575) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["workspace"] ?? null), "subscription", [], "any", false, false, false, 575), "plan", [], "any", false, false, false, 575), "config", [], "any", false, false, false, 575), "imagine", [], "any", false, false, false, 575), "is_enabled", [], "any", false, false, false, 575))) ? ("submit(\$el)") : (""));
        yield "\">
        <div class=\"flex items-center gap-2 py-2 px-3 text-xs\">
          <button type=\"button\" class=\"button button-xs button-outline\" @click=\"modal.open('models');\">
            <x-avatar :mask=\"model.icon || model.provider?.icon || model.service.icon\" :icon=\"!model.icon && !model.provider?.icon && !model.service.icon ? 'cpu' : null\" class=\"contain avatar-sm bg-transparent -mx-1\"></x-avatar>

            <span x-text=\"model.name\"></span>
            <i class=\"ti ti-caret-up-down-filled text-xs\"></i>
          </button>

          <template x-if=\"images.length > 0 || Object.keys(params).filter(p => ['quality', 'aspect_ratio', 'size', 'background', 'style'].includes(p)).length > 0\">
            <button type=\"button\" class=\"flex items-center gap-2 border-s border-line ps-4 ms-2 text-content-dimmed font-semibold\" @click.stop=\"modal.open('options')\">
              <template x-if=\"params.quality && (f = model.config.params.find(p => p.key == 'quality'))\">
                <span class=\"flex items-center gap-1 hover:text-content\" x-tooltip.raw=\"";
        // line 587
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Quality"), "html", null, true);
        yield "\">
                  <i class=\"text-base ti ti-grid-dots\"></i>
                  <span x-text=\"f.options.find(o => o.value == params.quality)?.label\"></span>
                </span>
              </template>

              <template x-if=\"params.aspect_ratio && (f = model.config.params.find(p => p.key == 'aspect_ratio'))\">
                <span class=\"flex items-center gap-1 hover:text-content\" x-tooltip.raw=\"";
        // line 594
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Aspect ratio"), "html", null, true);
        yield "\">
                  <i class=\"text-base ti ti-crop-portrait\"></i>
                  <span x-text=\"f.options.find(o => o.value == params.aspect_ratio)?.label\"></span>
                </span>
              </template>

              <template x-if=\"params.size && (f = model.config.params.find(p => p.key == 'size'))\">
                <span class=\"flex items-center gap-1 hover:text-content\" x-tooltip.raw=\"";
        // line 601
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Size"), "html", null, true);
        yield "\">
                  <i class=\"text-base ti ti-maximize\"></i>
                  <span x-text=\"f.options.find(o => o.value == params.size)?.label\"></span>
                </span>
              </template>

              <template x-if=\"params.background && (f = model.config.params.find(p => p.key == 'background'))\">
                <span class=\"flex items-center gap-1 hover:text-content\" x-tooltip.raw=\"";
        // line 608
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Background"), "html", null, true);
        yield "\">
                  <i class=\"text-base ti ti-background\"></i>
                  <span x-text=\"f.options.find(o => o.value == params.background)?.label\"></span>
                </span>
              </template>

              <template x-if=\"params.style && (f = model.config.params.find(p => p.key == 'style'))\">
                <span class=\"flex items-center gap-1 hover:text-content\" x-tooltip.raw=\"";
        // line 615
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("label", "Style"), "html", null, true);
        yield "\">
                  <i class=\"text-base ti ti-palette\"></i>
                  <span x-text=\"f.options.find(o => o.value == params.style)?.label\"></span>
                </span>
              </template>

              <template x-if=\"images.length > 0\">
                <span class=\"flex items-center gap-1 hover:text-content\" x-tooltip.raw=\"";
        // line 622
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Images"), "html", null, true);
        yield "\">
                  <i class=\"text-base ti ti-photo\"></i>
                  <span x-text=\"images.length\"></span>
                </span>
              </template>
            </button>
          </template>

          <template x-if=\"images.length == 0 && Object.keys(params).filter(p => ['quality', 'aspect_ratio', 'size', 'background', 'style'].includes(p)).length == 0\">
            <button type=\"button\" class=\"relative text-base hover:text-content\" x-tooltip.raw=\"";
        // line 631
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Show model related options"), "html", null, true);
        yield "\" @click.stop=\"modal.open('options')\" :class=\"JSON.stringify(original) !== JSON.stringify(params) ? 'text-content' : 'text-content-dimmed'\">
              <i class=\"ti ti-settings\"></i>

              <template x-if=\"JSON.stringify(original) != JSON.stringify(params)\">
                <i class=\"absolute bottom-3 start-2 ti ti-point-filled text-failure\"></i>
              </template>
            </button>
          </template>

          <button type=\"button\" class=\"text-content-dimmed hover:text-content text-base\" x-tooltip.raw=\"";
        // line 640
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(p__("button", "Surprise me"), "html", null, true);
        yield "\" @click=\"surprise\">
            <i class=\"ti ti-wand\"></i>
          </button>
        </div>

        <div class=\"relative p-1 rounded-3xl bg-line-dimmed has-[textarea:focus]:bg-linear-to-br has-[textarea:focus]:from-gradient-from has-[textarea:focus]:to-gradient-to\">
          <div class=\"flex gap-2 items-end p-2 rounded-[1.25rem] bg-main\" :class=\"{'ps-4': !model.config.images }\">
            <template x-if=\"model.config.images\">
              <button type=\"button\" class=\"flex justify-center items-center w-10 h-10 text-content-dimmed hover:text-content\" @click=\"images.length == (model.config.images.limit || 1) ? modal.open('options') : \$refs.file.click()\" x-tooltip.raw=\"";
        // line 648
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Add images"), "html", null, true);
        yield "\">
                <i class=\"text-2xl ti ti-plus\"></i>
              </button>
            </template>

            <div class=\"overflow-y-auto mb-2 max-h-36 autogrow-textarea text-content grow\" :data-replicated-value=\"prompt\">
              <textarea
                :placeholder=\"placeholder || `";
        // line 655
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Type a prompt here..."), "html", null, true);
        yield "`\"
                autocomplete=\"off\" rows=\"1\" x-model=\"prompt\" x-ref=\"prompt\"
                :maxlength=\"model.config.prompt_length\" @blur=\"blur\"
                @focus=\"placeholderSurprise\"
                class=\"block p-0 text-base bg-transparent border-none focus:ring-0 placeholder:text-content-dimmed\"
                @keydown.enter.prevent @keydown.tab=\"tab(\$event)\"
                required x-ref=\"prompt\"></textarea>
            </div>

            <div class=\"flex gap-2 items-center ms-auto\">
              ";
        // line 665
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["workspace"] ?? null), "subscription", [], "any", false, true, false, 665), "plan", [], "any", false, true, false, 665), "config", [], "any", false, true, false, 665), "imagine", [], "any", false, true, false, 665), "is_enabled", [], "any", true, true, false, 665) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["workspace"] ?? null), "subscription", [], "any", false, false, false, 665), "plan", [], "any", false, false, false, 665), "config", [], "any", false, false, false, 665), "imagine", [], "any", false, false, false, 665), "is_enabled", [], "any", false, false, false, 665))) {
            // line 666
            yield "              <template x-if=\"model.granted\">
                <button type=\"submit\" class=\"p-0 w-10 h-10 rounded-xl button button-accent\"
                  :disabled=\"!prompt || isProcessing\" :processing=\"isProcessing\">
                  ";
            // line 669
            yield from $this->load("/snippets/spinner.twig", 669)->unwrap()->yield($context);
            // line 670
            yield "
                  <template x-if=\"!isProcessing\">
                    <i class=\"ti ti-arrow-up\"></i>
                  </template>
                </button>
              </template>

              <template x-if=\"!model.granted\">
                <a href=\"app/billing\" class=\"p-0 w-10 h-10 rounded-xl button button-dimmed\"
                  x-tooltip.raw=\"";
            // line 679
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Selected model is not available in your plan. Either upgrade your plan or select another model."), "html", null, true);
            yield "\">
                  <i class=\"ti ti-lock-up\"></i>
                </a>
              </template>
              ";
        } else {
            // line 684
            yield "              <a href=\"app/billing\" class=\"p-0 w-10 h-10 rounded-xl button button-dimmed\"
                x-tooltip.raw=\"";
            // line 685
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Upgrade your plan"), "html", null, true);
            yield "\">
                <i class=\"ti ti-lock-up\"></i>
              </a>
              ";
        }
        // line 689
        yield "            </div>
          </div>
        </div>
      </form>
    </template>

    ";
        // line 695
        yield from $this->load("/sections/footer.twig", 695)->unwrap()->yield($context);
        // line 696
        yield "  </div>
</div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "/templates/app/imagine.twig";
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
        return array (  972 => 696,  970 => 695,  962 => 689,  955 => 685,  952 => 684,  944 => 679,  933 => 670,  931 => 669,  926 => 666,  924 => 665,  911 => 655,  901 => 648,  890 => 640,  878 => 631,  866 => 622,  856 => 615,  846 => 608,  836 => 601,  826 => 594,  816 => 587,  801 => 575,  794 => 570,  787 => 569,  775 => 561,  772 => 560,  770 => 559,  762 => 554,  752 => 547,  745 => 543,  717 => 518,  703 => 507,  680 => 487,  669 => 479,  663 => 476,  639 => 455,  629 => 448,  619 => 441,  609 => 434,  599 => 427,  570 => 401,  563 => 397,  550 => 387,  533 => 373,  503 => 346,  487 => 333,  482 => 331,  476 => 328,  471 => 326,  465 => 323,  452 => 313,  439 => 303,  403 => 270,  398 => 268,  370 => 243,  346 => 221,  344 => 220,  332 => 211,  317 => 199,  312 => 197,  306 => 194,  301 => 192,  295 => 189,  276 => 173,  272 => 171,  269 => 168,  262 => 164,  255 => 160,  250 => 157,  248 => 156,  238 => 149,  233 => 147,  229 => 145,  227 => 144,  217 => 137,  212 => 135,  208 => 133,  206 => 132,  196 => 124,  189 => 123,  179 => 117,  172 => 113,  169 => 112,  162 => 111,  151 => 104,  141 => 97,  126 => 85,  112 => 74,  107 => 72,  103 => 70,  96 => 69,  85 => 67,  80 => 1,  73 => 64,  69 => 63,  65 => 62,  61 => 61,  57 => 60,  55 => 59,  53 => 4,  51 => 2,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "/templates/app/imagine.twig", "/home/appcloud/resources/views/templates/app/imagine.twig");
    }
}
