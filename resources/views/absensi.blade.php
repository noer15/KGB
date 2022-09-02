@extends('layouts.app')
@section('content')
    <section>
        <div class="d-flex justify-content-between">
            <div>
                <h3>Absensi</h3>
                <p>Welcome back User</p>
            </div>
            <div>
                <form action="/downloadPdf" method="GET">
                    <div class="d-flex gap-3">
                        <div class="form-group py-2">
                            <label for="exampleInputPassword1">Start Date</label>
                                <input type="date" name="start_date" class="form-control">
                        </div>
                        <div class="form-group py-2">
                            <label for="exampleInputPassword1">End Date</label>
                                <input type="date" name="end_date" class="form-control">
                        </div>
                        <div class="form-group pt-4">
                            <button type="submit" class="btn btn-primary">Download</button>
                        </div>
                    </div>
                  </form>
            </div>
        </div>
        <div class="grey-bg my-2">
            <section >
                <div class="row">
                    <div class="col-sm">
                     <div class="card p-4">
                        <h4>ABSESN MASUK</h4>
                        <p>
                            @if($absen)
                        Waktu Masuk <br>
                        <h4>{{ $absen->check_in }}</h4>
                        
                        @else
                            <form action="/absensi" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">
                                Absen Masuk</button>
                            </form>
                        @endif
                        </p>
                     </div>
                    </div>
                    <div class="col-sm">
                     <div class="card p-4">
                        <h4>ABSESN KELUAR</h4>
                        <p>
                            @if($absen)
                        Waktu Keluar <br>
                        <h4>{{ $absen->check_out ?? 'belum absen keluar' }}</h4>
                        
                            @if(!$absen->check_out)
                            <div class="my-4">
                                <form action="/absensi" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Absen Keluar</button>
                                </form>
                            </div>
                            @endif
                        @endif
                        </p>
                     </div>
                    </div>
                  </div>
                <div class="row">
                    
                    <div class="col">
                        
                      </div>
                  </div>
            </section>
        </div>
    </section>
@endsection