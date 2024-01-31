<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* base.html.twig */
class __TwigTemplate_57d6531d0111267db9a1cd72e6d31b30 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
            'footer' => [$this, 'block_footer'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
";
        // line 3
        echo "<html lang=\"fr-FR\">
\t<head>
\t\t<meta charset=\"UTF-8\">
\t\t<meta name=\"viewport\" content=\"width=device-width,initial-scale=1\">
\t\t<title>
\t\t\t";
        // line 8
        $this->displayBlock('title', $context, $blocks);
        // line 10
        echo "\t\t</title>
\t\t<link
\t\trel=\"shortcut icon\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("favicon.ico.png"), "html", null, true);
        echo "\" type=\"image/x-icon\">
\t\t";
        // line 14
        echo "\t\t";
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 18
        echo "
\t</head>
\t<body>
\t\t";
        // line 22
        echo "\t\t<header class=\"d-flex justify-content-center\">
\t\t\t<nav class=\"navbar navbar-expand-lg bg-whigre container-lg d-flex justify-content-center mt-5 rounded-pill\">
\t\t\t\t<div
\t\t\t\t\tclass=\"container-fluid\">
\t\t\t\t\t";
        // line 27
        echo "\t\t\t\t\t<a class=\"navbar-brand\" href=\"/read-all/\">Accueil</a>
\t\t\t\t\t<div class=\"d-flex justify-content-end\">
\t\t\t\t\t\t<button class=\"navbar-toggler d-lg-none d-flex justify-content-end\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNavDropdown\" aria-controls=\"navbarNavDropdown\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
\t\t\t\t\t\t\t<img class=\"navbar-toggler-icon\" src=\"./image/burger-bar.png\" alt=\"Menu Icon\">
\t\t\t\t\t\t</button>
\t\t\t\t\t</div>
\t\t\t\t\t<img class=\"w-15 rounded-pill none\" src=\"./image/logo.png\" alt=\"logo\">
\t\t\t\t\t<div class=\"collapse navbar-collapse\" id=\"navbarNavDropdown\">
\t\t\t\t\t\t<ul class=\"navbar-nav w-100 d-flex justify-content-center\">
\t\t\t\t\t\t\t<b class=\"w75 d-flex justify-content-between flexres\">
\t\t\t\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t\t\t\t<a class=\"nav-link\" href=\"/capteur\">Capteur</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t</b>
\t\t\t\t\t\t\t<b class=\"w75 d-flex justify-content-between flexres\">
\t\t\t\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t\t\t\t<a class=\"nav-link\" href=\"/carte\">Carte</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t</b>
\t\t\t\t\t\t\t<b class=\"w75 d-flex justify-content-between flexres\">
\t\t\t\t\t\t\t\t";
        // line 47
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) {
            // line 48
            echo "\t\t\t\t\t\t\t\t\t";
            // line 49
            echo "\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a class=\"nav-link\" href=\"/logout\">Déconnexion</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
        } else {
            // line 53
            echo "\t\t\t\t\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t\t\t\t\t<a class=\"nav-link\" href=\"/user/create\">Se connecter</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
        }
        // line 57
        echo "\t\t\t\t\t\t\t</b>
\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</nav>
\t\t</header>

\t\t<main class=\"container mt-5\"> ";
        // line 64
        $this->displayBlock('body', $context, $blocks);
        // line 65
        echo "\t\t\t</main>

\t\t\t";
        // line 67
        $this->displayBlock('javascripts', $context, $blocks);
        // line 71
        echo "\t\t</body>
\t\t";
        // line 72
        $this->displayBlock('footer', $context, $blocks);
        // line 141
        echo "
\t</html>
</body></html></body></html>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 8
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Simandré
\t\t\t";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 14
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 15
        echo "\t\t\t<link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN\" crossorigin=\"anonymous\">
\t\t\t<link rel=\"stylesheet\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("styles/main.css"), "html", null, true);
        echo "\">
\t\t";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 64
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 67
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 68
        echo "\t\t\t\t";
        // line 69
        echo "\t\t\t\t<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL\" crossorigin=\"anonymous\"></script>
\t\t\t";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 72
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "footer"));

        // line 73
        echo "\t\t\t<footer class=\"bg-white pb-1\">

