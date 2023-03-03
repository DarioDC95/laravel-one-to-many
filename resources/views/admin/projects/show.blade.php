@extends('layouts.admin')

@section('content')
    <main>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12 my-5">
                        <h2>{{ $project->title }}</h2>
                    </div>
                    <div class="col-12">
                        <p>{{ $project->content }}</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection