<?php
/**
 * Verone CRM | http://www.veronecrm.com
 *
 * @copyright  Copyright (C) 2015 Adam Banaszkiewicz
 * @license    GNU General Public License version 3; see license.txt
 */

namespace App\Module\Settings\Plugin;

use CRM\App\Module\Plugin;

class SettingsGlob extends Plugin
{
    public function tabs()
    {
        return [
            [
                'ordering'  => 2,
                'icon'      => 'fa fa-building',
                'icon-type' => 'class',
                'name'      => $this->t('settingsCompany'),
                'tab'       => 'company-settings',
                'module'    => 'Settings'
            ],
            [
                'ordering'  => 1,
                'icon'      => 'fa fa-cogs',
                'icon-type' => 'class',
                'name'      => $this->t('settingsGeneralSettings'),
                'tab'       => 'general-settings',
                'module'    => 'Settings'
            ]
        ];
    }

    public function contents($tab)
    {
        if($tab == 'general-settings')
        {
            return $this->get('templating.engine')->render('general.SettingsGlob.Settings', [
                'settings' => $this->openSettings('app')
            ]);
        }
        elseif($tab == 'company-settings')
        {
            return $this->get('templating.engine')->render('company.SettingsGlob.Settings', [
                'settings' => $this->openSettings('app')
            ]);
        }
    }

    public function update($tab, $request)
    {
        $app = $this->openSettings('app');

        $logger = $this->get('history.user.log');
        $logger->setModule('Settings');
        $logger->setEntityId(0);

        if($tab == 'general-settings')
        {
            $logger->setEntityName('General');
            $logger->appendPreValue('language', $app->get('language'));
            $logger->appendPreValue('currency', $app->get('currency'));
            $logger->appendPreValue('timezone', $app->get('timezone'));

            /**
             * We must update current App language with save it in Settings.
             */
            $request->setLocale($request->get('language'));
            $app->set('language', $request->get('language'));

            $app->set('currency', $request->get('currency'));
            $app->set('timezone', $request->get('timezone'));

            $logger->appendPostValue('language', $app->get('language'));
            $logger->appendPostValue('currency', $app->get('currency'));
            $logger->appendPostValue('timezone', $app->get('timezone'));
        }
        elseif($tab == 'company-settings')
        {
            $logger->setEntityName('Company');
            $logger->appendPreValue('company.name', $app->get('company.name'));
            $logger->appendPreValue('company.address', $app->get('company.address'));
            $logger->appendPreValue('company.fullname', $app->get('company.fullname'));

            $app->set('company.name', $request->get('company_name'));
            $app->set('company.address', $request->get('company_address'));
            $app->set('company.fullname', $request->get('company_fullname'));

            $logger->appendPostValue('company.name', $app->get('company.name'));
            $logger->appendPostValue('company.address', $app->get('company.address'));
            $logger->appendPostValue('company.fullname', $app->get('company.fullname'));
        }

        $logger->flush(2, $this->t('settingsGeneralSettings'));
    }
}
