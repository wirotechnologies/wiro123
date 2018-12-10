<?php

/* employees/index.html.twig */
class __TwigTemplate_b77f589129b32e3fa92cd0af139eab1850bd203a3c59969a93b3e0703a566e5e extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "employees/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "employees/index.html.twig"));

        // line 1
        echo "<!DOCTYPE html>

<title>Employees index</title>

";
        // line 5
        $this->displayBlock('body', $context, $blocks);
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function block_body($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "    <h1>Employees index</h1>

    <table class=\"table\">
        <thead>
            <tr>
                <th>Id</th>
                <th>Docid</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Userppoe</th>
                <th>Email</th>
                <th>Password</th>
                <th>CreatedDate</th>
                <th>UpdatedDate</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
        ";
        // line 24
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["employees"]) || array_key_exists("employees", $context) ? $context["employees"] : (function () { throw new Twig_Error_Runtime('Variable "employees" does not exist.', 24, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["employee"]) {
            // line 25
            echo "            <tr>
                <td>";
            // line 26
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["employee"], "id", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 27
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["employee"], "docid", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 28
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["employee"], "firstName", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 29
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["employee"], "lastName", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 30
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["employee"], "userppoe", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 31
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["employee"], "email", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 32
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["employee"], "password", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 33
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["employee"], "createdDate", array())) ? (twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["employee"], "createdDate", array()), "Y-m-d H:i:s")) : ("")), "html", null, true);
            echo "</td>
                <td>";
            // line 34
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["employee"], "updatedDate", array())) ? (twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["employee"], "updatedDate", array()), "Y-m-d H:i:s")) : ("")), "html", null, true);
            echo "</td>
                <td>
                    <a href=\"";
            // line 36
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("employees_show", array("id" => twig_get_attribute($this->env, $this->source, $context["employee"], "id", array()))), "html", null, true);
            echo "\">show</a>
                    <a href=\"";
            // line 37
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("employees_edit", array("id" => twig_get_attribute($this->env, $this->source, $context["employee"], "id", array()))), "html", null, true);
            echo "\">edit</a>
                </td>
            </tr>
        ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 41
            echo "            <tr>
                <td colspan=\"10\">no records found</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['employee'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 45
        echo "        </tbody>
    </table>

    <a href=\"";
        // line 48
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("employees_new");
        echo "\">Create new</a>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "employees/index.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  146 => 48,  141 => 45,  132 => 41,  123 => 37,  119 => 36,  114 => 34,  110 => 33,  106 => 32,  102 => 31,  98 => 30,  94 => 29,  90 => 28,  86 => 27,  82 => 26,  79 => 25,  74 => 24,  54 => 6,  36 => 5,  30 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>

<title>Employees index</title>

{% block body %}
    <h1>Employees index</h1>

    <table class=\"table\">
        <thead>
            <tr>
                <th>Id</th>
                <th>Docid</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Userppoe</th>
                <th>Email</th>
                <th>Password</th>
                <th>CreatedDate</th>
                <th>UpdatedDate</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
        {% for employee in employees %}
            <tr>
                <td>{{ employee.id }}</td>
                <td>{{ employee.docid }}</td>
                <td>{{ employee.firstName }}</td>
                <td>{{ employee.lastName }}</td>
                <td>{{ employee.userppoe }}</td>
                <td>{{ employee.email }}</td>
                <td>{{ employee.password }}</td>
                <td>{{ employee.createdDate ? employee.createdDate|date('Y-m-d H:i:s') : '' }}</td>
                <td>{{ employee.updatedDate ? employee.updatedDate|date('Y-m-d H:i:s') : '' }}</td>
                <td>
                    <a href=\"{{ path('employees_show', {'id': employee.id}) }}\">show</a>
                    <a href=\"{{ path('employees_edit', {'id': employee.id}) }}\">edit</a>
                </td>
            </tr>
        {% else %}
            <tr>
                <td colspan=\"10\">no records found</td>
            </tr>
        {% endfor %}
        </tbody>
    </table>

    <a href=\"{{ path('employees_new') }}\">Create new</a>
{% endblock %}
", "employees/index.html.twig", "/usr/local/var/www/wiro123.com/templates/employees/index.html.twig");
    }
}
