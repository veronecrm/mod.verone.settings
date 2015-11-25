<?php
/**
 * Verone CRM | http://www.veronecrm.com
 *
 * @copyright  Copyright (C) 2015 Adam Banaszkiewicz
 * @license    GNU General Public License version 3; see license.txt
 */

namespace App\Module\Settings\Plugin;

use CRM\App\Module\Plugin;

class HistoryLog extends Plugin
{
    public function retrieve($changes, $module, $entity, $id)
    {
        if($module == 'Settings' && $entity == 'General' && $id == 0)
        {
            $fields = [
                'language' => $this->t('defaultLanguage'),
                'currency' => $this->t('defaultCurrency'),
                'timezone' => $this->t('defaultTimezone')
            ];

            foreach($changes as $change)
            {
                if($change->getField() == 'language')
                {
                    foreach($this->get('helper.language')->all() as $lang)
                    {
                        if($lang->code == $change->getPre())
                        {
                            $change->setPre($this->t('lng'.$lang->code));
                        }

                        if($lang->code == $change->getPost())
                        {
                            $change->setPost($this->t('lng'.$lang->code));
                        }
                    }
                }

                if($change->getField() == 'currency')
                {
                    foreach($this->get('helper.currency')->all() as $currency)
                    {
                        if($currency->id == $change->getPre())
                        {
                            $change->setPre($currency->name.' ('.$currency->symbol.')');
                        }

                        if($currency->id == $change->getPost())
                        {
                            $change->setPost($currency->name.' ('.$currency->symbol.')');
                        }
                    }
                }

                if($change->getField() == 'timezone')
                {
                    foreach($this->get('helper.timezone')->all() as $timezone)
                    {
                        if($timezone->id == $change->getPre())
                        {
                            $change->setPre($timezone->name);
                        }

                        if($timezone->id == $change->getPost())
                        {
                            $change->setPost($timezone->name);
                        }
                    }
                }

                foreach($fields as $field => $name)
                {
                    if($change->getField() == $field)
                    {
                        $change->setField($name);
                    }
                }
            }
        }

        if($module == 'Settings' && $entity == 'Company' && $id == 0)
        {
            $fields = [
                'company.name'     => $this->t('settingsCompanyName'),
                'company.address'  => $this->t('settingsCompanyAddress'),
                'company.fullname' => $this->t('settingsCompanyFullName')
            ];

            foreach($changes as $change)
            {
                foreach($fields as $field => $name)
                {
                    if($change->getField() == $field)
                    {
                        $change->setField($name);
                    }
                }
            }
        }
    }
}
