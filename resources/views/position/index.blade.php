@extends('layouts.app')
@section('content')
    <section>
        <div class="d-flex justify-content-between">
            <div>
                <h3>Position</h3>
                <p>Data Jabatan</p>
            </div>
        </div>
        <div class="grey-bg my-2">
            <div class="d-flex justify-content-between">
                <div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Tambah Jabatan
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
                                <form action="/position" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Gaji</label>
                                        <select name="salary_id" id="" class="form-control">
                                            <option value="0">--Pilih Gaji--</option>
                                            @foreach (App\Models\Salary::all() as $item)
                                                <option value="{{ $item->id }}">{{ $item->salary }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group py-2">
                                        <label for="exampleInputPassword1">Nama Jabatan</label>
                                        <input type="text" class="form-control" name="name"
                                            id="exampleInputPassword1" placeholder="Nama Jabatan">
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
                            <th>Gaji</th>
                            <th>Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($positions as $key => $position)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>Rp. {{ number_format($position->salary->salary,0,'.','.') }}</td>
                            <td>{{ $position->name }}</td>
                            <td>
                                <button data-id="{{ $position->id }}" data-salary="{{$position->salary->id}}" data-name="{{ $position->name }}" type="button"
                                    class="btn btn-primary btn-sm btn-edit" data-toggle="modal" data-target="#editModal">
                                    Edit
                                </button>
                                <button data-id="{{ $position->id }}" data-name="{{ $position->name }}" type="button"
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
                        <h5 class="modal-title" id="editModalLabel">Form Edit Jabatan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/position/{id}" method="POST" id="form_edit">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Gaji</label>
                                <select name="salary_id" id="salary_edit" class="form-control">
                                    <option value="0">--Pilih Gaji--</option>
                                    @foreach (App\Models\Salary::all() as $item)
                                        <option value="{{ $item->id }}">{{ $item->salary }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group py-2">
                                <label for="exampleInputPassword1">Nama Jabatan</label>
                                <input type="text" class="form-control" name="name" id="position_edit"
                                    placeholder="Nama Jabatan">
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
                        <form action="/position/{id}" method="POST" id="form_delete">
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
                $salary = $(this).data('salary');
                $position = $(this).data('name');
                $('#id').val($id);
                $('#salary_edit').val($salary);
                $('#position_edit').val($position);
                $('#form_edit').attr('action', '/position/'+$id);
            });
            $('.btn-delete').click(function(){
                $id = $(this).data('id');
                $position = $(this).data('name');
                $('#delete_message').text("Apakah ingin hapus jabatan : "+ $position + " ? ");
                $('#form_delete').attr('action', '/position/'+$id);
            })
        })
    </script>
@endsection