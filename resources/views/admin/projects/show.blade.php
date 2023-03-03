@extends('layouts.admin')

@section('content')
    <main>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12 my-5">
                        <h2>{{ $project->title }}</h2>
                    </div>
                    <div class="col-12 mb-5">
                        @if ($project->types)
                            <div>Tipologia: {{ $project->types->name }}</div>              
                        @else
                            <div class="text-secondary">NON contiene tipologia</div>
                        @endif
                    </div>
                    <div class="col-12">
                        <h4>Contenuto:</h4>
                        <p>{{ $project->content }}</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection