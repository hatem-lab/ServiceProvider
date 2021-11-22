
@extends('layouts.admin')
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> {{Lang::get('all.all medications',[],getCurrentLang())}} </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{Lang::get('all.dashboard',[],getCurrentLang())}}</a>
                                </li>
                                <li class="breadcrumb-item active">{{Lang::get('all.all medications',[],getCurrentLang())}}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <a  href="{{route('admin.medications.create')}}" class=" btn btn-outline-primary " data-effect="effect-scale"
                                    >  {{Lang::get('all.Add medications',[],getCurrentLang())}}</a>
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

                                @include('dashboard.includes.alerts.success')
                                @include('dashboard.includes.alerts.errors')

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead class="">
                                            <tr>
                                                <th>{{Lang::get('all.medication_name',[],getCurrentLang())}} </th>
                                                <th>{{Lang::get('all.medication_cost',[],getCurrentLang())}} </th>
                                                <th>{{Lang::get('all.commercial_name',[],getCurrentLang())}} </th>
                                                <th>{{Lang::get('all.category',[],getCurrentLang())}} </th>
                                                <th>{{Lang::get('all.company',[],getCurrentLang())}} </th>
                                                <th>{{Lang::get('all.contraindication',[],getCurrentLang())}} </th>


                                                <th>{{Lang::get('all.methods',[],getCurrentLang())}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($medications)
                                                @foreach($medications as $medication)

                                                    <tr>
                                                        <td>{{$medication -> medication_name}}</td>
                                                        <td>{{$medication -> medication_cost}}</td>
                                                        <td>{{$medication -> commercial_name}}</td>
                                                        <td>{{$medication -> category->name}}</td>
                                                        <td>{{$medication -> company->company_name}}</td>
                                                        <td>{{$medication -> contraindication->title}}</td>

                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">

                                                                <a href="{{route('admin.medications.edit',$medication->id)}}"
                                                                   class="btn btn-outline-primary  box-shadow-3 mr-1 mb-1"><i class="la la-pencil-square-o" aria-hidden="true"></i>
                                                                </a>

                                                                <a href="{{route('admin.medications.show',$medication->id)}}"
                                                                   class="btn btn-outline-success  box-shadow-3 mr-1 mb-1"><i class="la la-eye" aria-hidden="true"></i>
                                                                </a>

                                                                <a href="{{route('admin.medications.delete',$medication->id)}}"
                                                                   class="btn btn-outline-danger box-shadow-3 mr-1 mb-1"><i class="la la-trash" aria-hidden="true"></i></a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endisset


                                            </tbody>
                                        </table>
                                        <div class="justify-content-center d-flex">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

@stop
