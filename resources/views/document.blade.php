<?php $page="Document";?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper cardhead">
    <div class="content">
        @component('components.pageheader')
        @slot('title') Document @endslot
        @slot('title_1') Add/Update Document @endslot
        @endcomponent

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

                <form action="{{ route('store.document') }}" method="post">

                    @csrf

                    <div class="row">
                        <!-- Editor -->
                        <div class="col-md-12"> 
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Document</h5>
                                </div>
                                <div class="card-body">
                                    <textarea class="form-control" name="document" id="summernote">{!! $document ? $document->document : '' !!}</textarea>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="document_id" value="{!! $document ? $document->id : '' !!}">
                        <!-- /Editor -->
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">{!! $document ? 'Update' : 'Add' !!} Document</button>
                        </div>
                    </div>
                </form>
    </div>
</div>
@endsection
