@extends('admin.admin_layouts')
@section('admin_content')
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">administration</a>
        <span class="breadcrumb-item active">commentaire</span>
      </nav>

      <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Liste des commentaires
            <a href="#" class="btn btn-sm btn-danger" style="float: right;margin-bottom: 20px;" id="delete">All Delete</a>
          </h6>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-5p">ID</th>
                  <th class="wd-10p">nom d'utilisateur</th>
                  <th class="wd-20p">Commentaire</th>
                  <th class="wd-10p">Commentaire sur Produit</th>
                  <th class="wd-10p">Parent Commentaire</th>
                  <th class="wd-10p">heure</th>
                  <th class="wd-15p">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($comments as $row)
                <tr>
                    <td><input type="checkbox"> {{ $row->id }}</td>
                    <td>{{ $row->user->name }}</td>
                    <td>{{ $row->comment }}</td>
                    <td>{{ $row->product->product_name }}</td>
                    @if ($row->parent_id == NULL)
                        <td></td>
                    @else
                        <td>{{ $row->parent_id ?? '' }}</td>
                    @endif
                    <td>{{ \Carbon\Carbon::parse($row->created_at)->diffForhumans() }}</td>
                    <td>
                        <a href="{{ route('admin.comment.show', $row->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-eye" title="View"></i></a>
                        @if ($row->status == 1)
                            <a href="{{ route('admin.comment.inactive', $row->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-thumbs-down" title="Inctive"></i></a>
                        @else
                            <a href="{{ route('admin.comment.active', $row->id) }}" class="btn btn-sm btn-info"><i class="fa fa-thumbs-up" title="Active"></i></a>
                        @endif
                        <button type="button" class="btn btn-sm btn-danger" title="Delete">
                            <i onclick="deleteItem({{ $row->id }})" class="fa fa-trash"></i>
                        </button>
                        <form id="delete_form_{{ $row->id }}" method="POST" action="{{ route('admin.comment.destroy', $row->id) }}">
                            @csrf
                            @method('DELETE')
                        </form>
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
