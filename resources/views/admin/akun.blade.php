@extends('layouts.app')

@section('konten')
<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                
                <div class="">
                    <h4 style="font-weight: bold;">Data Akun</h4>
                </div>

                <div style="margin-top: 20px; margin-bottom: -25px;">
                    <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#TambahDataAkun"><i class="far fa-edit"></i>Add Data</button>
                </div>

                {{-- menampilkan error validasi --}}
                @if (count($errors) > 0)
                <div class="alert alert-danger" style="margin-top: 25px; margin-bottom: -20px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="table-responsive mb-4 mt-4">
                    <table id="zero-config" class="table table-hover" style="width:100%">
                        <thead>
                            <tr align="center">
                                <th>No</th>
                                <th>USERNAME</th>
                                <th>EMAIL/NIDN</th>
                                <th>PASSWORD</th>
                                <th>ROLE</th>
                                <th class="no-content"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>
                            @foreach ($akun as $d)
                            <?php $no++ ;?>
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $d->name }}</td>
                                <td>{{ $d->email }}</td>
                                <td>{{ substr($d->password,0,10) }}</td>
                                <td>{{ $d->role }}</td>
                                <td class="row">
                                    <button class="edit-button btn btn-primary mb-2 modal-show"  data-toggle="modal" data-target="#EditDataAkun" data-id="{{ $d->id }}" data-name="{{ $d->name }}" data-email="{{ $d->email }}" data-password="{{ $d->password }}" data-role="{{ $d->role }}"><i class="far fa-edit"></i></button>
                                    
                                    <form action="{{url('akun/hapus/'.$d->id)}}" method="GET">
                                        <div class="right gap-items-2">
                                            <button class="btn btn-xs btn-danger submitForm" name="archive" type="submit" id="submitForm" ><i class="far fa-trash-alt"></i></button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>USERNAME</th>
                                <th>EMAIL/NIDN</th>
                                <th>PASSWORD</th>
                                <th>ROLE</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>

{{-- Modal Tambah Data --}}
<div class="modal fade fadeinUp" id="TambahDataAkun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold;">Tambah Data Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
            </div>
            <form action="/akun/store" method="POST">
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group mb-4">
                    <label for="name">Username</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group mb-4">
                    <label for="email">Email / NIDN</label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group mb-4">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group mb-4">
                    <label for="role">Role</label><br>
                    <select class="selectpicker form-control" data-live-search="true" id="role" name="role" required>
                        <option value="">-</option>
                        <option value="superadmin">Superadmin</option>
                        <option value="prodi">Admin Prodi</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Save">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
            </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Edit Data --}}
<div class="modal fade fadeinUp" id="EditDataAkun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold;">Edit Data Dosen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
            </div>
            <form action="/akun/update" method="POST">
            {{ csrf_field() }}
            <div class="modal-body">
                <input type="hidden" class="form-control" id="id_akun" name="id_akun">
                <div class="form-group mb-4">
                    <label for="name">Username</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group mb-4">
                    <label for="email">Email/NIDN</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
                <div class="form-group mb-4">
                    <label for="nama">Password</label>
                    <input type="text" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group mb-4">
                    <label for="role">Role</label><br>
                    <select class="selectpicker form-control" data-live-search="true" id="role" name="role">
                        <option value="superadmin">Superadmin</option>
                        <option value="prodi">Admin Prodi</option>
                        <option value="user">User</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Edit">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
