
@extends('layouts.admin')
@section('content')

     <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
     <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
    <style>
        body {
            transition: all 0.3s ease;
        }
        .wrapper {
            height: 100vh;
            width: 100vw;
            display: flex;
            flex-direction: column;
            background: red;
            margin: 50px;
        }
        .prescription_form {
            width: 100%;
            height: 100vh;

            background: white;
        }
        .prescription {
            width: 720px;
            height: 960px;
            margin: 0 auto;
            border: 1px solid lightgrey;
        }
        .prescription tr > td {
            padding: 15px;
        }
        .header1 {
            color: #333;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            margin-right: 40px;
            flex: 1;
        }
        .logo img {
            width: 120px;
            height: 120px;
            float: left;
        }
        .credentials {
            margin-left: 40px;
            flex: 1;
        }
        .credentials h4 {
            line-height: 1em;
            letter-spacing: 1px;
            font-weight: 700;
            margin: 0px;
            padding: 0px;
        }
        .credentials p {
            margin: 0 0 5px 0;
            padding: 3px 0px;
        }
        .credentials small {
            margin: 0;
            padding: 0;
            letter-spacing: 1px;
            padding-right: 80px;
        }
        .d-header {
            width: 100%;
            text-align: center;
            background: mediumseagreen;
            padding: 5px;
            color: white;
            font-weight: 800;
        }
        .symptoms,
        .tests,
        .advice {
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .symptoms ul,
        .tests ul {
            list-style: square;
            margin: 0;
            padding-left: 10px;
            height: 100%;
        }
        .advice p {
            letter-spacing: 0;
            font-size: 14px;
        }
        .advice .adv_text {
            flex-grow: 1;
            width: 100%;
            height: 100%;
        }

        .desease_details {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }
        .med_name {
            font-size: 16px;
            font-weight: bold;
            padding: 0;
        }
        .taking_time {
            display: flex;
            flex-direction: row;
            justify-content: flex-end;
            text-align: right;
        }
        .schedual {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
        .sc_time {
            margin: 0;
            padding: 0;
            float: left;
        }
        .sc_time span {
            font-weight: bold;
            margin-right: 1rem;
        }
        .sc {
            border: none;
            outline: none;
            font-size: 15px;
        }

        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            -ms-appearance: none;
            appearance: none;
            outline: 0;
            box-shadow: none;
            border: 0 !important;
            background: #fff;
            background-image: none;
        }
        select::-ms-expand {
            display: none;
        }
        .select {
            font-size: 15px;
            color: #335;
            position: relative;
            float: left;
            overflow: hidden;
        }
        select {
            font-weight: bold;
            padding: 0 0.5em;
            color: #333;
            cursor: pointer;
            outline: none;
        }
        .med_name {
            border: 0;
            outline: 0;
        }
        .period {
            font-size: 14px;
        }
        input[type="date"] {
            padding: 0;
            margin: 0;
            font-weight: bold;
            border: none;
        }
        .medicine {
            display: flex;
            flex-flow: column;
            height: 100%;
        }
        .med_name_action,
        .med_when_action,
        .med_period_action {
            display: none;
        }
        .med_meal_action .btn {
            margin: 2px;
        }
        .med_period {
            border: none;
            outline: none;
        }
        #add_med {
            margin: 20px 5px;
            flex-grow: 1;
        }
        #add_med {
            animation: shake 1.5s linear infinite;
        }

        @keyframes shake {
            10%, 90% {
                transform: translate3d(-1px, 0, 0);
            }

            20%, 80% {
                transform: translate3d(2px, 0, 0);
            }

            30%, 50%, 70% {
                transform: translate3d(-4px, 0, 0);
            }

            40%, 60% {
                transform: translate3d(4px, 0, 0);
            }
            95% {
                opacity: 0;
            }
        }

        .med_footer {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        hr {
            margin: 10px 0px;
        }
        .med:hover hr {
            border-top: 3px #111 solid;
        }
        .med_period_action {
            float: right;
        }
        span.date {
            color: #333399;
            float: right;
            clear: both;
        }
        .del_action {
            width: 100%;
            text-align: right;
        }
        .delete {
            width: 50px;
            opacity: 0;
            display: none;
        }
        .med:hover .delete {
            display: inline;
            opacity: 1;
        }
        .folded {
            visibility: hidden;
        }
        .button_group {
            position: fixed;
            right: 120px;
            bottom: 100px;
        }
        #snacking, #snacked {
            visibility: hidden;
            min-width: 250px;
            margin-left: -125px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 2px;
            padding: 16px;
            position: fixed;
            z-index: 1;
            left: 50%;
            bottom: 30px;
            font-size: 17px;
        }

        #snacking.show, #snacked.show {
            visibility: visible;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        @-webkit-keyframes fadein {
            from {bottom: 0; opacity: 0;}
            to {bottom: 30px; opacity: 1;}
        }

        @keyframes fadein {
            from {bottom: 0; opacity: 0;}
            to {bottom: 30px; opacity: 1;}
        }

        @-webkit-keyframes fadeout {
            from {bottom: 30px; opacity: 1;}
            to {bottom: 0; opacity: 0;}
        }

        @keyframes fadeout {
            from {bottom: 30px; opacity: 1;}
            to {bottom: 0; opacity: 0;}
        }


    </style>
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">{{Lang::get('all.dashboard',[],getCurrentLang())}} </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admin.prescriptions')}}">  {{Lang::get('all.all prescriptions',[],getCurrentLang())}} </a>
                                </li>
                                <li class="breadcrumb-item active">{{Lang::get('all.Add prescriptions',[],getCurrentLang())}}
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
                                    <h4 class="card-title" id="basic-layout-form"> {{Lang::get('all.Add prescriptions',[],getCurrentLang())}} </h4>
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
                                              action="{{route('admin.prescriptions.store')}}"
                                              method="Post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i> {{Lang::get('all.prescriptions data',[],getCurrentLang())}} </h4>
                                                <div style="margin-right: 50px"  class="logo">
                                                    <img
                                                        src="https://seeklogo.com/images/H/hospital-clinic-plus-logo-7916383C7A-seeklogo.com.png" />
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <input type="text" id="name"
                                                                       class="form-control"
                                                                       placeholder=" customer Name "
                                                                       value="{{old('name')}}"
                                                                       name="customer_name">
                                                                @error("customer_name")
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <input type="text" id="name"
                                                                       class="form-control"
                                                                       placeholder="Address "
                                                                       value="{{old('name')}}"
                                                                       name="customer_address">
                                                                @error("customer_address")
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <input type="text" id="name"
                                                                       class="form-control"
                                                                       placeholder="mobile number"
                                                                       value="{{old('name')}}"
                                                                       name="customer_mobile">
                                                                @error("mobile")
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <input type="text" id="name"
                                                                       class="form-control"
                                                                       placeholder="customer age"
                                                                       value="{{old('name')}}"
                                                                       name="customer_age">
                                                                @error("customer_age")
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                                <span style="font-size: 3em;">R<sub>x</sub></span>
                                                                <hr />

                                                                <div class="row">
                                                                    <div class="col-md-10">
                                                                        <div class="card-body">
                                                                            <div class="repeater">
                                                                                <div data-repeater-list="List_Classes">
                                                                                    <div data-repeater-item>
                                                                                        <div class="row">
                                                                                                <div class="col-3">
                                                                                                    <div class="form-group">
                                                                                                        <label for="projectinput2">{{Lang::get('all.category',[],getCurrentLang())}} </label>
                                                                                                        <select id="academy" name="category_id"
                                                                                                                class=" form-control ">
                                                                                                            @if($categories && $categories -> count() > 0)
                                                                                                                @foreach($categories as $category)
                                                                                                                    <option
                                                                                                                        value="{{$category -> id }}"
                                                                                                                        {{ (is_array(old('categories')) && in_array($category -> id, old('categories'))) ? ' selected' : '' }}
                                                                                                                    >{{$category -> name}}</option>
                                                                                                                @endforeach
                                                                                                            @endif
                                                                                                        </select>
                                                                                                        @error('category_id')
                                                                                                        <span class="text-danger"> {{$message}}</span>
                                                                                                        @enderror
                                                                                                    </div>
                                                                                            </div>
                                                                                            <div class="col-3">
                                                                                            <div class="form-group">
                                                                                                <label for="projectinput2">{{Lang::get('all.medications',[],getCurrentLang())}} </label>
{{--                                                                                                <select name="medication_id" id="product"--}}
{{--                                                                                                        class=" form-control appendCategories">--}}
{{--                                                                                                </select>--}}


                                                                                                <select name="medication_id"
                                                                                                        class=" form-control appendCategories">
                                                                                                    @if($medications && $medications -> count() > 0)
                                                                                                        @foreach($medications as $medication)
                                                                                                            <option
                                                                                                                value="{{$medication -> id }}"
                                                                                                                {{ (is_array(old('medications')) && in_array($medication -> id, old('medications'))) ? ' selected' : '' }}
                                                                                                            >{{$medication -> medication_name}}</option>
                                                                                                        @endforeach
                                                                                                    @endif
                                                                                                </select>
                                                                                                @error('category_id')
                                                                                                <span class="text-danger"> {{$message}}</span>
                                                                                                @enderror
                                                                                            </div>
                                                                                            </div>
                                                                                            <div class="col-3">
                                                                                                <div class="form-group">
                                                                                                    <label for="projectinput2">{{Lang::get('all.shape',[],getCurrentLang())}} </label>
                                                                                                    <select name="shape_id"
                                                                                                            class=" form-control">
                                                                                                        @if($shapes && $shapes -> count() > 0)
                                                                                                            @foreach($shapes as $category)
                                                                                                                <option
                                                                                                                    value="{{$category -> id }}"
                                                                                                                    {{ (is_array(old('shapes')) && in_array($category -> id, old('shapes'))) ? ' selected' : '' }}
                                                                                                                >{{$category -> title}}</option>
                                                                                                            @endforeach
                                                                                                        @endif
                                                                                                    </select>
                                                                                                    @error('category_id')
                                                                                                    <span class="text-danger"> {{$message}}</span>
                                                                                                    @enderror
                                                                                                </div>

                                                                                            </div>
                                                                                            <div class="col">
                                                                                                <label for="Name_en"
                                                                                                <button  data-repeater-delete class="btn btn-danger"> <i class="la la-trash" aria-hidden="true"></i></button>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <label for="projectinput1"> {{Lang::get('all.instructions for this medication',[],getCurrentLang())}}
                                                                                                </label>
                                                                                               <textarea type="text" id="name"
                                                                                                         class="form-control"
                                                                                                         placeholder="  "
                                                                                                         value="{{old('name')}}"
                                                                                                         name="content"></textarea>
                                                                                                @error("content")
                                                                                                <span class="text-danger">{{$message}}</span>
                                                                                                @enderror
                                                                                            </div>

                                                                                        </div>
                                                                                        <hr>
                                                                                        <br>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row mt-20">
                                                                                    <div class="col-3">
                                                                                        <input class="btn btn-primary"   data-repeater-create type="button" value="add medication"/>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
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

            </div>
        </div>
    </div>


<script>
    $(document).ready(function () {

        $.ajax({

            type: 'get',
            url: "{{Route('admin.prescriptions.loadCategories')}}",
            data: {
                'category_id': $('#academy').val(),
            },
            success: function (data) {
               console.log(data);

                // $('select[name="product"]').empty();
                // $.each(data, function(key, value) {
                //     $('select[name="medication_id"]').append('<option value="' +
                //         value + '">' + value + '</option>');
                // });
            }
        });
    });
</script>

@stop
