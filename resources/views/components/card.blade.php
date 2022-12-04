<div>
    <div class="box">
        <div class="box-header with-border">
            <h4 class="box-title">{{ $title }}</h4>
            @isset($toolbar)
                <div class="box-controls pull-right">
                    <div class="box-header-actions">

                        {{ $toolbar }}

                    </div>
                </div>
            @endisset
        </div>
        <!-- /.box-header -->
        @isset($body)
            <div class="box-body no-padding">
                {{ $body }}
            </div>
        @endisset

        <!-- /.box-body -->
        @isset($footer)
            <div class="box-footer">
                {{ $footer }}
            </div>
        @endisset

    </div>
</div>