\t\t\t\t<div
\t\t\t\t\tclass=\"container-fluid d-flex flex-wrap align-items-center justify-content-between footer-block\">
\t\t\t\t\t<!-- réseaux de l'entreprise -->
\t\t\t\t\t<div>
\t\t\t\t\t\t<a href=\"\">
\t\t\t\t\t\t\t<img src=\"./image/logo.png\" alt=\"logo\" class=\"pb-3\" style=\"width: 240px\">
\t\t\t\t\t\t</a>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"d-flex flex-wrap gap-3 align-items-center justify-content-center m0333\">
\t\t\t\t\t\t<a href=\"https://www.instagram.com/\" target=\"_blank\">
\t\t\t\t\t\t\t<img src=\"./image/insta.png\" alt=\"instagram\" class=\"w60\">
\t\t\t\t\t\t</a>

\t\t\t\t\t\t<a href=\"https://www.github.com/\" target=\"_blank\">
\t\t\t\t\t\t\t<img src=\"./image/github.png\" alt=\"github\" class=\"w60\">
\t\t\t\t\t\t</a>

\t\t\t\t\t\t<a href=\"https://twitter.com/\" target=\"_blank\">
\t\t\t\t\t\t\t<img src=\"./image/twitter.png\" alt=\"twitter\" class=\"w60\">
\t\t\t\t\t\t</a>

\t\t\t\t\t\t<a href=\"https://www.youtube.com/\" target=\"_blank\">
\t\t\t\t\t\t\t<img src=\"./image/youtube.png\" alt=\"youtube\" class=\"w60\">
\t\t\t\t\t\t</a>
\t\t\t\t\t</div>
\t\t\t\t\t<!--  <div class=\"col vl d-flex justify-content-center none\"></div>
\t\t\t\t\t            <div class=\"col-lg\"></div> -->

\t\t\t\t\t<div class=\"vr none mt-3\"></div>

\t\t\t\t\t<!-- sponsor de l'entreprise -->
\t\t\t\t\t<div class=\"d-flex flex-wrap gap-3 align-items-center justify-content-center mx-5 m0333\">
\t\t\t\t\t\t<a href=\"https://www.tesla.com/\" target=\"_blank\"><img src=\"./image/tesla.png\" class=\"w60\" alt=\"sponsor Tesla\"></a>

\t\t\t\t\t\t<a href=\"https://www.lachainemeteo.com/\" target=\"_blank\"><img src=\"./image/chaine_météo.png\" class=\"w60\" alt=\"sponsor la chaine météo\"></a>

\t\t\t\t\t\t<a href=\"https://www.github.com/\" target=\"_blank\"><img src=\"./image/github.png\" class=\"w60\" alt=\"sponsor github\"></a>

\t\t\t\t\t\t<a href=\"https://www.paris2024.org/\" target=\"_blank\"><img src=\"./image/JO.png\" class=\"w60\" alt=\"sponsor JO 2024\"></a>
\t\t\t\t\t</div>

\t\t\t\t\t<div>
\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t<a href=\"./index.html\" class=\"link-dark link-underline link-underline-opacity-0\">Mentions
\t\t\t\t\t\t\t\t                    légales</a>
\t\t\t\t\t\t</p>
\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t<a href=\"./index.html\" class=\"link-dark link-underline link-underline-opacity-0\">Termes de
\t\t\t\t\t\t\t\t                    Vente</a>
\t\t\t\t\t\t</p>
\t\t\t\t\t</div>


\t\t\t\t</div>
\t\t\t\t<p class=\"mb-0 pt-3 text-center s-15\">Copyright 2024 - Simandré</p>

\t\t\t\t<script src=\"./svg-gauge-master/dist/gauge.min.js\"></script>
\t\t\t\t<!-- JavaScript pour les jauges globales -->

\t\t\t\t<script src=\"./script/script_temperature.js\"></script>
\t\t\t\t<!-- script pour la qualité d'air -->

