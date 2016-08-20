$(".open_pdf").change(function(){
var value = $(this).val();
if(value){
var foldername = $(this).attr('name');
download_pdf(foldername,base_url,value);
}
})


$(".display_pdf_1").click(function(){
$(".pdf_ul_display_2").hide();
$(".pdf_ul_display_3").hide();
$(".pdf_ul_display_4").hide();
$(".pdf_ul_display_1").toggle();
});

$(".display_pdf_2").click(function(){
$(".pdf_ul_display_1").hide();
$(".pdf_ul_display_3").hide();
$(".pdf_ul_display_4").hide();
$(".pdf_ul_display_2").toggle();
});

$(".display_pdf_3").click(function(){
$(".pdf_ul_display_1").hide();
$(".pdf_ul_display_2").hide();
$(".pdf_ul_display_4").hide();
$(".pdf_ul_display_3").toggle();
});

$(".display_pdf_4").click(function(){
$(".pdf_ul_display_1").hide();
$(".pdf_ul_display_2").hide();
$(".pdf_ul_display_3").hide();
$(".pdf_ul_display_4").toggle();
});

$(".resource_mobile_commercial").click(function(){
$(".commercial_mob").hide();
$(".mobile_phone_pdf_commercial").show();
});	


function display_menu(id){
$(".redential_sub").hide();
$(".mobile_residential_col").hide();
$(".residential_sub_menu_"+id).show();	
}

function back_button(){
$(".mobile_residential_col").show();
$(".redential_sub").hide();
}

/*
function display_pdf(id){
$(".pdf_ul_display_"+id).toggle('slow');
} */

function download_pdf(foldername,base_url,filename){
window.open(base_url+'/pdf/'+foldername+'/'+filename);
}
