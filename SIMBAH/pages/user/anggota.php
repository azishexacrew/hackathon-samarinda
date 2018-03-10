<div class="card">
    <div class="card-header ch-img" style="background-image: url(img/headers/4.png); height: 150px;">
        <h2>LIST PEGAWAI</h2>
        <button data-toggle="modal" data-target="#tambah-anggota" class="btn palette-Light-Green bg btn-float waves-effect waves-circle waves-float"><i class="zmdi zmdi-plus"></i></button>
    </div>


    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Anggota</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>No Hp</th>
                    <th>Jenis Kelamin</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody id="get-anggota">

            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah Anggota -->
<div class="modal fade" id="tambah-anggota" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-anggota">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Anggota</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="fg-line">
                            <p class="f-500 m-b-15 c-black">Nama Anggota</p>
                            <input type="text" name="username_anggota" id="username_anggota" class="form-control input-sm" placeholder="Input Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fg-line">
                            <p class="f-500 m-b-15 c-black">Password Anggota</p>
                            <input type="text" name="password_anggota" id="password_anggota" class="form-control input-sm" placeholder="Input Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fg-line">
                            <p class="f-500 m-b-15 c-black">Alamat Anggota</p>
                            <textarea name="address_anggota" rows="2" id="address_anggota" class="form-control input-sm" placeholder="Input Address"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fg-line">
                            <p class="f-500 m-b-15 c-black">Telpon Anggota</p>
                            <input type="Number" maxlength="13" name="phone_anggota" id="phone_anggota" class="form-control input-sm" placeholder="Input Phone Number">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="f-500 m-b-15 c-black">Jenis Kelamin Anggota</p>

                            <select name="sex_anggota" id="sex_anggota" class="selectpicker">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <!-- 
                    <label class="radio radio-inline m-r-20">
                        <input type="radio" name="sex_anggota" class="sex_anggota" value="option1">
                        <i class="input-helper"></i>
                        Laki-laki
                    </label>

                    <label class="radio radio-inline m-r-20">
                        <input type="radio" name="sex_anggota" class="sex_anggota" value="option2">
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

<!-- Modal Edit Anggota -->
<div class="modal fade" id="edit-anggota" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-update-anggota">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Anggota</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="idAnggota">
                    <div class="form-group">
                        <div class="fg-line">
                            <p class="f-500 m-b-15 c-black">Nama Anggota</p>
                            <input type="text" name="edit_username_anggota" id="edit_username_anggota" class="form-control input-sm" placeholder="Input Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fg-line">
                            <p class="f-500 m-b-15 c-black">Alamat Anggota</p>
                            <textarea name="edit_address_anggota" rows="2" id="edit_address_anggota" class="form-control input-sm" placeholder="Input Address"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fg-line">
                            <p class="f-500 m-b-15 c-black">Telpon Anggota</p>
                            <input type="number" maxlength="13" name="edit_phone_anggota" id="edit_phone_anggota" class="form-control input-sm" placeholder="Input Phone Number">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="f-500 m-b-15 c-black">Jenis Kelamin Anggota</p>

                            <select name="edit_sex_anggota" id="edit_sex_anggota" class="selectpicker">
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
