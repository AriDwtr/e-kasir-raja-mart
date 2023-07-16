@extends('theme.master')

@section('konten')
    <div class="mb-5" id="data-master">
        @include('manajemen.datamaster')
    </div>
    <div class="mb-5" id="data-master">
        @include('manajemen.datareport')
    </div>
    <div class="mb-3" id="data-extra">
        @include('manajemen.dataextra')
    </div>
@endsection
