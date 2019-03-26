@extends('layout')

@section('content')
    <div class="col-md-12 order-md-1">
        <h4 class="mb-3">URL</h4>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form id="form" action="url" method="post" class="form-horizontal">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-6">
                    <input type="text" class="form-control" id="url" name="url" placeholder="http://google.com"
                           value="https://gucci.com"
                           required>

                </div>
                <div class="col-3">
                    <input type="text" class="form-control" name="code" placeholder="Code, only a-z, A-Z, 0-9" value="">
                </div>

                <div class="col-3">
                    <input type="text" class="form-control datepicker" name="date_expired" value="">
                </div>

                <div class="col-md-6 mb-3">
                    <button type="submit" class="btn form-control btn-secondary">Уменьшить</button>
                </div>
            </div>

        </form>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('.datepicker').datepicker({
                format: 'dd-mm-yyyy'
            });
        })
    </script>
@endsection