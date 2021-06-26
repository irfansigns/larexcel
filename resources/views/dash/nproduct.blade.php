@extends('maindash')

@section('title','| Home')

@section('stylesheets')

  
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

  <script>
    tinymce.init({ selector:'textarea' });
  </script>
  
@endsection

@section('content')

    
      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Tables       </li>
          </ul>
        </div>
      </div>

      <section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Forms            </h1>
          </header>
          <div class="row">
            <div class="col-lg-9">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>Basic Form</h4>
                </div>
                <div class="card-body">
                  <p>Lorem ipsum dolor sit amet consectetur.</p>
                  {!! Form::open(array('route' => 'admin.store','files'=>'true')) !!}
                  {!! csrf_field() !!}
                    <div class="form-group">       
                      {{ Form::label('description', 'Description') }}
                      {{ Form::text('description', null, array('class' => 'form-control','placeholder'=>'Price')) }}
                    </div>
                    <div class="form-group">       
                     {{ Form::label('price', 'Price') }}
                     {{ Form::text('price', null, array('class' => 'form-control','placeholder'=>'Price')) }}
                    </div>
                    <div class="form-group">       
                     {{ Form::label('qnty', 'Quantity') }}
                     {{ Form::text('qnty', null, array('class' => 'form-control','placeholder'=>'Quantity')) }}
                    </div>

                    {{ Form::label('details', 'Details:') }}
                    {{ Form::textarea('details', null, array('class' => 'form-control')) }}

                    

                    <!-- <div class="form-group">       
                      <input type="submit" value="Signin" class="btn btn-primary">
                    </div> -->

                    

                  
                </div>
              </div>
            </div>
            
            
          <div class="col-lg-3">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header d-flex align-items-center">
                    <h4>Categories</h4>
                  </div>
                  <div class="card-body">

                    @foreach($title as $titles)
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" value="{{$titles->id}}" name="title_id">{{$titles->name}}
                      </label>
                    </div>
                    @endforeach
                    
                  </div>
                </div>
              </div><!-- End of first col-12 -->

              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header d-flex align-items-center">
                    <h4>Upload Images</h4>
                  </div>
                  <div class="card-body text-center">
                    <div class="form-group">       
                      {{ Form::label('imagePath','Upload Master Image')}}
                      {{ Form::file('imagePath', array('class' => 'form-control'))}}
                    </div>

                    <div class="form-group">       
                     {{ Form::label('detailImage','Upload Detail Image')}}
                    <input type="file" name="detailImage[]" multiple="multiple" class="form-control">
                    </div>

                    {{ Form::submit('Create Product', array('class' => 'btn btn-primary')) }}
                  </div>
                </div>
              </div>     
              
            </div><!-- End of col-12 parent row -->
          </div><!-- End of LG-4 Column -->


          </div>
        </div>


       
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
