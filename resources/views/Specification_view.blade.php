<?php $page="Specification Details - Pure Water";?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
        @slot('title') Specification Details @endslot
        @slot('title_1') Full details of specification @endslot
        @endcomponent
        <!-- /add -->

        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="bar-code-view">
                            <h6>{{$specification->specificationname}}</h6>
                        </div>
                        <div class="productdetails">
                            <ul class="product-bar">
                                <li>
                                    <h4>Part No</h4>
                                    <h6>{{$specification->partno}}</h6>
                                </li>
                                <li>
                                    <h4>Capacity</h4>
                                    <h6>{{$specification->capacity}}</h6>
                                </li>
                                <li>
                                    <h4>Booster Pump</h4>
                                    <h6>{{$specification->boosterpump}}</h6>
                                </li>
                                <li>
                                    <h4>High-Pressure Pump</h4>
                                    <h6>{{$specification->highpressurepump}}</h6>
                                </li>
                                <li>
                                    <h4>Filter Housing/5-Micron Filter</h4>
                                    <h6>{{$specification->filterhousing}}</h6>
                                </li>
                                <li>
                                    <h4>FRP Multimedia Vessels</h4>
                                    <h6>{{$specification->frpmultimedia}}</h6>
                                </li>
                                <li>
                                    <h4>FRP Membrane Casing</h4>
                                    <h6>{{$specification->frpmembranehousing}}</h6>
                                </li>
                                <li>
                                    <h4>Membrane</h4>
                                    <h6>{{$specification->membrane}}</h6>
                                </li>
                                <li>
                                    <h4>Water Quality Indicators</h4>
                                    <h6>{{$specification->waterqualityindicators}}</h6>
                                </li>
                                <li>
                                    <h4>Flow Meters</h4>
                                    <h6>{{$specification->flowmeters}}</h6>
                                </li>
                                <li>
                                    <h4>Pressure Gauges</h4>
                                    <h6>{{$specification->pressuregauges}}</h6>
                                </li>
                                <li>
                                    <h4>Water Level Indicator</h4>
                                    <h6>{{$specification->waterlevelindicator}}</h6>
                                </li>
                                <li>
                                    <h4>Low Pressure Switch</h4>
                                    <h6>{{$specification->lowpressureswitch}}</h6>
                                </li>
                                <li>
                                    <h4>Auto Flash System</h4>
                                    <h6>{{$specification->autoflashsystem}}</h6>
                                </li>
                                <li>
                                    <h4>R O Frame Parts/Skid</h4>
                                    <h6>{{$specification->roframeparts}}</h6>
                                </li>
                                <li>
                                    <h4>Electical Controls</h4>
                                    <h6>{{$specification->electricalcontrols}}</h6>
                                </li>
                                <li>
                                    <h4>CIP System Clean-In-Place</h4>
                                    <h6>{{$specification->cip}}</h6>
                                </li>
                                <li>
                                    <h4>Dimension (inches)</h4>
                                    <h6>{{$specification->dimension}}</h6>
                                </li>
                                <li>
                                    <h4>UV Sterilization</h4>
                                    <h6>{{$specification->uvsterilization}}</h6>
                                </li>
                                <li>
                                    <h4>Mineralization</h4>
                                    <h6>{{$specification->mineralization}}</h6>
                                </li>
                                <li>
                                    <h4>Antiscalant Chemical</h4>
                                    <h6>{{$specification->assiscalantchemical}}</h6>
                                </li>
                                <li>
                                    <h4>Storage Tanks</h4>
                                    <h6>{{$specification->storagetanks}}</h6>
                                </li>
                                <li>
                                    <h4>Feed Water Requirements</h4>
                                    <h6>{{$specification->feedwater}}</h6>
                                </li>
                                <li>
                                    <h4>TDS</h4>
                                    <h6>{{$specification->tds}}</h6>
                                </li>
                                <li>
                                    <h4>SDI</h4>
                                    <h6>{{$specification->sdi}}</h6>
                                </li>
                                <li>
                                    <h4>Turbidity Level</h4>
                                    <h6>{{$specification->turbiditylevel}}</h6>
                                </li>
                                <li>
                                    <h4>Iron</h4>
                                    <h6>{{$specification->iron}}</h6>
                                </li>
                                <li>
                                    <h4>PH</h4>
                                    <h6>{{$specification->ph}}</h6>
                                </li>
                                <li>
                                    <h4>Oxidizer</h4>
                                    <h6>{{$specification->oxidizer}}</h6>
                                </li>
                                <li>
                                    <h4>Hardness</h4>
                                    <h6>{{$specification->hardness}}</h6>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
