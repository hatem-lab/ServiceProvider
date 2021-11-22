@extends('layouts.admin')
@section('title')
Show Category
@stop
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/details.css')}}">

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">{{Lang::get('all.dashboard',[],getCurrentLang())}} </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admin.categories')}}">{{Lang::get('all.all categories',[],getCurrentLang())}}</a>
                                </li>
                                <li class="breadcrumb-item active"> {{Lang::get('all.Show Category',[],getCurrentLang())}}
                                </li>

                            </ol>
                            <br>
                            <br>
                             <a href="{{route('admin.categories.edit',$category->id)}}" class=" btn btn-outline-primary " data-effect="effect-scale"
                                      > Edit Category</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">


                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="card-content collapse show">
                                    <div class="card-body">

                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i>  <b> {{Lang::get('all.Category Description',[],getCurrentLang())}}</b> </h4>
                                                    <div class="card-content collapse show">
                                                          <div class="card-body card-dashboard">
                                                          <thead class="">
                                                             <th><b>{{Lang::get('all.type',[],getCurrentLang())}}</b></th>:{{ " " }}
                                                             <td>{{$category->name}}</td>
                                                            </thead>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="card-content collapse show">
                                                        <div class="card-body card-dashboard">
                                                        <thead class="">
                                                           <th><b>{{Lang::get('all.subcategories',[],getCurrentLang())}}</b></th>:
                                                           <td>
                                                           @foreach($category->subcategories as $sub)
                                                           {{$sub->name}}
                                                           @endforeach
                                                           </td>
                                                          </thead>
                                                      </div>
                                                  </div>
                                                <hr>
                                                <div class="card-content collapse show">
                                                    <div class="card-body card-dashboard">
                                                        <thead class="">
                                                        <th><b>{{Lang::get('all.Created At',[],getCurrentLang())}}</b></th>:{{ " " }}
                                                        <td>{{$category->created_at->diffForHumans()}}</td>
                                                        </thead>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>

@endsection

@section('script')



        $(document).ready(function()
        {
                $('#click1_1').addClass('btn-primary')
        });
    </script>
@stop
