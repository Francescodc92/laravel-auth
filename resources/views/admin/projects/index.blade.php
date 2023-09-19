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
                <td>
                  <a href="{{ route('admin.projects.show',['project'=> $project->id]) }}" class="btn btn-primary mt-2">vedi</a>
                  <a href="" class="btn btn-warning mt-2">
                    Modifica
                  </a>
                  <form 
                    action=""
                    method="POST"
                    class="d-inline-block mt-2"
                    onsubmit="return confirm('Sei sicuro di voler cancellare questo elemento?');"
                  >
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mt-2">
                        Elimina
                    </button>

                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
@endsection
