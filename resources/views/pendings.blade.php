@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
 
<div class="container">
    <div class="row justify-content-center"> 
    <div class="col-md-8">
            <div class="card">
                <div class="card-header"><center>REPORT OF MISCELLANEOUS PROJECTS</center></div>
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
                            <th>Owner</th>
                            <th>Status</th>
                        </thead>
                        <tbody>
                            @if (count($projects))
                            @foreach ($projects as $project)
                            <tr>
                                <td>
                                    <a href="/projects/{{ $project->id }}/view">
                                        <img src="{{ $project->pic_url }}" alt="" width="75">
                                    </a>
                                </td>
                                <td>
                                    <a href="/projects/{{ $project->id }}/view" class="text-decoration-none">
                                        <span>{{ $project->title }}</span><br>
                                    </a>
                                    <small class="text-muted font-italic">Uploaded: <span class="font-weight-bolder">{{ \Carbon\Carbon::parse($project->created_at)->diffForHumans() }}</span></small>
                                </td>
                                <td>
                                    <span>{{ $project->fullnames }}</span><br>
                                    <small>{{ $project->email }}</small><br>
                                    <small class="text-muted">{{ $project->phone }}</small>
                                </td>
                             
                                <td>
                                    @if($project->isActive == 1)
                                        <span class="badge badge-pill badge-success">Approved</span>
                                    @elseif($project->isActive == 0)
                                        <span class="badge badge-pill badge-warning">Pending Review</span>
                                    @else
                                        <span class="badge badge-pill badge-danger">Suspended</span>
                                    @endif
                                </td>
                               
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="4" class="font-weight-bolder text-center">
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