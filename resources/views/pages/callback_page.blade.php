@extends('layouts.homeLayout')

@section('content')
@if (session()->has('message'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">X</button>
    <p>{{ session()->get('message') }}</p>
</div>
@endif
@if (session()->has('error'))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">X</button>
    <p>{{ session()->get('error') }}</p>
</div>
@endif

<div class="container print">
    <div class="row">
    <div class="header col-md-5 bg-secondary text-center m-4 p-3">
    <h1>Payment Reciept</h1>
</div>
</div>
<div class="col-6 m-5 ">

    <table class="col-md-6 align-center">
        <tbody>
            
            <tr><td>Payment ID:</td><td>{{$data->id}}</td></tr>
            <tr><td>Payment Type:</td><td>{{$data->channel}}</td></tr>
            <tr><td>Payment Reference:</td><td>{{$data->reference}}</td></tr>
            <tr><td>Amount:</td><td>NGN {{$data->amount/100}}</td></tr>
            <tr><td>Fees:</td><td>NGN {{$data->fees/100}}</td></tr>
            <tr><td>Email:</td><td>{{$data->customer->email}}</td></tr>
            <tr><td>Customer ID:</td><td>{{$data->customer->id}}</td></tr>
            <tr><td>Name:</td><td>{{$data->customer->first_name}} </td></tr>
            <tr><td>Status:</td><td>{{$data->status}}</td></tr>
        </tbody>
    </table>
</div>
</div>

@endsection