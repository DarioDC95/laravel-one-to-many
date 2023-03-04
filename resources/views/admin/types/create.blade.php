@extends('layouts.admin')

@section('content')
    <main>
        <section>
            <div class="container">
                <div class="row my-5">
                    <div class="col-12">
                        <h2>Inserisci una Nuova Tipologia</h2>
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->all() as $value)
                            <div class="text-danger">{{ $value }}</div>
                        @endforeach
                    @endif
                </div>
                <div class="row">    
                    <div class="col-12">
                        <form action="{{ route('admin.types.store') }}" method="POST">
                        @csrf
                            <div class="form-group mb-4">
                                <label class="control-label">Nome</label>
                                <input type="text" class="form-control" placeholder="Inserisci una Nuova Tipologia" id="name" name="name">
                                @error('name')
                                    @foreach ($errors->get('name') as $value)
                                        <div class="text-danger">{{ $value }}</div>
                                    @endforeach
                                @enderror
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Salva Tipologia</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection