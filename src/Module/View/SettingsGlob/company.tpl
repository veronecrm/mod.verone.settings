@no-extends

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{ t('settingsGeneralCompany') }}</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="app-company-name" class="control-label">{{ t('settingsCompanyName') }}</label>
                        <textarea name="company_name" id="app-company-name" class="form-control auto-grow">{{ $settings->get('company.name') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="app-company-address" class="control-label">{{ t('settingsCompanyAddress') }}</label>
                        <textarea name="company_address" id="app-company-address" class="form-control auto-grow">{{ $settings->get('company.address') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="app-company-fullname" class="control-label">{{ t('settingsCompanyFullName') }} <a href="#" class="btn-company-help-format help-inline" data-toggle="tooltip" title="{{ t('help') }}"><i class="fa fa-support"></i></a></label>
                        <textarea name="company_fullname" id="app-company-fullname" class="form-control auto-grow">{{ $settings->get('company.fullname') }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
