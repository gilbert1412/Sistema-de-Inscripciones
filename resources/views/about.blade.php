@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->

    <div class="card">
        <div class="card-header">

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                + Registrar Taller
            </button>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Registro de Talleres</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <livewire:talleres.frm-taller />
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
        <livewire:talleres.table-talleres /> 
        
    </div>
@endsection
