<?php
/**
 *  -------------------------------------------------
 *  Hybrid MLM  Copyright (c) 2018 All Rights Reserved
 *  -------------------------------------------------
 *
 * @author Acemero Technologies Pvt Ltd
 * @link https://www.acemero.com
 * @see https://www.hybridmlm.io
 * @version 1.00
 * @api Laravel 5.4
 */

namespace App\Components\Modules\General\AccountStatus\ModuleCore\Traits;

use App\Blueprint\Services\MenuServices;
use App\Components\Modules\General\AccountStatus\ModuleCore\Eloquents\AccountStatusHistory;
use App\Components\Modules\General\AccountStatus\ModuleCore\Services\AccountStatusServices;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

/**
 * Trait Hooks
 * @package App\Components\Modules\General\AccountStatus\ModuleCore\Traits
 */
trait Hooks
{
    /**
     * @return mixed
     */
    function hooks()
    {
        app()->call([$this, 'accountHooks']);

        app()->call([$this, 'leftMenus']);

        app()->call([$this, 'systemRefresh']);
    }

    /**
     * Register hooks
     *
     * @param Request $request
     * @param AccountStatusServices $accountStatusServices
     * @return Void
     */
    public function accountHooks(Request $request, AccountStatusServices $accountStatusServices)
    {
        registerFilter('memberManagement', function ($content) {
            return $content .= "<li data-target='activate'>
               <i class='fa fa-star'></i>
                <p>" . _mt('General-AccountStatus', 'AccountStatus.Activate_Deactivate') . "</p>
            </li>";
        }, 'nav');

        registerFilter('memberManagement', function ($content) {
            return $content .= '<form class="panelForm" data-unit="activate" data-target="activate"></form>';
        }, 'slice');

        registerFilter('memberManagement', function ($content, $action) use ($accountStatusServices, $request) {
            if ($action == 'activate') {
                $data['user_id'] = $request->user;
                $data['userStatusData'] = $accountStatusServices->getAccountStatusForUser(1);
                $data['moduleID'] = $this->moduleId;
                return view('General.AccountStatus.Views.index', $data);
            } else {
                return $content;
            }

        }, 'unitFilter');
    }


    /**
     * @param MenuServices $menuServices
     */
    public function leftMenus(MenuServices $menuServices)
    {
        registerFilter('leftMenus', function ($menus) use ($menuServices) {
            /** @var Collection $menus */
            return $menus->merge($menuServices->menusFromRaw([
                [
                    'label' => ['en' => 'Account Status', 'es' => 'estado de la cuenta', 'ru' => '???????????? ????????????????', 'ko' => '?????? ??????', 'pt' => 'Status da Conta', 'ja' => '?????????????????????????????????', 'zh' => '????????????', 'vi' => 'T??nh tr???ng t??i kho???n', 'sw' => 'Hali ya Akaunti', 'hi' => '???????????? ?????? ??????????????????', 'fr' => 'Statut du compte', 'it' => 'stato dell\'account'],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'currentAccountStatusReport',
                    'icon_image' => '',
                    'icon_font' => 'fa fa-user-secret',
                    'parent_id' => 'reports',
                    'permit' => ['admin:defaultAdmin'],
                    'sort_order' => '10',
                    'protected' => '0',
                    'description' => '',
                    'attributes' => '',
                ],
                [
                    'label' => ['en' => 'Account Analysis', 'es' => 'An??lisis de cuenta', 'ru' => '???????????? ????????????????', 'ko' => '?????? ??????', 'pt' => 'An??lise de conta', 'ja' => '?????????????????????', 'zh' => '????????????', 'vi' => 'Ph??n t??ch t??i kho???n', 'sw' => 'Uchambuzi wa Akaunti', 'hi' => '???????????? ????????????????????????', 'fr' => 'Analyse de compte', 'it' => 'Analisi dell\'account'],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'accountStatusReport',
                    'icon_image' => '',
                    'icon_font' => 'fa fa-user-secret',
                    'parent_id' => 'reports',
                    'permit' => ['admin:defaultAdmin'],
                    'sort_order' => '11',
                    'protected' => '0',
                    'description' => '',
                    'attributes' => '',
                ]
            ]));
        });
    }


    /**
     * System refresh
     */
    function systemRefresh()
    {
        registerFilter('dataTruncate', function ($data, $args) {
            AccountStatusHistory::truncate();
        }, 'systemRefresh');

        registerFilter('dataSeeding', function ($data, $args) {

        }, 'systemRefresh');
    }
}
