<?php
include_once 'header.php';
require_once 'class/class.soal.php';
?>
	<div id="app" >
		<div class="main-grid">
			<div class="agile-grids">
				<div id="inputSoal" class="modal fade" role="dialog">
	        <div class="modal-dialog">
	          <div class="modal-content">
	              <div class="forms main-grid">
	                <div class="row">
	                  <h3 class="title text-center">Form Soal </h3>
										<div class="form-three widget-shadow">
												<form  method="post" enctype="multipart/form-data">
														<form class="form-horizontal" action="#" method="post">
															<div class="form-group">
																<label for="txtarea1" class="col-sm-4 control-label">Soal</label>
																<div class="col-sm-8"><textarea name="soal" id="txtarea1" cols="50" rows="6" class="form-control1" v-model="newSoal.soal"></textarea></div>
															</div>
															<div class="form-group">
																<label  class="col-sm-4 control-label">Kelas</label>
																<div class="col-sm-8">
																	<select  class="form-control" v-model="newSoal.kelas" v-on:change="onChange">
																		<option disabled value="">Pilih kelas</option>
																		<option  value="10">Kelas 10</option>
																		<option  value="11">Kelas 11</option>
																		<option  value="12">Kelas 12</option>
																	</select>
																</div>
															</div>
															<div class="form-group">
																<label  class="col-sm-4 control-label">Bab</label>
																<div class="col-sm-8">
																	<select  class="form-control" v-model="newSoal.bab">
																		<option disabled value="">Pilih Bab</option>
																		<option v-for="option in options" v-bind:value="option.value">{{option.text}}</option>
																	</select>
																</div>
															</div>
															<div class="form-group">
																<label for="focusedinput" class="col-sm-4 control-label">Pilihan A</label>
																<div class="col-sm-8">
																	<input type="text" class="form-control1" name="pilihana"  placeholder="Pilihan A"  v-model="newSoal.pilihana">
																</div>
															</div>
															<div class="form-group">
																<label for="focusedinput" class="col-sm-4 control-label">Pilihan B</label>
																<div class="col-sm-8">
																	<input type="text" class="form-control1" name="pilihanb"  placeholder="Pilihan B" v-model="newSoal.pilihanb">
																</div>
															</div>
															<div class="form-group">
																<label for="focusedinput" class="col-sm-4 control-label">Pilihan C</label>
																<div class="col-sm-8">
																	<input type="text" class="form-control1" name="pilihanc" placeholder="Pilihan C" v-model="newSoal.pilihanc">
																</div>
															</div>
															<div class="form-group">
																<label for="focusedinput" class="col-sm-4 control-label">Pilihan D</label>
																<div class="col-sm-8">
																	<input type="text" class="form-control1" name="pilihand"  placeholder="pilihan D" v-model="newSoal.pilihand">
																</div>
															</div>
															<div class="form-group">
																<label for="radio" class="col-sm-4 control-label">Jawaban</label>
																<div class="col-sm-8">
																	<div class="radio"><label><input type="radio" value="a" v-model="newSoal.benar"> Jawaban A</label></div>
																	<div class="radio"><label><input type="radio" value="b" v-model="newSoal.benar"> Jawaban B</label></div>
																	<div class="radio"><label><input type="radio" value="c" v-model="newSoal.benar"> Jawaban C</label></div>
																	<div class="radio"><label><input type="radio" checked="" value="d" v-model="newSoal.benar"> Jawaban D</label></div>
																</div>
															</div>
															<div class="form-group">
																 <div class="col-sm-6 text-center">
																	 <button type="button" class="btn btn-primary"  @click="addSoal();">Tambahkan</button>
																 </div>
																 <div class="col-sm-6 text-center">
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
				<div id="editSoal" class="modal fade" role="dialog">
	        <div class="modal-dialog">
	          <div class="modal-content">
	              <div class="forms main-grid">
	                <div class="row">
	                  <h3 class="title text-center">Form Soal </h3>
										<div class="form-three widget-shadow">
												<form  method="post">
														<form class="form-horizontal" action="#" method="post">
															<div class="form-group">
																<label for="txtarea1" class="col-sm-4 control-label">Soal</label>
																<div class="col-sm-8"><textarea name="soal" id="txtarea1" cols="50" rows="6" class="form-control1" v-model="selectedSoal.soal"></textarea></div>
															</div>
															<div class="form-group">
																<label  class="col-sm-4 control-label">Kelas</label>
																<div class="col-sm-8">
																	<select  class="form-control" v-model="selectedSoal.kelas" v-on:change="onChange">
																		<option disabled value="">Pilih kelas</option>
																		<option  value="10">Kelas 10</option>
																		<option  value="11">Kelas 11</option>
																		<option  value="12">Kelas 12</option>
																	</select>
																</div>
															</div>
															<div class="form-group">
																<label  class="col-sm-4 control-label">Bab</label>
																<div class="col-sm-8">
																	<select  class="form-control" v-model="selectedSoal.bab">
																		<option disabled value="">Pilih Bab</option>
																		<option v-for="option in optionselect" v-bind:value="option.value">{{option.text}}</option>
																	</select>
																</div>
															</div>
															<div class="form-group">
																<label for="focusedinput" class="col-sm-4 control-label">Pilihan A</label>
																<div class="col-sm-8">
																	<input type="text" class="form-control1" name="pilihana"  placeholder="Pilihan A"  v-model="selectedSoal.pilihana">
																</div>
															</div>
															<div class="form-group">
																<label for="focusedinput" class="col-sm-4 control-label">Pilihan B</label>
																<div class="col-sm-8">
																	<input type="text" class="form-control1" name="pilihanb"  placeholder="Pilihan B" v-model="selectedSoal.pilihanb">
																</div>
															</div>
															<div class="form-group">
																<label for="focusedinput" class="col-sm-4 control-label">Pilihan C</label>
																<div class="col-sm-8">
																	<input type="text" class="form-control1" name="pilihanc" placeholder="Pilihan C" v-model="selectedSoal.pilihanc">
																</div>
															</div>
															<div class="form-group">
																<label for="focusedinput" class="col-sm-4 control-label">Pilihan D</label>
																<div class="col-sm-8">
																	<input type="text" class="form-control1" name="pilihand"  placeholder="pilihan D" v-model="selectedSoal.pilihand">
																</div>
															</div>
															<div class="form-group">
																<label for="radio" class="col-sm-4 control-label">Jawaban</label>
																<div class="col-sm-8">
																	<div class="radio"><label><input type="radio" value="a" v-model="selectedSoal.benar"> Jawaban A</label></div>
																	<div class="radio"><label><input type="radio" value="b" v-model="selectedSoal.benar"> Jawaban B</label></div>
																	<div class="radio"><label><input type="radio" value="c" v-model="selectedSoal.benar"> Jawaban C</label></div>
																	<div class="radio"><label><input type="radio" checked="" value="d" v-model="selectedSoal.benar"> Jawaban D</label></div>
																</div>
															</div>
															<div class="form-group">
																 <div class="col-sm-6 text-center">
																	 <button type="button" class="btn btn-primary"  @click="updateSoal();">Simpan</button>
																 </div>
																 <div class="col-sm-6 text-center">
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
				<div id="hapusSoal" class="modal fade" role="dialog">
	        <div class="modal-dialog">
	          <div class="modal-content">
	              <div class="forms main-grid">
	                <div class="row">
	                  <h3 class="title text-center">Konfirmasi Hapus </h3>
	                  <div class="form-three widget-shadow">
	                    <form  method="post" class="form-horizontal">
	                      <h4 class="text-center">Yakin Akan Menghapus  ?</h4><br><br>
	                      <input type="hidden"  class="form-control1" name="kodeSoal" placeholder="Kode Soal" v-model="selectedSoal.kode">
	                      <div class="form-group">
	                          <div class="col-sm-6 text-center">
	                            <button type="button" class="btn btn-primary" @click="deleteSoal();">Iya</button>
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
					<button type="button" data-toggle='modal' data-target='#inputSoal' data-page='soal' class="btn btn-default w3ls-button" name="btnShow">Tambah Soal</button>
				</div>

				<!-- tables -->
				<div class="table-heading">
					<h2>Daftar Soal</h2>
				</div>
				<div class="agile-tables">
					<div class="w3l-table-info">
					    <table id="table">
						<thead>
						  <tr>
							<th>Kode</th>
							<th>Soal</th>
							<th>Kelas</th>
							<th>Bab</th>
							<th>Jawaban A</th>
							<th>Jawaban B</th>
							<th>Jawaban C</th>
							<th>Jawaban D</th>
							<th>Benar</th>
							<th>Edit</th>
							<th>Hapus</th>
						  </tr>
						</thead>
						<tbody v-for="data in soal">
						  <tr>
							<td>{{data.kode}}</td>
							<td>{{data.soal}}</td>
							<td>{{data.kelas}}</td>
							<td>{{data.bab}}</td>
							<td>{{data.pilihana}}</td>
							<td>{{data.pilihanb}}</td>
							<td>{{data.pilihanc}}</td>
							<td>{{data.pilihand}}</td>
							<td>{{data.benar}}</td>
							<td>
								<button type='button' data-toggle='modal' data-target='#editSoal' data-page='soal' class='btn btn-primary btn-sm' @click="selectSoal(data);">
									<span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>
							</button></td>
							<td> <button type='button' data-toggle='modal' data-target='#hapusSoal' data-page='soal' class='btn btn-danger btn-sm' @click="selectSoal(data);">
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
			var types = {
		  10: [ {
		      value: '10a',
		      text: 'Atom Dan Unsur Kimia'
		    }, {
		      value: '10b',
		      text: 'Ikatan Kimia'
		    }, {
		      value: '10c',
		      text: 'Perhitungan Kimia'
		    },{
		      value: '10d',
		      text: 'Laju Reaksi'
		    },{
		      value: '10e',
		      text: 'Larutan'
		    },{
		      value: '10f',
		      text: 'Reaksi Redoks'
		    },{
		      value: '10g',
		      text: 'Senyawan Karbon'
		    },
		  ],
		  11: [ {
		      value: '11a',
		      text: 'Hidrokarbon Dan Minyak Bumi'
		    }, {
		      value: '11b',
		      text: 'Termokimia'
		    }, {
		      value: '11c',
		      text: 'Kesetimbangan Kimia'
		    }, {
			    value: '11d',
			    text: 'Kesetimbangan Asam Basa'
			  }, {
			    value: '11e',
			    text: 'Kesetimbangan Reaksi Kelarutan'
			  }, {
			    value: '11f',
			    text: 'Koloid'
			  },

		  ],
		  12: [ {
		      value: '12a',
		      text: 'Unsur Kimia'
		    }, {
		      value: '12b',
		      text: 'Struktur Benzena'
		    }, {
		      value: '12c',
		      text: 'Makromolekul'
		    }, {
			    value: '12d',
			    text: 'Kimia Inti'
			  }, {
			    value: '12e',
			    text: 'Gas Mulia'
			  }, {
			    value: '12f',
			    text: 'Biokimia'
			  }, {
				  value: '12g',
				  text: 'Kimia Organik'
				}, {
				  value: '12h',
				  text: 'Elektrokimia'
				},
		  ]
		}
		var soalApp = new Vue({
				el:"#app",
				data: {
					soal          : {kode:"", soal:"", kelas:"", bab:"", pilihana:"",pilihanb:"",pilihanc:"",pilihand:"",benar:""},
					selectedSoal  : {},
					newSoal     	: {soal:"", kelas:"", bab:"",pilihana:"",pilihanb:"",pilihanc:"",pilihand:"",benar:""},
					errorMessage 	: ""
				},
				computed:{
					options: function(event){
						return types[this.newSoal.kelas];
					},
					optionselect: function(event){
						return types[this.selectedSoal.kelas];
					},
				},
				mounted: function(){
					this.getSoal();
				},
				methods: {
					getSoal: function(){
						axios.get("<?php echo base_url();?>class/api.php?view")
						.then(function(response){
							if(!response.data.Message){
								soalApp.soal = response.data.records;
							}
						});
					},
					selectSoal: function(soalSelected){
						soalApp.selectedSoal = JSON.parse(JSON.stringify(soalSelected));
					},
					addSoal: function(){
						let formData = soalApp.toFormData(soalApp.newSoal);
						axios.post("<?php echo base_url();?>class/api.php?input", formData,
                {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
              })
						.then(function(response){
							soalApp.newSoal = {};
							if(response.data.error){
								soalApp.errorMessage = response.data.Message;
							}else{
								$('#inputSoal').modal('toggle');
								soalApp.getSoal();
							}
						});
					},
					updateSoal: function(){
						let formData = soalApp.toFormData(soalApp.selectedSoal);
						axios.post("<?php echo base_url();?>class/api.php?save", formData)
						.then(function(response){
							soalApp.selectedSoal = {};
							if(response.data.error){
								soalApp.errorMessage = response.data.Message;
							}else{
								$('#editSoal').modal('toggle');
								soalApp.getSoal();
							}
						});
					},
					deleteSoal: function(){
						let formData = soalApp.toFormData(soalApp.selectedSoal);
						axios.post("<?php echo base_url();?>class/api.php?delete", formData)
						.then(function(response){
							soalApp.selectedSoal = {};
							if(response.data.error){
								soalApp.errorMessage = response.data.Message;
							}else{
								$('#hapusSoal').modal('toggle');
								soalApp.getSoal();
							}
						});
					},
					toFormData: function(obj){
						var form_data = new FormData();
						for (var key in obj) {
							form_data.append(key, obj[key]);
						}
						return form_data;
					},
					onChange: function(e){
						this.options = this.options;
						this.optionselect = this.optionselect;
					},
					onFileSelected(event){

					}
				}
			});
		</script>
	</body>
	</html>
