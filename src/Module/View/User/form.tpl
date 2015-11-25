<div class="page-header">
    <div class="page-header-content">
        <div class="page-title">
            <h1>
                <i class="fa fa-cog"></i>
                {{ t('mySettings') }}
            </h1>
        </div>
        <div class="heading-elements">
            <div class="heading-btn-group">
                <a href="#" data-form-submit="form" data-form-param="apply" class="btn btn-icon-block btn-link-success">
                    <i class="fa fa-save"></i>
                    <span>{{ t('apply') }}</span>
                </a>
                <a href="#" class="btn btn-icon-block btn-link-danger app-history-back">
                    <i class="fa fa-remove"></i>
                    <span>{{ t('cancel') }}</span>
                </a>
            </div>
        </div>
        <div class="heading-elements-toggle">
            <i class="fa fa-ellipsis-h"></i>
        </div>
    </div>
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="{{ createUrl() }}"><i class="fa fa-home"> </i>Verone</a></li>
            <li class="active"><a href="{{ createUrl('Settings', 'User', 'index', [ 'module' => $module, 'tab' => $tab ]) }}">{{ t('mySettings') }}</a></li>
        </ul>
    </div>
</div>

<form action="<?php echo $app->createUrl('Settings', 'User', 'save'); ?>" method="post" enctype="multipart/form-data" id="form" class="form-validation">
    <input type="hidden" name="module" value="{{ $module }}" />
    <input type="hidden" name="tab" value="{{ $tab }}" />
    <div class="with-static-sidebar" role="tabpanel">
        <div class="static-sidebar">
            <div class="list-group">
                @foreach $tabs
                    <a class="list-group-item <?php echo ($item['module'] == $module && $item['tab'] == $tab ? 'active' : ''); ?>" href="{{ createUrl('Settings', 'User', 'index', [ 'module' => $item['module'], 'tab' => $item['tab'] ] ) }}"><i class="{{ $item['icon'] }}"></i> {{ $item['name'] }}</a>
                @endforeach
            </div>
        </div>
        <div class="content tab-content">
            {{ $content| raw }}
        </div>
    </div>
</form>
