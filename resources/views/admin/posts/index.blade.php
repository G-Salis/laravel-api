@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
      <h1>
        Elenco Posts
      </h1>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Titolo</th>
            <th scope="col">Tags</th>
            <th scope="col">Azioni</th>
            <th scope="col">Categoria</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($posts as $post)
          <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->title}}</td>
            <td>
              @forelse ($post->tags as $tag)
               
               <span class="badge bg-info text-dark">{{$tag->name}}</span>
              @empty
                -
              @endforelse
            </td>
            <td>{{$post->slug }}</td>
            <td>
              @if ($post->category)
                {{$post->category->name}}
              @else
                -
              @endif
            </td>
            <td><a href="{{ route('admin.posts.show', $post) }}" class="btn btn-info">SHOW</a></td>
            <td><a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-success">EDIT</a></td>
            <td><form onsubmit="return confirm('Vuoi davvero eliminare: {{$post->title}}')"
              action="{{route('admin.posts.destroy', $post)}}"
              method="POST">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-danger">DELETE</button>
              </form></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div>
      @foreach ($categories as $category)
        
        <h2>{{$category->name}}</h2>
        <ul>

          @forelse ($category->posts as $post_category)
            <li>
              <a href="{{route('admin.posts.show', $post_category)}}">{{$post_category->title}}</a>
            </li>
          @empty
            <li>Nessun Post Presente</li>
          @endforelse

        </ul>

      @endforeach
    </div>
</div>
@endsection

@section('title')
  POSTS
@endsection

