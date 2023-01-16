@extends('layout.main')
@section('content')

<section id="sidebar">
    <a href="#" class="brand">
        <i class='bx bxs-book'></i>
        <span class="text">Wikbook</span>
    </a>
    <ul class="side-menu top">
        <li class="active">
            <a href="/dashboard">
                <i class='bx bxs-dashboard' ></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="/dashboard/user">
                <i class='bx bxs-user' ></i>
                <span class="text">Users</span>
            </a>
        </li>
        <li>
            <a href="/dashboard/book">
                <i class='bx bxs-bookmark' ></i>
                <span class="text">Book</span>
            </a>
        </li>
        <li>
            <a href="/dashboard/categories">
                <i class='bx bxs-book-open' ></i>
                <span class="text">Book Category</span>
            </a>
        </li>
    </ul>
    <ul class="side-menu">
        <li>
            <a href="/logout" class="logout">
                <i class='bx bxs-log-out-circle' ></i>
                <span class="text">Logout</span>
            </a>
        </li>
    </ul>
</section>
<!-- SIDEBAR -->

<div class="section-body">

   
    <form method="POST" action="/dashboard/book/store" enctype="multipart/form-data">   
      @csrf
      <div class="row"> 
          <div class="col">
              <div class="card">
                  <div class="card-header">
                  <h4>Book Form.</h4>
                  </div>
                  <div class="card-body">
                      <div class="row align-items-start">
                          <div class="col-sm-12">
                              <label>Title</label>
                              <input type="text" class="form-control" name="title">         
                          </div>
                      </div>
                      <br>
                      <div class="row align-items-start">
                          <div class="col-sm-12">
                              <label>Writer</label>
                              <input type="text" class="form-control" name="writer">
                          </div>
                        </div>
                        <br>
                      <div class="row align-items-start">
                        <div class="col-sm-12">
                            <label>Publisher</label>
                            <input type="text" class="form-control" name="publisher" type-currency="IDR">
                        </div>
                     </div>
                     <br>
                      <div class="row align-items-start">
                        <div class="col-sm-12">
                            <label>Category Book</label>
                            <select name="category_id" class="form-control">
                              @foreach ($categories as $category)
                                  <option value="{{ $category->id }}"> {{ $category->name }}</option>
                              @endforeach
                            </select>
                        </div>
                        </div>
                        <br>
                      <div class="row align-items-start">
                       <div class="col-sm-12">
                            <label>Synopsis</label>
                            <input type="text" class="form-control" name="synopsis" type-currency="IDR">
                        </div>
                        </div>
                        <br>
                      <div class="row align-items-start">
                        <div class="col-sm-12">
                            <label>No ISBN</label>
                            <input type="text" class="form-control" name="isbn" type-currency="IDR">
                        </div>

                      <div class="row align-items-start">
                        <div class="col-sm-4">
                            <label>Cover</label>
                            <input type="file" id="file" name="cover">
                        </div>
                      </div>

                      <div class="row align-items-start">
                        <div class="col-sm-4">
                            <label>file</label>
                            <input type="file" id="file" name="file">
                        </div>
                      </div>
                      
                      <div class="row align-items-start">
                         <button type="submit" class="button3">Submit</button>
                      </div>

                    </div>
                  </div>
              </div>
          </div>
      </div>
  </form>
</div>

<div class="main-content">
    <section class="content">
        <section class="section">
            <div class="section-header">
                <h1>Verifikasi Pembayaran</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data Siswa</h2>
                <p class="section-lead"></p>
                <br>
                <div class="app-card">
                  <table id="data-admin" class="table table-striped table-bordered table-md"
                  style="width: 100%; margin-top:5%; padding:2%;" cellspacing="1">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Book id</th>
                                <th scope="col">Category id</th>
                                <th scope="col">title</th>
                                <th scope="col">writer</th>
                                <th scope="col">Publisher</th>
                                <th scope="col">isbn</th>
                                <th scope="col">synopsis</th>
                                <th scope="col">Cover book</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $book->id }}</td>
                                    <td >{{ $book->category_id }}</td>
                                    <td >{{ $book->title }}</td>
                                    <td >{{ $book->writer }}</td>
                                    <td >{{ $book->publisher }}</td>
                                    <td >{{ $book->isbn }}</td>
                                    <td >{{ $book->synopsis }}</td>
                                    <td >{{ $book->cover }}</td>
                                    <td>
                                        <a href="" class="bg-ywllow-300 text-white">Edit</a>
                                        <a href="/dashboard/book/{{ $book->id }}/delete"
                                            class="bg-red-500 text-white">Delete</a>

                                    </td>
                                 
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </section>
</div>

@endsection