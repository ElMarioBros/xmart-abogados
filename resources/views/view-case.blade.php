@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@stop

<style>


    @media (max-width:767px) {
    .team-boxed h2 {
        margin-bottom:25px;
        padding-top:25px;
        font-size:24px;
    }
    }

    .team-boxed .people {
    padding:8px 0 35px 0;
    }

</style>
@section('content')
<div class="">
    <div class="mx-3">
        @if (session('success'))
          <p class="alert alert-success text-white">
            {{ session('success') }} <a href="{{ route('dashboard') }}">Volver a la tabla</a>
          </p>
        @endif
        
        <x-back-button></x-back-button>
        <button type="button"  class="btn btn-success mt-2 ml-4" data-toggle="modal" data-target="#paymentModal">Agregar pago <i class="fas fa-fw fa-money-bill"></i></button>
        <button type="button"  class="btn btn-primary mt-2" data-toggle="modal" data-target="#satisfactionModal">Actualizar Satisfacción <i class="fa fa-fw fa-address-card"></i></button>
        <button type="button"  class="btn btn-secondary mt-2" data-toggle="modal" data-target="#audienceModal">Audiencias <i class="fas fa-fw fa-calendar"></i></button>
        
        <div class="row mt-3">
            <div class="col-md-3 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            @if ($case->client_photo)
                            <a href="{{ $case->client_photo }}" target="_blank">
                                <img src="{{ $case->client_photo }}" alt="{{ $case->client_name }}" class="rounded img-fluid" style="max-width: 110px">
                            </a>
                            @else
                                <img src="https://www.tenforums.com/geek/gars/images/2/types/thumb_15951118880user.png" alt="Nombre" class="rounded img-fluid" style="max-width: 110px">
                            @endif

                            <div class="mt-2 ml-2">
                                <h5>Cliente</h5>
                                <p>{{ $case->client_name }}</p>
                                @if ($case->client_photo)
                                    <a href="{{ route('legalcase.uploadPicture.show', ['target' => 'client', 'id' => $case->id]) }}" class="btn btn-outline-secondary">Cambiar imagen <i class="fa fa-fw fa-camera"></i></a>
                                @else
                                    <a href="{{ route('legalcase.uploadPicture.show', ['target' => 'client', 'id' => $case->id]) }}" class="btn btn-secondary">Asignar imagen <i class="fa fa-fw fa-camera"></i></a>
                                @endif
                            </div>
                        </div>

                        <div class="row mt-3">
                            @if ($case->payer_photo)
                            <a href="{{ $case->payer_photo }}" target="_blank">
                                <img src="{{ $case->payer_photo }}" alt="{{ $case->payer_name }}" class="rounded img-fluid" style="max-width: 110px">
                            </a>
                            @else
                                <img src="https://www.tenforums.com/geek/gars/images/2/types/thumb_15951118880user.png" alt="Nombre" class="rounded img-fluid" style="max-width: 110px">
                            @endif

                            <div class="mt-2 ml-2">
                                <h5>Pagador</h5>
                                <p>{{ $case->payer_name }}</p>
                                @if ($case->payer_photo)
                                    <a href="{{ route('legalcase.uploadPicture.show', ['target' => 'payer', 'id' => $case->id]) }}" class="btn btn-outline-secondary">Cambiar imagen <i class="fa fa-fw fa-camera"></i></a>
                                @else
                                    <a href="{{ route('legalcase.uploadPicture.show', ['target' => 'payer', 'id' => $case->id]) }}" class="btn btn-secondary">Asignar imagen <i class="fa fa-fw fa-camera"></i></a>
                                @endif
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <h4>Indicador Satisfacción</h4>
                            @switch($case->satisfaction_level)
                                @case(1)
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mood-angry" width="60" height="60" viewBox="0 0 24 24" stroke-width="2" stroke="#ff0000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M12 21a9 9 0 1 1 0 -18a9 9 0 0 1 0 18z" />
                                        <path d="M8 9l2 1" />
                                        <path d="M16 9l-2 1" />
                                        <path d="M14.5 16.05a3.5 3.5 0 0 0 -5 0" />
                                    </svg>
                                    @break
                                @case(2)
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mood-annoyed" width="60" height="60" viewBox="0 0 24 24" stroke-width="2" stroke="#f5c71a" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M12 21a9 9 0 1 1 0 -18a9 9 0 0 1 0 18z" />
                                        <path d="M15 14c-2 0 -3 1 -3.5 2.05" />
                                        <path d="M9 10h-.01" />
                                        <path d="M15 10h-.01" />
                                    </svg>
                                    @break
                                @case(3)
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mood-empty" width="60" height="60" viewBox="0 0 24 24" stroke-width="2" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                        <path d="M9 10l.01 0" />
                                        <path d="M15 10l.01 0" />
                                        <path d="M9 15l6 0" />
                                    </svg>
                                    @break
                                @case(4)
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mood-smile" width="60" height="60" viewBox="0 0 24 24" stroke-width="2" stroke="#7bb661" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                        <path d="M9 10l.01 0" />
                                        <path d="M15 10l.01 0" />
                                        <path d="M9.5 15a3.5 3.5 0 0 0 5 0" />
                                    </svg>
                                    @break
                                @case(5)
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mood-happy" width="60" height="60" viewBox="0 0 24 24" stroke-width="2" stroke="#008000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                        <path d="M9 9l.01 0" />
                                        <path d="M15 9l.01 0" />
                                        <path d="M8 13a4 4 0 1 0 8 0h-8" />
                                    </svg>
                                    @break
                            
                                @default
                                    
                            @endswitch

                        </div>
                        <div class="mt-2 text-center">
                            <h4>Saldo pendiente</h4>
                            <h3 class="text-gray"> 
                                @if ($case->honorarium_currency == "mxn")
                                    <span class="text-danger">MX$</span>
                                @else
                                    <span class="text-success">US$</span>
                                    
                                @endif
                                {{ number_format($remaining_payment, 2) }}</h3>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="text-center">Historial de pagos</h5>
                        <div style="max-height: 200px; overflow:scroll; scrollbar-width: thin; overflow-x: hidden;">
                            @if ($payments->count() > 0)
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Registrado el</th>
                                    <th scope="col"></th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payments as $payment)
                                        <tr>
                                            <td>
                                                @if ($case->honorarium_currency == "mxn")
                                                    <span class="text-danger">MX$</span>
                                                @else
                                                    <span class="text-success">US$</span>
                                                    
                                                @endif
                                                {{ number_format($payment->value, 2) }}
                                            </td>
                                            <td>{{ $payment->created_at }}</td>
                                            <td>{{ $payment->created_at->diffForHumans() }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                              </table>
                            @else
                                <p class="text-center text-gray">No hay pagos registrados</p>
                            @endif
                        </div>
                        <p class="ml-5"></p>
                    </div>
                </div>

            </div>

            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                    <div class="row ">
                        <div class="col-sm-6">
                            <h6 class="mb-0">Número de Caso: <b>{{ $case->file_number }}</b> </h6>
                        </div>
                        <div class="col-sm-6">
                            <h6 class="mb-0">Ubicación del expediente: <b>{{ $case->drawer_number }}</b> </h6>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">Proyecto</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            {{ $case->project_name }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">Tipo de proyecto</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            {{ $case->form_type }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">Honorarios Totales</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            $ {{ number_format($case->honorarium, 2) }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">Validación del Despacho de Abogados</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            @if ($case->law_firm_validation)
                                Caso Validado
                            @else
                                Caso no Validado
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <h6 class="mb-0 sm-text-right">Tipo de cliente</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            <b>{{ $case->client_type }}</b>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <h6 class="mb-0 sm-text-right">Nombre del cliente</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            {{ $case->client_name }}
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <h6 class="mb-0 sm-text-right">Telefono del cliente</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            {{ $case->client_phone }}
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <h6 class="mb-0 sm-text-right">Correo del cliente</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            {{ $case->client_email }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0 sm-text-right">Dirección del cliente</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            {{ $case->client_address }}
                        </div>
                    </div>
                    <hr/>
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <h6 class="mb-0 sm-text-right">Tipo de contraparte</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            <b>{{ $case->defendant_type }}</b>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <h6 class="mb-0 sm-text-right">Nombre del contraparte</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            {{ $case->defendant_name }}
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <h6 class="mb-0 sm-text-right">Telefono del contraparte</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            {{ $case->defendant_phone }}
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <h6 class="mb-0 sm-text-right">Correo del contraparte</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            {{ $case->defendant_email }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0 sm-text-right">Dirección del contraparte</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            {{ $case->defendant_address }}
                        </div>
                    </div>

                    <hr/>
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <h6 class="mb-0 sm-text-right">Nombre del pagador</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            {{ $case->payer_name }}
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <h6 class="mb-0 sm-text-right">Telefono del pagador</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            {{ $case->payer_phone }}
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <h6 class="mb-0 sm-text-right">Correo del pagador</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            {{ $case->payer_email }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0 sm-text-right">Dirección del pagador</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            {{ $case->payer_address }}
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h6 class="mb-0">Observaciones</h6>
                        </div>
                        <div class="col-sm-12 text-secondary">
                            {{ $case->observations }}
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="satisfactionModal" tabindex="-1" role="dialog" aria-labelledby="satisfactionModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="satisfactionModal">Actualizar satisfacción</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('legalcase.updateSatisfaction', $case->id) }}" method="POST">
            @csrf
            <div class="modal-body text-center">
                <div class="row">
                    <label for="satisfaction_level_1" class="col-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mood-angry" width="60" height="60" viewBox="0 0 24 24" stroke-width="2" stroke="#ff0000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M12 21a9 9 0 1 1 0 -18a9 9 0 0 1 0 18z" />
                            <path d="M8 9l2 1" />
                            <path d="M16 9l-2 1" />
                            <path d="M14.5 16.05a3.5 3.5 0 0 0 -5 0" />
                        </svg>
                    </label>
                    <label for="satisfaction_level_2" class="col-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mood-annoyed" width="60" height="60" viewBox="0 0 24 24" stroke-width="1.5" stroke="#f5c71a" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M12 21a9 9 0 1 1 0 -18a9 9 0 0 1 0 18z" />
                            <path d="M15 14c-2 0 -3 1 -3.5 2.05" />
                            <path d="M9 10h-.01" />
                            <path d="M15 10h-.01" />
                        </svg>
                    </label>
                    <label for="satisfaction_level_3" class="col-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mood-empty" width="60" height="60" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                            <path d="M9 10l.01 0" />
                            <path d="M15 10l.01 0" />
                            <path d="M9 15l6 0" />
                        </svg>
                    </label>
                    <label for="satisfaction_level_4" class="col-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mood-smile" width="60" height="60" viewBox="0 0 24 24" stroke-width="1.5" stroke="#7bb661" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                            <path d="M9 10l.01 0" />
                            <path d="M15 10l.01 0" />
                            <path d="M9.5 15a3.5 3.5 0 0 0 5 0" />
                        </svg>
                    </label>
                    <label for="satisfaction_level_5" class="col-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mood-happy" width="60" height="60" viewBox="0 0 24 24" stroke-width="1.5" stroke="#008000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                            <path d="M9 9l.01 0" />
                            <path d="M15 9l.01 0" />
                            <path d="M8 13a4 4 0 1 0 8 0h-8" />
                        </svg>
                    </label>

                    <input type="radio" class="col-3" name="satisfaction_level" id="satisfaction_level_1" value="1">
                    <input type="radio" class="col-2" name="satisfaction_level" id="satisfaction_level_2" value="2">
                    <input type="radio" class="col-2" name="satisfaction_level" id="satisfaction_level_3" value="3">
                    <input type="radio" class="col-2" name="satisfaction_level" id="satisfaction_level_4" value="4">
                    <input type="radio" class="col-3" name="satisfaction_level" id="satisfaction_level_5" value="5">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <input type="submit" class="btn btn-primary" value="Guardar Cambios">
            </div>
        </form>
      </div>
    </div>
</div>

<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="paymentModal">Agregar nuevo pago</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('legalcase.make-payment', $case->id) }}" method="POST">
            @csrf
            <div class="modal-body text-center">
                <h3 >
                    El pago será en
                    @if ($case->honorarium_currency == "mxn")
                    <span class="text-danger font-weight-bold"> 
                        Pesos
                    </span>
                    @else
                    <span class="text-success font-weight-bold"> 
                        Dolares
                    </span>
                    @endif
                </h3>
                <div class="row">

                    <label class="form-label" for="value">Cantidad de pago </label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                        @if ($case->honorarium_currency == "mxn")
                            <div class="input-group-text text-danger">MX$</div>
                        @else
                            <div class="input-group-text text-success">US$</div>
                        @endif
                        </div>
                        <input type="number" class="form-control" id="value" placeholder="Ej. 30000" name="value" required>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <input type="submit" class="btn btn-primary" value="Hacer Pago">
            </div>
        </form>
      </div>
    </div>
</div>

<div class="modal fade" id="audienceModal" tabindex="-1" role="dialog" aria-labelledby="audienceModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="audienceModal">Audiencias</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('audience.store', $case->id) }}" method="POST">
            @csrf
            <div class="modal-body text-center">
                <div class="form-group">
                    <label for="audienceDate">Fecha de nueva audiencia</label>
                    <input type="date" class="form-control w-50 m-auto" id="audienceDate" name="date">
                </div>
                <input type="submit" class="btn btn-primary w-50 m-auto text-center" value="Registrar nueva Fecha ">

                <div class="card mt-5">
                    <div class="card-body">
                        <h5 class="text-center">Historial de Audiencias</h5>
                        <div style="max-height: 200px; overflow:scroll; scrollbar-width: thin; overflow-x: hidden;">
                            @if ($audiences->count() > 0)
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">Fecha de Audiencia</th>
                                    <th scope="col">Fecha sin formato</th>
                                    <th scope="col">Registrada</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($audiences as $audience)
                                        <tr>
                                            <td>{{ ucfirst(\Carbon\Carbon::parse($audience->date)->translatedFormat('F j, Y')) }} </td>
                                            <td>{{ $audience->date }}</td>
                                            <td>{{ $audience->created_at->diffForHumans() }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                              </table>
                            @else
                                <p class="text-center text-gray">No hay fechas de audiencia registradas</p>
                            @endif
                        </div>
                        <p class="ml-5"></p>
                    </div>
                </div>

            </div>
        </form>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>

@stop

@section('css')

@stop

@section('js')

@stop