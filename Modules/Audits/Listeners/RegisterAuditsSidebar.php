<?php

namespace Modules\Audits\Listeners;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterAuditsSidebar implements \Maatwebsite\Sidebar\SidebarExtender
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
            $group->item(trans('audits::audits.title.audits'), function (Item $item) 
            {
                // $item->icon('fa fa-copy');
                // $item->weight(10);
                // $item->authorize(
                //      /* append */
                // );
                // $item->item(trans('Audit Data'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(3);
                    $item->append('admin.audits.audit.create');
                    $item->route('admin.audits.audit.index');
                    $item->authorize(
                        $this->auth->hasAccess('audits.audits.index')
                    );
                // });
// append

            });
        });

        return $menu;
    }
}
