@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center"> 
<div class="col-md-8">
            <div class="card">
                <div class="card-header">nvestments</div>
                <div class="card-body">
                    @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    <table class="table table-hover">
                        <thead>
                            <th></th>
                            <th>Project Title</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @if (count($investments))
                            @foreach ($investments as $investment)
                            @if ($investment->status != 99)
                            <tr>
                                <td>
                                    <a href="/investments/{{ $investment->id }}/view">
                                        <img src="{{ $investment->pic_url }}" alt="" width="75">
                                    </a>
                                </td>
                                <td>
                                    <a href="/investments/{{ $investment->id }}/view" class="text-decoration-none">
                                        <span>{{ $investment->title }}</span><br>
                                    </a>
                                    <small class="text-muted font-italic">Invested: <span class="font-weight-bolder">{{ \Carbon\Carbon::parse($investment->investedOn)->diffForHumans() }}</span></small>
                                </td>
                                <td>
                                    <span>{{ number_format($investment->invested) }} Rwf</span><br>
                                </td>
                                <td>
                                    @if($investment->status == 0)
                                        <span class="badge badge-pill badge-warning">Pending Owner Review</span>
                                    @elseif($investment->status == 1)
                                        <span class="badge badge-pill badge-warning">Pending RDB Review</span>
                                    @elseif($investment->status == 2)
                                        <span class="badge badge-pill badge-danger">Suspended</span>
                                    @elseif($investment->status == 3)
                                        <span class="badge badge-pill badge-success">Approved</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="/investments/{{ $investment->id }}/view" class="btn btn-sm btn-outline-primary float-right my-1">
                                        <i class="fa fa-eye"></i>
                                        <span class="d-none d-sm-inline ml-2">View Details</span>
                                    </a>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                            @else
                            <tr>
                                <td colspan="5" class="font-weight-bolder text-center">
                                    No Record Available
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    <a href="" @click.prevent="printme" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> PRINT PDF</a>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
