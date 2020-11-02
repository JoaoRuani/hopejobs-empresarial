@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Audit</h1>
@endsection

@section('content')
    <table id="audit-table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Event</th>
            <th>URL</th>
            <th>Ip Address</th>
            <th>Browser</th>
            <th>Modified At</th>
            <th>User Id</th>
        </tr>
        </thead>
        <tbody>
            @foreach($audits as $audit)
            <?php $metadata = $audit->getMetadata(); ?>
            <tr>
                <td>{{$metadata['audit_id']}}</td>
                <td>{{$metadata['audit_event']}}</td>
                <td>{{$metadata['audit_url']}}</td>
                <td>{{$metadata['audit_ip_address']}}</td>
                <td>{{$metadata['audit_user_agent']}}</td>
                <td>{{$metadata['audit_created_at']}}</td>
                <td>{{$metadata['user_id']}}</td>
            </tr>
                @endforeach
        </tbody>

    </table>

@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/admin_custom.css') }}">
@endsection

@section('js')
    <script>
        $(document).ready( function () {
            $('#audit-table').DataTable();
        } );
    </script>
@endsection
