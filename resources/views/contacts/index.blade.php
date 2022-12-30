@extends('dashboard')
@section('content')

<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            {{-- <div class="pull-left">
                <h2>Alven International School SMS</h2>
            </div> --}}
            <div class="pull-right mb-2">
                {{-- <a class="btn btn-success" href="{{ route('categories.create') }}"> Add a Category</a> --}}
            </div>
        </div>
    </div>
    @if ($message = Session::get('message'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
               
                <th>Name</th>
                <th>Email</th>
                <th>subject</th>
                <th>Date</th>
                
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    
                    <td>{{ $contact->name}}</td>
                    <td>{{ $contact->email}}</td>
                    <td>{{ $contact->subject}}</td>
                    <td>{{ $contact->created_at}}</td>
                   
                   
                    <td>
                        <form action="{{ route('contact.destroy',$contact->id) }}" method="Post">
                            <a class="btn btn-primary" href="{{ route('contact.show', $contact->id) }}">Read</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
    {!! $contacts->links() !!}
</div>
    
@endsection