<?php
/**
 * Verone CRM | http://www.veronecrm.com
 *
 * @copyright  Copyright (C) 2015 Adam Banaszkiewicz
 * @license    GNU General Public License version 3; see license.txt
 */

namespace App\Module\Settings\Plugin;

use CRM\App\Module\Plugin;

class Links extends Plugin
{
    public function dashboard()
    {
        if($this->acl('mod.Settings.Glob', 'mod.Settings')->isAllowed('core.read'))
        {
            return [
                [
                    'ordering' => 1,
                    'icon' => 'fa fa-cogs',
                    'icon-type' => 'class',
                    'name' => $this->t('settingsGlobal'),
                    'href' => $this->createUrl('Settings', 'Glob')
                ]
            ];
        }
    }
}
