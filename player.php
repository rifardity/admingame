<?php
include_once 'header.php';
require_once 'class/class.player.php';
?>
	<div id="app" >
		<div class="main-grid">
			<div class="agile-grids">
				<div id="inputplayer" class="modal fade" role="dialog">
	        <div class="modal-dialog">
	          <div class="modal-content">
	              <div class="forms main-grid">
	                <div class="row">
	                  <h3 class="title text-center">Form player </h3>
										<div class="form-three widget-shadow">
												<form  method="post">
														<form class="form-horizontal" action="#" method="post">
															<div class="form-group">
																<label for="focusedinput" class="col-sm-4 control-label">Nama </label>
																<div class="col-sm-8">
																	<input type="text" class="form-control1"  placeholder="Nama" v-model="newplayer.name">
																</div>
															</div>
															<div class="form-group">
																<label for="focusedinput" class="col-sm-4 control-label">Email</label>
																<div class="col-sm-8">
																	<input type="email" class="form-control1"  placeholder="Email" v-model="newplayer.email">
																</div>
															</div>
															<div class="form-group">
																<label for="focusedinput" class="col-sm-4 control-label">Telepon</label>
																<div class="col-sm-8">
																	<input type="text" class="form-control1"   placeholder="Telpon" v-model="newplayer.telp">
																</div>
															</div>
                              <div class="form-group">
																<label for="focusedinput" class="col-sm-4 control-label">Password</label>
																<div class="col-sm-8">
																	<input type="password" class="form-control1"   placeholder="password" v-model="newplayer.password">
																</div>
															</div>
															<div class="form-group">
																 <div class="col-sm-6 text-center">
																	 <br>
																	 <button type="button" class="btn btn-primary"  @click="addplayer();">Tambahkan</button>
																 </div>
																 <div class="col-sm-6 text-center">
																	 <br>
																	 <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
																 </div>
															</div>
														</form>
													</div>
												</form>

	                  </div>
	                </div>
	            </div>
	          </div>
	      </div>
				<div id="editplayer" class="modal fade" role="dialog">
	        <div class="modal-dialog">
	          <div class="modal-content">
	              <div class="forms main-grid">
	                <div class="row">
	                  <h3 class="title text-center">Form player </h3>
										<div class="form-three widget-shadow">
												<form  method="post">
														<form class="form-horizontal" action="#" method="post">
                              <div class="form-group">
                                <label for="focusedinput" class="col-sm-4 control-label">Nama </label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control1"  placeholder="Nama" v-model="selectedplayer.name">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="focusedinput" class="col-sm-4 control-label">Telepon</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control1"   placeholder="Telpon" v-model="selectedplayer.telp">
                                </div>
                              </div>
															<div class="form-group">
																 <div class="col-sm-6 text-center">
																	 <br>
																	 <button type="button" class="btn btn-primary"  @click="updateplayer();">Simpan</button>
																 </div>
																 <div class="col-sm-6 text-center">
																	 <br>
																	 <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
																 </div>
															</div>
														</form>
													</div>
												</form>

	                  </div>
	                </div>
	            </div>
	          </div>
	      </div>
				<div id="hapusplayer" class="modal fade" role="dialog">
	        <div class="modal-dialog">
	          <div class="modal-content">
	              <div class="forms main-grid">
	                <div class="row">
	                  <h3 class="title text-center">Konfirmasi Hapus </h3>
	                  <div class="form-three widget-shadow">
	                    <form  method="post" class="form-horizontal">
	                      <h4 class="text-center">Yakin Akan Menghapus  ?</h4><br><br>
	                      <input type="hidden"  class="form-control1" name="kodeplayer" placeholder="Kode player" v-model="selectedplayer.id">
	                      <div class="form-group">
	                          <div class="col-sm-6 text-center">
	                            <button type="button" class="btn btn-primary" @click="deleteplayer();">Iya</button>
	                          </div>
	                          <div class="col-sm-6 text-center">
	                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
	                          </div>
	                      </div>
	                    </form>
	                    </div>
	                  </div>
	                </div>
	            </div>
	          </div>
	        </div>
				<div class="col-sm-12">
					<button type="button" data-toggle='modal' data-target='#inputplayer' data-page='player' class="btn btn-default w3ls-button" name="btnShow">Tambah player</button>
				</div>

				<!-- tables -->
				<div class="table-heading">
					<h2>Daftar player</h2>
				</div>
				<div class="agile-tables">
					<div class="w3l-table-info">
					    <table id="table">
						<thead>
						  <tr>
							<th>Kode</th>
							<th>Nama</th>
							<th>Email</th>
							<th>Telp</th>
							<th>Confirmed</th>
							<th>Edit</th>
							<th>Hapus</th>
						  </tr>
						</thead>
						<tbody v-for="data in player">
						  <tr>
							<td>{{data.id}}</td>
							<td>{{data.name}}</td>
							<td>{{data.email}}</td>
							<td>{{data.telp}}</td>
							<td>{{data.confirmed}}</td>
							<td>
								<button type='button' data-toggle='modal' data-target='#editplayer' data-page='player' class='btn btn-primary btn-sm' @click="selectplayer(data);">
									<span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>
							</button></td>
							<td> <button type='button' data-toggle='modal' data-target='#hapusplayer' data-page='player' class='btn btn-danger btn-sm' @click="selectplayer(data);">
								<span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
						</button></td>
						  </tr>
						</tbody>
					  </table>
					</div>
				</div>
				<!-- //tables -->
			</div>
		</div>
	</div>
	<!-- footer -->
	<div class="footer">
	  <p>© 2016 Colored . All Rights Reserved . Design by <a href="http://w3layouts.com/">W3layouts</a></p>
	</div>
	<!-- //footer -->
	</section>

	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/proton.js"></script>
	<script>
		var playerApp = new Vue({
				el:"#app",
				data: {
					player          : {name:"", email:"", password:"",telp:"",confirmed:""},
					selectedplayer  : {},
					newplayer     : {name:"", email:"", password:"",telp:"",confirmed:""},
					errorMessage   : ""
				},
				mounted: function(){
					this.getplayer();
				},
				methods: {
					getplayer: function(){
						axios.get("<?php echo base_url();?>class/api.php?playerview")
						.then(function(response){
							if(!response.data.Message){
								console.log(response.data.records);
								playerApp.player = response.data.records;
							}
						});
					},
					selectplayer: function(playerSelected){
						playerApp.selectedplayer = JSON.parse(JSON.stringify(playerSelected));
					},
					addplayer: function(){
						let formData = playerApp.toFormData(playerApp.newplayer);
						axios.post("<?php echo base_url();?>class/api.php?playerinput", formData)
						.then(function(response){
							playerApp.newplayer = {};
							if(response.data.error){
								playerApp.errorMessage = response.data.Message;
							}else{
								$('#inputplayer').modal('toggle');
								playerApp.getplayer();
							}
						});
					},
					updateplayer: function(){
						let formData = playerApp.toFormData(playerApp.selectedplayer);
						axios.post("<?php echo base_url();?>class/api.php?playersave", formData)
						.then(function(response){
							playerApp.selectedplayer = {};
							if(response.data.error){
								playerApp.errorMessage = response.data.Message;
							}else{
								$('#editplayer').modal('toggle');
								playerApp.getplayer();
							}
						});
					},
					deleteplayer: function(){
						let formData = playerApp.toFormData(playerApp.selectedplayer);
						axios.post("<?php echo base_url();?>class/api.php?playerdelete", formData)
						.then(function(response){
							playerApp.selectedplayer = {};
							if(response.data.error){
								playerApp.errorMessage = response.data.Message;
							}else{
								$('#hapusplayer').modal('toggle');
								playerApp.getplayer();
							}
						});
					},
					toFormData: function(obj){
						var form_data = new FormData();
						for (var key in obj) {
							form_data.append(key, obj[key]);
						}
						return form_data;
					}
				}
			});
		</script>
	</body>
	</html>
