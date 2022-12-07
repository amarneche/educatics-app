<div>
    <div {{$attributes->merge(["class"=>"box"])}} >
       @isset( $image)
       {{$image}}
       @endisset

        <div class="box-header with-border">
            @isset($title)
                <div >{{ $title }}</div>
            @endisset
           
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
            <div  {{$body->attributes->merge(['class'=>'box-body'])}} >
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
