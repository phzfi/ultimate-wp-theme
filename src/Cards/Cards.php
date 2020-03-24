<?php

namespace Theme\Cards;

use Theme\Actions;
use Theme\Cards\Areas\GridCard;
use Theme\Cards\Areas\HeaderCard;
use Theme\Cards\CardTypes\FullHeightCardType;
use Theme\Cards\CardTypes\MediaCardType;
use Theme\Render;

/**
 * Class Cards
 */
class Cards implements Actions, Render
{

    /**
     * @var Input[]
     */
    protected $cards = [];
    public function __construct()
    {
        #$this->cards['header'] = new HeaderCard();
        #$this->cards['grid'] = new GridCard();
    }

    /**
     * Runs all Wordpress actions to register different components.
     *
     * @param array $args
     * @return void
     */
    public function actions(...$args)
    {
    }


    /**
     * Echoes all contents inside of it.
     *
     * @param array $id
     * @return void
     */
    public function render(...$id)
    {
        # $this->cards[$id[0]]->render();
    }
}
