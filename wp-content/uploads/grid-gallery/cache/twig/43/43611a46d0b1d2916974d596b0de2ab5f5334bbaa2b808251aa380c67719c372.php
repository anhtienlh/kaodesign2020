<?php

/* @core/form.twig */
class __TwigTemplate_f132f11578ab1f816b5bfe03596324bac604dfed0f886d1e53886a8f96f49cb6 extends Twig_SupTwg_Template
{
    public function __construct(Twig_SupTwg_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 5
        echo "
";
        // line 9
        echo "
";
        // line 20
        echo "
";
        // line 56
        echo "
";
        // line 81
        echo "
";
        // line 93
        echo "
";
        // line 99
        echo "
";
        // line 105
        echo "
";
        // line 115
        echo "
";
        // line 121
        echo "
";
        // line 127
        echo "
";
        // line 133
        echo "
";
        // line 139
        echo "
";
        // line 145
        echo "
";
        // line 155
        echo "
";
        // line 163
        echo "
";
        // line 171
        echo "
";
        // line 182
        echo "
";
        // line 188
        echo "
";
        // line 192
        echo "
";
        // line 196
        echo "
";
    }

    // line 1
    public function getopen($__method__ = null, $__action__ = null, $__attributes__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "method" => $__method__,
            "action" => $__action__,
            "attributes" => $__attributes__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "    <form method=\"";
            echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_upper_filter($this->env, (isset($context["method"]) ? $context["method"] : null)), "html", null, true);
            echo "\" ";
            if ( !Twig_SupTwg_test_empty((isset($context["action"]) ? $context["action"] : null))) {
                echo "action=\"";
                echo Twig_SupTwg_escape_filter($this->env, (isset($context["action"]) ? $context["action"] : null), "html", null, true);
                echo "\"";
            }
            // line 3
            echo "\t";
            $context['_parent'] = $context;
            $context['_seq'] = Twig_SupTwg_ensure_traversable((isset($context["attributes"]) ? $context["attributes"] : null));
            foreach ($context['_seq'] as $context["attribute"] => $context["value"]) {
                echo Twig_SupTwg_escape_filter($this->env, $context["attribute"], "html", null, true);
                echo "=\"";
                echo Twig_SupTwg_escape_filter($this->env, $context["value"], "html", null, true);
                echo "\" ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['attribute'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo ">
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
    }

    // line 6
    public function getclose(...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 7
            echo "    </form>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
    }

