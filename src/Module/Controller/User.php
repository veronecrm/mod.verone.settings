<?php
/**
 * Verone CRM | http://www.veronecrm.com
 *
 * @copyright  Copyright (C) 2015 Adam Banaszkiewicz
 * @license    GNU General Public License version 3; see license.txt
 */

namespace App\Module\Settings\Controller;

use CRM\App\Controller\BaseController;

class User extends BaseController
{
    public function indexAction($request)
    {
        $tabs = [];
        $base   = [
            'ordering'  => 0,
            'icon'      => 'fa fa-asterisk',
            'icon-type' => 'class',
            'name'      => 'EMPTY',
            'tab'       => 'tab-empty',
            'module'    => 'NONE'
        ];

        foreach($this->callPlugins('SettingsUser', 'tabs') as $module)
        {
            foreach($module as $link)
            {
                $tabs[] = array_merge($base, $link);
            }
        }

        array_multisort($tabs, SORT_REGULAR);

        $module = $tabs[0]['module'];
        $tab    = $tabs[0]['tab'];

        if($request->query->has('tab'))
            $tab = $request->query->get('tab');
        if($request->query->has('module'))
            $module = $request->query->get('module');


        return $this->render('form', [
            'tabs'    => $tabs,
            'content' => $this->get('package.plugin.manager')->callPlugin($module, 'SettingsUser', 'contents', [$tab]),
            'tab'     => $tab,
            'module'  => $module
        ]);
    }

    public function saveAction($request)
    {
        if($request->request->has('tab'))
            $tab = $request->request->get('tab');
        if($request->request->has('module'))
            $module = $request->request->get('module');

        if(! $tab || ! $module)
        {
            return $this->redirect('Settings', 'User', 'index');
        }

        $this->get('package.plugin.manager')->callPlugin($module, 'SettingsUser', 'update', [ $tab, $request ]);

        $this->flash('success', $this->t('settingsSaved'));

        return $this->redirect('Settings', 'User', 'index', [
            'module' => $module,
            'tab'    => $tab
        ]);
    }
}
