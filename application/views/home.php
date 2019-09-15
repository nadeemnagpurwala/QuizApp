<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include_once(APPPATH.'common_files/header.php'); ?>
	</head>
	<body>
		<!-- Navigation -->
		<?php include_once(APPPATH.'common_files/navbar.php'); ?>
		<section id="quizdata">
			<!-- Masthead -->
			<header class="masthead bg-primary text-white text-center">
				<div class="container d-flex align-items-center flex-column">
					<h3><i class="fas fa-question-circle fa-4x pb-2"></i></h3>
					<!-- Masthead Heading -->
					<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#optionModal">
						<h5 class="text-uppercase mb-0">Select A Quiz Type</h5>
					</button>
					<!-- Icon Divider -->
					<div class="divider-custom divider-light">
						<div class="divider-custom-line"></div>
						<div class="divider-custom-icon">
							<i class="fas fa-star"></i>
						</div>
						<div class="divider-custom-line"></div>
					</div>
					<!-- Masthead Subheading -->
					<p class="masthead-subheading font-weight-light mb-0">General Knowledge - Science & Nature - Sports</p>
				</div>
			</header>
			<!-- Modal 1 -->
			<div class="modal fade" id="optionModal" tabindex="-1" role="dialog" aria-labelledby="optionModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-dialog-zoom modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Select Category & Difficulty</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
							</button>
						</div>
						<form role="form" method="post" autocomplete="off" id="selection">
							<div class="modal-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="category">Category</label>
											<select class="form-control" name="category" id="category" required="">
												<option value="">Select An Option</option>
												<option value="9">General Knowledge</option>
												<option value="17">Science & Nature</option>
												<option value="21">Sports</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="difficulty">Difficulty</label>
											<select class="form-control" name="difficulty" id="difficulty" required="">
												<option value="">Select An Option</option>
												<option value="easy">Easy</option>
												<option value="medium">Medium</option>
												<option value="hard">Hard</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Proceed</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
		<!-- Copyright Section -->
		<section class="copyright py-4 text-center text-white">
			<div class="container">
				<h6>Developed By <a href="https://nadeemnagpurwala.github.io/" target="_blank">Nadeem Nagpurwala </a></h6>
			</div>
		</section>
	</body>
</html>