\t\t\t\t<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL\" crossorigin=\"anonymous\"></script>
\t\t\t</footer>
\t\t";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "base.html.twig";
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
        return array (  218 => 73,  211 => 72,  203 => 69,  201 => 68,  194 => 67,  182 => 64,  173 => 16,  170 => 15,  163 => 14,  149 => 8,  139 => 141,  137 => 72,  134 => 71,  132 => 67,  128 => 65,  126 => 64,  117 => 57,  111 => 53,  105 => 49,  103 => 48,  101 => 47,  79 => 27,  73 => 22,  68 => 18,  65 => 14,  61 => 12,  57 => 10,  55 => 8,  48 => 3,  45 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
{# Header de la page \"index.html.twig\" #}
<html lang=\"fr-FR\">
\t<head>
\t\t<meta charset=\"UTF-8\">
\t\t<meta name=\"viewport\" content=\"width=device-width,initial-scale=1\">
\t\t<title>
\t\t\t{% block title %}Simandré
\t\t\t{% endblock %}
\t\t</title>
\t\t<link
\t\trel=\"shortcut icon\" href=\"{{asset('favicon.ico.png')}}\" type=\"image/x-icon\">
\t\t{# image de favicon #}
\t\t{% block stylesheets %}
\t\t\t<link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN\" crossorigin=\"anonymous\">
\t\t\t<link rel=\"stylesheet\" href=\"{{asset('styles/main.css')}}\">
\t\t{% endblock %}

\t</head>
\t<body>
\t\t{# header de la page #}
\t\t<header class=\"d-flex justify-content-center\">
\t\t\t<nav class=\"navbar navbar-expand-lg bg-whigre container-lg d-flex justify-content-center mt-5 rounded-pill\">
\t\t\t\t<div
\t\t\t\t\tclass=\"container-fluid\">
\t\t\t\t\t{# navbar #}
\t\t\t\t\t<a class=\"navbar-brand\" href=\"/read-all/\">Accueil</a>
\t\t\t\t\t<div class=\"d-flex justify-content-end\">
\t\t\t\t\t\t<button class=\"navbar-toggler d-lg-none d-flex justify-content-end\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNavDropdown\" aria-controls=\"navbarNavDropdown\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
\t\t\t\t\t\t\t<img class=\"navbar-toggler-icon\" src=\"./image/burger-bar.png\" alt=\"Menu Icon\">
\t\t\t\t\t\t</button>
\t\t\t\t\t</div>
\t\t\t\t\t<img class=\"w-15 rounded-pill none\" src=\"./image/logo.png\" alt=\"logo\">
\t\t\t\t\t<div class=\"collapse navbar-collapse\" id=\"navbarNavDropdown\">
\t\t\t\t\t\t<ul class=\"navbar-nav w-100 d-flex justify-content-center\">
\t\t\t\t\t\t\t<b class=\"w75 d-flex justify-content-between flexres\">
\t\t\t\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t\t\t\t<a class=\"nav-link\" href=\"/capteur\">Capteur</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t</b>
\t\t\t\t\t\t\t<b class=\"w75 d-flex justify-content-between flexres\">
\t\t\t\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t\t\t\t<a class=\"nav-link\" href=\"/carte\">Carte</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t</b>
\t\t\t\t\t\t\t<b class=\"w75 d-flex justify-content-between flexres\">
\t\t\t\t\t\t\t\t{% if is_granted('ROLE_ADMIN') %}
\t\t\t\t\t\t\t\t\t{# ce \"if\" permet de vérifier si la personne est admin. Si oui, alors ce qui suit d'affiche #}
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a class=\"nav-link\" href=\"/logout\">Déconnexion</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t\t\t\t\t<a class=\"nav-link\" href=\"/user/create\">Se connecter</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t</b>
\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</nav>
\t\t</header>

\t\t<main class=\"container mt-5\"> {% block body %}{% endblock %}
\t\t\t</main>

\t\t\t{% block javascripts %}
\t\t\t\t{# script de bootstrap #}
\t\t\t\t<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL\" crossorigin=\"anonymous\"></script>
\t\t\t{% endblock %}
\t\t</body>
\t\t{% block footer %}
\t\t\t<footer class=\"bg-white pb-1\">

\t\t\t\t<div
\t\t\t\t\tclass=\"container-fluid d-flex flex-wrap align-items-center justify-content-between footer-block\">
\t\t\t\t\t<!-- réseaux de l'entreprise -->
\t\t\t\t\t<div>
\t\t\t\t\t\t<a href=\"\">
\t\t\t\t\t\t\t<img src=\"./image/logo.png\" alt=\"logo\" class=\"pb-3\" style=\"width: 240px\">
\t\t\t\t\t\t</a>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"d-flex flex-wrap gap-3 align-items-center justify-content-center m0333\">
\t\t\t\t\t\t<a href=\"https://www.instagram.com/\" target=\"_blank\">
\t\t\t\t\t\t\t<img src=\"./image/insta.png\" alt=\"instagram\" class=\"w60\">
\t\t\t\t\t\t</a>

\t\t\t\t\t\t<a href=\"https://www.github.com/\" target=\"_blank\">
\t\t\t\t\t\t\t<img src=\"./image/github.png\" alt=\"github\" class=\"w60\">
\t\t\t\t\t\t</a>

\t\t\t\t\t\t<a href=\"https://twitter.com/\" target=\"_blank\">
\t\t\t\t\t\t\t<img src=\"./image/twitter.png\" alt=\"twitter\" class=\"w60\">
\t\t\t\t\t\t</a>

\t\t\t\t\t\t<a href=\"https://www.youtube.com/\" target=\"_blank\">
\t\t\t\t\t\t\t<img src=\"./image/youtube.png\" alt=\"youtube\" class=\"w60\">
\t\t\t\t\t\t</a>
\t\t\t\t\t</div>
\t\t\t\t\t<!--  <div class=\"col vl d-flex justify-content-center none\"></div>
\t\t\t\t\t            <div class=\"col-lg\"></div> -->

\t\t\t\t\t<div class=\"vr none mt-3\"></div>

\t\t\t\t\t<!-- sponsor de l'entreprise -->
\t\t\t\t\t<div class=\"d-flex flex-wrap gap-3 align-items-center justify-content-center mx-5 m0333\">
\t\t\t\t\t\t<a href=\"https://www.tesla.com/\" target=\"_blank\"><img src=\"./image/tesla.png\" class=\"w60\" alt=\"sponsor Tesla\"></a>

\t\t\t\t\t\t<a href=\"https://www.lachainemeteo.com/\" target=\"_blank\"><img src=\"./image/chaine_météo.png\" class=\"w60\" alt=\"sponsor la chaine météo\"></a>

\t\t\t\t\t\t<a href=\"https://www.github.com/\" target=\"_blank\"><img src=\"./image/github.png\" class=\"w60\" alt=\"sponsor github\"></a>

\t\t\t\t\t\t<a href=\"https://www.paris2024.org/\" target=\"_blank\"><img src=\"./image/JO.png\" class=\"w60\" alt=\"sponsor JO 2024\"></a>
\t\t\t\t\t</div>

\t\t\t\t\t<div>
\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t<a href=\"./index.html\" class=\"link-dark link-underline link-underline-opacity-0\">Mentions
\t\t\t\t\t\t\t\t                    légales</a>
\t\t\t\t\t\t</p>
\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t<a href=\"./index.html\" class=\"link-dark link-underline link-underline-opacity-0\">Termes de
\t\t\t\t\t\t\t\t                    Vente</a>
\t\t\t\t\t\t</p>
\t\t\t\t\t</div>


\t\t\t\t</div>
\t\t\t\t<p class=\"mb-0 pt-3 text-center s-15\">Copyright 2024 - Simandré</p>

\t\t\t\t<script src=\"./svg-gauge-master/dist/gauge.min.js\"></script>
\t\t\t\t<!-- JavaScript pour les jauges globales -->

\t\t\t\t<script src=\"./script/script_temperature.js\"></script>
\t\t\t\t<!-- script pour la qualité d'air -->

\t\t\t\t<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL\" crossorigin=\"anonymous\"></script>
\t\t\t</footer>
\t\t{% endblock %}

\t</html>
</body></html></body></html>
", "base.html.twig", "C:\\Users\\amula\\Desktop\\Alexandre\\VSC\\Hexagone\\Projet groupe\\simandre\\templates\\base.html.twig");
    }
}
