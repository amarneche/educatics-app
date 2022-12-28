<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">{{$data['title']}}</h3>
        <div class="d-inline-block align-items-center">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/"><i class="mdi mdi-home-outline"></i></a></li>
                    @foreach($data['links'] as $title=>$routeName)
                        <li class="breadcrumb-item @if($loop->last) active @endif" aria-current="page"  ><a href="{{route($routeName)}}">  {{$title}}</a></li>
                    @endforeach
                </ol>
            </nav>
        </div>
    </div>
    
</div>