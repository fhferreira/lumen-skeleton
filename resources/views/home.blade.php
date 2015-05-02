@extends('layouts.master')

@section('title', 'Home')

@section('content')

    <div class="container" role="main">

        <div class="row">
            <div class="col-sm-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
                <h1 class="page-header text-center">Welcome to Acme!</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
                <br>
                @include('layouts.partials.flash')
                <div id="demo" class="text-center">
                    <h2 class="text-info">@{{ message }}</h2>
                    <br>
                    <input class="form-control" v-model="message" placeholder="ここ何でも入れていい">
                </div>
            </div>
        </div>

    </div>

@stop
