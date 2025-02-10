@extends('layout.default')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form action="{{ route('step.create.step.three.post') }}" method="post" >
                    {{ csrf_field() }}
                    <div class="card">
                        <div class="card-header">Step 3: Review Details</div>

                        <div class="card-body">

                            <table class="table">
                                <tr>
                                    <td>Book name:</td>
                                    <td><strong>{{$book->name}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Book author:</td>
                                    <td><strong>{{$book->author}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Book description:</td>
                                    <td><strong>{{$book->description}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Genre:</td>
                                    <td><strong>{{$book->genre}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Year of publication:</td>
                                    <td><strong>{{$book->year_of_publication}}</strong></td>
                                </tr>
                            </table>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('step.create.step.two') }}" class="btn btn-danger pull-right">Previous</a>
                                </div>
                                <div class="col-md-6 text-end">
                                    <button type="submit" class="btn btn-success justify-content-end">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
