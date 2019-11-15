<?php

namespace Theme;

interface Actions {
    /**
     * Runs all Wordpress actions to register different components.
     *
     * @param array $args
     * @return void
     */
    public function actions(...$args);

}