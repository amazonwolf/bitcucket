<?php

namespace Modules\Prasad\Listeners;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterPrasadSidebar implements \Maatwebsite\Sidebar\SidebarExtender
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
            $group->item(trans('prasad::prasads.title.prasads'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('prasad::add_details.title.add_details'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.prasad.add_details.create');
                    $item->route('admin.prasad.add_details.index');
                    $item->authorize(
                        $this->auth->hasAccess('prasad.add_details.index')
                    );
                });
                $item->item(trans('prasad::delete_details.title.delete_details'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.prasad.delete_details.create');
                    $item->route('admin.prasad.delete_details.index');
                    $item->authorize(
                        $this->auth->hasAccess('prasad.delete_details.index')
                    );
                });
// append


            });
        });

        return $menu;
    }
}
