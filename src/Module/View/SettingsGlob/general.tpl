@no-extends

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{ t('basicInformations') }}</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="app-language" class="control-label">{{ t('defaultLanguage') }}</label>
                        <select name="language" id="app-language" class="form-control">
                            <?php foreach($app->get('helper.language')->all() as $lang): ?>
                                <option value="{{ $lang->code }}"<?php echo ($settings->get('language') == $lang->code ? ' selected="selected"' : ''); ?>><?=$app->t('lng'.$lang->code)?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="app-currency" class="control-label">{{ t('defaultCurrency') }}</label>
                        <select name="currency" id="app-currency" class="form-control">
                            <?php foreach($app->get('helper.currency')->all() as $currency): ?>
                                <option value="{{ $currency->id }}"<?php echo ($settings->get('currency') == $currency->id ? ' selected="selected"' : ''); ?>>{{ $currency->name }} ({{ $currency->symbol }})</option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="app-timezone" class="control-label">{{ t('defaultTimezone') }}</label>
                        <select name="timezone" id="app-timezone" class="form-control">
                            <?php foreach($app->get('helper.timezone')->all() as $timezone): ?>
                                <option value="{{ $timezone->id }}"<?php echo ($settings->get('timezone') == $timezone->id ? ' selected="selected"' : ''); ?>>{{ $timezone->name }}</option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
