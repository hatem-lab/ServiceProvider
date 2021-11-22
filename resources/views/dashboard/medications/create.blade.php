
@extends('layouts.admin')
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">{{Lang::get('all.dashboard',[],getCurrentLang())}} </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admin.medications')}}">  {{Lang::get('all.all medications',[],getCurrentLang())}} </a>
                                </li>
                                <li class="breadcrumb-item active">{{Lang::get('all.Add medications',[],getCurrentLang())}}
                                </li>
                            </ol>
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
                                    <h4 class="card-title" id="basic-layout-form"> {{Lang::get('all.Add medications',[],getCurrentLang())}} </h4>
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
                                    <div class="card-body">
                                        <form class="form"
                                              action="{{route('admin.medications.store')}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf



                                            <div class="form-body">

                                                <h4 class="form-section"><i class="ft-home"></i> {{Lang::get('all.medications data',[],getCurrentLang())}} </h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{Lang::get('all.medication_name',[],getCurrentLang())}}
                                                                 </label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('name')}}"
                                                                   name="medication_name">
                                                            @error("medication_name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{Lang::get('all.medication_cost',[],getCurrentLang())}}
                                                            </label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('name')}}"
                                                                   name="medication_cost">
                                                            @error("medication_cost")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{Lang::get('all.commercial_name',[],getCurrentLang())}}
                                                            </label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('name')}}"
                                                                   name="commercial_name">
                                                            @error("commercial_name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{Lang::get('all.category',[],getCurrentLang())}} </label>
                                                            <select name="category_id" multiple="multiple"
                                                                    class="select2 form-control">
                                                                <optgroup label="من فضلك أختر  فئة الدواء ">
                                                                    @if($categories && $categories -> count() > 0)
                                                                        @foreach($categories as $category)
                                                                            <option
                                                                                value="{{$category -> id }}"
                                                                                {{ (is_array(old('categories')) && in_array($category -> id, old('categories'))) ? ' selected' : '' }}
                                                                            >{{$category -> name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('categories')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput2">{{Lang::get('all.company',[],getCurrentLang())}} </label>
                                                            <select name="company_id" multiple="multiple"
                                                                    class="select2 form-control">
                                                                <optgroup label="من فضلك أختر  شركة الدواء ">
                                                                    @if($companies && $companies -> count() > 0)
                                                                        @foreach($companies as $company)
                                                                            <option
                                                                                value="{{$company -> id }}"
                                                                                {{ (is_array(old('companies')) && in_array($company -> id, old('companies'))) ? ' selected' : '' }}
                                                                            >{{$company -> company_name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('companies')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput2">{{Lang::get('all.contraindication',[],getCurrentLang())}} </label>
                                                            <select name="contraindication_id" multiple="multiple"
                                                                    class="select2 form-control">
                                                                <optgroup label="من فضلك أختر  موانع الدواء ">
                                                                    @if($contraindications && $contraindications -> count() > 0)
                                                                        @foreach($contraindications as $contraindication)
                                                                            <option
                                                                                value="{{$contraindication -> id }}"
                                                                                {{ (is_array(old('contraindication')) && in_array($contraindication -> id, old('contraindication'))) ? ' selected' : '' }}
                                                                            >{{$contraindication -> title}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('categories')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>


                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> {{Lang::get('all.back',[],getCurrentLang())}}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> {{Lang::get('all.update',[],getCurrentLang())}}
                                                </button>
                                            </div>
                                        </form>

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

    @stop
