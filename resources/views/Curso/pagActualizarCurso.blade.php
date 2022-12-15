@extends('pagPlantilla') 

@section('titulo')
    <h1 class="display-4">Página de lista </h1>
@endsection

@section('seccion')
    @if(session('msj'))
        <div class="alert alert-success">
            {{ session('msj') }}
        </div>
    @endif

    <div class="btn btn-success d-grid fs-5 mb-2">Registrar nuevo seguimiento...</div>

    <form action="{{ route('Curso.xUpdateCurso', $xActCurso->id) }}" method="post" class="d-grid gap-2">
        @method('PUT')
        @csrf


        @error('denCur')
            <div class="alert alert-danger">
                El nombre de curso es requerido 
            </div>
        @enderror


        <input type="text" name="denCur" placeholder="Denominación de Curso" value="{{ old('denCur')}}" class="form-control mb-1">
        <input type="number" name="hrsCur" placeholder="Horas" value="{{ old('hrsCur')}}" class="form-control mb-1">
        <input type="number" name="creCur" placeholder="Créditos" value="{{ old('creCur')}}" class="form-control mb-1">
        <input type="number" name="plaCur" placeholder="Año de plan de estudios" value="{{ old('plaCur')}}" class="form-control mb-1">
        <select name="tipCur" class="form-control mb-1">
            <option value="">Seleccione...</option>
            <option value="transversal" @if($xActCurso->tipCur == 1) {{ "SELECTED" }} @endif>Turno Día(1)</option>
            <option value="especialidad" @if($xActCurso->tipCur == 2) {{ "SELECTED" }} @endif>Turno Noche(2)</option>
        </select>
        <select name="estCur" class="form-control mb-1">
            <option value="">Seleccione...</option>
            <option value="0" @if ($xActCurso->estCur ==0){{ "SELECTED" }} @endif>Inactivo</option>
            <option value="1" @if ($xActCurso->estCur ==1){{ "SELECTED" }} @endif>Activo</option>
        </select>
        <button class="btn btn-danger" type="submit">Agregar</button>
    </form>
  
@endsection