@extends('layouts.app')

@section('page-title', 'all Project')

@section('main-content')
    <div class="row">
        <div class="col">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">title</th>
                <th scope="col">collaborators</th>
                <th scope="col">technologies</th>
                <th scope="col">actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($projects as $project)
              
              <tr>
                <th scope="row">{{ $project->id }}</th>
                <td>{{ $project->title }}</td>
                <td>{{ $project->collaborators }}</td>
                <td>{{ $project->technologies }}</td>
                <td><a href="" class="btn btn-primary">vedi</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
@endsection
