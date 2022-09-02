@extends('layouts.app')
@section('content')
    <section>
        <div class="d-flex justify-content-between">
            <div>
                <h3>Salary</h3>
                <p>Data Penggajian</p>

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
                              <h5 class="modal-title" id="exampleModalLabel">Form Gaji</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <form action="/salary" method="POST">
                                    @csrf
                                    <div class="form-group py-2">
                                        <label for="exampleInputPassword1">Gaji</label>
                                        <input type="text" class="form-control" name="salary"
                                            id="exampleInputPassword1" placeholder="Gaji">
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
                        @foreach ($salary as $key => $s)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>Rp. {{ number_format($s->salary,0,'.','.') }}</td>
                            <td>
                                <button data-id="{{ $s->id }}" data-salary="{{$s->salary}}" type="button"
                                    class="btn btn-primary btn-sm btn-edit" data-toggle="modal" data-target="#editModal">
                                    Edit
                                </button>
                                <button data-id="{{ $s->id }}"  data-salary="{{$s->salary}}" type="button"
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
                        <h5 class="modal-title" id="editModalLabel">Form Edit Gaji</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/salary/{id}" method="POST" id="form_edit">
                            @csrf
                            <div class="form-group py-2">
                                <label for="exampleInputPassword1">Gaji</label>
                                <input type="text" class="form-control" name="salary" id="salary_edit"
                                    placeholder="Gaji">
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
                        <form action="/salary/{id}" method="POST" id="form_delete">
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
                $('#id').val($id);
                $('#salary_edit').val($salary);
                $('#form_edit').attr('action', '/salary/'+$id);
            });
            $('.btn-delete').click(function(){
                $id = $(this).data('id');
                $position = $(this).data('salary');
                $('#delete_message').text("Apakah ingin hapus gaji : "+ $position + " ? ");
                $('#form_delete').attr('action', '/salary/'+$id);
            })
        })
    </script>
@endsection