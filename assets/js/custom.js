$("form").validate({
	rules: {
        category: {
            required: true
        },
        difficulty: {
            required: true
        }
	},
	submitHandler: function() {
        let form = $("form");

        if (form.attr('id') == 'selection') {
        	$.ajax({
	            type: "post",
	            url: app_base_path+"quizSelection",
	            data: form.serialize(),
	            beforeSend: function() {
		            $.blockUI({
		                css: { backgroundColor: 'transparent', color: '#2c3e50', border: 'none' },
		                message: '<i class="fas fa-spinner fa-pulse fa-3x"></i>'
		            });
	    		},
	            success: function(response) {
	            	$.unblockUI();
	            	$('#optionModal').modal('hide');
	            	let quizData = response.split('|');
	            	$('.modal-backdrop.show').css("opacity", "0");
	            	load_data(quizData);
	            }
        	});
        }
	}
});

function load_data(quizData){
	$.ajax({
        type: "get",
        url: app_base_path+'getApiUrl/'+quizData[0]+'/'+quizData[1],
        beforeSend: function() {
            $.blockUI({
                css: { backgroundColor: 'transparent', color: '#2c3e50', border: 'none' },
                message: '<i class="fas fa-spinner fa-pulse fa-3x"></i>'
            });
		},
        success: function(response) {
        	$.unblockUI();
        	$('#quizdata').html('');
        	$('.modal-backdrop.show').css("opacity", "0");
        	$('#quizdata').html(response);
        }
	});
}

//Get User Submitted Answers
let i = 0;
$(document).on('click','.valueno',function() {
	i++;
	let j = i + 1;
	let userAnswer = $(this).attr('value');
	let correctAnswer = $(this).attr('data-value');
	let radioName = $(this).attr('name')
	$.ajax({
            type: "get",
            url: app_base_path+"quizSubmit",
            data: {"getUserAnswer": userAnswer,"getCorrectAnswer":correctAnswer},
            beforeSend: function() {
	            $.blockUI({
	                css: { backgroundColor: 'transparent', color: '#2c3e50', border: 'none' },
	                message: '<i class="fas fa-spinner fa-pulse fa-3x"></i>'
	            });
    		},
            success: function(response) {
            	$('#data-row-'+j).show();
            	$.unblockUI();
				$("input[name='" + radioName + "']").attr("disabled","disabled");
                if (response == 'Correct') {
        			$('#showcorrect'+i).show();
        			$('#showincorrect'+i).hide();
            	}

            	else {
            		$('#showcorrect'+i).hide();
            		$('#showincorrect'+i).show();
            	}
        }
	});
});