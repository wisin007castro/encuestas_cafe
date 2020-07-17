<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('/img/avatar.png')}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    {{-- <p>{{ Auth::user()->name }}</p> --}}

                    @if ($personas_logueadas['paterno'] == '')
                    <p>{{ $personas_logueadas['nombre'] }} {{ $personas_logueadas['materno'] }} </p>
                    @else
                    <p>{{ $personas_logueadas['nombre'] }} {{ $personas_logueadas['paterno'] }}</p>
                    @endif



                    {{-- @foreach ($personas as $persona)
                        @if ( $persona->ci == Auth::user()->ci)
                            <!-- Status -->
                    <p><i class="fa fa-caret-right text-yellow"></i> {{ $persona->sigla }}</p>
                        @endif
                    @endforeach --}}
                    @role('super_admin')
                    <p><i class="fa fa-caret-right text-yellow"></i> Administrador</p>
                    @endrole
                    {{-- @role('admin')
                    <p><i class="fa fa-caret-right text-yellow"></i> Administrador</p>
                    @endrole --}}


                    @role('conductor')
                    <p><i class="fa fa-caret-right text-yellow"></i> Conductor</p>
                    @endrole
                    @role('registrador')
                    <p><i class="fa fa-caret-right text-yellow"></i> Registrador</p>
                    @endrole

                    @role('call_center')
                    <p><i class="fa fa-caret-right text-yellow"></i> Supervisor Call Center</p>
                    @endrole

                    @role('productor')
                    <p><i class="fa fa-caret-right text-yellow"></i> Productor</p>
                    @endrole

                    {{-- <p><i class="fa fa-caret-right text-yellow"></i> </p> --}}
                </div>
            </div>
        @endif

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <!-- Optionally, you can add icons to the links -->

            @role('super_admin')
            <li class="treeview">
                <a href="#"><i class='fa fa-gear'></i> <span>Configuración</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                        <li><a href="{{ url('listado_usuarios') }}">Roles</a></li>
                    {{-- <li><a href="{{ url('listado_empresas') }}">Usuarios</a></li> --}}
                </ul>
            </li>
            <li class="header"> #</li>
            @endrole

            @can('registrar')
            <li class="treeview">
                <a href="#"><i class='fa fa-user-plus'></i> <span>Registro</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    @can('registrar_persona')
                    <li><a href="{{ url('form_agregar_persona') }}">Personas</a></li>
                    {{-- <li><a href="{{ url('listado_empresas') }}">Usuarios</a></li> --}}
                    @endcan

                    @can('registrar_transporte')
                    <li><a href="{{ url('form_agregar_transporte') }}">Transporte</a></li>
                    <!--li><a href="{{ url('listado_personas') }}">Casas de Campaña</a></li>
                    <li><a href="{{ url('listado_personas') }}">Candidatos</a></li-->
                    @endcan
                </ul>
            </li>
            @endcan

            @can('listar')
            <li class="treeview">
                <a href="#"><i class='fa fa-list'></i> <span>Listado</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    @can('listar_personas')
                    <li><a href="{{ url('listado_personas') }}">Personas</a></li>
                    @endcan
                </ul>
            </li>
            @endcan

            {{--
            <li class="treeview">
                <a href="{{ url('home') }}"><i class='fa fa-file-video-o'></i> <span>Tutorial</span> </a>
            </li> --}}

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
