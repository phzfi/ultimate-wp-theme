<?php

namespace Theme\Customizer\Controls;

abstract class Control {
    public $variable_id;
    public $default = '';

    public function __construct($variable_id, $default)
    {
        $this->variable_id = $variable_id;
        $this->default = $default;
    }

    public function getValue()
    {
        return get_theme_mod( 'top_menu_link_hover_color', $this->default );
    }

    public function isEmpty()
    {
        return empty($this->getValue());
    }
}