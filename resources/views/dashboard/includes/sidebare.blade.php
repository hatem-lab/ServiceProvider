<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item active"><a href=""><i class="la la-mouse-pointer"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main">{{Lang::get('all.dashboard',[],getCurrentLang())}} </span></a>
            </li>

            <li class="nav-item  open ">
                <a href="{{route('admin.categories')}}"><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{Lang::get('all.categories',[],getCurrentLang())}}</span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2"></span>
                </a>

            </li>


            <li class="nav-item  open ">
                <a href="{{route('admin.companies')}}"><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{Lang::get('all.companies',[],getCurrentLang())}}</span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2"></span>
                </a>

            </li>
            <li class="nav-item  open ">
                <a href="{{route('admin.shapes')}}"><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{Lang::get('all.shapes',[],getCurrentLang())}}</span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2"></span>
                </a>

            </li>

            <li class="nav-item  open ">
                <a href="{{route('admin.doses')}}"><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{Lang::get('all.doses',[],getCurrentLang())}}</span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2"></span>
                </a>

            </li>


            <li class="nav-item  open ">
                <a href="{{route('admin.contraindications')}}"><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{Lang::get('all.contraindications',[],getCurrentLang())}}</span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2"></span>
                </a>

            </li>

            <li class="nav-item  open ">
                <a href="{{route('admin.medications')}}"><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{Lang::get('all.medications',[],getCurrentLang())}}</span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2"></span>
                </a>

            </li>

            <li class="nav-item  open ">
                <a href="{{route('admin.prescriptions')}}"><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{Lang::get('all.prescriptions',[],getCurrentLang())}}</span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2"></span>
                </a>

            </li>


        </ul>
    </div>
</div>
