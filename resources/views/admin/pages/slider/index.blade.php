@extends('admin.layout.adminLayout')
@section('title','slider')
@section('style')

@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>DataTables</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">DataTables</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="text-left mb-3">
                            <a href="{{route('slider.create')}}" type="submit" class="btn btn-outline-success"><i class="fas fa-plus mr-1"></i>Create New</a>
                        </div>
                        <div class="card">
                            <!--Alert message-->
                            @if(session('message'))
                                <div class="alert alert-success mb-sm-5 mt-sm-5">
                                    {{ session('message') }}
                                </div>
                            @endif
                            <div class="card-header">
                                <h3 class="card-title">DataTable</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Sub Title</th>
                                        <th>Description</th>
                                        <th>Thumbnail</th>
                                        <th>Link</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($slider as $sl)
                                        <tr>
                                            <td>{{ $sl->id }}</td>
                                            <td>{{ $sl->title }}</td>
                                            <td>{{ $sl->subtitle }}</td>
                                            <td>{{ \Str::limit($sl->description, 100) }}</td>
                                            <td>
                                                <img src="{{ asset('storage/slider/' . $sl->thumbnail) }}" width="50"
                                                     height="40">
                                            </td>
                                            <td>{{ $sl->link }}</td>
                                            <td>
                                                <form action="{{ route('slider.destroy',$sl->id) }}" method="Post">
                                                    <a class="btn btn-outline-success" href="{{ route('slider.edit',$sl->id) }}"><i class="fas fa-edit"></i></a>
                                                    <a class="btn btn-outline-info" href="{{ route('slider.show',$sl->id) }}"><i class="fas fa-eye"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <a type="submit" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('scripts')
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
