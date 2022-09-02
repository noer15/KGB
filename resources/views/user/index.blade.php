@extends('layouts.app')
@section('content')
    <section>
        <div class="d-flex justify-content-between">
            <div>
                <h3>Pegawai</h3>
                <p>Data Pegawai</p>
            </div>
        </div>
        <div class="grey-bg my-2">
            <div class="d-flex justify-content-between">
                <div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Tambah Pegawai
                    </button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Form Pegawai</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <form action="/user" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Jabatan</label>
                                        <select required name="position_id" id="" class="form-control">
                                            @foreach (App\Models\Position::all() as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group py-2">
                                        <label for="exampleInputPassword1">Nama Pegawai</label>
                                        <input required type="text" class="form-control" name="name"
                                            id="exampleInputPassword1" placeholder="Nama Pegawai">
                                    </div>
                                    <div class="form-group py-2">
                                        <label for="exampleInputPassword1">Nomor HP</label>
                                        <input required type="number" class="form-control" name="phone"
                                            id="exampleInputPassword1" placeholder="Nomor HP">
                                    </div>
                                    <div class="form-group py-2">
                                        <label for="exampleInputPassword1">Alamat</label>
                                        <textarea required name="address" class="form-control" cols="30" rows="3" placeholder="Alamat pegawai"></textarea>
                                    </div>
                                    <hr>
                                    <div class="form-group py-2">
                                        <label for="exampleInputPassword1">E-mail</label>
                                        <input required type="email" class="form-control" name="email"
                                            id="exampleInputPassword1" placeholder="Email pegawai">
                                    </div>
                                    <div class="form-group py-2">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input required type="password" class="form-control" name="password"
                                            id="exampleInputPassword1" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Hak Akses</label>
                                        <select required name="level" id="" class="form-control">
                                            <option value="user">User</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                    <div class="my-4">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
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
                            <th>Jabatan</th>
                            <th>Nama</th>
                            <th>Nomor HP</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $user->position->name }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <button 
                                    data-id="{{ $user->id }}" 
                                    data-position="{{$user->position->id}}" 
                                    data-name="{{ $user->name }}" 
                                    data-email="{{ $user->email }}" 
                                    data-address="{{$user->address}}"
                                    data-phone="{{$user->phone}}"
                                    data-level="{{$user->level}}"
                                    type="button" class="btn btn-primary btn-sm btn-edit" data-toggle="modal" data-target="#editModal">
                                    Edit
                                </button>
                                <button data-id="{{ $user->id }}" data-name="{{ $user->name }}" type="button"
                                    class="btn btn-danger btn-sm btn-delete" data-toggle="modal" data-target="#deleteModal">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Edit data modal --}}
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Form Edit Pegawai</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/user/{id}" method="POST" id="form_edit">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jabatan</label>
                                <select required name="position_id" id="position_edit" class="form-control">
                                    @foreach (App\Models\Position::all() as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group py-2">
                                <label for="exampleInputPassword1">Nama Pegawai</label>
                                <input required type="text" class="form-control" name="name"
                                    id="name_edit" placeholder="Nama Pegawai">
                            </div>
                            <div class="form-group py-2">
                                <label for="exampleInputPassword1">Nomor HP</label>
                                <input required type="number" class="form-control" name="phone"
                                    id="phone_edit" placeholder="Nomor HP">
                            </div>
                            <div class="form-group py-2">
                                <label for="exampleInputPassword1">Alamat</label>
                                <textarea required name="address" id="address_edit" class="form-control" cols="30" rows="3" placeholder="Alamat pegawai"></textarea>
                            </div>
                            <hr>
                            <div class="form-group py-2">
                                <label for="exampleInputPassword1">E-mail</label>
                                <input required type="email" class="form-control" name="email"
                                    id="email_edit" placeholder="Email pegawai">
                            </div>
                            <div class="form-group py-2">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" name="password"
                                    id="" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hak Akses</label>
                                <select required name="level" id="level_edit" class="form-control">
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <div class="my-4">
                                <input type="hidden" name="id" id="id">
                                <input type="hidden" name="_method" value="PUT">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- End edit data modal --}}
        {{-- Hapus data modal --}}
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="/user/{id}" method="POST" id="form_delete">
                            @csrf
                            <span id="delete_message"></span>
                            <div class="my-4">
                                <input type="hidden" name="id" id="id_delete">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- End hapus data modal --}}
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('.btn-edit').click(function(){
                $id = $(this).data('id');
                $position = $(this).data('position');
                $name = $(this).data('name');
                $email = $(this).data('email');
                $address = $(this).data('address');
                $phone = $(this).data('phone');
                $level = $(this).data('level');

                $('#id').val($id);
                $('#position_edit').val($position);
                $('#name_edit').val($name);
                $('#email_edit').val($email);
                $('#address_edit').val($address);
                $('#phone_edit').val($phone);
                $('#level_edit').val($level);

                $('#form_edit').attr('action', '/user/'+$id);
            });
            $('.btn-delete').click(function(){
                $id = $(this).data('id');
                $name = $(this).data('name');
                
                $('#delete_message').text("Apakah ingin hapus pegawai : "+ $name + " ? ");
                $('#form_delete').attr('action', '/user/'+$id);
            })
        })
    </script>
@endsection