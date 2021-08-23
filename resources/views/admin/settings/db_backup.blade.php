@extends('admin.admin_layouts')
@section('admin_content')
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Deshboard</a>
        <span class="breadcrumb-item active">Sub Category</span>
      </nav>

      <div class="sl-pagebody">

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Database Backup LIST
              <a href="{{ route('admin.database.backup.now') }}" class="btn pd-x-20 btn-warning" style="float: right;margin-bottom: 20px;">Backup Now</a>
          </h6>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-20p">File Name</th>
                  <th class="wd-20p">Size</th>
                  <th class="wd-30p">Path</th>
                  <th class="wd-20p">Download</th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($files as $row)
                <tr class="odd gradeX">
                  <td>{{ $row->getFilename() }}</td>
                  <td>{{ $row->getSize() }} Kb</td>
                  <td>{{ $row->getpath() }}</td>
                  <td class="center">
                    <a href="{{ route('admin.database.download', $row->getFilename()) }}" class="btn btn-sm btn-primary" title="Download"><i class="fa fa-download"></i></a>
                  </td>
                  <td class="center">
                    <a href="{{ route('admin.database.delete', $row->getFilename()) }}" class="btn btn-sm btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->

@endsection
