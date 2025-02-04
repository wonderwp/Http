<?php

use WonderWp\Component\DependencyInjection\Container;
use WonderWp\Component\Http\WpRequester;

add_action('wonderwp.loader.load', 'wwp_register_requester_definitions_towards_container', 10, 2);

function wwp_register_requester_definitions_towards_container(Container $container)
{
    //Http Requester
    $container['wwp.http.requester'] = function () {
        return new WpRequester();
    };
}
