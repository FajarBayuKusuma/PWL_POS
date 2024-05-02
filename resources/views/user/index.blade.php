@extends('layout.app')

{{-- Customize layout section --}}

@section('subtitle','Kategori')
@section('content_header_title','Home')
@section('content_header_subtitle','Kategori')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Manage Lelvel
                <div>
                    <a href="{{ url('/user/create') }}" class="btn btn-primary float-right"><i class="fas fa-plus-circle"></i> Add</a> <!-- Tambahkan tombol Add -->
                </div>
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush