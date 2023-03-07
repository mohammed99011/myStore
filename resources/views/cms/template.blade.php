@extends('cms.parent')
@section('title' , 'Template')

@section('main_title','main Template')
@section('sub_title','sub Template')

@section('styles')
@endsection




@section('content')

<h1>hello</h1>
<ul>
    <li><a href="{{ route("tr") }}">about</a></li>
</ul>


@endsection


@section('scripts')
@endsection
