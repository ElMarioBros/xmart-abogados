@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="mb-3 ml-5">Crear nuevo caso</h1>

    <div class="ml-5">
        <x-back-button></x-back-button>
    </div>

    @if (session('success'))
        <div class="alert alert-success w-50 m-auto mb-3" role="alert">
            {{ session('success') }}
        </div>
    @endif
@stop

@section('content')
<div class="w-50 m-auto mt-2">
    <form action="{{ route('legalcase.store') }}" method="POST">
        @csrf

        <h4 class="fs-5 mb-3">Informacion del caso</h4>
        <div class="mb-3">
            <label for="project_name" class="form-label">Nombre del Caso</label>
            <input type="text" class="form-control" id="project_name" name="project_name" required>
        </div>
        
        <div class="mb-3">
            <label for="form_type" class="form-label">Materia</label>

            <select class="form-control form-select-lg mb-3" id="form_type" name="form_type" required>
                <option selected disabled>Seleccione una opción</option>
                <option value="Familiar">Familiar</option>
                <option value="Civil">Civil</option>
                <option value="Laboral">Laboral</option>
                <option value="Amparo">Amparo</option>
                <option value="Mercantil">Mercantil</option>
                <option value="Penal">Penal</option>
                <option value="Ejecución">Ejecución</option>
                <option value="Administrativo">Administrativo</option>
                <option value="Federal">Federal</option>
                <option value="Hipotecario">Hipotecario</option>
                <option value="Varios">Vario</option>
                <option value="Apelacion">Apelacion</option>
                <option value="Registro de audiencias">Registro de audiencias</option>                
            </select>

        </div>

        <div class="mb-3">
            <label for="authority_criminal" class="form-label">Autoridad penal</label>
            <input type="text" class="form-control" id="authority_criminal" name="authority_criminal" required>
        </div>

        <div class="mb-3">
            <label for="authority_federal" class="form-label">Autoridad federal</label>
            <input type="text" class="form-control" id="authority_federal" name="authority_federal" required>
        </div>

        <hr>

        <div class="mb-3">
            <label for="file_number_type" class="form-label">Clasificacion</label>

            <select class="form-control form-select-lg mb-3" id="file_number_type" name="file_number_type" required>
                <option selected disabled>Seleccione una opción</option>
                <option value="Número de expediente">Número de expediente</option>
                <option value="NUC">NUC</option>
                <option value="Causa Penal">Causa Penal</option>
                <option value="Carpeta de Ejecución">Carpeta de Ejecución</option>
            </select>

        </div>
        
        <div class="mb-3">
            <label for="file_number" id="file_number_label" class="form-label"> <span class="text-gray">Seleccione una clasificación</span></label>
            <input type="text" class="form-control" id="file_number" name="file_number" required>
        </div>
        <hr>

        <h4 class="fs-5 mb-3 mt-5">Informacion de los implicados</h4>
        <h5 class="mt-3">Cliente</h5>
        <div class="mb-3">
            <label for="client_name" class="form-label">Nombre del Cliente</label>
            <input type="text" class="form-control" id="client_name" name="client_name" placeholder="Ej. Juan Sanchez Gonzalez" required>
        </div>

        <div class="mb-3">
            <label for="form_type" class="form-label">Tipo de cliente</label>

            <select class="form-control form-select-lg mb-3" id="client_type" name="client_type" required>
                <option selected disabled>Seleccione una opción</option>
                <option value="Victima">Victima</option>
                <option value="Imputado">Imputado</option>
                <option value="Ofendido">Ofendido</option>
                <option value="Quejoso">Quejoso</option>
                <option value="Actor">Actor</option>
                <option value="Demandado">Demandado</option>
                <option value="Sentanciado">Sentanciado</option>
                <option value="Tercer interesado">Tercer interesado</option>
                <option value="Procesado">Procesado</option>
            </select>

        </div>

        <div class="mb-3">
            <label for="client_email" class="form-label">Correo Electrónico del Cliente</label>
            <input type="text" class="form-control" id="client_email" name="client_email" placeholder="Ej. jsanchez@mail.com">
        </div>

        <div class="mb-3">
            <label for="client_phone" class="form-label">Teléfono del Cliente</label>
            <input type="text" class="form-control" id="client_phone" name="client_phone" placeholder="Ej. 686 258 9944">
        </div>

        <div class="mb-3">
            <label for="client_address" class="form-label">Dirección del Cliente</label>
            <input type="text" class="form-control" id="client_address" name="client_address" placeholder="Ej. Calle Rosal #331, Col. Juarez" req>
        </div>

        <hr/>
        <h5>Contraparte</h5>
        <div class="mb-3">
            <label for="defendant_name" class="form-label">Nombre del Contraparte</label>
            <input type="text" class="form-control" id="defendant_name" name="defendant_name" placeholder="Ej. Juan Sanchez Gonzalez" required>
        </div>
        
        <div class="mb-3">
            <label for="form_type" class="form-label">Tipo de Contraparte</label>

            <select class="form-control form-select-lg mb-3" id="defendant_type" name="defendant_type" required>
                <option selected disabled>Seleccione una opción</option>
                <option value="Victima">Victima</option>
                <option value="Implicado">Implicado</option>
                <option value="Ofendido">Ofendido</option>
                <option value="Quejoso">Quejoso</option>
                <option value="Actor">Actor</option>
                <option value="Demandado">Demandado</option>
                <option value="Sentanciado">Sentanciado</option>
                <option value="Tercer interesado">Tercer interesado</option>
                <option value="Procesado">Procesado</option>
            </select>

        </div>

        <div class="mb-3">
            <label for="defendant_email" class="form-label">Correo Electrónico del Contraparte</label>
            <input type="text" class="form-control" id="defendant_email" name="defendant_email" placeholder="Ej. jsanchez@mail.com">
        </div>

        <div class="mb-3">
            <label for="defendant_phone" class="form-label">Teléfono del Contraparte</label>
            <input type="text" class="form-control" id="defendant_phone" name="defendant_phone" placeholder="Ej. 686 258 9944">
        </div>

        <div class="mb-3">
            <label for="defendant_address" class="form-label">Dirección del Contraparte</label>
            <input type="text" class="form-control" id="defendant_address" name="defendant_address" placeholder="Ej. Calle Rosal #331, Col. Juarez">
        </div>

        <hr/>
        <h5>Pagador</h5>
        <div class="mb-3">
            <label for="payer_name" class="form-label">Nombre del Pagador</label>
            <input type="text" class="form-control" id="payer_name" name="payer_name" placeholder="Ej. Juan Sanchez Gonzalez" required>
        </div>
        
        <div class="mb-3">
            <label for="payer_email" class="form-label">Correo Electrónico del Pagador</label>
            <input type="text" class="form-control" id="payer_email" name="payer_email" placeholder="Ej. jsanchez@mail.com">
        </div>
        
        <div class="mb-3">
            <label for="payer_phone" class="form-label">Teléfono del Pagador</label>
            <input type="text" class="form-control" id="payer_phone" name="payer_phone" placeholder="Ej. 686 258 9944">
        </div>

        <div class="mb-3">
            <label for="payer_address" class="form-label">Dirección del Pagador</label>
            <input type="text" class="form-control" id="payer_address" name="payer_address" placeholder="Ej. Calle Rosal #331, Col. Juarez">
        </div>
        
        <h4 class="fs-5 mb-3 mt-5">Informacion adicional</h4>
        
        <div class="mb-3">
            <label for="observations" class="form-label">Observaciones</label>
            <textarea class="form-control" id="observations" name="observations"></textarea>
        </div>

        <div class="mb-3">
            <label for="drawer_number" class="form-label">Ubicación de expediente</label>
            <input type="text" class="form-control" id="drawer_number" name="drawer_number" required>
        </div>

        <div class="mb-3">
            <label class="form-label" for="honorarium">Honorarios</label>

            <div class="row mb-2">
                <div class="col-auto col-">
                    <div class="form-check mr-4">
                        <input class="form-check-input" type="radio" name="honorarium_currency" id="mxn" value="mxn" checked>
                        <label class="form-check-label" for="mxn">
                          MXN
                        </label>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="honorarium_currency" id="usd" value="usd" required>
                        <label class="form-check-label" for="usd">
                          USD
                        </label>
                    </div>
                </div>                
            </div>

            <div class="input-group mb-2">
                <div class="input-group-prepend">
                <div class="input-group-text">$</div>
                </div>
                <input type="number" class="form-control" id="honorarium" placeholder="Ej. 30000" name="honorarium" required>
            </div>
        </div>

        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="law_firm_validation" name="law_firm_validation">
                <label class="form-check-label" for="law_firm_validation">
                    Validación del Despacho de Abogados
                </label>
            </div>
        </div>


        <button type="submit" class="btn btn-primary mb-5">Registrar</button>
    </form>

</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    document.getElementById('file_number_type').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex].text;
        document.getElementById('file_number_label').innerText = selectedOption;
    });
</script>
@stop