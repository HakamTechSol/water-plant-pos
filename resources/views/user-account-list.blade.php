<?php $page = "User Account Lists - Pure Water"; ?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
        @slot('title') Account Setting @endslot
        @slot('title_1') Manage Account Setting @endslot
        @endcomponent
        <meta name="csrf-token" content="{{csrf_token() }}">
        <div class="card">
            <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('error') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <h4>All Accounts</h4>
                <hr>
                <div class="table-responsive">
                    <table class="table datanew" id="producttble">
                        <thead>
                            <tr>
                                <th>S. No</th>
                                <th>Email</th>
                                <th>User name</th>
                                <th>Password</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($users as $users5)
                            <tr>
                                <?php $i = $i + 1; ?>
                                <td>{{ $i }}</td>
                                <td>{{$users5->email}}</td>
                                <td>{{$users5->name}}</td>
                                <td>{{$users5->password}}</td>
                                <td>{{$users5->role}}</td>
                                <td>
                                    <a class="me-3" href="{{ route('edit-user-account',[$users5->id]) }}">
                                        <img src="{{ URL::asset('/assets/img/icons/edit.svg')}}" alt="img">
                                    </a>
                                    <a class="confirm-text" onclick="deleteuser('{{$users5->id}}')">
                                        <img src="{{ URL::asset('/assets/img/icons/delete.svg')}}" alt="img">
                                    </a>
                                </td>
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