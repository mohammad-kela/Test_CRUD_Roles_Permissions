@extends('layout.master')
@section('miancontent')
<section class="vh-100 gradient-custom">
      <div class="row justify-content-center align-items-center h-100">
             <div class="col-12 col-lg-9 col-xl-7">
               <div class="card shadow-2-strong card-registration p-3" style="border-radius: 15px;">
                <ul class="list-group list-group-light">
                  <li class="list-group-item px-3">{{$book->name}}</li>
                  <li class="list-group-item px-3">{{$book->price}}</li>
                  <li class="list-group-item px-3">{{$book->publitiondate}}</li>
                     <form action="{{route('book.destroy', $book->id)}}" method="POST">
                      @csrf
                         @method('DELETE')
                         <a class="btn btn-primary" href="{{ route('book.index') }}">BookList</a>
                         @can('isAdmin')
                         <a class="btn btn-primary" href="{{ route('book.create') }}">NewBook</a>
                         @endcan
                         @cannot('isReader')
                         <a class="btn btn-primary" href="{{ route('book.edit', $book->id) }}">edit</a>
                         @endcannot
                         @can('isAdmin')
                         <input type="submit" value="delete" class="btn btn-danger">
                         @endcan
                     </form>  
                </ul>
            </div>
        </div>
<div>
</section>
    @endsection
