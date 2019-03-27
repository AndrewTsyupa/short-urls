@extends('layout')

@section('content')
    <div class="col-md-12 order-md-1">


        <h1><a href="{{$shortUrl}}">{{$shortUrl}}</a></h1>


        <table class="table table-bordered">
            <tr>
                <td>User Ip</td>
                <td>User agent</td>
                <td>User Data</td>
            </tr>

            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->getIp() }}</td>
                    <td>{{ $user->user_agent }}</td>
                    <td>{{ $user->userDataRow() }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>

        {{ $users->links() }}


        <h3 class="text-center">All Url Visit</h3>
        <table class="table table-bordered">
            <tr>
                <td>User Ip</td>
                <td>User agent</td>
                <td>User Data</td>
            </tr>

            <tbody>
            @foreach ($all_visits as $visits)
                <tr>
                    <td>{{ $visits->getIp() }}</td>
                    <td>{{ $visits->user_agent }}</td>
                    <td>{{ $visits->userDataRow() }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>

    </div>
@endsection