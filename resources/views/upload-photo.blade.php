@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
@php
    if ($target == 'client') {
        $targetView = 'Cliente';
    }else {
        $targetView = 'Pagador';
    }
@endphp
<div class="team-boxed">
    <div class="ml-4">
        <a href="{{ route('legalcase.show', $id) }}" class="btn btn-warning text-white mt-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-big-left-filled" width="20" height="20" viewBox="0 0 24 28" stroke-width="2.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M9.586 4l-6.586 6.586a2 2 0 0 0 0 2.828l6.586 6.586a2 2 0 0 0 2.18 .434l.145 -.068a2 2 0 0 0 1.089 -1.78v-2.586h7a2 2 0 0 0 2 -2v-4l-.005 -.15a2 2 0 0 0 -1.995 -1.85l-7 -.001v-2.585a2 2 0 0 0 -3.414 -1.414z" stroke-width="0" fill="currentColor" />
            </svg>
            Volver
        </a>
    </div>
    <div class="container">
        <div class="box">
            <h3 class="name uppercase">{{ $targetView }}</h3>
        </div>
        <div class="card">
            <div class="m-4">
                <form action="#" method="post" enctype="multipart/form-data" accept="image/*">
                    @csrf
                    <label for="image" class="form-label">Ingrese la imagen del {{ $targetView }}</label>

                    @error('file')
                        <p class="small text-danger mt-1">Error al subir archivos</p>
                    @enderror
                    <input type="hidden" name="id" value="{{ $id }}">
                    <input type="hidden" name="target" value="{{ $target }}">
                    <label for="images" class="drop-container" id="dropcontainer">
                        <span class="drop-title">Buscar en mis archivos</span>
                        <input type="file" id="images" accept="image/*" name="file" required>
                    </label>
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Subir">
                </form>
            </div>
        </div>
    </div>
</div>


@stop

@section('css')
    <style>

        input[type=file]::file-selector-button {
            margin-right: 20px;
            border: none;
            background: #084cdf;
            padding: 10px 20px;
            border-radius: 10px;
            color: #fff;
            cursor: pointer;
            transition: background .2s ease-in-out;
        }

        input[type=file]::file-selector-button:hover {
            background: #0d45a5;
        }


        .drop-container {
            position: relative;
            display: flex;
            gap: 10px;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 200px;
            padding: 20px;
            border-radius: 10px;
            border: 2px dashed #555;
            color: #444;
            cursor: pointer;
            transition: background .2s ease-in-out, border .2s ease-in-out;
        }

        .drop-container:hover {
            background: #eee;
            border-color: #111;
        }

        .drop-container:hover .drop-title {
            color: #222;
        }

        .drop-title {
            color: #444;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            transition: color .2s ease-in-out;
        }

    </style>
@stop

@section('js')
@stop