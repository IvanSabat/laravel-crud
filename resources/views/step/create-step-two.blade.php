@extends('layout.default')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form action="{{ route('step.create.step.two.post') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">Step 2: Genre</div>

                        <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{--                            <div class="form-group">--}}
                            {{--                                <label for="description">Book is published</label><br/>--}}
                            {{--                                <label class="radio-inline"><input type="radio" name="is_published" value="1" {{{ (isset($book->is_published) && $book->is_published == '1') ? "checked" : "" }}}> Published</label>--}}
                            {{--                                <label class="radio-inline"><input type="radio" name="is_published" value="0" {{{ (isset($book->is_published) && $book->is_published == '0') ? "checked" : "" }}}> Not published</label>--}}
                            {{--                            </div>--}}

                            <div class="form-group">
                                <label for="description">Genre</label>
                                <input type="text" value="{{{ $book->genre ?? '' }}}" class="form-control"
                                       id="bookAmount" name="genre"/>
                            </div>

                            <div class="form-group">
                                <label for="description">Year of publication</label>
                                <input type="text" value="{{{ $book->year_of_publication ?? '' }}}" class="form-control"
                                       id="bookAmount" name="year_of_publication"/>
                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('step.create.step.one') }}" class="btn btn-danger pull-right">Previous</a>
                                </div>
                                <div class="col-md-6 text-end">
                                    <button type="submit" class="btn btn-primary">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
