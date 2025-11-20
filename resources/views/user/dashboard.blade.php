@extends('userlayouts.app')

@section('content')
<div class="container-fluid px-4 py-3">

    <div class="d-flex align-items-center mb-1">
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
        </a> --}}
    </div>

    @include('userlayouts.contentrow')

</div>
@endsection