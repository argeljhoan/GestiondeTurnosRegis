@extends('layouts.plantilla')

@section('content1')
<div class="container">
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('Turnos.Generar') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="col-md-10">
                                <input id="name" placeholder="Ingrese su Identificacion" type="number"
                                    class="form-control mt-5 @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-primary mt-5" type="submit">Generar</button>
                            </div>
                        </div>
                        <div class="mt-5">
                            @if (Session::has('error'))
                            <div id="error-message" class="alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                            @endif
                            @if (Session::has('success'))
                            <div id="success-message" class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/app.js') }}"></script>
<script>
    setTimeout(function() {
        var errorMessage = document.getElementById('error-message');
        if (errorMessage) {
            errorMessage.style.display = 'none';
        }
        var successMessage = document.getElementById('success-message');
        if (successMessage) {
            successMessage.style.display = 'none';
        }
    }, 7000);
</script>
@endsection