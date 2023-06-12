@extends('theme.master')

@section('konten')
    <div class="mb-1" id="data-master">
        @include('manajemen.datamaster');
    </div>
    <div class="mb-2" id="data-extra">
        @include('manajemen.dataextra');
    </div>
@endsection
