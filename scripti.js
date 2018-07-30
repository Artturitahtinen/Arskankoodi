$(function(){
	if($("#Työsuhde").val() == "Määräaikainen"){
		$("#Aloituspäivämäärä").prop('disabled', false);
		$("#Päättymispäivämäärä").prop('disabled', false);
		$("#Aloituspäivämäärä").attr("placeholder", "PP.KK.VVVV");
		$("#Päättymispäivämäärä").attr("placeholder", "PP.KK.VVVV");

		$("#Aloituspvm").append("<span class = Tähti2> &nbsp  * </span>");
		$("#Päättymispvm").append("<span class = Tähti2> &nbsp  * </span>");
	}else{
		$("#Aloituspäivämäärä").prop('disabled', true);
		$("#Päättymispäivämäärä").prop('disabled', true);

		$(".Tähti2").remove();
	}
	$("#Työsuhde").change(function () {
		if($("#Työsuhde").val() == "Määräaikainen"){
			$("#Aloituspäivämäärä").prop('disabled', false);
			$("#Päättymispäivämäärä").prop('disabled', false);
			$("#Aloituspäivämäärä").attr("placeholder", "PP.KK.VVVV");
			$("#Päättymispäivämäärä").attr("placeholder", "PP.KK.VVVV");

			$("#Aloituspvm").append("<span class = Tähti2> &nbsp  * </span>");
			$("#Päättymispvm").append("<span class = Tähti2> &nbsp  * </span>");
		}else{
			$("#Aloituspäivämäärä").prop('disabled', true);
			$("#Päättymispäivämäärä").prop('disabled', true);

			$(".Tähti2").remove();
		}
	});
});
