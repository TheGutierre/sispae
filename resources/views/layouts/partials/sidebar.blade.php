<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form> -->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Menu</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-dashboard'></i> <span>{{ trans('message.home') }}</span></a></li>

            @if(\Illuminate\Support\Facades\Auth::user()->tipo == "administrador")
            <li><a href="{{ route('egressos.index') }}"><i class='fa fa-book'></i> <span>{{ trans('message.consultar_egresso') }}</span></a></li>
            {{-- <li><a href="{{ route('graficos.index') }}"><i class='fa fa-pie-chart'></i> <span>Gráficos</span></a></li> 
            <li><a href="#"><i class='fa fa-link'></i> <span>{{ trans('message.anotherlink') }}</span></a></li>--}}

            <li class="treeview">
                <a href="#"><i class='fa fa-pie-chart'></i> <span>Gráficos</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('graficos.porcurso') }}">Egressos por curso</a></li>
                    <li><a href="{{ route('graficos.porregiao') }}">Egressos por região</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class="fa fa-user-circle"></i>
                    <span>Empresas</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{route('empresas.create')}}"><i class="fa fa-circle-o"></i>Cadastro de Empresa</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>Consultar Empresas</a></li>
                </ul>
            </li>
            @endif
            <li class="treeview">
                <a href="#"><i class="fa fa-user-circle"></i> 
                    <span>PEP</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{route('vagas.index')}}"><i class="fa fa-circle-o"></i>Vagas</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
