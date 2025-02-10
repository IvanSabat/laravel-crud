@extends('layout.default')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Manage book</div>

                    <div class="card-body">

                        <a href="{{ route('step.create.step.one') }}"
                           class="btn btn-primary pull-right" style="margin-bottom: 20px">
                            Create book
                        </a>

                        @if (Session::has('message'))
                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                        @endif
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Book Name</th>
                                <th scope="col">Book Description</th>
                                <th scope="col">Author</th>
                                <th scope="col">Genre</th>
                                <th scope="col">Year of publication</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <th scope="row">{{$book->id}}</th>
                                    <td>{{$book->name}}</td>
                                    <td>{{$book->description}}</td>
                                    <td>{{$book->author}}</td>
                                    <td>{{$book->genre}}</td>
                                    <td>{{$book->year_of_publication}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
