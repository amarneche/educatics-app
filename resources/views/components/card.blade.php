<div>
    <div {{$attributes->merge(["class"=>"card "])}} >
       @isset( $image)
       {{$image}}
       @endisset

        <div class="card-header with-border">
            @isset($title)
                <div >{{ $title }}</div>
            @endisset
           
            @isset($toolbar)
                <div class="card-controls pull-right">
                    <div class="card-header-actions">

                        {{ $toolbar }}

                    </div>
                </div>
            @endisset
        </div>
        <!-- /.card-header -->
        @isset($body)
            <div  {{$body->attributes->merge(['class'=>'card-body'])}} >
                {{ $body }}
            </div>
        @endisset

        <!-- /.card-body -->
        @isset($footer)
            <div class="card-footer">
                {{ $footer }}
            </div>
        @endisset

    </div>
</div>
