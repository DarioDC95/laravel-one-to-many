@extends('layouts.admin')

@section('content')
    <main>
        <section>
            <div class="container">
                <div class="row my-5">
                    <div class="col-12">
                        <h2>Modifica il progetto selezionato</h2>
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->all() as $value)
                            <div class="text-danger">{{ $value }}</div>
                        @endforeach
                    @endif
                </div>
                <div class="row">    
                    <div class="col-12">
                        <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST">
                        @csrf
                        @method('PUT')
                            <div class="form-group mb-4">
                                <label class="control-label">Titolo</label>
                                <input type="text" class="form-control" placeholder="Inserisci un nuovo titolo" id="title" name="title" value="{{ old('title', $project) }}">
                                @error('title')
                                    @foreach ($errors->get('title') as $value)
                                        <div class="text-danger">{{ $value }}</div>
                                    @endforeach
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label class="control-label">Tipologia</label>
                                <select class="form-select" id="type_id" name="type_id">
                                    <option value="" selected disabled>Scegli una Tipologia</option>
                                    @foreach ($types as $item)
                                        <option value="{{ $item->id }}" @selected(old('id', $item) == $project->type_id)>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('type_id')
                                    @foreach ($errors->get('type_id') as $value)
                                        <div class="text-danger">{{ $value }}</div>
                                    @endforeach
                                @enderror
                            </div>
                            <div class="form-group mb-5">
                                <label class="control-label">Contenuto</label>
                                <textarea type="text" class="form-control" placeholder="Inserisci una nuova Descrizione" id="content" name="content">{{ old('content', $project) }}</textarea>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Salva Modifica</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection