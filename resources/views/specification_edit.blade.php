<?php $page = "Edit Specification - Pure Water"; ?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
        @slot('title') Edit Specification @endslot
        @slot('title_1') Edit your Specification @endslot
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
                <form method="POST" action="{{route('edit_specification',[$specification->id])}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Specification Name</label>
                                <input type="text" name="specificationname" value="{{$specification->specificationname}}" class="form-control">
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('specificationname')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Part No</label>
                                <input type="text" name="partno" value="{{$specification->partno}}" class="form-control">
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('partno')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Capacity</label>
                                <input type="text" name="capacity" value="{{$specification->capacity}}" class="form-control">
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('capacity')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Booster Pump</label>
                                <input type="text" name="boosterpump" value="{{$specification->boosterpump}}" class="form-control">
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('boosterpump')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>High-Pressure Pump</label>
                                <input type="text" name="highpressurepump" value="{{$specification->highpressurepump}}" class="form-control">
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('highpressurepump')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Filter Housing</label>
                                <input type="text" name="filterhousing" value="{{$specification->filterhousing}}" class="form-control">
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('filterhousing')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>FRP Multimedia Vessels</label>
                                <input type="text" name="frpmultimedia" value="{{$specification->frpmultimedia}}" class="form-control">
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('frpmultimedia')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>FRP Membrane Housing</label>
                                <input type="text" name="frpmembranehousing" value="{{$specification->frpmembranehousing}}" class="form-control">
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('frpmembranehousing')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Membrane</label>
                                <input type="text" name="membrane" value="{{$specification->membrane}}" class="form-control">
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('membrane')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Water Quality Indicators</label>
                                <input type="text" name="waterqualityindicators" value="{{$specification->waterqualityindicators}}" class="form-control">
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('waterqualityindicators')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <!-- -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Flow Meters</label>
                                <input type="text" name="flowmeters" value="{{$specification->flowmeters}}" class="form-control">
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('flowmeters')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Pressure Gauges</label>
                                <input type="text" name="pressuregauges" value="{{$specification->pressuregauges}}" class="form-control">
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('pressuregauges')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Water Level Indicator</label>
                                <input type="text" name="waterlevelindicator" value="{{$specification->waterlevelindicator}}" class="form-control">
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('waterlevelindicator')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Low Pressure Switch</label>
                                <input type="text" name="lowpressureswitch" value="{{$specification->lowpressureswitch}}" class="form-control">
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('lowpressureswitch')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Auto Flash System</label>
                                <input type="text" name="autoflashsystem" value="{{$specification->autoflashsystem}}" class="form-control">
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('autoflashsystem')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>R O Frame Parts/Skid</label>
                                <input type="text" name="roframeparts" value="{{$specification->roframeparts}}" class="form-control">
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('roframeparts')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Electrical Controls</label>
                                <input type="text" name="electricalcontrols" value="{{$specification->electricalcontrols}}" class="form-control">
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('electricalcontrols')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>CIP System Clean-in-Place</label>
                                <input type="text" name="cip" value="{{$specification->cip}}" class="form-control">
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('cip')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Dimension (inches)</label>
                                <input type="text" name="dimension" value="{{$specification->dimension}}" class="form-control">
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('dimension')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>UV Sterilization</label>
                                <input type="text" name="uvsterilization" value="{{$specification->uvsterilization}}" class="form-control">
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('uvsterilization')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Mineralization</label>
                                <input type="text" name="mineralization" value="{{$specification->mineralization}}" class="form-control">
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('mineralization')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Assiscalant Chemical</label>
                                <input type="text" name="assiscalantchemical" value="{{$specification->assiscalantchemical}}" class="form-control">
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('assiscalantchemical')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Storage Tanks</label>
                                <input type="text" name="storagetanks" value="{{$specification->storagetanks}}" class="form-control">
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('storagetanks')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Feed Water Requirements</label>
                                <input type="text" name="feedwater" value="{{$specification->feedwater}}" class="form-control">
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('feedwater')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>TDS</label>
                                <input type="text" name="tds" value="{{$specification->tds}}" class="form-control">
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('tds')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>SDI</label>
                                <input type="text" name="sdi" value="{{$specification->sdi}}" class="form-control">
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('sdi')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Turbidity Level</label>
                                <input type="text" name="turbiditylevel" value="{{$specification->turbiditylevel}}" class="form-control">
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('turbiditylevel')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Iron</label>
                                <input type="text" name="iron" value="{{$specification->iron}}" class="form-control">
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('iron')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>PH</label>
                                <input type="text" name="ph" value="{{$specification->ph}}" class="form-control">
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('ph')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Oxidizer</label>
                                <input type="text" name="oxidizer" value="{{$specification->oxidizer}}" class="form-control">
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('oxidizer')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Hardness</label>
                                <input type="text" name="hardness" value="{{$specification->hardness}}" class="form-control">
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('hardness')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <!-- <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a> -->
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
