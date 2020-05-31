$(document).ready(function() {
	var questionList = list.map(function(item, index) {
		return item.questions[0]
	});
	var trueAnswerList = [];
	$('input[type=radio]').change(function(e) {
		const value = e.target.value;
		const questionId = parseInt($(this).attr("data-id"));
		const curQuestion = questionList.filter(function(item, index) {
			return item.id == questionId
		})[0];
		console.log(curQuestion);
		if (value == curQuestion.answer) {
			trueAnswerList.push(curQuestion.id)
		} else {
			trueAnswerList = trueAnswerList.filter(function(item, index) {
				return item != curQuestion.id
			})
		}
		console.log(trueAnswerList);
	});

	$("#test").on("submit", function(e) {
		$("input[name=" + hiddenInput + "]").val(trueAnswerList.toString());
		$(this).submit();
	});
});