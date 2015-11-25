@no-extends
<div role="tabpanel" class="tab-pane active" id="mail">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ t('basicInformations') }}</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="layout-menu-behavior" class="control-label">{{ t('settingsUserLayoutMenuBehavior') }}</label>
                            <select name="layout_menu_behavior" id="layout-menu-behavior" class="form-control">
                                <option value="0"<?php echo ($settingsUser->get('layout.menu.behavior') == 0 ? ' selected="selected"' : ''); ?>>{{ t('settingsUserLayoutMenuBehavior0') }}</option>
                                <option value="1"<?php echo ($settingsUser->get('layout.menu.behavior') == 1 ? ' selected="selected"' : ''); ?>>{{ t('settingsUserLayoutMenuBehavior1') }}</option>
                                <option value="2"<?php echo ($settingsUser->get('layout.menu.behavior') == 2 ? ' selected="selected"' : ''); ?>>{{ t('settingsUserLayoutMenuBehavior2') }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
