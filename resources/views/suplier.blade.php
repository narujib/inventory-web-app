@extends('layouts.main-layout')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

<div class="row">
    @livewire('suplier-list')
    @livewire('suplier-create')
</div>

</div>

@endsection