{{--<div class="page-bar">--}}
    {{--<ul class="page-breadcrumb">--}}
        {{--@foreach($breadcrumbs as $text => $link)--}}
            {{--<li>--}}
                {{--@if($link === '')--}}
                    {{--<span>{{ $text }}</span>--}}
                {{--@else--}}
                    {{--<a href="{{ $link }}">{{ $text }}</a>--}}
                    {{--<i class="fa fa-circle"></i>--}}
                {{--@endif--}}
            {{--</li>--}}
        {{--@endforeach--}}
    {{--</ul>--}}
{{--</div>--}}

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>