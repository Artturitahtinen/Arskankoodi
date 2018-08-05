$(function(){
	if($("#Työsuhde").val() == "Määräaikainen"){
		$("#Aloituspäivämäärä").show();
		$("#Päättymispäivämäärä").show();
		$("#Aloituspäivämäärä").attr("placeholder", "PP.KK.VVVV");
		$("#Päättymispäivämäärä").attr("placeholder", "PP.KK.VVVV");

	}else{
		$("#Aloituspäivämäärä").removeAttr("placeholder");
		$("#Päättymispäivämäärä").removeAttr("placeholder");
		$("#Aloituspäivämäärä").hide();
		$("#Päättymispäivämäärä").hide();


		$(".Tähti2").remove();
	}
	$("#Työsuhde").change(function () {
		if($("#Työsuhde").val() == "Määräaikainen"){
			$("#Aloituspäivämäärä").show();
			$("#Päättymispäivämäärä").show();
			$("#Aloituspäivämäärä").attr("placeholder", "PP.KK.VVVV");
			$("#Päättymispäivämäärä").attr("placeholder", "PP.KK.VVVV");

		}else{
			$("#Aloituspäivämäärä").removeAttr("placeholder");
			$("#Päättymispäivämäärä").removeAttr("placeholder");
			$("#Aloituspäivämäärä").hide();
			$("#Päättymispäivämäärä").hide();


		}
	});
});
