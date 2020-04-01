@extends('layouts.master')

@section('content')
@include('flash::message')
<nav class="breadcrumb mb-0">
    <a class="breadcrumb-item" href="{{ route('participants.index') }}">Participantes</a>
    <span class="breadcrumb-item active">{{ $participant->name }}</span>
</nav>
<div class="my-50 text-center">
    <h2 class="font-w700 text-black mb-10">
        <i class="fa fa-plus text-muted mr-5"></i> Editar Participante
    </h2>
</div>
<div class="block block-rounded block-fx-shadow">
    <div class="block-content">
        <form action="{{ route('participants.update', $participant->id) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
                 <!-- Institutiton -->
                 <h2 class="content-heading text-black">Institución</h2>
            <div class="row items-push">
                <div class="col-lg-4">
                    <p class="text-muted">
                        Institución a la que pertenece el estudiante.
                    </p>
                </div>
                <div class="col-lg-7 offset-lg-1">
                    <div class="form-group">
                        <label for="">Institución</label>
                        <select name="institution_id" class="js-select2 form-control" id="institution_id">
                            @foreach($institutions as $institution)
                            <option value="{{ $institution->id }}" @if($institution->id === $participant->institution_id) selected @endif>{{ $institution->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <!-- End Institution -->
            <!-- Photos -->
            <h2 class="content-heading text-black">Foto</h2>
            <div class="row items-push">
                <div class="col-lg-4">
                    <p class="text-muted">
                    <b>Requisitos para la fotografía:</b>
                        <br>
                        1. Debe ser solo del rostro.
                        <br>
                        2. Debe aparecer mirando la cámara directamente, con ambas orejas visibles.
                        <br>
                        3. Debe ser totalmente cuadrada (1:1), no rectangular.
                        <br>
                        4. El rostro debe estar totalmente descubierto, evitando peinados, sombreros o cualquier otro
                        artículo que dificulte visualizar el rostro fácilmente.
                        <br>
                        5. Deben tener un fondo blanco.
                        Esta es la fotografía que será usada para el gafete y el requisito clave es que la fotografía
                        identifique
                        claramente al participante.
                    </p>
                    <img class="img-avatar img-avatar48" src="{{ $participant->getImage() }}" alt="">
                </div>
                <div class="col-lg-7 offset-lg-1">
                    <div class="form-group">
                        <div class="custom-file form">
                            <input type="file" class="custom-file-input" id="photo" name="photo" data-toggle="custom-file-input">
                            <label class="custom-file-label" for="photo">Elige un archivo</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Photos -->

                <!-- General Information -->
                <h2 class="content-heading text-black">Información General</h2>
            <div class="row items-push">
                <div class="col-lg-3">
                    <p class="text-muted">
                        Información principal del Participante.
                    </p>
                </div>
                <div class="col-lg-7 offset-lg-1">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Nombre"
                            value="{{ $participant->name }}" required>
                        @if ($errors->has('name'))
                        <div class="text-danger">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="lastname">Apellido</label>
                        <input type="text" class="form-control form-control-lg" id="lastname" name="lastname"
                            placeholder="Apellido" value="{{ $participant->lastname }}" required>
                        @if ($errors->has('lastname'))
                        <div class="text-danger">{{ $errors->first('lastname') }}</div>
                        @endif
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="">Sexo</label>
                            <select class="form-control" name="gender">
                                <option value="{{ $participant->gender }}">{{ $participant->gender }}</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Masculino">Masculino</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Fecha de nacimiento</label>
                        <input type="date" class="form-control form-control-lg" id="date_birth" name="date_birth" value="{{ $participant->date_birth }}"
                            required>
                        @if ($errors->has('date_birth'))
                        <div class="text-danger">{{ $errors->first('date_birth') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="">Nivel de estudios</label>
                        <select class="form-control" name="academic_level">
                            <option value="{{ $participant->academic_level }}">{{ $participant->academic_level }}</option>
                            <option value="Básica">Básica</option>
                            <option value="Media">Media</option>
                            <option value="Grado">Grado</option>
                            <option value="Posgrado">Posgrado</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Categoria</label>
                        <select class="form-control" name="category">
                            <option value=""></option>
                            @foreach($categories as $category)
                                <option value="{{ $category->name }}" @if($category->name === $participant->category) selected @endif >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- Contact information -->
            <h2 class="content-heading text-black">Información de contacto</h2>
            <div class="row items-push">
                <div class="col-lg-3">
                    <p class="text-muted">
                        Información de contacto.
                    </p>
                </div>
                <div class="col-lg-7 offset-lg-1">
                    <div class="form-group row">
                        <div class="col-md-8">
                            <label for="re-listing-status">Email</label>
                            <input type="email" class="form-control form-control-lg" id="email" name="email"
                                placeholder="Email" value="{{ $participant->email }}" required>
                            @if ($errors->has('email'))
                            <div class="text-danger">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-8">
                            <label for="re-listing-status">Celular</label>
                            <input type="text" class="form-control form-control-lg" id="email" name="cellphone" value="{{ $participant->cellphone }}"
                                placeholder="Celular" required>
                            @if ($errors->has('cellphone'))
                            <div class="text-danger">{{ $errors->first('cellphone') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-8">
                            <label for="re-listing-status">Teléfono residencial</label>
                            <input type="text" class="form-control form-control-lg" id="email" name="phone" value="{{ $participant->phone }}"
                                placeholder="Teléfono residencial" required>
                            @if ($errors->has('phone'))
                            <div class="text-danger">{{ $errors->first('phone') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-8">
                            <label for="re-listing-status">Dirección</label>
                            <input type="text" class="form-control form-control-lg" id="email" name="address" value="{{ $participant->address }}"
                                placeholder="Dirección" required>
                            @if ($errors->has('address'))
                            <div class="text-danger">{{ $errors->first('address') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>


            <h2 class="content-heading text-black">Información de emergencia</h2>
            <div class="row items-push">
                <div class="col-lg-3">
                    <p class="text-muted">
                        Información de emergencia.
                    </p>
                </div>
                <div class="col-lg-7 offset-lg-1">
                    <div class="form-group">
                        <label for="">Tipo de sangre</label>
                        <select class="form-control" name="blood_type">
                            <option value="{{ $participant->blood_type }}">{{ $participant->blood_type }}</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                        </select>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-8">
                            <label for="re-listing-status">Nombre del contacto de emergencia</label>
                            <input type="text" class="form-control form-control-lg"  name="emergency_contact_name" value="{{ $participant->emergency_contact_name }}"
                                placeholder="Nombre del contacto de emergencia" required>
                            @if ($errors->has('emergency_contact_name'))
                            <div class="text-danger">{{ $errors->first('emergency_contact_name') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-8">
                            <label for="re-listing-status">Celular del contacto de emergencia</label>
                            <input type="text" class="form-control form-control-lg" name="emergency_contact_cellphone" value="{{ $participant->emergency_contact_email }}"
                                placeholder="Celular del contacto de emergencia" required>
                            @if ($errors->has('emergency_contact_cellphone'))
                            <div class="text-danger">{{ $errors->first('emergency_contact_cellphone') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-8">
                            <label for="re-listing-status">Teléfono del contacto de emergencia</label>
                            <input type="text" class="form-control form-control-lg" name="emergency_contact_phone" value="{{ $participant->emergency_contact_phone }}"
                                placeholder="Celular del contacto de emergencia" required>
                            @if ($errors->has('emergency_contact_phone'))
                            <div class="text-danger">{{ $errors->first('emergency_contact_phone') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-8">
                            <label for="re-listing-status">Email del contacto de emergencia</label>
                            <input type="text" class="form-control form-control-lg" name="emergency_contact_email" value="{{ $participant->emergency_contact_email }}"
                                placeholder="Email del contacto de emergencia" required>
                            @if ($errors->has('emergency_contact_email'))
                            <div class="text-danger">{{ $errors->first('emergency_contact_email') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Relación con el contacto de emergencia (ej. padre, madre, tutor, pareja, etc)</label>
                        <input type="text" class="form-control" name="emergency_contact_relation" value="{{ $participant->emergency_contact_relation }}">
                    </div>

                </div>
            </div>
            <h2 class="content-heading text-black">Comisión</h2>
            <div class="row items-push">
                <div class="col-lg-3">
                    <p class="text-muted">
                        Comisión a la que va a pertenecer el Participante.
                    </p>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="form-group">
                        <label for="">Comisión</label>
                        <select class="js-select2 form-control" name="commission_id" id="commission">
                            <option selected="selected"></option>
                            @foreach($institutionsCommissions as $institutionCommission)
                            <option value="{{ $institutionCommission->id }}">{{ $institutionCommission->commission->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="form-group">
                        <label for="">Representación</label>
                        <select class="js-select2 form-control" name="commissionrepresentation_id" id="representation">
                        <option selected="selected" value="{{ $participant->getRepresentationId() }}">{{ $participant->getRepresentation() }}</option>
                        </select>
                    </div>
                </div>
            </div>

               <h2 class="content-heading text-black">Comentarios</h2>
            <div class="row items-push">
                <div class="col-lg-3">
                    <p class="text-muted">
                        Comentarios acerca de este participante.
                    </p>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="form-group">
                        <label for="">Comentario</label>
                        <textarea class="form-control" name="notes" id="" cols="50" rows="10">
                            {{ $participant->notes }}
                        </textarea>
                    </div>
                </div>
            </div>

            <!-- Documents -->
            <h2 class="content-heading text-black">Documentos</h2>
            <div class="row items-push">
                <div class="col-lg-3">
                    <p class="text-muted">
                        Foto del pasaporte del Participante.
                        <br>
                        <a href="{{ $participant->getPassportFile() }}"><i class="si si-doc fa-4x"></i></a>
                    </p>
                </div>
                <div class="col-lg-7 offset-lg-1">
                    <div class="form-group">
                        <div class="custom-file form">
                            <input type="file" class="custom-file-input" id="passport" name="passport"
                                data-toggle="custom-file-input">
                            <label class="custom-file-label" for="passport">Elige un archivo</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <p class="text-muted">
                        Documento de codigo de conducta del Participante.
                        <br>
                        <a href="{{ $participant->getConductFile() }}"><i class="si si-doc fa-4x"></i></a>
                    </p>
                </div>
                <div class="col-lg-7 offset-lg-1">
                    <div class="form-group">
                        <div class="custom-file form">
                            <input type="file" class="custom-file-input" id="conduct_code" name="conduct_code"
                                data-toggle="custom-file-input">
                            <label class="custom-file-label" for="conduct_code">Elige un archivo</label>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <p class="text-muted">
                        Recibo de pago inicial.
                        <br>
                        <a href="{{ $participant->getFpaymentFile() }}"><i class="si si-doc fa-4x"></i></a>
                    </p>
                </div>
                <div class="col-lg-7 offset-lg-1">
                    <div class="form-group">
                        <div class="custom-file form">
                            <input type="file" class="custom-file-input" id="first_payment" name="first_payment"
                                data-toggle="custom-file-input">
                            <label class="custom-file-label" for="first_payment">Elige un archivo</label>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <p class="text-muted">
                        Recibo de pago final.
                        <br>
                        <a href="{{ $participant->getFpaymentFile() }}"><i class="si si-doc fa-4x"></i></a>
                    </p>
                </div>
                <div class="col-lg-7 offset-lg-1">
                    <div class="form-group">
                        <div class="custom-file form">
                            <input type="file" class="custom-file-input" id="last_payment" name="last_payment"
                                data-toggle="custom-file-input">
                            <label class="custom-file-label" for="last_payment">Elige un archivo</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Documents -->

            <!-- Form Submission -->
            <div class="row items-push">
                <div class="col-lg-7 offset-lg-4">
                    <div class="form-group">
                        <button type="submit" class="btn btn-alt-success">
                            <i class="fa fa-plus mr-5"></i>
                            Guardar
                        </button>
                    </div>
                </div>
            </div>
            <!-- END Form Submission -->
        </form>
    </div>
</div>

@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('js/select2/css/select2.min.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('js/select2/js/select2.full.min.js') }}"></script>
<script>
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    jQuery(function () {
        Codebase.helpers(['select2']);
    });
</script>
<script>
    var $select = $('#representation');
    var $commission = $('#commission');
    $commission.on('change', changeValues);

    function changeValues(event) {
        
        var id = event.target.value;

        fetch(`/getrepresentations/${id}`).
        then((response) => response.json()).
        then((data) => {
            
            $select.empty();
            data.forEach(element => {
                var opt = document.createElement('option');

                opt.value = element.id
                opt.text = element.representation.name

                $select.append(opt, null);
            })
        });

    }
</script>
@endsection
