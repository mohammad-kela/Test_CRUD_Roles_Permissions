@extends('layout.master')
@section('miancontent')
{{-- {{$user = Auth::user()->roles;}} --}}
@can('isAdmin')
<a class="btn btn-primary m-2" href="{{ route('book.create') }}">RegisterNewBook</a>
@endcan
    <table class="table table-bordered border-primary mt-2">
        <tr>
            <th>#</th>
            <th>BookName</th>
            <th>BookPrice</th>
            <th>PublisherDate</th>
            <th>Operation</th>
        </tr>
        @php
        $i=1;
        @endphp
        @foreach ($books as $book)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$book->name}}</td>
            <td>{{$book->price}}</td>
            <td>{{$book->publitiondate}}</td>
            <td>
                <form action="{{route('book.destroy', $book->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    @can('isAdmin')
                    <input type="submit" value="delete" class="btn btn-danger">
                    @endcan
                    <a class="btn btn-info" href="{{ route('book.show', $book->id) }}">show</a>
                    @cannot('isReader')
                    <a class="btn btn-primary" href="{{ route('book.edit', $book->id) }}">edit</a>
                    @endcannot
                </form>              
            </td>
        </tr>
        @endforeach
    </table>

   @if($message = Session::get('success'))
     <p>
       {{ $message }}
     </p>
 @endif
 @endsection
