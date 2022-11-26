@extends('layout.master')
@section('miancontent')
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-12 col-lg-9 col-xl-7">
          <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">
              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Book</h3>
             
              <form action="{{route('book.store')}}" method="post">
                @csrf
                <!-- BookName input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="BookName">BookName</label>
                  <input type="text" id="BookName" class="form-control" name="book_name" />
                </div>
              
                <!-- BookPrice input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="BookPrice">BookPrice</label>
                  <input type="number" id="BookPrice" class="form-control" name="book_price"/>
                </div>
                
                <!-- PublisherDate input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="BookPrice">PublisherDate</label>
                  <input type="date" id="PublisherDate" class="form-control" name="book_pubdate"/>
                </div>
                
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block">RegisterBook</button>
            </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection