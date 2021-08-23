@extends('frontend.app')
@section('content')
@php
    $orders = App\model\Frontend\Order::where('user_id', Auth::id())->orderBy('id', 'DESC')->get();
@endphp
    <div class="contact_form">
        <div class="container">
            <div class="row">
                <div class="col-8 card">
                  <table class="table table-response">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Payment Type</th>
                        <th scope="col">Montant</th>
                        <th scope="col">Date</th>
                        <th scope="col">Retour</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($orders as $item)
                        <tr>
                          <td>{{ $item->payment_type }}</td>
                          <td>{{ $item->total }}</td>
                          <td>{{ $item->date }}</td>
                          <td>
                            @if($item->return_order == 0)
                                <span class="badge badge-warning">Pas de requette</span>
                            @elseif($item->return_order == 1)
                                <span class="badge badge-info">Pending</span>
                            @elseif($item->return_order == 2)
                                <span class="badge badge-success">Reussi</span>
                            @endif
                          </td>
                          <td>
                            @if($item->status == 0)
                                <span class="badge badge-warning">Pending</span>
                            @elseif($item->status == 1)
                                <span class="badge badge-info">Accepter Payment </span>
                            @elseif($item->status == 2)
                                    <span class="badge badge-info">Progression </span>
                            @elseif($item->status == 3)
                                <span class="badge badge-success">livré </span>
                            @else
                                <span class="badge badge-danger">fermer </span>
                            @endif
                          </td>
                          <td>
                            <a href="{{ route('orders.show.single', $item->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-eye" title="View"></i></a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="col-4">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="frontend/img/img11.jpg" alt="Profile_img" style="height: 100px; width: 100px; border-radius: 50%; margin: 0 auto; margin-top: 10px; margin-bottom: 15px;">
                        <div class="card-body text-center">{{ Auth::user()->name  }}</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item text-center"><a href="#">Ajouter Profile</a></li>
                          <li class="list-group-item text-center"><a href="{{ route('password.change') }}">Changer mot de Pass</a></li>
                          <li class="list-group-item text-center"><a href="#">Parametre du compte</a></li>
                        </ul>
                        <div class="card-body">
                          <a href="{{ route('user.logout') }}" class="btn btn-danger btn-block">Deconexion</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
