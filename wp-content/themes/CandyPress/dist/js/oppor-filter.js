$ = jQuery;
 
var mafs = $("form#my-ajax-filter-search"); 

mafs.change(function(e){
    e.preventDefault(); 
    $("#jobs-render-all").html('');
    // console.log("form submitted");
    var jobType = [];
    $.each($("input[name='jobType']:checked"), function(){ 
        jobType.push($(this).val());
        // console.log(jobType);
    });
    
    if(mafs.find("#experiance").val().length) {
        var experiance = mafs.find("#experiance").val();
        // console.log(experiance);
    }

    var location = [];
    $.each($("input[name='location']:checked"), function(){ 
        location.push($(this).val());
        // console.log(location);
    });

    var department = [];
    $.each($("input[name='department']:checked"), function(){ 
        department.push($(this).val());
        // console.log(department);
    });

    var data = {
        'action' : "my_ajax_filter_search",
        'jobType' : jobType,
        'experiance' : experiance,
        'location' : location,
        'department' : department,
    }
    
    $.ajax({
        url : ajax_url,
        data : data,
        type : "POST",
        success : function(response) {
            console.log("ajaxComplete");
            console.log(response);
            // var jsonobj = JSON.parse(response);
            // alert(response['title'].length);
             if(response) {
                // alert(response.length);
                
                for(var i = 0 ;  i < response.length ; i++) {
                     var html  = "<li class='job-card__item'> <div class='job-card__item__header'> <div class='head-wrp'> <h4>"+response[i].title+"</h4> <p class='s-text'>"+response[i].jobmetatype+"/"+response[i].salary+"/"+response[i].location+"/"+response[i].department+"</p></div></div><div class='job-card__item__body'> <p class='fnt-16 clr-0d o-8'>"+response[i].jobdescp+"</p></div><div class='job-card__item__footer'> <div class='btn-wrp'><a class='btn btn--blue btn--sm' href='' type='button' data-bs-toggle='modal' data-bs-target='#opportunityModal-"+ response.postid +"'>More Details<i class='fa fa-angle-right'></i></a></div></div></li> <div class='modal fade' id='opportunityModal-"+response.postid+"' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'> <div class='modal-dialog job-modal'> <div class='modal-content modal-dialog-scrollable job-modal'> <div class='modal-header'> <div class='row'> <div class='col-12 mb-2'> <a class='back-btn_link back-btn-arrow mt-0'></a></div><div class='col-lg-11 col-xxl-8'> <h3 class='Nk-h3 clr-05 fnt-700 mb-xxl-4'>"+response[i].title+"</h3> <p class='fnt-20 clr-84'>"+response[i].jobmetatype+"/"+response[i].salary+"/"+response[i].location+"/"+response[i].department+"</p></div></div><button class='close-btn' type='button' data-bs-dismiss='modal' aria-label='Close'><img src='/img/icons/close-icon.svg' alt=''></button> </div><div class='modal-body'> <div class='js-scroll-container'> <div class='js-scroll-container__wrp'> <div class='job-content'> "+response[i].content+" </div><div class='job-form'> <h6 class='mb-xxl-3'>To Apply Fill Your Details Here</h6> </div></div></div></div><div class='job-modal-footer'> <div class='d-md-flex align-items-md-center justify-content-md-between'> <div class='job-modal-footer__Content'> <p class='fnt-16 fnt-600 clr-b'>Please apply before "+response[i].lastdate+"</p></div><div class='job-modal-footer__btn-group d-flex'> <button class='btn btn--blue-trans btn--eq-width' type='button'> Apply with Linkedin</button> <button class='ms-2 ms-lg-4 btn btn--blue btn--eq-width js-apply-btn' type='button'>Apply</button> </div></div></div></div></div></div>";
                    $("#jobs-render-all").append(html);
                }
            } else {
                var html  = "error";
                $("#jobs-render-all").append(html);
            }
        } 
    });
});

