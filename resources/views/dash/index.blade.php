@extends('maindash')

@section('title','| Home')


@section('content')


      <!-- Products Section -->
    <div class="container-fluid">

      <header> 
        <h1 class="h3 display pt-4 pb-4">Tables</h1>
      </header>

      <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>Basic Table</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Font Awsome</th>
                          <th>Brand</th>
                          <th>Description</th>
                          <th>Price</th>
                          <th>Action</th>
                          <th>Availablity</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($products as $product)
                        <tr>
                          <th scope="row">1</th>
                          <td class="plantmore-product-thumbnail"><a href="#"><img class="img-fluid cartimg" src="{{ asset('images/'.$product->imagePath)}}" alt=""></a></td>
                          <td>{{ $product->title->name }}</td>
                          <td>{{ $product->description }}</td>
                          <td>{{ $product->price }}</td>
                          <td><a href="{{ route('deladmin',$product->id) }}" class="btn pcart badge badge-danger ml-auto">Delete</a><a href="{{ route('admin.edit',$product->id) }}" class="btn pcart badge badge-primary ml-1">Edit</a></td>
                          <td></td>
                          <td>@mdo</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
      </div>

    </div>
      <!-- End of Products Section-->
      
      

      <!-- Products Section -->
      
      <!-- End of Products Section-->
      
      <footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <p>Your company &copy; 2017-2019</p>
            </div>
            <div class="col-sm-6 text-right">
              <p>Design by <a href="https://bootstrapious.com" class="external">Bootstrapious</a></p>
              <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :)-->
            </div>
          </div>
        </div>
      </footer>
    </div>


@endsection
