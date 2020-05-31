@extends('layouts.test')

@section('content')
<div class="top-nav">
	<h4 class="sm black bold">Test toeic online</h4>
	<ul class="top-nav-list">
		<li><a href="#"><b>Bách Khoa Toeic</b></a></li>
		<li class="outline-learn part-list">
			<a href="#"><i class="fas fa-list-alt"></i></a>
			<div class="list-item-body outline-learn-body ps-container ps-active-y"
				style="height: 417.443px; width: 352.8px;">
				<div class="ps-scrollbar-x-rail" style="width: 329.2px; display: none; left: 0px;">
					<div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div>
				</div>
				<div class="ps-scrollbar-y-rail" style="top: 0px; height: 360.813px; display: inherit; right: 0px;">
					<div class="ps-scrollbar-y" style="top: 0px; height: 150px;"></div>
				</div>
			</div>
		</li>
		<li class="exit">
			<a href="#"><i class="fas fa-times-circle"></i></a>
		</li>
	</ul>
</div>
<section id="quizz-intro-section" class="quizz-intro-section learn-section"
	style="min-height: 466px; height: auto !important;">
	<div class="container" style="height: auto !important;">
		<div class="question-content-wrap" style="height: auto !important;">
			<div class="row" style="height: auto !important;">
				<div class="col-md-10 col-md-push-1" style="height: auto !important; min-height: 0px !important;">
					<div class="question-content">
						<i>Cảm ơn bạn đã thi thử trên Bach khoa Toeic</i><br>
						<table class="table-question" style="border: none">
							<thead>
								<tr>
									<th colspan="2" style="color: #D93425">
										Listening: {{ $test->getListeningScore() }}/100
									</th>
									<th class="right-answer" style="color: #D93425">Điểmnghe: 5</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><b>1- 6</b></td>
									<td class="td-quest">Part I: Picture Description
										<b>({{ $test->part_one_score }}/6)</b></td>
								</tr>
								<tr>
									<td><b>7 - 31</b></td>
									<td class="td-quest">Part II: Question - Response
										<b>({{ $test->part_two_score }}/25)</b></td>
								</tr>
								<tr>
									<td><b>32 - 70</b></td>
									<td class="td-quest">Part III: Short Conversations
										<b>({{ $test->part_three_score }}/39)</b></td>
								</tr>
								<tr>
									<td><b>71 - 100</b></td>
									<td class="td-quest">Part IV: Short Talks
										<b>({{ $test->part_four_score }}/30)</b>
									</td>
								</tr>
							</tbody>
						</table>
						<table class="table-question" style="border: none">
							<thead>
								<tr>
									<th colspan="2" style="color: #D93425">
										Reading: {{ $test->getReadingScore() }}/100
									</th>
									<th class="right-answer" style="color: #D93425">Điểm đọc: 5</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><b>101 - 130</b></td>
									<td class="td-quest">Part V: Incomplete Sentences
										<b>({{ $test->part_five_score }}/30)</b></td>
								</tr>
								<tr>
									<td><b>131 - 146</b></td>
									<td class="td-quest">Part VI: Text Completion
										<b>({{ $test->part_six_score }}/16)</b></td>
								</tr>
								<tr>
									<td><b>147 - 200</b></td>
									<td class="td-quest">Part VII: Reading Comprehension
										<b>({{ $test->part_seven_score }}/54)</b></td>
								</tr>
							</tbody>
						</table>
						<div class="text-center">
							<a href="https://toeic24.vn/exam/exit" class="mc-btn btn-style-6">Exit</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection