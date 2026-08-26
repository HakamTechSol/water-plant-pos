<?php $page = "Add Attendance - Pure Water"; ?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
        @slot('title') Add Attendance @endslot
        @slot('title_1') Attendence Record @endslot
        @endcomponent
        <!-- /product list -->
        <div class="card">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <form action="{{ route('store.attendance') }}" method="post">

                @csrf

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
                    <div class="table-top">

                        <div class="text-center">
                            <h3 class="text-center">
                                Attendace For:
                                <input type="date" class="datepicker" id="attdatePicker" name="date" required>
                            </h3>
                        </div>

                        <div class="wordset">
                            <ul>
                                {{-- <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="{{ URL::asset('/assets/img/icons/pdf.svg')}}" alt="img"></a>
                                </li>
                                <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="{{ URL::asset('/assets/img/icons/excel.svg')}}" alt="img"></a>
                                </li> --}}
                                {{-- <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="{{ URL::asset('/assets/img/icons/printer.svg')}}" alt="img"></a>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table datanew">
                            <thead>
                                <tr>
                                    <th>Employee Name</th>
                                    <th>Attendance</th>
                                    <th>Hours Per Day</th>
                                </tr>
                            </thead>
                            <tbody id="AtteTable">
                                {{-- <tr>
                                    <td>{{ $info->Emp_FName }} {{ $info->Emp_LName }}</td>
                                <input type="hidden" name="emp_name[]" value="{{ $info->Emp_FName }}">
                                <td>{{ $info->Emp_Email }}</td>
                                <td>
                                    <select class="select" name="attendance[]">
                                        <option value="full_day">Full Day</option>
                                        <option value="half_day">Half Day</option>
                                        <option value="leave">Leave</option>
                                    </select>
                                </td>
                                <input type="hidden" name="emp_id[]" value="{{ $info->id }}">
                                </tr> --}}
                            </tbody>
                        </table>

                    </div>
                    <div class="mb-3" style="float: right;">
                        <button type="submit" class="btn btn-primary btn-lg mt-5"> <i class="fa fa-plus"></i> Update Attendance</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /product list -->
    </div>
</div>
@component('components.modal-popup')
@endcomponent
@endsection