    // line 10
    public function getshow_tooltip($__id__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "id" => $__id__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 11
            echo "    ";
            // line 12
            echo "    ";
            $context["title"] = $this->getAttribute((isset($context["tooltips"]) ? $context["tooltips"] : null), (isset($context["id"]) ? $context["id"] : null), array(), "array");
            // line 13
            echo "
    ";
            // line 14
            if ( !Twig_SupTwg_test_empty((isset($context["title"]) ? $context["title"] : null))) {
                // line 15
                echo "        <i class=\"fa fa-";
                echo Twig_SupTwg_escape_filter($this->env, (($this->getAttribute((isset($context["tooltips_icon"]) ? $context["tooltips_icon"] : null), "icon", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute((isset($context["tooltips_icon"]) ? $context["tooltips_icon"] : null), "icon", array()), "question")) : ("question")), "html", null, true);
                echo " supsystic-tooltip\"
           title=\"";
                // line 16
                echo (isset($context["title"]) ? $context["title"] : null);
                echo "\"
           style=\"";
                // line 17
                $context['_parent'] = $context;
                $context['_seq'] = Twig_SupTwg_ensure_traversable($this->getAttribute((isset($context["tooltips_icon"]) ? $context["tooltips_icon"] : null), "style", array()));
                foreach ($context['_seq'] as $context["property"] => $context["value"]) {
                    echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_trim_filter($context["property"]), "html", null, true);
                    echo ":";
                    echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_trim_filter($context["value"]), "html", null, true);
                    echo ";";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['property'], $context['value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                echo "\"></i>
    ";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
    }

    // line 21
    public function getrow($__label__ = null, $__element__ = null, $__id__ = null, $__titleRow__ = null, $__row_id__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "label" => $__label__,
            "element" => $__element__,
            "id" => $__id__,
            "titleRow" => $__titleRow__,
            "row_id" => $__row_id__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 22
            echo "    ";
            $context["form"] = $this;
            // line 23
            echo "    
    ";
            // line 24
            if ( !Twig_SupTwg_test_empty((isset($context["row_id"]) ? $context["row_id"] : null))) {
                // line 25
                echo "    <tr id=\"";
                echo Twig_SupTwg_escape_filter($this->env, (isset($context["row_id"]) ? $context["row_id"] : null), "html", null, true);
                echo "\">
    ";
            } else {
                // line 27
                echo "    <tr>
    ";
            }
            // line 29
            echo "        <th scope=\"row\">
\t\t\t";
            // line 30
            if (((Twig_SupTwg_length_filter($this->env, (isset($context["titleRow"]) ? $context["titleRow"] : null)) == 2) && ((isset($context["titleRow"]) ? $context["titleRow"] : null) == "h4"))) {
                // line 31
                echo "\t\t\t\t<h4 style=\"margin: 0 !important;\" ";
                if ( !Twig_SupTwg_test_empty((isset($context["id"]) ? $context["id"] : null))) {
                    echo "id=\"label-";
                    echo Twig_SupTwg_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
                    echo "\"";
                }
                echo ">
\t\t\t\t\t";
                // line 32
                echo (isset($context["label"]) ? $context["label"] : null);
                echo "
\t\t\t\t\t";
                // line 33
                echo $context["form"]->getshow_tooltip((isset($context["id"]) ? $context["id"] : null));
                echo "
\t\t\t\t</h4>
\t\t\t";
            } elseif ( !Twig_SupTwg_test_empty(            // line 35
(isset($context["titleRow"]) ? $context["titleRow"] : null))) {
                // line 36
                echo "                <h3 style=\"margin: 0 !important;\" ";
                if ( !Twig_SupTwg_test_empty((isset($context["id"]) ? $context["id"] : null))) {
                    echo "id=\"label-";
                    echo Twig_SupTwg_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
                    echo "\"";
                }
                echo ">
                    ";
                // line 37
                echo (isset($context["label"]) ? $context["label"] : null);
                echo "
                    ";
                // line 38
                echo $context["form"]->getshow_tooltip((isset($context["id"]) ? $context["id"] : null));
                echo "
                </h3>
\t\t\t";
            } else {
                // line 41
                echo "                <label ";
                if ( !Twig_SupTwg_test_empty((isset($context["id"]) ? $context["id"] : null))) {
                    echo "id=\"label-";
                    echo Twig_SupTwg_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
                    echo "\" for=\"";
                    echo Twig_SupTwg_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
                    echo "\"";
                }
                echo ">
                    ";
                // line 42
                echo Twig_SupTwg_escape_filter($this->env, (isset($context["label"]) ? $context["label"] : null), "html", null, true);
                echo "
                    ";
                // line 43
                echo $context["form"]->getshow_tooltip((isset($context["id"]) ? $context["id"] : null));
                echo "
                </label>
            ";
            }
            // line 46
            echo "        </th>
        ";
            // line 47
            if ( !Twig_SupTwg_test_empty((isset($context["id"]) ? $context["id"] : null))) {
                // line 48
                echo "        <td id=\"";
                echo Twig_SupTwg_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
                echo "\">
        ";
            } else {
                // line 50
                echo "        <td>
        ";
            }
            // line 52
            echo "            ";
            echo (isset($context["element"]) ? $context["element"] : null);
            echo "
        </td>
    </tr>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
    }

    // line 57
    public function getrowpro($__label__ = null, $__link__ = null, $__id__ = null, $__element__ = null, $__titleRow__ = null, $__notAddBr__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "label" => $__label__,
            "link" => $__link__,
            "id" => $__id__,
            "element" => $__element__,
            "titleRow" => $__titleRow__,
            "notAddBr" => $__notAddBr__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 58
            echo "    ";
            $context["form"] = $this;
            // line 59
            echo "    
    <tr>
        <th scope=\"row\">
            ";
            // line 62
            if ( !Twig_SupTwg_test_empty((isset($context["titleRow"]) ? $context["titleRow"] : null))) {
                // line 63
                echo "                <h3 style=\"margin: 0 !important;\">
                    ";
                // line 64
                echo Twig_SupTwg_escape_filter($this->env, (isset($context["label"]) ? $context["label"] : null), "html", null, true);
                echo "
                    ";
                // line 65
                echo $context["form"]->getshow_tooltip((isset($context["id"]) ? $context["id"] : null));
                echo "
                </h3>
            ";
            } else {
                // line 68
                echo "                <label ";
                if ( !Twig_SupTwg_test_empty((isset($context["id"]) ? $context["id"] : null))) {
                    echo "id=\"label-";
                    echo Twig_SupTwg_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
                    echo "\" for=\"";
                    echo Twig_SupTwg_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
                    echo "\"";
                }
                echo ">
                    ";
                // line 69
                echo Twig_SupTwg_escape_filter($this->env, (isset($context["label"]) ? $context["label"] : null), "html", null, true);
                echo "
                    ";
                // line 70
                echo $context["form"]->getshow_tooltip((isset($context["id"]) ? $context["id"] : null));
                echo "
                </label>
            ";
            }
            // line 73
            echo "\t\t\t";
            if (((isset($context["notAddBr"]) ? $context["notAddBr"] : null) == null)) {
                // line 74
                echo "\t\t\t\t<br/>
\t\t\t";
            }
            // line 76
            echo "\t\t\t<label><a href=\"";
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array((isset($context["link"]) ? $context["link"] : null))), "html", null, true);
            echo "\" target=\"_blank\" style=\"color: #0074a2; font-size: 10px; text-decoration: none;\" class=\"sggLinkToProVer\">PRO Option</a> </label>
        </th>
        <td>";
            // line 78
            echo (isset($context["element"]) ? $context["element"] : null);
            echo "</td>
    </tr>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
    }

    // line 82
    public function getinput($__type__ = "text", $__name__ = null, $__value__ = null, $__attributes__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "type" => $__type__,
            "name" => $__name__,
            "value" => $__value__,
            "attributes" => $__attributes__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 83
            echo "    <input type=\"";
            echo Twig_SupTwg_escape_filter($this->env, (isset($context["type"]) ? $context["type"] : null), "html", null, true);
            echo "\" name=\"";
            echo Twig_SupTwg_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
            echo "\" value=\"";
            echo Twig_SupTwg_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : null), "html", null, true);
            echo "\"
    ";
            // line 84
            $context['_parent'] = $context;
            $context['_seq'] = Twig_SupTwg_ensure_traversable((isset($context["attributes"]) ? $context["attributes"] : null));
            foreach ($context['_seq'] as $context["attribute"] => $context["val"]) {
                // line 85
                echo "        ";
                if (Twig_SupTwg_test_iterable($context["val"])) {
                    // line 86
                    echo "            ";
                    echo Twig_SupTwg_escape_filter($this->env, $context["attribute"], "html", null, true);
                    echo "=\"";
                    $context['_parent'] = $context;
                    $context['_seq'] = Twig_SupTwg_ensure_traversable($context["val"]);
                    foreach ($context['_seq'] as $context["attr"] => $context["param"]) {
                        echo Twig_SupTwg_escape_filter($this->env, $context["attr"], "html", null, true);
                        echo ":";
                        echo Twig_SupTwg_escape_filter($this->env, $context["param"], "html", null, true);
                        echo ";";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['attr'], $context['param'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    echo "\"
        ";
                } else {
                    // line 88
                    echo "            ";
                    echo Twig_SupTwg_escape_filter($this->env, $context["attribute"], "html", null, true);
                    echo "=\"";
                    echo Twig_SupTwg_escape_filter($this->env, $context["val"], "html", null, true);
                    echo "\"
        ";
                }
                // line 90
                echo "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['attribute'], $context['val'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 91
            echo "    />
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
    }

    // line 94
    public function gettext($__name__ = null, $__value__ = null, $__attributes__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "name" => $__name__,
            "value" => $__value__,
            "attributes" => $__attributes__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 95
            echo "    ";
            $context["form"] = $this;
            // line 96
            echo "
    ";
            // line 97
            echo $context["form"]->getinput("text", (isset($context["name"]) ? $context["name"] : null), (isset($context["value"]) ? $context["value"] : null), (isset($context["attributes"]) ? $context["attributes"] : null));
            echo "
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
    }

    // line 100
    public function getpassword($__name__ = null, $__value__ = null, $__attributes__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "name" => $__name__,
            "value" => $__value__,
            "attributes" => $__attributes__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 101
            echo "    ";
            $context["form"] = $this;
            // line 102
            echo "
    ";
            // line 103
            echo $context["form"]->getinput("password", (isset($context["name"]) ? $context["name"] : null), (isset($context["value"]) ? $context["value"] : null), (isset($context["attributes"]) ? $context["attributes"] : null));
            echo "
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
    }

    // line 106
    public function getbutton($__name__ = null, $__value__ = null, $__attributes__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "name" => $__name__,
            "value" => $__value__,
            "attributes" => $__attributes__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 107
            echo "    ";
            $context["form"] = $this;
            // line 108
            echo "
    ";
            // line 109
            if ($this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "class", array(), "any", true, true)) {
                // line 110
                echo "        ";
                $context["attributes"] = Twig_SupTwg_array_merge((isset($context["attributes"]) ? $context["attributes"] : null), array("class" => ($this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "class", array()) . " button button-primary")));
                // line 111
                echo "    ";
            }
            // line 112
            echo "
    ";
            // line 113
            echo $context["form"]->getinput("button", (isset($context["name"]) ? $context["name"] : null), (isset($context["value"]) ? $context["value"] : null), (isset($context["attributes"]) ? $context["attributes"] : null));
            echo "
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
    }

    // line 116
    public function getcheckbox($__name__ = null, $__value__ = null, $__attributes__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "name" => $__name__,
            "value" => $__value__,
            "attributes" => $__attributes__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 117
            echo "    ";
            $context["form"] = $this;
            // line 118
            echo "
    ";
            // line 119
            echo $context["form"]->getinput("checkbox", (isset($context["name"]) ? $context["name"] : null), (isset($context["value"]) ? $context["value"] : null), (isset($context["attributes"]) ? $context["attributes"] : null));
            echo "
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
    }

    // line 122
    public function getfile($__name__ = null, $__value__ = null, $__attributes__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "name" => $__name__,
            "value" => $__value__,
            "attributes" => $__attributes__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 123
            echo "    ";
            $context["form"] = $this;
            // line 124
            echo "
    ";
            // line 125
            echo $context["form"]->getinput("file", (isset($context["name"]) ? $context["name"] : null), (isset($context["value"]) ? $context["value"] : null), (isset($context["attributes"]) ? $context["attributes"] : null));
            echo "
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
    }

    // line 128
    public function gethidden($__name__ = null, $__value__ = null, $__attributes__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "name" => $__name__,
            "value" => $__value__,
            "attributes" => $__attributes__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 129
            echo "    ";
            $context["form"] = $this;
            // line 130
            echo "
    ";
            // line 131
            echo $context["form"]->getinput("hidden", (isset($context["name"]) ? $context["name"] : null), (isset($context["value"]) ? $context["value"] : null), (isset($context["attributes"]) ? $context["attributes"] : null));
            echo "
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
    }

    // line 134
    public function getradio($__name__ = null, $__value__ = null, $__attributes__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "name" => $__name__,
            "value" => $__value__,
            "attributes" => $__attributes__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 135
            echo "    ";
            $context["form"] = $this;
            // line 136
            echo "
    ";
            // line 137
            echo $context["form"]->getinput("radio", (isset($context["name"]) ? $context["name"] : null), (isset($context["value"]) ? $context["value"] : null), (isset($context["attributes"]) ? $context["attributes"] : null));
            echo "
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
    }

    // line 140
    public function getcolor($__name__ = null, $__value__ = null, $__attributes__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "name" => $__name__,
            "value" => $__value__,
            "attributes" => $__attributes__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 141
            echo "    ";
            $context["form"] = $this;
            // line 142
            echo "
    ";
            // line 143
            echo $context["form"]->getinput("color", (isset($context["name"]) ? $context["name"] : null), (isset($context["value"]) ? $context["value"] : null), (isset($context["attributes"]) ? $context["attributes"] : null));
            echo "
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
    }

    // line 146
    public function getsubmit($__name__ = null, $__value__ = null, $__attributes__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "name" => $__name__,
            "value" => $__value__,
            "attributes" => $__attributes__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 147
            echo "    ";
            $context["form"] = $this;
            // line 148
            echo "
    ";
            // line 149
            if ($this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "class", array(), "any", true, true)) {
                // line 150
                echo "        ";
                $context["attributes"] = Twig_SupTwg_array_merge((isset($context["attributes"]) ? $context["attributes"] : null), array("class" => ($this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "class", array()) . " button button-primary")));
                // line 151
                echo "    ";
            }
            // line 152
            echo "
    ";
            // line 153
            echo $context["form"]->getinput("submit", (isset($context["name"]) ? $context["name"] : null), (isset($context["value"]) ? $context["value"] : null), (isset($context["attributes"]) ? $context["attributes"] : null));
            echo "
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
    }

    // line 156
    public function getselect($__name__ = null, $__options__ = null, $__selected__ = null, $__attributes__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "name" => $__name__,
            "options" => $__options__,
            "selected" => $__selected__,
            "attributes" => $__attributes__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 157
            echo "\t<select name=\"";
            echo Twig_SupTwg_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
            echo "\" ";
            $context['_parent'] = $context;
            $context['_seq'] = Twig_SupTwg_ensure_traversable((isset($context["attributes"]) ? $context["attributes"] : null));
            foreach ($context['_seq'] as $context["attribute"] => $context["value"]) {
                echo Twig_SupTwg_escape_filter($this->env, $context["attribute"], "html", null, true);
                echo "=\"";
                echo Twig_SupTwg_escape_filter($this->env, $context["value"], "html", null, true);
                echo "\" ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['attribute'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo ">
    ";
            // line 158
            $context['_parent'] = $context;
            $context['_seq'] = Twig_SupTwg_ensure_traversable((isset($context["options"]) ? $context["options"] : null));
            foreach ($context['_seq'] as $context["value"] => $context["text"]) {
                // line 159
                echo "        <option value=\"";
                echo Twig_SupTwg_escape_filter($this->env, $context["value"], "html", null, true);
                echo "\" name = \"";
                echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_lower_filter($this->env, $context["text"]), "html", null, true);
                echo "\" ";
                if (((isset($context["selected"]) ? $context["selected"] : null) == $context["value"])) {
                    echo "selected";
                }
                echo ">";
                echo Twig_SupTwg_escape_filter($this->env, $context["text"], "html", null, true);
                echo "</option>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['value'], $context['text'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 161
            echo "    </select>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
    }

    // line 164
    public function getselectv($__name__ = null, $__options__ = null, $__selected__ = null, $__attributes__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "name" => $__name__,
            "options" => $__options__,
            "selected" => $__selected__,
            "attributes" => $__attributes__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 165
            echo "    <select name=\"";
            echo Twig_SupTwg_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
            echo "\" ";
            $context['_parent'] = $context;
            $context['_seq'] = Twig_SupTwg_ensure_traversable((isset($context["attributes"]) ? $context["attributes"] : null));
            foreach ($context['_seq'] as $context["attribute"] => $context["value"]) {
                echo Twig_SupTwg_escape_filter($this->env, $context["attribute"], "html", null, true);
                echo "=\"";
                echo Twig_SupTwg_escape_filter($this->env, $context["value"], "html", null, true);
                echo "\"";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['attribute'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo ">
    ";
            // line 166
            $context['_parent'] = $context;
            $context['_seq'] = Twig_SupTwg_ensure_traversable((isset($context["options"]) ? $context["options"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["text"]) {
                // line 167
                echo "        <option value=\"";
                echo Twig_SupTwg_escape_filter($this->env, $context["text"], "html", null, true);
                echo "\" name = \"";
                echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_lower_filter($this->env, $context["text"]), "html", null, true);
                echo "\" ";
                if (((isset($context["selected"]) ? $context["selected"] : null) == $context["text"])) {
                    echo "selected";
                }
                echo ">";
                echo Twig_SupTwg_escape_filter($this->env, $context["text"], "html", null, true);
                echo "</option>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['text'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 169
            echo "    </select>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
    }

    // line 172
    public function getselectWithElem($__name__ = null, $__options__ = null, $__selected__ = null, $__attributes__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "name" => $__name__,
            "options" => $__options__,
            "selected" => $__selected__,
            "attributes" => $__attributes__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 173
            echo "\t<select name=\"";
            echo Twig_SupTwg_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
            echo "\" ";
            $context['_parent'] = $context;
            $context['_seq'] = Twig_SupTwg_ensure_traversable((isset($context["attributes"]) ? $context["attributes"] : null));
            foreach ($context['_seq'] as $context["attribute"] => $context["value"]) {
                echo Twig_SupTwg_escape_filter($this->env, $context["attribute"], "html", null, true);
                echo "=\"";
                echo Twig_SupTwg_escape_filter($this->env, $context["value"], "html", null, true);
                echo "\"";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['attribute'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo ">
\t";
            // line 174
            $context['_parent'] = $context;
            $context['_seq'] = Twig_SupTwg_ensure_traversable((isset($context["options"]) ? $context["options"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
                // line 175
                echo "\t\t<option value=\"";
                echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($context["value"], "value", array()), "html", null, true);
                echo "\" name = \"";
                echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_lower_filter($this->env, $this->getAttribute($context["value"], "title", array())), "html", null, true);
                echo "\"
\t\t\t\t";
                // line 176
                if (((isset($context["selected"]) ? $context["selected"] : null) == $this->getAttribute($context["value"], "value", array()))) {
                    echo "selected=\"selected\"";
                }
                // line 177
                echo "\t\t\t\t";
                if (($this->getAttribute($context["value"], "disabled", array()) == 1)) {
                    echo " disabled=\"disabled\"";
                }
                // line 178
                echo "\t\t>";
                echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($context["value"], "title", array()), "html", null, true);
                echo "</option>
\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 180
            echo "\t</select>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
    }

    // line 183
    public function getspan($__name__ = null, $__text__ = null, $__attributes__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "name" => $__name__,
            "text" => $__text__,
            "attributes" => $__attributes__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 184
            echo "    <span name=\"";
            echo Twig_SupTwg_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
            echo "\" ";
            $context['_parent'] = $context;
            $context['_seq'] = Twig_SupTwg_ensure_traversable((isset($context["attributes"]) ? $context["attributes"] : null));
            foreach ($context['_seq'] as $context["attribute"] => $context["value"]) {
                echo Twig_SupTwg_escape_filter($this->env, $context["attribute"], "html", null, true);
                echo "=\"";
                echo Twig_SupTwg_escape_filter($this->env, $context["value"], "html", null, true);
                echo "\"";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['attribute'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo ">
        ";
            // line 185
            echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_lower_filter($this->env, (isset($context["text"]) ? $context["text"] : null)), "html", null, true);
            echo "
    </span>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
    }

    // line 189
    public function getselected($__actual__ = null, $__expected__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "actual" => $__actual__,
            "expected" => $__expected__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 190
            echo "    ";
            if (((isset($context["actual"]) ? $context["actual"] : null) == (isset($context["expected"]) ? $context["expected"] : null))) {
                echo "selected=\"selected\"";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
    }

    // line 193
    public function getlabel($__label__ = null, $__for__ = null, $__attributes__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "label" => $__label__,
            "for" => $__for__,
            "attributes" => $__attributes__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 194
            echo "\t<label for=\"";
            echo Twig_SupTwg_escape_filter($this->env, (isset($context["for"]) ? $context["for"] : null), "html", null, true);
            echo "\" ";
            $context['_parent'] = $context;
            $context['_seq'] = Twig_SupTwg_ensure_traversable((isset($context["attributes"]) ? $context["attributes"] : null));
            foreach ($context['_seq'] as $context["attribute"] => $context["value"]) {
                echo Twig_SupTwg_escape_filter($this->env, $context["attribute"], "html", null, true);
                echo "=\"";
                echo Twig_SupTwg_escape_filter($this->env, $context["value"], "html", null, true);
                echo "\"";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['attribute'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo ">";
            echo Twig_SupTwg_escape_filter($this->env, (isset($context["label"]) ? $context["label"] : null), "html", null, true);
            echo "</label>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
    }

    // line 197
    public function geticon($__name__ = null, $__size__ = null, $__id__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "name" => $__name__,
            "size" => $__size__,
            "id" => $__id__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 198
            echo "    <i class=\"fa ";
            echo Twig_SupTwg_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
            echo " mp-icon-preview\" style=\"font-size:";
            echo Twig_SupTwg_escape_filter($this->env, (isset($context["size"]) ? $context["size"] : null), "html", null, true);
            echo "px;\" id=\"";
            echo Twig_SupTwg_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo "\"></i>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "@core/form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1236 => 198,  1222 => 197,  1190 => 194,  1176 => 193,  1158 => 190,  1145 => 189,  1127 => 185,  1110 => 184,  1096 => 183,  1080 => 180,  1071 => 178,  1066 => 177,  1062 => 176,  1055 => 175,  1051 => 174,  1034 => 173,  1019 => 172,  1003 => 169,  986 => 167,  982 => 166,  965 => 165,  950 => 164,  934 => 161,  917 => 159,  913 => 158,  896 => 157,  881 => 156,  864 => 153,  861 => 152,  858 => 151,  855 => 150,  853 => 149,  850 => 148,  847 => 147,  833 => 146,  816 => 143,  813 => 142,  810 => 141,  796 => 140,  779 => 137,  776 => 136,  773 => 135,  759 => 134,  742 => 131,  739 => 130,  736 => 129,  722 => 128,  705 => 125,  702 => 124,  699 => 123,  685 => 122,  668 => 119,  665 => 118,  662 => 117,  648 => 116,  631 => 113,  628 => 112,  625 => 111,  622 => 110,  620 => 109,  617 => 108,  614 => 107,  600 => 106,  583 => 103,  580 => 102,  577 => 101,  563 => 100,  546 => 97,  543 => 96,  540 => 95,  526 => 94,  510 => 91,  504 => 90,  496 => 88,  478 => 86,  475 => 85,  471 => 84,  462 => 83,  447 => 82,  429 => 78,  423 => 76,  419 => 74,  416 => 73,  410 => 70,  406 => 69,  395 => 68,  389 => 65,  385 => 64,  382 => 63,  380 => 62,  375 => 59,  372 => 58,  355 => 57,  335 => 52,  331 => 50,  325 => 48,  323 => 47,  320 => 46,  314 => 43,  310 => 42,  299 => 41,  293 => 38,  289 => 37,  280 => 36,  278 => 35,  273 => 33,  269 => 32,  260 => 31,  258 => 30,  255 => 29,  251 => 27,  245 => 25,  243 => 24,  240 => 23,  237 => 22,  221 => 21,  193 => 17,  189 => 16,  184 => 15,  182 => 14,  179 => 13,  176 => 12,  174 => 11,  162 => 10,  146 => 7,  135 => 6,  107 => 3,  98 => 2,  84 => 1,  79 => 196,  76 => 192,  73 => 188,  70 => 182,  67 => 171,  64 => 163,  61 => 155,  58 => 145,  55 => 139,  52 => 133,  49 => 127,  46 => 121,  43 => 115,  40 => 105,  37 => 99,  34 => 93,  31 => 81,  28 => 56,  25 => 20,  22 => 9,  19 => 5,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_SupTwg_Source("", "@core/form.twig", "/home/dannytua/kaodesign.vn.2020/wp-content/plugins/gallery-by-supsystic/src/GridGallery/Core/views/form.twig");
    }
}
