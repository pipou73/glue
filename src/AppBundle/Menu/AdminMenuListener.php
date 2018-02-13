<?php

namespace AppBundle\Menu;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

class AdminMenuListener
{
    /**
     * @param MenuBuilderEvent $event
     */
    public function addAdminMenuItems(MenuBuilderEvent $event)
    {
        $menu     = $event->getMenu();
        $resource = $menu->getChild("resource");
        $resource
            ->addChild('author', ['route' => 'app_admin_author_index'])
            ->setLabel('sylius.menu.admin.main.resources.author')
            ->setLabelAttribute('icon', 'address card outline');

        $resource
            ->addChild('book', ['route' => 'app_admin_book_index'])
            ->setLabel('sylius.menu.admin.main.resources.book')
            ->setLabelAttribute('icon', 'book');
    }
}
