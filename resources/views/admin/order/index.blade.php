@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                订单管理
                <small>列表</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
                <li><a href="#">订单管理</a></li>
                <li class="active">列表</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">快速浏览订单列表</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        @if(session('info'))
                            <div class="alert alert-danger">
                                {{ session('info') }}
                            </div>
                        @endif

                        <form action="{{ url('/admin/order/index') }}" method="get">
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
						<th>电影ID</th>
						<th>电影名称</th>
                        <th>价格</th>
						<th>座位号</th>
						<th>订单序列</th>
                        <th>日期</th>
						<th>时间</th>
						<th>影城</th>
                        <th>影厅</th>
                        <th>状态</th>
						<th>处理</th>
					</tr>
				</thead>

				<tbody>
					@foreach($data as $key => $val)
					<tr class="parent">
						<td class="id">{{ $val -> id }}</td>
						<td class="movie_name">{{ $val -> mid }}</td>
						<td>{{ $val -> movie_name }}</td>
                        <td>{{ $val -> price }}</td>     
                        <td>{{ $val -> set }}</td>
                        <td>{{ $val -> num }}</td>
                        <td>{{ $val -> date }}</td>
                        <td>{{ $val -> time }}</td>
                        <td>{{ $val -> cinema_name }}</td>
						<td>{{ $val -> hall_name }}</td>
                        @if($val -> status==1)
						<td>未支付</td>
                        @else
                        <td>已支付</td>
                        @endif
						<td>                                       
                            <a href="{{ url('/admin/order/delete') }}/{{ $val->id }}">处理订单</a>
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

   