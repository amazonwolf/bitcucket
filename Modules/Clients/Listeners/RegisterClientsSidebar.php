<?php

namespace Modules\Clients\Listeners;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterClientsSidebar implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    public function handle(BuildingSidebar $sidebar)
    {
        $sidebar->add($this->extendWith($sidebar->getMenu()));
    }

    /**
     * @param Menu $menu
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('clients::clients.title.clients'), function (Item $item) {
                $item->icon('fa fa-user');
                $item->weight(0);
                $item->authorize(
                    $this->auth->hasAccess('clients.clients.index')
                    
                );
                $item->item(trans('Clients Data'), function (Item $item) {
                    $item->icon('fa fa-users');
                    $item->weight(0);
                    $item->append('admin.clients.client.create');
                    $item->route('admin.clients.client.index');
                    $item->authorize(
                        $this->auth->hasAccess('clients.clients.index')
                    );
                });
                $item->item(trans('Clients Offers'), function (Item $item) {
                    $item->icon('fa fa-address-card-o');
                    $item->weight(0);
                    $item->append('admin.clients.offers.create');
                    $item->route('admin.clients.offers.index');
                    $item->authorize(
                        $this->auth->hasAccess('clients.offers.index')
                    );
                });
// append


            });
        });

        return $menu;
    }
}
