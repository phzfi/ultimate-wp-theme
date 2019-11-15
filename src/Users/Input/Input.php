<?php

namespace Theme\Users\Input;

abstract class Input{
    /**
     * @return void
     */
    public abstract function render ();
    public abstract function actions ();
}
?>