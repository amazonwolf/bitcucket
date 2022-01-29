<?php

namespace Modules\Asses\Listeners;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterAssesSidebar implements \Maatwebsite\Sidebar\SidebarExtender
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
            $group->item(trans('Assesment '), function (Item $item)
             {
                // $item->icon('fa fa-copy');
                // $item->weight(10);
                // $item->authorize(
                //      /* append */
                // );
                // $item->item(trans('Assesment Data'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(4);
                    $item->append('admin.asses.assesment.create');
                    $item->route('admin.asses.assesment.index');
                    $item->authorize(
                        $this->auth->hasAccess('asses.assesments.index')
                    );
                // });
// append

            });
        });

        return $menu;
    }
}
