<?php $page = "Plant List - Pure Water"; ?> 
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
        @slot('title') Plant List @endslot
        @slot('title_1') Manage your Plants @endslot
        @endcomponent
        <!-- /product list -->
        <div class="card">
            <meta name="csrf-token" content="{{ csrf_token() }}">
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
                    <div class="search-set">
                        <div class="search-input">
                            <a class="btn btn-searchset"><img src="{{ URL::asset('/assets/img/icons/search-white.svg')}}" alt="img"></a>
                        </div>
                    </div>
                    <div class="wordset">
                        <ul>
                            {{-- <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="{{ URL::asset('/assets/img/icons/pdf.svg')}}" alt="img"></a>
                            </li>
                            <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="{{ URL::asset('/assets/img/icons/excel.svg')}}" alt="img"></a> --}}
                            </li>
                            {{-- <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="{{ URL::asset('/assets/img/icons/printer.svg')}}" alt="img"></a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
              
                <div class="table-responsive">
                    <table class="table  datanew">
                        <thead>
                            <tr>
                                <!-- <th>
                                    <label class="checkboxs">
                                        <input type="checkbox" id="select-all">
                                        <span class="checkmarks"></span>
                                    </label>
                                </th> -->
                                <th>S. No</th>
                                <th>Date</th>
                                <th>Plant Name</th>
                                <th>Specification name</th>
                                <th>Total</th>
                                <th>Created By</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $sno=1;
                            @endphp
                            @foreach ($plants as $plant)

                            <tr>
                                <!-- <td>
                                    <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label>
                                </td> -->
                                <td>{{$sno}}</td>
                                <td>{{ $plant->date }}</td>
                                <td>{{ $plant->plant_name }}</td>
                                <td>{!! $plant->specification->specificationname !!}</td>
                                <td>PKR {{ $plant->total_amount }}</td>
                                <td>{{ ucfirst($plant->user_info->name) }}</td>
                                <td class="text-center">
                                            <a data-bs-toggle="tooltip" data-bs-original-title="View Plant" href="{{ route('view.plant', ['id' => $plant->id]) }}" class="">
                                                <img src="{{ URL::asset('/assets/img/icons/eye1.svg')}}" class="me-2" alt="img">
                                            </a>
                                        
                                            <a data-bs-toggle="tooltip" data-bs-original-title="Edit Plant" href="{{ route('edit.plant', ['id' => $plant->id]) }}" class="">
                                                <img src="{{ URL::asset('/assets/img/icons/edit.svg')}}" class="me-2" alt="img">
                                            </a>
                                        
                                            <a data-bs-toggle="tooltip" data-bs-original-title="Delete Plant" onclick="deleteplant('{{$plant->id}}')" class="">
                                                <img src="{{ URL::asset('/assets/img/icons/delete1.svg')}}" class="me-2" alt="img">
                                            </a>

                                    </ul>
                                </td>
                            </tr>
                            @php
                            $sno++;
                            @endphp
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /product list -->
    </div>
</div>
@component('components.modal-popup')
@endcomponent
@endsection
