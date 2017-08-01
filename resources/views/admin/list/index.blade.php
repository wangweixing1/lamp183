@extends('admin.layout')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            榜单管理
            <small>列表</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
            <li><a href="#">榜单管理</a></li>
            <li class="active">列表</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">快速浏览榜单列表</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    @if(session('info'))
                        <div class="alert alert-danger">
                            {{ session('info') }}
                        </div>
                    @endif

                    <form action="{{ url('/admin/list/index') }}" method="get">
                        <div class="row">
                            <div class="col-md-2">
                                <!-- select --> 
                                <div class="form-group">
                                    <select name="num" class="form-control">
                                        <option value="10"
                                            @if(!empty($request['num']) && $request['num'] == '10')
                                                selected="selected" 
                                            @endif
                                            >10
                                        </option> {{-- <!-- @if($request['num'] == '10')   selected="selected"    @endif    判断保持状态--> --}}
                                        <option value="20"
                                            @if(!empty($request['num']) && $request['num'] == '20')
                                                selected="selected" 
                                            @endif
                                            >20
                                        </option>
                                        <option value="40"
                                            @if(!empty($request['num']) && $request['num'] == '40')
                                                selected="selected" 
                                            @endif
                                            >40
                                        </option>
                                        <option value="80"
                                            @if(!empty($request['num']) && $request['num'] == '80')
                                                selected="selected" 
                                            @endif
                                            >80
                                        </option>
                                        <option value="100"
                                            @if(!empty($request['num']) && $request['num'] == '80')
                                                selected="selected" 
                                            @endif
                                            >100
                                        </option>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-md-offset-6 ">
                                <div class="input-group input-group">

                                    {{-- <!--  value="{{ $request['keywords'] }}"  保持状态--> --}}
                                    <input value="{{ $request['keywords'] or ' ' }}" name="keywords" type="text" class="form-control">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-info btn-flat">搜索</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>

                    <table id="example2" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>电影名称</th>
                                <th>电影内容</th>
								<th>电影图片</th>
								<th>操作</th>
							</tr>
						</thead>

						<tbody>
							@foreach($data as $key => $val)
							<tr class="parent">
								<td class="id">{{ $val -> id }}</td>
                                <td class="list_name">{{ $val -> list_name }}</td>
								<td style="width:700px;height:30px;" class="list_img">{{ $val -> list_depict }}</td>
								<td ><img style="width:100px;height:100px;" src=" /uploads/list_img/{{ $val -> list_img }}"/></td>
								<td>
                                    <a href="{{ url('/admin/list/edit') }}/{{ $val -> id }}">编辑</a> 
                                    <a href="{{ url('/admin/list/delete') }}/{{ $val->id }}">删除</a>
                                </td>
							</tr>
							@endforeach
						</tbody>

					</table>
                    {{ $data -> appends($request) -> links() }}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>



@endsection

 