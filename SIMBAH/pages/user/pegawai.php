<div class="card">
    <div class="card-header ch-img" style="background-image: url(img/headers/4.png); height: 150px;">
        <h2>LIST PEGAWAI</h2>
        <button data-toggle="modal" data-target="#tambah-pegawai" class="btn palette-Light-Green bg btn-float waves-effect waves-circle waves-float"><i class="zmdi zmdi-plus"></i></button>
    </div>


    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Pegawai</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>No Hp</th>
                    <th>Jenis Kelamin</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody id="get-pegawai">

            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah Pegawai -->
<div class="modal fade" id="tambah-pegawai" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-pegawai">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Pegawai</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="fg-line">
                            <p class="f-500 m-b-15 c-black">Nama Pegawai</p>
                            <input type="text" name="username_pegawai" id="username_pegawai" class="form-control input-sm" placeholder="Input Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fg-line">
                            <p class="f-500 m-b-15 c-black">Password Pegawai</p>
                            <input type="text" name="password_pegawai" id="password_pegawai" class="form-control input-sm" placeholder="Input Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fg-line">
                            <p class="f-500 m-b-15 c-black">Alamat Pegawai</p>
                            <textarea name="address_pegawai" rows="2" id="address_pegawai" class="form-control input-sm" placeholder="Input Address"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fg-line">
                            <p class="f-500 m-b-15 c-black">Telpon Pegawai</p>
                            <input type="Number" maxlength="13" name="phone_pegawai" id="phone_pegawai" class="form-control input-sm" placeholder="Input Phone Number">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="f-500 m-b-15 c-black">Jenis Kelamin Pegawai</p>

                            <select name="sex_pegawai" id="sex_pegawai" class="selectpicker">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <!-- 
                    <label class="radio radio-inline m-r-20">
                        <input type="radio" name="sex_pegawai" class="sex_pegawai" value="option1">
                        <i class="input-helper"></i>
                        Laki-laki
                    </label>

                    <label class="radio radio-inline m-r-20">
                        <input type="radio" name="sex_pegawai" class="sex_pegawai" value="option2">
                        <i class="input-helper"></i>
                        Perempuan
                    </label> -->


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn palette-Light-Green bg btn-icon-text"><i class="zmdi zmdi-check-all"></i> Simpan</button>
                    <button type="button" class="btn palette-Deep-Orange bg btn-icon-text" data-dismiss="modal"><i class="zmdi zmdi-close"></i> Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Pegawai -->
<div class="modal fade" id="edit-pegawai" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-update-pegawai">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Pegawai</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="idPegawai">
                    <div class="form-group">
                        <div class="fg-line">
                            <p class="f-500 m-b-15 c-black">Nama Pegawai</p>
                            <input type="text" name="edit_username_pegawai" id="edit_username_pegawai" class="form-control input-sm" placeholder="Input Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fg-line">
                            <p class="f-500 m-b-15 c-black">Alamat Pegawai</p>
                            <textarea name="edit_address_pegawai" rows="2" id="edit_address_pegawai" class="form-control input-sm" placeholder="Input Address"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fg-line">
                            <p class="f-500 m-b-15 c-black">Telpon Pegawai</p>
                            <input type="number" maxlength="13" name="edit_phone_pegawai" id="edit_phone_pegawai" class="form-control input-sm" placeholder="Input Phone Number">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="f-500 m-b-15 c-black">Jenis Kelamin Pegawai</p>

                            <select name="edit_sex_pegawai" id="edit_sex_pegawai" class="selectpicker">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn palette-Light-Green bg btn-icon-text"><i class="zmdi zmdi-check-all"></i> Simpan</button>
                    <button type="button" class="btn palette-Deep-Orange bg btn-icon-text" data-dismiss="modal"><i class="zmdi zmdi-close"></i> Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
