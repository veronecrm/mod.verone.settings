<?php
/**
 * Verone CRM | http://www.veronecrm.com
 *
 * @copyright  Copyright (C) 2015 Adam Banaszkiewicz
 * @license    GNU General Public License version 3; see license.txt
 */

namespace App\Module\Settings\Plugin;

use CRM\App\Module\Plugin;

class SettingsUser extends Plugin
{
    public function tabs()
    {
        return [
            [
                'ordering'  => 200,
                'icon'      => 'fa fa-object-group',
                'icon-type' => 'class',
                'name'      => $this->t('settingsUserLayout'),
                'tab'       => 'layout',
                'module'    => 'Settings'
            ]
        ];
    }

    public function contents($tab)
    {
        return $this->get('templating.engine')->render('layout.SettingsUser.Settings', [
            'settingsUser' => $this->openSettings('user')
        ]);
    }

    public function update($tab, $request)
    {
        $user = $this->openSettings('user');
        $user->set('layout.menu.behavior', $request->get('layout_menu_behavior'));
    }
}
