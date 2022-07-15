<div class="user-panel">
    <div class="pull-left image">
      <img src="{{ asset("assets") }}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p>{{ auth()->user()->name }}</p>
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>
  <!-- /.search form -->
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li><a href="{{ route("dashboard") }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
    <li><a href="{{ route("pengusulan") }}"><i class="fa fa-envelope-o"></i> <span>Data Usulan</span></a></li>
  </ul>