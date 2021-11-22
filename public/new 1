@include('header');

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            @if(auth()->user()->hasPermission('create_categories'))
            <a class="btn btn-primary" href="{{route('category.create')}}">Add Category</a>
            @else
            <a class="btn btn-primary disabled">Add Category</a>
            @endif
            <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" name="search" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


<div class="container" style="margin-left:100px">
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10">
            <div class="card">
              <div class="card-header" style="background-color:blue">
                <h3 class="card-title">categories</h3>
              </div>
              <!-- /.card-header -->
              @if(@categories->count()>0)
              <div class="card-body">
                <table class="table table-bordered">

                  <thead>
                    <tr>
                      <th style=" background-color:red" >#</th>
                      <th style="background-color:red">name</th>
                      
                      <th style="background-color:red">action</th>
                    </tr>
                  </thead>

                  @php
                $i=1;
                @endphp
                @foreach($categories as $item)
                  <tbody>
                    <tr>
                      <td>{{$i++}}</td>
                      <td style="color:green">{{$item->name}}</td>
                      <td style="color:green">{{$item->created_at->diffForHumans()}}</td>   
                      <td>
                   
                      <a class="btn btn-info" href="{{route('category.edit',$item->id)}}">Edit</a>
                      <a class="btn btn-danger" href="{{route('category.delete',$item->id)}}">Delete</a> 
                      </td>
                    </tr>
                    </tbody>
                    @endforeach
                  </table>
                  
                  </div>
                  <div class="card-footer clearfix">          
                 
                 
               
              </div>
                  
                  </div></div></div></div>
                  </section></div>

@include('footer');
</body>
</html>
