@extends('layouts.admin')

@section('content')
<div class="container">

  <h1>{{$post->title}}</h1>

    @if ($errors->any())
      <div class="alert alert-danger" role="alert">
        <ul>
          @foreach ($errors->all() as $error)
            <li>
              {{$error}}
            </li>
          @endforeach
        </ul>
      </div>
    @endif
  
  <form action="{{route('admin.posts.update', $post)}}" method="POST">
    @csrf
    @method('PUT')
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Titolo</label>
        <input type="text" value="{{$post->title}}" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Inserisci Titolo">
        @error('title')
        <p class="form-errors">{{$message}}</p>
        @enderror
      </div>
  
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Contenuto</label>
        <input type="text" value="{{$post->content}}" class="form-control @error('content') is-invalid @enderror" name="content" id="content" placeholder="Inserisci Contenuto">
        @error('content')
        <p class="form-errors">{{$message}}</p>
        @enderror
      </div>

      <div class="form-group">
        <label for="category_id" class="form-label">Inserisci una categoria</label>
        
        <select class="form-control" aria-label="Default select example" name="category_id" id="category_id">
          <option selected>Selezionare una categoria</option>
          
          @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            
          @endforeach
          
        </select>
        
      </div>

      <div class="form-group">
        
        
        <h5>Tag</h5>
        @foreach ($tags as $tag)
        <span>
          <input 
            type="checkbox" 
            name="tags[]" value="{{$tag->id}}" 
            id="tag{{$loop -> iteration}}"

            @if (!$errors->any() && $post->tags->contains($tag->id))
              checked
            @elseif ($errors->any() && in_array($tag->id, old("tags", [])))
             checked
            @endif
           >
          <label for="tag{{$loop -> iteration}}">{{$tag->name}}</label>
        </span>
        
          
        @endforeach
      </div>

      <button type="submit" class="btn btn-primary">Invia</button>
      <button type="reset" class="btn btn-secondary">RESET</button>
  </form>

</div>
@endsection

@section('title')
  EDIT
@endsection
