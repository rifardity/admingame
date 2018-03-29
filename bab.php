<?php
include_once 'header.php';
require_once 'class/class.bab.php';
?>
	<div id="app" >
		<div class="main-grid">
			<div class="agile-grids">
				<div id="inputbab" class="modal fade" role="dialog">
	        <div class="modal-dialog">
	          <div class="modal-content">
	              <div class="forms main-grid">
	                <div class="row">
	                  <h3 class="title text-center">Form bab </h3>
										<div class="form-three widget-shadow">
												<form  method="post">
														<form class="form-horizontal" action="#" method="post">
															<div class="form-group">
																<label for="focusedinput" class="col-sm-4 control-label">Id Bab </label>
																<div class="col-sm-8">
																	<input type="text" class="form-control1"  placeholder="Id Bab" v-model="newbab.id_bab">
																</div>
															</div>
                              <div class="form-group">
																<label for="focusedinput" class="col-sm-4 control-label">Bab </label>
																<div class="col-sm-8">
																	<input type="text" class="form-control1"  placeholder="Bab" v-model="newbab.bab">
																</div>
															</div>
                              <div class="form-group">
																<label for="focusedinput" class="col-sm-4 control-label">Kelas </label>
																<div class="col-sm-8">
                                  <select  class="form-control" v-model="newbab.kelas">
																		<option disabled value="">Pilih kelas</option>
																		<option  value="10">Kelas 10</option>
																		<option  value="11">Kelas 11</option>
																		<option  value="12">Kelas 12</option>
																	</select>
																</div>
															</div>
															<div class="form-group">
																 <div class="col-sm-6 text-center">
																	 <br>
																	 <button type="button" class="btn btn-primary"  @click="addbab();">Tambahkan</button>
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
				<div id="hapusbab" class="modal fade" role="dialog">
	        <div class="modal-dialog">
	          <div class="modal-content">
	              <div class="forms main-grid">
	                <div class="row">
	                  <h3 class="title text-center">Konfirmasi Hapus </h3>
	                  <div class="form-three widget-shadow">
	                    <form  method="post" class="form-horizontal">
	                      <h4 class="text-center">Yakin Akan Menghapus  ?</h4><br><br>
	                      <input type="hidden"  class="form-control1"  placeholder="Kode bab" v-model="selectedbab.id_bab">
	                      <div class="form-group">
	                          <div class="col-sm-6 text-center">
	                            <button type="button" class="btn btn-primary" @click="deletebab();">Iya</button>
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
					<button type="button" data-toggle='modal' data-target='#inputbab' data-page='bab' class="btn btn-default w3ls-button" name="btnShow">Tambah bab</button>
				</div>

				<!-- tables -->
				<div class="table-heading">
					<h2>Daftar Bab</h2>
				</div>
				<div class="agile-tables">
					<div class="w3l-table-info">
					  <table id="table">
						<thead>
						  <tr>
							<th>Id Bab</th>
							<th>Bab</th>
							<th>Kelas</th>
							<th>Hapus</th>
						  </tr>
						</thead>
						<tbody v-for="data in bab">
						  <tr>
							<td>{{data.id_bab}}</td>
							<td>{{data.bab}}</td>
							<td>{{data.kelas}}</td>
							<td> <button type='button' data-toggle='modal' data-target='#hapusbab' data-page='bab' class='btn btn-danger btn-sm' @click="selectbab(data);">
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
		var babApp = new Vue({
				el:"#app",
				data: {
					bab          : {id_bab:"", bab:"", kelas:""},
					selectedbab  : {},
					newbab     : {id_bab:"", bab:"", kelas:""},
					errorMessage   : ""
				},
				mounted: function(){
					this.getbab();
				},
				methods: {
					getbab: function(){
						axios.get("<?php echo base_url();?>class/api.php?babviewall")
						.then(function(response){
							if(!response.data.Message){
								console.log(response.data.records);
								babApp.bab = response.data.records;
							}
						});
					},
					selectbab: function(babSelected){
						babApp.selectedbab = JSON.parse(JSON.stringify(babSelected));
					},
					addbab: function(){
						let formData = babApp.toFormData(babApp.newbab);
						axios.post("<?php echo base_url();?>class/api.php?babinput", formData)
						.then(function(response){
							babApp.newbab = {};
							if(response.data.error){
								babApp.errorMessage = response.data.Message;
							}else{
								$('#inputbab').modal('toggle');
								babApp.getbab();
							}
						});
					},
					deletebab: function(){
						let formData = babApp.toFormData(babApp.selectedbab);
						axios.post("<?php echo base_url();?>class/api.php?babdelete", formData)
						.then(function(response){
							babApp.selectedbab = {};
							if(response.data.error){
								babApp.errorMessage = response.data.Message;
							}else{
								$('#hapusbab').modal('toggle');
								babApp.getbab();
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
