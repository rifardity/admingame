<?php
include_once 'header.php';
?>
<div class="main-grid">
	<div class="social grid">
		<div class="grid-info">
				<div class="col-md-3 top-comment-grid">
					<div class="comments likes">
						<div class="comments-icon">
							<i class="fa fa-facebook"></i>
						</div>
						<div class="comments-info likes-info">
							<h3>95K</h3>
							<a href="#">Likes</a>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-3 top-comment-grid">
					<div class="comments">
						<div class="comments-icon">
							<i class="fa fa-comments"></i>
						</div>
						<div class="comments-info">
							<h3>12K</h3>
							<a href="#">Comments</a>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-3 top-comment-grid">
					<div class="comments tweets">
						<div class="comments-icon">
							<i class="fa fa-twitter"></i>
						</div>
						<div class="comments-info tweets-info">
							<h3>27K</h3>
							<a href="#">Tweets</a>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-3 top-comment-grid">
					<div class="comments views">
						<div class="comments-icon">
							<i class="fa fa-eye"></i>
						</div>
						<div class="comments-info views-info">
							<h3>557K</h3>
							<a href="#">Views</a>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
	</div>
	<div class="agile-two-grids">
		<div class="col-md-6 count">
				<div class="count-grid">
					<h3 class="title">Countdown</h3>
					<ul id="example">
						<li><span class="hours">00</span><p class="hours_text">Hours</p></li>
						<li class="seperator">:</li>
						<li><span class="minutes">00</span><p class="minutes_text">Minutes</p></li>
						<li class="seperator">:</li>
						<li><span class="seconds">00</span><p class="seconds_text">Seconds</p></li>
					</ul>
					<div class="clearfix"> </div>
					<script type="text/javascript" src="assets/js/jquery.countdown.min.js"></script>
					<script type="text/javascript">
						$('#example').countdown({
							date: '12/24/2020 18:59:59',
							offset: -8,
							day: 'Day',
							days: 'Days'
						}, function () {
							alert('Done!');
						});
					</script>
				</div>
		</div>
		<div class="col-md-6 weather">
			<div class="weather-right">
				<div class="weather-heading">
					<h3>Weather Report</h3>
				</div>
						<ul>
							<li>
								<figure class="icons">
									<canvas id="partly-cloudy-day" width="60" height="60"></canvas>
								</figure>
								<h3>25 °C</h3>
								<div class="clearfix"></div>
							</li>
							<li>
								<figure class="icons">
									<canvas id="clear-day" width="40" height="40"></canvas>
								</figure>
								<div class="weather-text">
									<h4>WED</h4>
									<h5>27 °C</h5>
								</div>
								<div class="clearfix"></div>
							</li>
							<li>
								<figure class="icons">
									<canvas id="snow" width="40" height="40"></canvas>
								</figure>
								<div class="weather-text">
									<h4>THR</h4>
									<h5>13 °C</h5>
								</div>
								<div class="clearfix"></div>
							</li>
							<li>
								<figure class="icons">
									<canvas id="partly-cloudy-night" width="40" height="40"></canvas>
								</figure>
								<div class="weather-text">
									<h4>FRI</h4>
									<h5>18 °C</h5>
								</div>
								<div class="clearfix"></div>
							</li>
							<li>
								<figure class="icons">
									<canvas id="cloudy" width="40" height="40"></canvas>
								</figure>
								<div class="weather-text">
									<h4>SAT</h4>
									<h5>15 °C</h5>
								</div>
								<div class="clearfix"></div>
							</li>
							<li>
								<figure class="icons">
									<canvas id="fog" width="40" height="40"></canvas>
								</figure>
								<div class="weather-text">
									<h4>SUN</h4>
									<h5>11 °C</h5>
								</div>
								<div class="clearfix"></div>
							</li>
						</ul>
						<script>
							 var icons = new Skycons({"color": "#fcb216"}),
								  list  = [
									"partly-cloudy-day"
								  ],
								  i;

							  for(i = list.length; i--; )
								icons.set(list[i], list[i]);
							  icons.play();
						</script>
						<script>
							 var icons = new Skycons({"color": "#000"}),
								  list  = [
									"clear-night","partly-cloudy-night", "cloudy", "clear-day", "sleet", "snow", "wind","fog"
								  ],
								  i;

							  for(i = list.length; i--; )
								icons.set(list[i], list[i]);
							  icons.play();
						</script>
			</div>
		</div>
		<div class="clearfix"> </div>
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
</body>
</html>
