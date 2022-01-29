<?php

namespace Modules\Information\Listeners;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterInformationSidebar implements \Maatwebsite\Sidebar\SidebarExtender
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
            $group->item(trans('Information'), function (Item $item) {
                $item->icon('fa fa-file');
                $item->weight(10);
                $item->authorize(
                    $this->auth->hasAccess('information.countries.index')
                );
                $item->item(trans('information::countries.title.countries'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.information.countries.create');
                    $item->route('admin.information.countries.index');
                    $item->authorize(
                        $this->auth->hasAccess('information.countries.index')
                    );
                });
                $item->item(trans('information::languages.title.languages'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.information.languages.create');
                    $item->route('admin.information.languages.index');
                    $item->authorize(
                        $this->auth->hasAccess('information.languages.index')
                    );
                });
                $item->item(trans('information::companyties.title.companyties'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.information.companyty.create');
                    $item->route('admin.information.companyty.index');
                    $item->authorize(
                        $this->auth->hasAccess('information.companyties.index')
                    );
                });
// append



            });
        });

        return $menu;
    }
}
