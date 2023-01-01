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

<div class="">
<section id="do_action">
    <div class="container">
        <div>
            {{-- <button class="btn btn-primary" onclick="printReceipt()">Print</button> --}}
            <a class="btn btn-warning" onclick="PrintElem('elem')" href="#"> Print</a>
        </div>
        <div class="heading">
            <h3 >Transaction Details</h3>
            <p>Find the details of your transaction below.</p>
            
        </div>
        <div class="row" id="elem">
            <div class="print" id="elem">
            <div class="col-sm-6 m-9">
                <div class="total_area">
                    <ul id="elem">
                        <li id="elem">Email:<span>{{$data->customer->email}}</span></li>
                        <li id="elem">Name:<span>{{$username}} </span></li>
                        <li id="elem">Payment Reference: <span>{{$data->reference}} </span></li>
                        <li id="elem">Customer ID:<span>{{$data->customer->id}}</span></li>
                        {{-- <li>Payment ID: <span>{{$data->id}} </span></li> --}}
                        <li id="elem">Payment Type: <span>{{$data->channel}}</span></li>
                        <li id="elem">Amount:<span>NGN {{$data->amount/100}}</span></li>
                        {{-- <li>Fees:<span>NGN {{$data->fees/100}}</span></li> --}}
                        <li id="elem">Status:<span>{{$data->status}}</span></li>
                    </ul>
                        
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
</div>

<script>
    

    
function PrintElem(elem)
{
    var mywindow = window.open('', 'PRINT', 'height=400,width=600');

    mywindow.document.write('<html><head><title>' + document.title  + '</title>');
    mywindow.document.write('</head><body >');
    mywindow.document.write('<h1>' + document.title  + '</h1>');
    mywindow.document.write(document.getElementById(elem).innerHTML);
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
    mywindow.close();

    return true;
}

</script>
@endsection