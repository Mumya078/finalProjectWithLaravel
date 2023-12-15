@extends("layouts.admin.adminbase")

@section("content")
    <div class="content-wrapper" style="min-height: 1302.4px;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Category List</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                            <li class="breadcrumb-item active">Category</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Category Hierarchy</h3>
                            </div>
                            <!-- ./card-header -->
                            <div class="card-body p-0">
                                <table class="table table-hover">
                                    <tbody>
                                        @foreach($allcat as $rs)
                                            @if($rs->parent_id == 0)
                                        <tr data-widget="expandable-table" aria-expanded="true">
                                            <td>
                                                <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                {{$rs->title}}
                                                <button class="btn btn-danger btn-sm float-right">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="expandable-body">
                                            <td>
                                                <div class="p-0">
                                                    <table class="table table-hover">
                                                        <tbody>
                                                        @foreach($allcat as $rs2)
                                                            @if($rs->id == $rs2->parent_id)
                                                                <tr data-widget="expandable-table" aria-expanded="false">
                                                                    <td>
                                                                        <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                                        {{$rs2->title}}
                                                                        <button class="btn btn-danger btn-sm float-right">
                                                                            Delete
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr class="expandable-body d-none">
                                                                    <td>
                                                                        <div class="p-0" style="display: none;">
                                                                            <table class="table table-hover">
                                                                                <tbody>
                                                                                @foreach($allcat as $rs3)
                                                                                    @if($rs2->id == $rs3->parent_id)
                                                                                        <tr data-widget="expandable-table" aria-expanded="false">
                                                                                            <td>
                                                                                                <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                                                                {{$rs3->title}}
                                                                                                <button class="btn btn-danger btn-sm float-right">
                                                                                                    Delete
                                                                                                </button>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class="expandable-body ">
                                                                                            <td>
                                                                                                <div class="p-0">
                                                                                                    <table class="table table-hover">
                                                                                                        <tbody>
                                                                                                        @foreach($allcat as $rs4)
                                                                                                            @if($rs3->id == $rs4->parent_id)
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        {{$rs4->title}}
                                                                                                                        <a class="btn btn-danger btn-sm float-right" href="/admin/category/delete/{{$rs4->id}}">
                                                                                                                            Delete
                                                                                                                        </a>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            @endif
                                                                                                        @endforeach
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endif
                                                                                @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>

        <!-- /.content-header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Category Add</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Category</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="/admin/category/store">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Enter title">
                            </div>
                            <div class="form-group">
                                <label>Parent Category</label>
                                <select class="form-control" name="parent" id="parentSelect">
                                    <option value="0">Main Category</option>
                                    @foreach($allcat as $rs)
                                        @if($rs->parent_id == 0)
                                            <option value="{{$rs->id}}">{{$rs->title}}</option>
                                            @foreach($allcat as $rs2)
                                                @if($rs->id == $rs2->parent_id)
                                                    <option value="{{$rs2->id}}">{{$rs->title}} / {{$rs2->title}}</option>
                                                    @foreach($allcat as $rs3)
                                                        @if($rs2->id == $rs3->parent_id)
                                                            <option value="{{$rs3->id}}">{{$rs->title}} / {{$rs2->title}} / {{$rs3->title}}</option>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" id="optionalFields" style="display: none;">
                                <label for="color">Category Color (Optional)</label>
                                <input type="text" class="form-control" name="color" placeholder="Enter color or #ffffff">
                            </div>
                            <div class="form-group" id="optionalFields2" style="display: none;">
                                <label for="icon">Category Icon (Optional)</label>
                                <input type="text" class="form-control" name="icon" placeholder="Enter fa-(value)">
                            </div>
                            <div class="form-group" id="optionalFields3" style="display: none;">
                                <label for="form_element1">Form Element1 (Optional)</label>
                                <input type="text" class="form-control" name="form_element1" placeholder="form element title">
                            </div>
                            <div class="form-group" id="optionalFields4" style="display: none;">
                                <label for="form_element2">Form Element2 (Optional)</label>
                                <input type="text" class="form-control" name="form_element2" placeholder="form element title">
                            </div>
                            <div class="form-group" id="optionalFields5" style="display: none;">
                                <label for="form_element3">Form Element3 (Optional)</label>
                                <input type="text" class="form-control" name="form_element3" placeholder="form element title">
                            </div>
                            <div class="form-group" id="optionalFields6" style="display: none;">
                                <label for="form_element4">Form Element4 (Optional)</label>
                                <input type="text" class="form-control" name="form_element4" placeholder="form element title">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                            $(document).ready(function () {
                                $('#parentSelect').change(function () {
                                    var selectedValue = $(this).val();

                                    if (selectedValue == 0) {
                                        $('#optionalFields').show();
                                        $('#optionalFields2').show();
                                        $('#optionalFields3').show();
                                        $('#optionalFields4').show();
                                        $('#optionalFields5').show();
                                        $('#optionalFields6').show();
                                    } else {
                                        $('#optionalFields').hide();
                                        $('#optionalFields2').hide();
                                        $('#optionalFields3').hide();
                                        $('#optionalFields4').hide();
                                        $('#optionalFields5').hide();
                                        $('#optionalFields6').hide();
                                    }
                                });

                                // Sayfa yüklendiğinde de kontrol et
                                if ($('#parentSelect').val() == 0) {
                                    $('#optionalFields').show();
                                    $('#optionalFields2').show();
                                    $('#optionalFields3').show();
                                    $('#optionalFields4').show();
                                    $('#optionalFields5').show();
                                    $('#optionalFields6').show();
                                } else {
                                    $('#optionalFields').hide();
                                    $('#optionalFields2').hide();
                                    $('#optionalFields3').hide();
                                    $('#optionalFields4').hide();
                                    $('#optionalFields5').hide();
                                    $('#optionalFields6').hide();
                                }
                            });
                        </script>
                    </form>

                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
