<?php

/* employees/show.html.twig */
class __TwigTemplate_adf166ed46d5c43460f0701dafebdeea740bdf444a2a05a19ce9697e85a7e004 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "employees/show.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "employees/show.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "employees/show.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Employees";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "    <h1>Employees</h1>

    <table class=\"table\">
        <tbody>
            <tr>
                <th>Id</th>
                <td>";
        // line 12
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["employee"]) || array_key_exists("employee", $context) ? $context["employee"] : (function () { throw new Twig_Error_Runtime('Variable "employee" does not exist.', 12, $this->source); })()), "id", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>FirstName</th>
                <td>";
        // line 16
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["employee"]) || array_key_exists("employee", $context) ? $context["employee"] : (function () { throw new Twig_Error_Runtime('Variable "employee" does not exist.', 16, $this->source); })()), "firstName", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>LastName</th>
                <td>";
        // line 20
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["employee"]) || array_key_exists("employee", $context) ? $context["employee"] : (function () { throw new Twig_Error_Runtime('Variable "employee" does not exist.', 20, $this->source); })()), "lastName", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Userppoe</th>
                <td>";
        // line 24
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["employee"]) || array_key_exists("employee", $context) ? $context["employee"] : (function () { throw new Twig_Error_Runtime('Variable "employee" does not exist.', 24, $this->source); })()), "userppoe", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>";
        // line 28
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["employee"]) || array_key_exists("employee", $context) ? $context["employee"] : (function () { throw new Twig_Error_Runtime('Variable "employee" does not exist.', 28, $this->source); })()), "email", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Password</th>
                <td>";
        // line 32
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["employee"]) || array_key_exists("employee", $context) ? $context["employee"] : (function () { throw new Twig_Error_Runtime('Variable "employee" does not exist.', 32, $this->source); })()), "password", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>CreatedDate</th>
                <td>";
        // line 36
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, (isset($context["employee"]) || array_key_exists("employee", $context) ? $context["employee"] : (function () { throw new Twig_Error_Runtime('Variable "employee" does not exist.', 36, $this->source); })()), "createdDate", array())) ? (twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["employee"]) || array_key_exists("employee", $context) ? $context["employee"] : (function () { throw new Twig_Error_Runtime('Variable "employee" does not exist.', 36, $this->source); })()), "createdDate", array()), "Y-m-d H:i:s")) : ("")), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>UpdatedDate</th>
                <td>";
        // line 40
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, (isset($context["employee"]) || array_key_exists("employee", $context) ? $context["employee"] : (function () { throw new Twig_Error_Runtime('Variable "employee" does not exist.', 40, $this->source); })()), "updatedDate", array())) ? (twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["employee"]) || array_key_exists("employee", $context) ? $context["employee"] : (function () { throw new Twig_Error_Runtime('Variable "employee" does not exist.', 40, $this->source); })()), "updatedDate", array()), "Y-m-d H:i:s")) : ("")), "html", null, true);
        echo "</td>
            </tr>
        </tbody>
    </table>

    <a href=\"";
        // line 45
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("employees_index");
        echo "\">back to list</a>

    <a href=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("employees_edit", array("id" => twig_get_attribute($this->env, $this->source, (isset($context["employee"]) || array_key_exists("employee", $context) ? $context["employee"] : (function () { throw new Twig_Error_Runtime('Variable "employee" does not exist.', 47, $this->source); })()), "id", array()))), "html", null, true);
        echo "\">edit</a>

    ";
        // line 49
        echo twig_include($this->env, $context, "employees/_delete_form.html.twig");
        echo "
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "employees/show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  147 => 49,  142 => 47,  137 => 45,  129 => 40,  122 => 36,  115 => 32,  108 => 28,  101 => 24,  94 => 20,  87 => 16,  80 => 12,  72 => 6,  63 => 5,  45 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}

{% block title %}Employees{% endblock %}

{% block body %}
    <h1>Employees</h1>

    <table class=\"table\">
        <tbody>
            <tr>
                <th>Id</th>
                <td>{{ employee.id }}</td>
            </tr>
            <tr>
                <th>FirstName</th>
                <td>{{ employee.firstName }}</td>
            </tr>
            <tr>
                <th>LastName</th>
                <td>{{ employee.lastName }}</td>
            </tr>
            <tr>
                <th>Userppoe</th>
                <td>{{ employee.userppoe }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ employee.email }}</td>
            </tr>
            <tr>
                <th>Password</th>
                <td>{{ employee.password }}</td>
            </tr>
            <tr>
                <th>CreatedDate</th>
                <td>{{ employee.createdDate ? employee.createdDate|date('Y-m-d H:i:s') : '' }}</td>
            </tr>
            <tr>
                <th>UpdatedDate</th>
                <td>{{ employee.updatedDate ? employee.updatedDate|date('Y-m-d H:i:s') : '' }}</td>
            </tr>
        </tbody>
    </table>

    <a href=\"{{ path('employees_index') }}\">back to list</a>

    <a href=\"{{ path('employees_edit', {'id': employee.id}) }}\">edit</a>

    {{ include('employees/_delete_form.html.twig') }}
{% endblock %}
", "employees/show.html.twig", "/var/www/wiro123.com/templates/employees/show.html.twig");
    }
}
