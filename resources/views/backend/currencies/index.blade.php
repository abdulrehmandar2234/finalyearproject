@extends('layouts.backend')

@section('content')

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Currencies</li>
            </ol>
        </nav>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <a href="{{ route('currencies.create') }}" class="btn btn-primary btn-icon-text">
                <i class="btn-icon-prepend" data-feather="plus"></i>
                Create Currency
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Currencies</h6>
                    <p class="card-description">All the currencies are listed here.</p>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Created At
                                </th>
                                <th>
                                    Updated At
                                </th>
                                <th>
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($currencies as $key=> $currency)
                                <tr>
                                    <td>
                                        {{ ++$key }}
                                    </td>

                                    <td>
                                        {{$currency->name}}
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($currency->created_at)->diffForhumans() }}
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($currency->updated_at)->diffForhumans() }}
                                    </td>
                                    <td>
                                        <form class="d-inline-block" action="{{ route('currencies.destroy',$currency->id) }}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-icon-text">
                                                <i class="btn-icon-prepend" data-feather="trash"></i> Delete
                                            </button>
                                        </form>
                                        <a href="{{ route('currencies.edit',$currency->id) }}"
                                           class="btn btn-warning btn-icon-text">
                                            <i class="btn-icon-prepend" data-feather="edit"></i> Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
