@extends('layouts.app')
@section('content')
    <section>
        <div class="d-flex justify-content-between">
            <div>
                <h3>Gaji</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, natus.</p>
            </div>
        </div>
        <div class="grey-bg my-2">
            <div class="d-flex justify-content-between">
                <div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Tambah Gaji
                    </button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Form Jabatan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <form action="/salary" method="POST">
                                    @csrf
                                    <div class="form-group py-2">
                                      <label for="exampleInputPassword1">Nominal Gaji</label>
                                      <input type="number" class="form-control" name="salary" id="exampleInputPassword1" placeholder="Nama Jabatan">
                                    </div>
                                    <div class="my-4">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                      </div>
                                  </form>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                <div>
                    <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                        <option selected>Filter Date</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                </div>
            </div>
            <div class="my-4">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gaji</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($salary as $key => $gaji)    
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>Rp. {{ number_format($gaji->salary,0,'.','.') }}</td>
                            <td>
                                <a href="">Edit</a>
                                <a href="">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection