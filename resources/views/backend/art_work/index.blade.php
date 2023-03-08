@extends('layouts.admin')
@section('title', $title)
@section('content')
    <div class="container-fluid">
        <!-- Exportable Table -->
        <div class="row clearfix">
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h2><strong>Artist</strong> List </h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="category_table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Artist</th>
                                        <th>Price</th>
                                        <th>Media</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($artworks as $a)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            
                                            <td>
                                            @if ($a->image)
                                            <img height="70px" src="{{ url('images/artist/art_work', $a->image ) }}" alt="admin img">
                                            @else
                                            <img  src="{{ asset('assets/frontend/artist/images/avator.png') }}" alt="admin img">
                                            @endif
                                            </td>
                                            
                                            <td>{{ $a->title }}</td>
                                            
                                            @if($a->artist)
                                            <td>{{ $a->artist->name }}</td>
                                           @endif
                                            <td>{{ $a->price }}</td>
                                            @if ($a->media)
                                            <td>{{ $a->media }}</td>
                                            @else

                                            @endif
                                            <td>
                                               <a href="#" class="btn btn-warning btn-sm">
                                                    <i class="fa fa-edit"></i>
                                               </a>
                                            <form action="#" method="POST"
                                                        style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure delete this artist?')">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                            </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            
                        </div>
                    </div>
                </div>
            </div>

            {!! $artworks->links() !!}
        </div>
    </div>
    
@endsection

