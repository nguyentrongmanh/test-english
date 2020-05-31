$(document).ready(function () {
	$('#count-down').timeTo(defaultCountDown, function () { alert('Countdown finished'); });
	var questionList = []
	list.forEach(function (item, index) {
		item.questions.forEach(function (item, index) {
			questionList.push(item)
		});
	});
	var trueAnswerList = [];
	$('input[type=radio]').change(function (e) {
		const value = e.target.value;
		const questionId = parseInt($(this).attr("data-id"));
		const curQuestion = questionList.filter(function (item, index) {
			return item.id == questionId
		})[0];
		console.log(curQuestion);
		if (value == curQuestion.answer) {
			trueAnswerList.push(curQuestion.id)
		} else {
			trueAnswerList = trueAnswerList.filter(function (item, index) {
				return item != curQuestion.id
			})
		}
		console.log(trueAnswerList);
	});

	$("#test").on("submit", function (e) {
		$("input[name=score]").val(trueAnswerList.length);
		$("input[name=" + hiddenInput + "]").val(trueAnswerList.toString());
		const t2 = new Date();
		const diff = Math.ceil(Math.abs((t1.getTime() - t2.getTime()) / 1000));
		const countDown = defaultCountDown - diff
		$("input[name=count_down]").val(countDown);
		$(this).submit();
	});
});