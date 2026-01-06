@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->

    <div class="card">
        <div class="card-header">
<h1>Registrar Inscripciones</h1>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <livewire:inscripciones.frm-inscripciones />
            </div>
        </div>
        
        
        
    </div>
@endsection
