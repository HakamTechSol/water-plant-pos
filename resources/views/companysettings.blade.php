<?php $page = "Company Settings - Pure Water"; ?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
        @slot('title') Official Company Setting @endslot
        @slot('title_1') Manage Official Company Setting @endslot
        @endcomponent
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

                @if(!$company->isEmpty())
                @foreach ($company as $company1)
                @if($company1->type =='Official')
                <form action="{{route('updatecompanysettings',[$company1->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <img src="{{ asset('storage/companylogo/'.$company1->Logo)}}" alt="logo" height="150px" width="100px"/>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="hidden" value="Official" name="companytype"/>
                                <label>Company </label>
                                <input type="text" placeholder="Enter Company Name" value="{{$company1->Name}}" name="name">
                                <div class="text-danger ">
                                    @error('0')
                                    {{$message}}
                                    @enderror
                                    @error('name')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Company NTN </label>
                                <input type="text" placeholder="Enter Company NTN" value="{{$company1->NTN}}" name="ntn">
                                <div class="text-danger ">
                                    @error('0')
                                    {{$message}}
                                    @enderror
                                    @error('ntn')
                                    {{$message}}
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email </label>
                                <input type="text" placeholder="Enter Company Email" value="{{$company1->Email}}" name="email">
                                <div class="text-danger ">
                                    @error('0')
                                    {{$message}}
                                    @enderror
                                    @error('email')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Phone </label>
                                <input type="text" placeholder="Enter Phone Number" value="{{$company1->Phone}}" name="phone">
                                <div class="text-danger ">
                                    @error('0')
                                    {{$message}}
                                    @enderror
                                    @error('phone')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Whatsapp </label>
                                <input type="text" placeholder="Enter Whatsapp Number" value="{{$company1->Whatsapp}}" name="whatsapp">
                                <div class="text-danger ">
                                    @error('0')
                                    {{$message}}
                                    @enderror
                                    @error('whatsapp')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Website </label>
                                <input type="text" placeholder="Enter Website Link" value="{{$company1->Website}}" name="website">
                                <div class="text-danger ">
                                    @error('0')
                                    {{$message}}
                                    @enderror
                                    @error('website')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Facebook Page </label>
                                <input type="text" placeholder="Enter Facebook Page Link" value="{{$company1->facebook}}" name="facebook">
                                <div class="text-danger ">
                                    @error('0')
                                    {{$message}}
                                    @enderror
                                    @error('facebook')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Instagram Page </label>
                                <input type="text" placeholder="Enter Instagram Page Link" value="{{$company1->Insta}}" name="instagram">
                                <div class="text-danger ">
                                    @error('0')
                                    {{$message}}
                                    @enderror
                                    @error('instagram')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address<span class="manitory">*</span> </label>
                                <input type="text" placeholder="Enter Address" value="{{$company1->address}}" name="address">
                                <div class="text-danger ">
                                    @error('0')
                                    {{$message}}
                                    @enderror
                                    @error('address')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <button class="btn btn-submit me-2" type="submit">Update</button>
                                <!-- <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a> -->
                            </div>
                        </div>
                    </div>
                </form>
                @endif
                @endforeach
                @else
                <form action="{{route('addcompanysettings')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Company </label>
                                <input type="text" placeholder="Enter Company Name" name="name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Company NTN </label>
                                <input type="text" placeholder="Enter Company NTN" name="ntn">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email </label>
                                <input type="text" placeholder="Enter Company Email" name="email">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Phone </label>
                                <input type="text" placeholder="Enter Phone Number" name="phone">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Whatsapp </label>
                                <input type="text" placeholder="Enter Whatsapp Number" name="whatsapp">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Website </label>
                                <input type="text" placeholder="Enter Website Link" name="website">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Facebook Page </label>
                                <input type="text" placeholder="Enter Facebook Page Link" name="facebook">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Instagram Page </label>
                                <input type="text" placeholder="Enter Instagram Page Link" name="instagram">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address<span class="manitory">*</span> </label>
                                <input type="text" placeholder="Enter Address" name="address">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <button class="btn btn-submit me-2" type="submit">Submit</button>
                                <!-- <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a> -->
                            </div>
                        </div>
                    </div>
                </form>
                @endif
            </div>
        </div>
        @component('components.pageheader')
        @slot('title') Unofficial Company Setting @endslot
        @slot('title_1') Manage Unofficial Company Setting @endslot
        @endcomponent
        <div class="card">
            <div class="card-body">
                @if(!$company->isEmpty())
                @foreach ($company as $company1)
                @if($company1->type=='Unofficial')
                <form action="{{route('updatecompanysettings',[$company1->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <img src="{{ asset('storage/companylogo/'.$company1->Logo)}}" alt="logo" height="150px" width="100px"/>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                            <input type="hidden" value="Unofficial" name="companytype"/>
                                <label>Company </label>
                                <input type="text" placeholder="Enter Company Name" value="{{$company1->Name}}" name="name">
                                <div class="text-danger ">
                                    @error('0')
                                    {{$message}}
                                    @enderror
                                    @error('name')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Company NTN </label>
                                <input type="text" placeholder="Enter Company NTN" value="{{$company1->NTN}}" name="ntn">
                                <div class="text-danger ">
                                    @error('0')
                                    {{$message}}
                                    @enderror
                                    @error('ntn')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email </label>
                                <input type="text" placeholder="Enter Company Email" value="{{$company1->Email}}" name="email">
                                <div class="text-danger ">
                                    @error('0')
                                    {{$message}}
                                    @enderror
                                    @error('email')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Phone </label>
                                <input type="text" placeholder="Enter Phone Number" value="{{$company1->Phone}}" name="phone">
                                <div class="text-danger ">
                                    @error('0')
                                    {{$message}}
                                    @enderror
                                    @error('phone')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Whatsapp </label>
                                <input type="text" placeholder="Enter Whatsapp Number" value="{{$company1->Whatsapp}}" name="whatsapp">
                                <div class="text-danger ">
                                    @error('0')
                                    {{$message}}
                                    @enderror
                                    @error('whatsapp')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Website </label>
                                <input type="text" placeholder="Enter Website Link" value="{{$company1->Website}}" name="website">
                                <div class="text-danger ">
                                    @error('0')
                                    {{$message}}
                                    @enderror
                                    @error('website')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Facebook Page </label>
                                <input type="text" placeholder="Enter Facebook Page Link" value="{{$company1->facebook}}" name="facebook">
                                <div class="text-danger ">
                                    @error('0')
                                    {{$message}}
                                    @enderror
                                    @error('facebook')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Instagram Page </label>
                                <input type="text" placeholder="Enter Instagram Page Link" value="{{$company1->Insta}}" name="instagram">
                                <div class="text-danger ">
                                    @error('0')
                                    {{$message}}
                                    @enderror
                                    @error('instagram')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address<span class="manitory">*</span> </label>
                                <input type="text" placeholder="Enter Address" value="{{$company1->address}}" name="address">
                                <div class="text-danger ">
                                    @error('0')
                                    {{$message}}
                                    @enderror
                                    @error('address')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <button class="btn btn-submit me-2" type="submit">Update</button>
                                <!-- <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a> -->
                            </div>
                        </div>
                    </div>
                </form>
                @endif
                @endforeach
                @else
                <form action="{{route('addcompanysettings')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Company </label>
                                <input type="text" placeholder="Enter Company Name" name="name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Company NTN </label>
                                <input type="text" placeholder="Enter Company NTN" name="ntn">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email </label>
                                <input type="text" placeholder="Enter Company Email" name="email">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Phone </label>
                                <input type="text" placeholder="Enter Phone Number" name="phone">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Whatsapp </label>
                                <input type="text" placeholder="Enter Whatsapp Number" name="whatsapp">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Website </label>
                                <input type="text" placeholder="Enter Website Link" name="website">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Facebook Page </label>
                                <input type="text" placeholder="Enter Facebook Page Link" name="facebook">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Instagram Page </label>
                                <input type="text" placeholder="Enter Instagram Page Link" name="instagram">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address<span class="manitory">*</span> </label>
                                <input type="text" placeholder="Enter Address" name="address">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <button class="btn btn-submit me-2" type="submit">Submit</button>
                                <!-- <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a> -->
                            </div>
                        </div>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection