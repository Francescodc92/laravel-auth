@extends('layouts.app')

@section('page-title', 'all Project')

@section('main-content')
<div class="row">
  <div class="col-12">
    <form action="{{ route('admin.projects.update', ['project' => $project->id]) }}" method="POST"  enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="title" class="form-label">
          Title
          <span class="text-danger">
            *
          </span>
        </label>
        <input 
          type="text" 
          class="form-control @error('title') is-invalid @enderror"
          maxlength="100" 
          id="title" 
          name="title" 
          placeholder="Enter title..." 
          value="{{ old('title', $project->title) }}"  
          required
        >
        @error('title')
            <div class="alert alert-danger my-2">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="preview" class="form-label">immagine progetto</label>
        <input
         class="form-control @error('preview') is-invalid @enderror" 
         type="file" 
         id="preview" 
         name="preview"
        >
        @error('preview')
            <div class="alert alert-danger my-2">
                {{ $message }}
            </div>
        @enderror
        @if ($project->preview)
          <img src="{{ asset('storage/'. $project->preview) }}" class="img-fluid rounded-start h-100" alt="{{ $project->title }}">
        @else
        @endif
        <div class="mt-2">
          <input type="checkbox" class="btn-check" id="remove_preview_img" name="remove_preview_img" value="1" autocomplete="off">
          <label class="btn btn-outline-primary" for="remove_preview_img">rimuovi immagine</label>
        </div>
      </div>
      <div class="row">
        <div class="mb-3 col-12 col-md-6">
            <label for="collaborators" class="form-label">
              Collaborators
            </label>
            <input 
              type="text" 
              maxlength="255" 
              class="form-control @error('collaborators') is-invalid @enderror" 
              id="collaborators" 
              name="collaborators" 
              value="{{ old('collaborators', $project->collaborators) }}"
              placeholder="Enter value..." 
              required
            >
            @error('collaborators')
              <div class="alert alert-danger my-2">
                  {{ $message }}
              </div>
            @enderror 
        </div>

        <div class="mb-3 col-12 col-md-6">
          <label for="technologies" class="form-label">
            Technologies
            <span class="text-danger">
              *
            </span>
          </label>
          <input 
            type="text" 
            class="form-control @error('technologies') is-invalid @enderror" 
            id="technologies" 
            name="technologies"
            value="{{ old('technologies', $project->technologies) }}"
            placeholder="Enter value..." 
            required
          >
          @error('technologies')
            <div class="alert alert-danger my-2">
                {{ $message }}
            </div>
          @enderror
        </div>
      </div>

      <div class="mb-3">
        <label for="description" class="form-label">
          Description
          <span class="text-danger">
            *
          </span>
        </label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $project->description) }}</textarea>
        @error('description')
            <div class="alert alert-danger my-2">
                {{ $message }}
            </div>
        @enderror
      </div>
      
      <button type="submit" class="btn btn-warning">
        Modifica
      </button>
    </form>
  </div>
</div>
@endsection
