@extends('layouts.master')

@section('content')
@include('flash::message')
<nav class="breadcrumb mb-0">
    <a class="breadcrumb-item" href="{{ route('participants.index') }}">Participantes</a>
    <span class="breadcrumb-item active">{{ $participant->name }}</span>
</nav>

<div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title">Detalles del Participante</h3>
        <div class="block-options">
            @if(Auth::user()->isAdmin())
            <form action="{{ route('participants.complete', $participant->id) }}" method="POST" id="form">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="custom-control custom-checkbox mb-5">
                    <input class="custom-control-input" type="checkbox" name="is_completed" id="is_completed" value="1"
                        @if($participant->is_completed === 1) checked @endif>
                    <label class="custom-control-label" for="is_completed">Documentos validados?</label>
                </div>
            </form>
            @endif
            @if(Auth::user()->isAdmin())
            <a href="{{ route('pdf.participant', $participant->id) }}" class="btn btn-sm btn-secondary">
                Imprimir gafete <i class="fa fa-file-pdf-o"></i>
            </a>
            @endif
        </div>
    </div>
    <div class="block-content block-content-full">
        <h2 class="content-heading text-black">Información general</h2>
        <div class="row">
            <div class="col-sm-3">
                <img class="img-avatar img-avatar48" src="{{ $participant->getImage() }}" alt="">
            </div>

            <div class="col-sm-3">
                <b>Nombre</b>
                <p>{{ $participant->name }}</p>
            </div>

            <div class="col-sm-3">
                <b>Apellido</b>
                <p>{{ $participant->lastname }}</p>
            </div>

            <div class="col-sm-3">
                <b>Sexo</b>
                <p>{{ $participant->gender }}</p>
            </div>

            <div class="col-sm-3">
                <b>Nivel Academico</b>
                <p>{{ $participant->academic_level }}</p>
            </div>

            <div class="col-sm-3">
                <b>Fecha de nacimiento</b>
                <p>{{ $participant->date_birth }}</p>
            </div>

            <div class="col-sm-3">
                <b>Instutición</b>
                <p>{{ $participant->institution->name }}</p>
            </div>

            <div class="col-sm-3">
                <b>Categoria</b>
                <p>{{ $participant->category }}</p>
            </div>

            <div class="col-sm-3">
                <b>Comisión</b>
                <p>{{ $participant->getCommission() }}</p>
            </div>

            <div class="col-sm-3">
                <b>Representación</b>
                <p>{{ $participant->getRepresentation() }}</p>
            </div>
            <div class="col-sm-4">
                <b>Notas</b>
                <p>{{ $participant->notes }}</p>
            </div>
        </div>

        <h2 class="content-heading text-black">Información de contacto</h2>
        <div class="row">
            <div class="col-sm-3">
                <b>Celular</b>
                <p>{{ $participant->cellphone }}</p>
            </div>
            <div class="col-sm-3">
                <b>Email</b>
                <p>{{ $participant->email }}</p>
            </div>
            <div class="col-sm-3">
                <b>Teléfono</b>
                <p>{{ $participant->phone }}</p>
            </div>
            <div class="col-sm-3">
                <b>Dirección</b>
                <p>{{ $participant->address }}</p>
            </div>
        </div>

        <h2 class="content-heading text-black">Información de emergencia</h2>
        <div class="row">
            <div class="col-sm-3">
                <b>Tipo de sangre</b>
                <p>{{ $participant->blood_type }}</p>
            </div>
            <div class="col-sm-3">
                <b>Nombre contacto de emergencia</b>
                <p>{{ $participant->emergency_contact_name }}</p>
            </div>
            <div class="col-sm-3">
                <b>Celular contacto de emergencia</b>
                <p>{{ $participant->emergency_contact_cellphone }}</p>
            </div>

            <div class="col-sm-3">
                <b>Teléfono contacto de emergencia</b>
                <p>{{ $participant->emergency_contact_phone }}</p>
            </div>

            <div class="col-sm-3">
                <b>Email contacto de emergencia</b>
                <p>{{ $participant->emergency_contact_email }}</p>
            </div>

            <div class="col-sm-3">
                <b>Relacion con el contacto de emergencia</b>
                <p>{{ $participant->emergency_contact_relation }}</p>
            </div>

        </div>

    </div>
</div>

<div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title">Documentos</h3>
    </div>
    <div class="block-content block-content-full">
        <div class="row">
            <div class="col-md-3">
                <p class="text-muted text-center">
                    Foto de pasaporte del participante
                    <br>
                    <a href="{{ $participant->getPassportFile() }}" class="text-danger"><i class="fa fa-file-pdf-o fa-4x"></i></a>
                </p>
            </div>
            <div class="col-md-3">
                <p class="text-muted text-center">
                    Recibo de pago primer pago
                    <br>
                    <a href="{{ $participant->getFpaymentFile() }}" class="text-danger"><i class="fa fa-file-pdf-o fa-4x"></i></a>
                </p>
            </div>
            <div class="col-md-3">
                <p class="text-muted text-center">
                    Recibo de pago final
                    <br>
                    <a href="{{ $participant->getLpaymentFile() }}" class="text-danger"><i class="fa fa-file-pdf-o fa-4x"></i></a>
                </p>
            </div>
            <div class="col-md-3">
                <p class="text-muted text-center">
                    Documento de buena conducta
                    <br>
                    <a href="{{ $participant->getConductFile() }}" class="text-danger"><i class="fa fa-file-pdf-o fa-4x"></i></a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    var checkbox = document.getElementById('is_completed');
    var form = document.getElementById('form');
    checkbox.addEventListener('click', update)

    function update() {
        form.submit()
    }

</script>
@endsection
